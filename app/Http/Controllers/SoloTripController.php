    <?php

    namespace App\Http\Controllers;

    use App\Models\Payment;
    use App\Models\SoloTrip;
    use App\Models\SoloTripOrder;
    use App\Models\User;
    use App\Notifications\FundMyTripSoloNewDonation;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Laravel\Cashier\Exceptions\IncompletePayment;

    class SoloTripController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $r)
        {
            $solos = SoloTrip::with([
                'user' => function ($q) {
                    $q->select( 'id' ,'name');
                }
            ])->where('ended', false)->paginate(12);

            return view('solo-trips.main', ['trips' => $solos]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            /*    return view('fund-my-trip-solo.create'); */
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $request->validate([
                'destination' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'cost' => 'required|string|max:255',
                /*    'startdate' => 'required|date',
                'enddate' => 'required|date', */
                'description' => 'required|string|max:600',
                'destination' => 'required|string|max:50',

                'trip_img' => 'nullable|image|max:17000',
                'trip_id'  => 'nullable|numeric',
            ]);

            $solo = new SoloTrip();
            $editing = false;
            if ($request->has('trip_id')) {
                $solo = SoloTrip::findOrFail($request->input('trip_id'));
                if ($solo->user->id !== Auth::id()) {
                    if (Auth::user()->isAdmin === false) {
                        abort(403);
                    }
                }
                $editing = true;
            }

            /*     $solo->startdate = $request['startdate']; */
            $solo->title = $request['title'];
            $solo->goal = $request['cost'];
            $solo->destination_country_id = $request['destination_country_id'];
            $solo->destination_city_id = $request['destination_city_id'];
            if ($editing === false) {
                $solo->user_id = Auth::id();
                $solo->startdate = Carbon::now();
                $time = Carbon::now();
                $duration = $request->input('fund_duration');

                if ($duration == 1) {
                    $time->addDays(30);
                } elseif ($duration == 2) {
                    $time->addDays(60);
                } elseif ($duration == 3) {
                    $time->addDay(90);
                }  /* else {
                    return redirect()->route('solo-browse')->with('errors', ['Fund Duration Is A Required Field.']);
                } */


                $solo->enddate = $time;
            }

            /*     $solo->enddate = $request['enddate']; */

            $solo->description = $request['description'];
            $solo->destination = $request['destination'];
            if ($request->hasFile('trip_img')) {
                $img = $request->file('trip_img')->storePublicly('solo-trips/images', 'public');
                $solo->picture_url = $img;
            }
            $solo->save();
            return route('solo-browse', $solo->id);
            //   return redirect()->route('solo-browse', [$solo->id])->with('success', 'Your Request has been sent');
        }

        /**
         * Display the specified resource.
         *
         * @param \App\Models\SoloTrip $soloTrip
         * @return \Illuminate\Http\Response
         */
        public function show($id, Request $r)
        {
            $trip = SoloTrip::findOrFail($id);
            if (Auth::check()) {
                $user = User::findOrFail(Auth::id());
                $paymentMethods = $user->paymentMethods();

                return view('solo-trips.sub', ['trip' => $trip, 'logged_in' => true, 'payment_methods' => $paymentMethods]);
            }

            return view('solo-trips.sub', ['trip' => $trip]);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Models\SoloTrip $soloTrip
         * @return \Illuminate\Http\Response
         */
        public function edit(SoloTrip $soloTrip)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param \App\Models\SoloTrip $soloTrip
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, SoloTrip $soloTrip)
        {
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Models\SoloTrip $soloTrip
         * @return \Illuminate\Http\Response
         */
        public function destroy(SoloTrip $soloTrip)
        {
            //
        }

        public function fund($id)
        {
            $u = User::findOrFail(Auth::id());

            return view('fund-my-trip-solo.fund', ['id' => $id, 'email' => $u->email]);
        }

        public function chargeCustomer(Request $request)
        {
            $request->validate([
                'payment_amount' => 'required|numeric|max:100000',
                'trip_id' => 'required',
                'payment_id' => 'required|string|max:1000',

            ]);
            $amount = $request['payment_amount'];

            try {
                $t = SoloTrip::findOrFail($request['trip_id']);

                $payment = $request->user()->charge($amount * 100, $request['payment_id']);
                $t->donations += $amount;
                $t->save();

                return redirect()->route('solo-browse', $request['trip_id']);
            } catch (IncompletePayment $e) {
                $payment = new Payment();

                return redirect()->route(
                    'cashier.payment',
                    [$e->payment->id, 'redirect' => route('home')]
                );
            }
        }

        public function endFunding(Request $r)
        {
            $r->validate([
                'trip_id' => 'required|numeric',
            ]);

            $trip = SoloTrip::findOrFail($r->input('trip_id'));
            if ($trip->user->id !== Auth::id() || $trip->ended == true) {
                abort(403);
            }

            $trip->ended = true;
            $trip->redeemBalance();
            $trip->save();
        }

        public function how_it_works()
        {
            return view('how-it-works.solo');
        }
    }
