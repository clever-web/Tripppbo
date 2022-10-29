<?php

namespace App\Http\Controllers;

use App\Models\LotteryEntry;
use App\Models\SoloTrip;
use App\Models\TicketLottery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Exceptions\IncompletePayment;

class TicketLotteryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $t = TicketLottery::all();

        return view('ticket-lottery.main', ['lotteries' => $t]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function buyTicket($id)
    {
        $lottery = TicketLottery::findOrFail($id);
        $u = User::findOrFail(Auth::id());

        return view('ticket-lottery.buy-ticket', ['lottery'=> $lottery, 'email' => $u->email]);
    }

    public function chargeCustomerForTicket(Request $r)
    {
        $r->validate([
            'lottery_id' => 'required|numeric',
            'payment_id' => 'required|string',

        ]);

        $t = TicketLottery::findOrFail($r['lottery_id']);

        try {
            $payment = $r->user()->charge($t->entry_fee * 100, $r['payment_id']);

            $user_id = $r->user()->id;
            $entry = new LotteryEntry();
            $entry->user_id = $user_id;
            $entry->ticket_lottery_id = $t->id;
            $entry->payment_id = $payment->id;
            $entry->save();

            return redirect()->route('ticket-lottery-view', $t->id)->with('status', 'Ticket Purchased Successfully !');
        } catch (IncompletePayment $e) {
            return redirect()->route(
                    'stripe',
                    ['payment' => $e->payment, 'redirect' => route('home')]
                );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TicketLottery $ticketLottery
     * @return \Illuminate\Http\Response
     */
    public function show(TicketLottery $ticketLottery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TicketLottery $ticketLottery
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketLottery $ticketLottery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TicketLottery $ticketLottery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketLottery $ticketLottery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TicketLottery $ticketLottery
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketLottery $ticketLottery)
    {
        //
    }

    public function view_lottery($id)
    {
        $t = TicketLottery::findOrFail($id);
        if (Auth::check()) {
            $user = User::findOrFail(Auth::id());
            $paymentMethods = $user->paymentMethods();

            return view('ticket-lottery.sub', ['lottery' => $t, 'logged_in' => true, 'payment_methods'=> $paymentMethods, 'user' => $user ]);
        }

        return view('ticket-lottery.sub', ['lottery' => $t, 'logged_in' => false, 'user' => null]);
    }

    public function how_it_works()
    {
        return view('how-it-works.tickets-lottery');
    }
}
