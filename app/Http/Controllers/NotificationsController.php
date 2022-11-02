    <?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class NotificationsController extends Controller
    {
        public function markAllAsRead(Request $r)
        {
            $user = $r->user();
            $user->unreadNotifications()->update(['read_at' => now()]);
        }
    }
