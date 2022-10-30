<?php

namespace App\Providers;

use App\Models\Report;
use App\Models\User;
use App\Models\UserProfile;
use App\Services\Amadeus;
use App\Services\Travelomatix\Flights;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->singleton(Flights::class, function ($app) {
            return new Flights();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        view()->composer('*', function ($view) {
            if (Auth::check() && Auth::user()->isAdmin) {
                $reports_count = Report::unhandled()->count();
                $view->with(['username' => Auth::user()->name, 'isAdmin' => true, 'reports_count' => $reports_count]);
            } elseif (Auth::check()) {
                $view->with(['username' => Auth::user()->name, 'isAdmin' => false]);
            }

            if (Auth::check()) {
                $up = UserProfile::firstOrNew(['user_id' => Auth::id()]);
                if ($up->picture_url != null) {
                    $view->with(['profile_picture_url' => $up->picture_url]);
                } else {
                    $view->with(['profile_picture_url' => null]);
                }
                $u = User::find(Auth::id());

                $notifications = $u->notifications ? $u->notifications->take(5) : new Collection();
                $unread_notifications = $u->unreadNotifications->count();
                $messages = $u->recentChats();

                $view->with(['user_notifications' => $notifications,  'user_messages' => $messages, 'unread_notifications_count' => $unread_notifications]);

                $balance = $u->getBalance();
                $view->with(['user_balance' => $balance]);
            }
        });

        View::share('default_profile_picture', asset('images-n/profile-picture-place-holder.png'));

        /*    Blade::if('admin', function () {
                return auth()->user() && auth()->user()->isAdmin;
            });*/

        Paginator::useBootstrap();
    }
}
