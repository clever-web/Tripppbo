<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\TicketLottery;
use App\Models\TicketLotteryOrder;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.home');
    }

    public function ticket_lottery_home()
    {
        $lotteries = TicketLottery::all();

        return view('admin.ticket-lottery.home', ['lotteries' => $lotteries]);
    }

    public function ticket_lottery_create(Request $r)
    {
        $lottery = new TicketLottery();
        $lottery->title = $r['title'];
        $lottery->description = $r['description'];
        $lottery->entry_fee = $r['entry_fee'];
        $lottery->city = $r['city'];
        if ($r->input('type_of_lottery') === 'virtual') {
            $lottery->type_of_lottery = 'virtual';
            $lottery->gift_card_value = $r->input('gift_card_value');
        } else {
            $lottery->type_of_lottery = 'physical';
        }
        if ($r->hasFile('picture')) {
            $lottery->picture_url = $r->file('picture')->storePublicly('lottery_pictures', 'public');
        }

        $lottery->save();

        return redirect()->route('ticket-lottery-view', $lottery->id);
    }

    public function users_home()
    {
        $users = User::paginate(25);

        return view('admin.users.home', ['users' => $users]);
    }

    public function reports_home()
    {
        $reports = Report::where('handled', false)->paginate(25);

        return view('admin.violation-reports.home', ['reports' => $reports]);
    }

    public function tickets_lottery_pick_winner($id)
    {
        $t = TicketLottery::findOrFail($id);

        return view('admin.ticket-lottery.pick-winner', ['entries' => $t->lotteryEntries, 'lottery' => $t]);
    }

    public function select_winner(Request $req)
    {
        $lottery_id = $req['lottery_id'];
        $winner_entry_id = $req['entry_id'];

        $lottery = TicketLottery::findOrFail($lottery_id);
        if ($lottery->lotteryEntries->count() > 0) {
            if ($winner_entry_id == -1) {
                $winner_entry_id = mt_rand(1, $lottery->lotteryEntries->count());
                $entry = TicketLotteryOrder::findOrFail($winner_entry_id);

                $lottery->winner_user_id = $entry->user->id;
            } else {
                $entry = TicketLotteryOrder::findOrFail($winner_entry_id);
                $lottery->winner_user_id = $entry->user->id;
            }
            $lottery->active = false;
            $lottery->save();
        }

        return redirect()->route('admin-ticket-lottery-home');
    }
}
