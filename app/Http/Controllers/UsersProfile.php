    <?php

    namespace App\Http\Controllers;

    use App\Models\Country;
    use App\Models\SoloTrip;
    use App\Models\Trip;
    use App\Models\TrippboUserInterests;
    use App\Models\TrippboUserLanguage;
    use App\Models\User;
    use App\Models\UserGalleryAlbum;
    use App\Models\UserGalleryImage;
    use App\Models\UserGalleryPicture;
    use App\Models\UserInterests;
    use App\Models\UserLanguages;
    use App\Models\UserProfile;
    use App\Notifications\PhoneNumberVerificationCodeNotification;
    use App\Services\Trippbo\TicketLotteryManager;
    use Carbon\Carbon;
    use Illuminate\Auth\Events\Verified;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;

    class UsersProfile extends Controller
    {
        public function index($id)
        {


            $up = UserProfile::firstOrNew(['user_id' => $id]);
            $u = User::with('albums.images')->findOrFail($id);
            $owner = false;
            if (Auth::check() && Auth::id() == $id) {
                $owner = true;
            }
            $images = UserGalleryImage::where('user_id', $u->id)->get();
            $images_urls = [];
            foreach ($images as $image) {
                $images_urls[] = asset('storage/' . $image->picture_url);
            }
            $profile_pic_url = $up->picture_url ? asset('storage/' . $up->picture_url) : asset('images-n/profile-picture-place-holder.png');
            $wall_pic_url = $up->wall_picture ? asset('storage/' . $up->wall_picture) : asset('img/user_side_hero.svg');
            $trips = Auth::check() && Auth::id() == $id ? Trip::where('user_id', $u->id)->get() : [];
            $lottery_manager = new TicketLotteryManager();
            $solo_trip = Auth::check() && Auth::id() == $id ? SoloTrip::where('user_id', $u->id)->get() : [];
            $lotteryEntries = Auth::check() && Auth::id() == $id ? $lottery_manager->getUserEntries($id) : [];
            return view('profile.main', ['user' => $u, 'user_profile' => $up, 'images_urls' => $images_urls, 'trips' => $trips, 'solo_trips' => $solo_trip, 'lottery_entries' => $lotteryEntries, 'profile_image' => $profile_pic_url, 'available_interests' => TrippboUserInterests::all(), 'available_languages' => TrippboUserLanguage::all(), 'wall_image' => $wall_pic_url, 'is_owner' => $owner, 'current_city' => $u->current_city, 'hometown' => $u->hometown_city]);
            //  return view('profile.index', ['user' => $u, 'user_profile' => $up, 'images_urls' => $images_urls, 'trips' => $trips, 'solo_trips' => $solo_trip, 'lottery_entries' => $lotteryEntries, 'profile_image' => $profile_pic_url]);
        }

        public function editProfile()
        {
            $up = UserProfile::firstOrNew(['user_id' => Auth::id()]);
            $u = User::findOrFail(Auth::id());
            $countries = DB::table('countries')->get();

            return view('my-account.main', ['countries' => $countries, 'user' => $u]);
        }

        public function uploadImages(Request $r)
        {
            $r->validate([
                'imagesArray' => 'required|image|max:10240',
            ]);
            if (!Auth::check()) {
                abort(503);
            }
            $url = '';
            $counter = 0;

            $url = $r->imagesArray->storePublicly('profile-images', 'public');
            $user_image = new UserGalleryImage();
            $user_image->user_id = Auth::id();
            $user_image->picture_url = $url;
            $user_image->save();

            return asset('storage/' . $user_image->picture_url);
        }

        public function uploadProfileImage(Request $r)
        {
            $r->validate([
                'profile_image' => 'required|image|max:10240',
            ]);
            if (!Auth::check()) {
                abort(503);
            }
            $url = '';
            $counter = 0;

            $url = $r->profile_image->storePublicly('profile_pictures', 'public');

            $user = $r->user();
            $user->profile->picture_url = $url;
            $user->profile->save();

            return asset('storage/' . $user->profile->picture_url);
        }


        public function uploadWallImage(Request $r)
        {
            $r->validate([
                'wall_pic' => 'required|image|max:10240',
            ]);
            if (!Auth::check()) {
                abort(503);
            }
            $url = '';
            $counter = 0;

            $url = $r->wall_pic->storePublicly('wall_pictures', 'public');

            $user = $r->user();
            $user->profile->wall_picture = $url;
            $user->profile->save();

            return asset('storage/' . $user->profile->wall_picture);
        }

        public function uploadNewAlbum(Request $r)
        {

            /*   $r->validate([
                'pics' => 'required|image|max:10240',
            ]); */
            if (!Auth::check()) {
                abort(503);
            }
            $urls = [];
            $user = $r->user();
            $album = new UserGalleryAlbum();
            $album->title = $r['title'];
            $album->description = $r['description'];
            $album->location = $r['location'];
            $album->user_id = $user->id;
            $album->save();
            foreach ($r['pics'] as $pic) {
                $url = $pic->storePublicly('albums/' . $user->id . '/', 'public');
                $user_pic = new UserGalleryPicture();
                $user_pic->picture_url = $url;
                $user_pic->gallery_id = $album->id;
                $user_pic->save();
            }
            $user = User::with('albums.images')->findOrFail(Auth::id());
            return $user->albums;
        }

        public function deleteAlbum(Request $r)
        {
            if (!Auth::check()) {
                return;
            }



            $album = UserGalleryAlbum::findOrFail($r['album_id']);
            $album->delete();

            $u = User::with('albums.images')->findOrFail(Auth::id());
            return $u->albums;
        }





        public function updateProfileDescription(Request $r)
        {
            $r->validate([
                'description' => 'string|max:4096',
            ]);

            $user = $r->user();
            $user->profile->description = $r['description'];
            $user->profile->save();
        }

        public function updatePersonalInformation(Request $r)
        {
            $user = $r->user();


            if ($r['hometown'])
            {
                $user->hometown_city_id = $r['hometown'];
            }
            if ($r['description'])
            {
                $user->profile->description = $r['description'];
            }
            if ($r['city'])
            {
                $user->current_city_id = $r['city'];
            }


            if ($r['phonenr']) {
                $user->phone_number = $r['phonenr'];
            }

        /*    $user->email = $r['email']; */
            $user->profile->save();
            $user->save();
        }

        public function updateUserInterestList(Request $r)
        {
            $interests = $r['interests'];
            $user = $r->user();
            $user->interests()->delete();
            $final = [];

            $interests = json_decode($interests, true);

            foreach ($interests as $i) {
                $new_interest = new UserInterests();
                $new_interest->user_id = Auth::id();
                $new_interest->interest_id = $i['id'];

                $new_interest->save();
            }
        }

        public function updateUserLanguageList(Request $r)
        {
            $languages = $r['languages'];
            $user = $r->user();
            $user->languages()->delete();
            $final = [];

            $languages = json_decode($languages, true);

            foreach ($languages as $i) {
                $new_language = new UserLanguages();
                $new_language->user_id = Auth::id();
                $new_language->language_id = $i['id'];

                $new_language->save();
            }
        }

        public function store(Request $request)
        {
            $request->validate([
                'picture' => 'image|max:25000',

            ]);

            if ($request->hasFile('picture')) {
                $picture_url = $request->file('picture')->storePublicly('profile-picture', 'public');
            }

            $u = UserProfile::firstOrNew(['user_id' => Auth::id()]);
            $u->picture_url = $picture_url;
            $u->save();

            return redirect()->route('profile-home', Auth::id());
        }

        public function account_verification_view(Request $r)
        {
            $user = $r->user();

            return view('profile.account-verification', ['user' => $user]);
        }

        public function change_password_view()
        {
            return view('profile.change-password');
        }

        public function my_tickets_view()
        {
            return view('profile.my-tickets', ['user' => Auth::user()]);
        }

        public function my_coupons_view(Request $r)
        {
            $user = $r->user();

            return view('profile.my-coupons', ['gift_cards' => $user->giftCards]);
        }

        public function editProfilePost($userId, Request $r)
        {
            if ($userId == Auth::id()) {
                $r->validate([
                    'name' => 'required|string|max:32',
                    'date_of_birth' => 'nullable|date',
                    'phone_number' => 'nullable|numeric|digits_between:6,20',

                ]);

                $user = User::findOrFail($userId);
                $userProfile = UserProfile::firstOrNew(['user_id' => $userId]);
                $user->name = $r->input('name');
                $userProfile->date_of_birth = $r->input('date_of_birth');
                if ($user->phone_number !== $r->input('phone_number')) {
                    $user->phone_number = $r->input('phone_number');
                    $user->phone_number_verified_at = null;
                }

                $country = DB::table('countries')->where('code', '=', $r->input('country'))->first();

                $userProfile->country = $country->code;

                $user->save();
                $userProfile->save();

                return redirect()->route('profile-personal-information');
            }
        }

        public function sendVerificationSMS(User $user)
        {
            $basic  = new \Vonage\Client\Credentials\Basic(env('VONAGE_KEY'), env('VONAGE_SECRET'));
            $client = new \Vonage\Client($basic);
            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS($user->phone_number, 'Trippbo', 'Your Trippbo verification code is: ' . $user->phone_number_verification_code)
            );

            /*    $message = $response->current();
            if ($message->getStatus() == 0) {
                echo "The message was sent successfully\n";
            } else {
                echo "The message failed with status: " . $message->getStatus() . "\n";
            } */
        }

        public function verifySMS(Request $r)
        {
        }

        public function generateVerificationSMS(Request $r)
        {
            $user = $r->user();
            $user->phone_number = $r['phone_nr'];


            $six_digit_code = random_int(1001, 9998);
            $user->phone_number_verification_code = $six_digit_code;
            $user->phone_number_verification_code_sent_at = Carbon::now();
            $user->save();
            $this->sendVerificationSMS($user);

            return response()->json(['success' => true]);


            return response()->json(['success' => false]);
        }

        public function verifySMSverificationCode(Request $r)
        {
            $r->validate([
                'code' => 'required|numeric',
            ]);

            $request_expired = true;
            $code_valid = false;

            $code = $r->input('code');
            $user = $r->user();
            $now = Carbon::now();
            $sent_at = Carbon::parse($user->phone_number_verification_code_sent_at);
            if ($user->phone_number_verified_at == null && $code == $user->phone_number_verification_code) {
                $code_valid = true;
                if ($sent_at->diffInMinutes($now) < 5) {
                    $request_expired = false;
                }
            }

            if ($code_valid == true && $request_expired == false) {
                $user->phone_number_verified_at = Carbon::now();
                $user->save();

                return response()->json(['verified' => true]);
            } else {
                return response()->json(['verified' => false]);
            }
        }

        public function redeemBalance(Request $r)
        {
            if (Auth::check() && $r->user()->getBalance() > 0) {
                $user = $r->user();
                $gift_card = $user->redeemBalanceAsGiftCard($user->getBalance());

                return $gift_card;
            } else {
                abort(503);
            }
        }

        public function getCountries()
        {
            $c = Country::with(['phone_code', 'flag'])->get();
            return $c;
        }
    }
