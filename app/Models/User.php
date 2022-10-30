<?php

namespace App\Models;

use App\Jobs\SendVerificationEmail;
use App\Models\Trip;
use App\Models\TripJoinRequest;
use App\Services\Trippbo\GiftCardManager;
use App\Traits\Reportable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, Billable, Reportable;

    protected $reportable_object_name = 'user'; // required by the Reportable trait
    protected $with = ['profile' , 'giftCards'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @var mixed
     */
    private $role;

    public function giftCards()
    {
        return $this->hasMany(GiftCard::class);
    }


    public function current_city()
    {
        return $this->hasOne(WorldCity::class, 'id', 'current_city_id');
    }

    public function hometown_city()
    {
        return $this->hasOne(WorldCity::class, 'id', 'hometown_city_id');
    }
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function interests()
    {
        return $this->hasMany(UserInterests::class);
    }

    public function albums()
    {
        return $this->hasMany(UserGalleryAlbum::class);
    }

    public function user_interests()
    {
        $interests = $this->interests;
        $to_return = [];
        foreach($interests as $i)
        {
            $to_return[] = $i['interest'];
        }

        return $to_return;

    }

    public function languages()
    {
        return $this->hasMany(UserLanguages::class);
    }

    public function user_languages()
    {
        $languages = $this->languages;
        $to_return = [];
        foreach($languages as $i)
        {
            $to_return[] = $i['language'];
        }

        return $to_return;

    }



    public function TripsJoinRequests()
    {
        return $this->hasMany(TripJoinRequest::class);
    }

    public function LotteryEntries()
    {
        return $this->hasMany(TicketLotteryOrder::class);
    }

    public function CompletedLotteryEntries()
    {
        return  $this->LotteryEntries->where('completed', true)->where('refunded', false);
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function chatMessages()
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function recentChats()
    {
        $last_convos = $this->chatMessages()->select('id', 'conversation_id', 'user_id', 'receiver_id', 'created_at', 'message')->where('user_id', Auth::id())->orWhere('receiver_id', Auth::id())->groupBy('conversation_id')->orderByDesc('created_at')->take(5)->get();
        $last_messages = [];

        foreach ($last_convos as $current_convo) {
            $convo = $current_convo->LastMessage();

            $last_messages[] = ['id' => $convo->id, 'last_message' => $convo->LastMessage()->message, 'sender' => $convo->user, 'receiver' => $convo->receiver, 'time' => $convo->LastMessage()->created_at, 'conversation_id' => $convo->LastMessage()->conversation_id];
        }

        return $last_messages;
    }

    public function routeNotificationForNexmo($notification)
    {
        return $this->phone_number;
    }

    public function sendEmailVerificationNotification()
    {
        SendVerificationEmail::dispatch($this);
    }

    public function balanceTransactions()
    {
        return $this->hasMany(BalanceTransaction::class);
    }

    public function getBalance()
    {
        return $this->balanceTransactions->sum('amount');
    }

    public function redeemBalanceAsGiftCard($value)
    {
        $balance = $this->getBalance();
        if ($balance > 0 && $balance >= $value) {
            $gift_card = new GiftCard();
            $gift_card->user_id = $this->id;
            $gift_card->value = $value;
            do {
                $gift_card->code = GiftCardManager::generateGiftCardCode();
            } while (GiftCard::where('code', $this->code)->first() !== null);

            $transaction = new BalanceTransaction();
            $transaction->user_id = $this->id;
            $transaction->amount = $value * -1;
            $transaction->reason = 'Redeemed As Gift Card';

            DB::beginTransaction();

            try {
                $gift_card->save();
                $transaction->save();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

            DB::commit();

            return $gift_card;
        }
    }

    public function addBalanceToUserAccount($value , $currency = 'EUR' )
    {
        $transaction = new BalanceTransaction();
        $transaction->user_id = $this->id;
        $transaction->amount = $value;
        $transaction->reason = 'New Balance Added';
        $transaction->currency = "EUR";
        $transaction->save();


    }
}
