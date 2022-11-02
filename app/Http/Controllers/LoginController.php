    <?php

    namespace App\Http\Controllers;

    use App\Models\FacebookUser;
    use App\Models\GoogleUser;
    use App\Models\User;
    use App\Providers\RouteServiceProvider;
    use Illuminate\Auth\Events\Registered;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Laravel\Socialite\Facades\Socialite;
    use function PHPUnit\Framework\isEmpty;

    class LoginController extends Controller
    {
        //

        public function registerWithGoogle(Request $request)
        {
            $googleUser = Socialite::driver('google')->user();

            $id = $googleUser->getId();

            $existingGoogleUser = GoogleUser::where('google_user_id', $id)->first();

            if ($existingGoogleUser) {
                Auth::login($existingGoogleUser->user);
                $request->session()->regenerate();

                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                $u = new User();
                $u->name = $googleUser->getName();
                $u->email = $googleUser->getEmail();
                $u->save();

                $gu = new GoogleUser();
                $gu->user_id = $u->id;
                $gu->google_user_id = $googleUser->getId();
                $gu->save();

                event(new Registered($u));

                Auth::login($u);
                $request->session()->regenerate();

                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }

        public function registerWithFacebook(Request $request)
        {
            $facebookUser = Socialite::driver('facebook')->user();

            $id = $facebookUser->getId();

            $existingFacebookUser = FacebookUser::where('facebook_user_id', $id)->first();

            if ($existingFacebookUser) {
                Auth::login($existingFacebookUser->user);
                $request->session()->regenerate();

                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                $u = new User();
                $u->name = $facebookUser->getName();
                $u->email = $facebookUser->getEmail();
                $u->save();

                $fu = new FacebookUser();
                $fu->user_id = $u->id;
                $fu->facebook_user_id = $facebookUser->getId();
                $fu->save();
                event(new Registered($u));

                Auth::login($u);
                $request->session()->regenerate();

                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }
    }
