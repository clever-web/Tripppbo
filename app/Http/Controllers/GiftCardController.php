    <?php

    namespace App\Http\Controllers;

    use App\Models\GiftCard;
    use Illuminate\Http\Request;

    class GiftCardController extends Controller
    {
        public function verifyGiftCard(Request $r)
        {
            $gift_card =   GiftCard::where('code', $r['code'])->where('active', true)->first();

            if ($gift_card) {
                return $gift_card;
            } else {
                abort(404, "gift card is not valid.");
            }
        }
    }
