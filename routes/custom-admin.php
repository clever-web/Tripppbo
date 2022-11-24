    <?php

    use App\Http\Controllers;
    use App\Http\Controllers\Admin\FundMyTripSoloAdminController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\Checkout;
    use App\Http\Controllers\FlightController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\HotelController;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\NotificationsController;
    use App\Http\Controllers\ReportsController;
    use App\Http\Controllers\SoloTripController;
    use App\Http\Controllers\SupportController;
    use App\Http\Controllers\TicketLotteryCheckoutController;
    use App\Http\Controllers\TicketLotteryController;
    use App\Http\Controllers\TripsController;
    use App\Http\Controllers\UsersProfile;
    use Illuminate\Foundation\Auth\EmailVerificationRequest;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use Laravel\Socialite\Facades\Socialite;

    Route::prefix('admin')->middleware('isAdmin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin-home');
        Route::get('/tickets-lottery', [AdminController::class, 'ticket_lottery_home'])->name('admin-ticket-lottery-home');
        Route::post('/tickets-lottery/create', [AdminController::class, 'ticket_lottery_create'])->name('admin-ticket-lottery-create');
        Route::get('/users', [AdminController::class, 'users_home'])->name('admin-users-home');
        Route::get('/tickets-lottery/{id}/pick-winner', [AdminController::class, 'tickets_lottery_pick_winner'])->name('admin-tickets-lottery-pick-winner');
        Route::post('/tickets-lottery/pick-winner/', [AdminController::class, 'select_winner'])->name('admin-tickets-lottery-pick-winner-post');
        Route::get('/violation-reports', [AdminController::class, 'reports_home'])->name('admin-violation-reports-home');
        Route::get('/fundmytripsolo', [FundMyTripSoloAdminController::class, 'index'])->name('admin-fund-my-trip-solo-home');
    });
