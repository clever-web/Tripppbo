    <?php

    namespace App\Http\Controllers;

    use App\Models\CustomerSupportInquiry;
    use App\Models\SoloTrip;
    use App\Models\User;
    use App\Rules\GoogleRecaptchaV2;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class SupportController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            if (Auth::check()) {
                $u = User::findOrFail(Auth::id());

                return view('support.send-message', ['user' => $u, 'logged_in' => true]);
            } else {
                return view('support.send-message', ['logged_in' => false]);
            }
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|max:32',
                'message' => 'required|string|max:2048',
                'g-recaptcha-response' => ['required', new GoogleRecaptchaV2],
            ]);

            $supportInquiry = new CustomerSupportInquiry();
            $supportInquiry->message = $request->input('message');
            if (Auth::check()) {
                $supportInquiry->user_id = Auth::id();
            } else {
                $supportInquiry->name = $request->input('name');
                $supportInquiry->email = $request->input('email');
            }
            $supportInquiry->save();
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
        }

        /**
         * Display the specified resource.
         *
         * @param \App\Models\SoloTrip $soloTrip
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
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
            //
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
        }

        public function chargeCustomer(Request $request)
        {
        }
    }
