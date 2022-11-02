    <?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class PaymentController extends Controller
    {
        public function index()
        {
            $user = User::findOrFail(Auth::id());
            $user->createOrGetStripeCustomer();
            $paymentMethods = $user->paymentMethods();
            if ($paymentMethods->isEmpty()) {
                $paymentMethods = new Collection();
            }

            return view('payments.payment-methods', ['user' => $user, 'payment_methods' => $paymentMethods, 'intent' => $user->createSetupIntent()]);
        }

        public function store(Request $request)
        {
            $user = $request->user();
            $paymentMethod = $request['payment_method_id'];
            $user->addPaymentMethod($paymentMethod);

            return redirect()->route('payment-methods-home');
        }

        public function delete(Request $request)
        {
            $user = $request->user();
            $paymentMethod = $user->findPaymentMethod($request['payment_method_id']);
            $paymentMethod->delete();

            return redirect()->route('payment-methods-home');
        }
    }
