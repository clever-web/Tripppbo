    <?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\SoloTrip;
    use App\Models\SoloTripOrder;
    use App\Models\User;
    use Illuminate\Http\Request;

    class FundMyTripSoloAdminController extends Controller
    {
        public function index(Request $r)
        {
            $per_page = 10;
            $conditions = [];
            if ($r->has('user_id')) {
                $conditions[] = ['user_id', '=', $r->input('user_id')];
            }
            if (count($conditions) > 0) {
                $trips = SoloTrip::withTrashed()->latest()->where($conditions)->paginate($per_page);

                return view('admin.fundmytripsolo.home', ['trips' => $trips]);
            }
            $trips = SoloTrip::withTrashed()->latest()->paginate($per_page);

            return view('admin.fundmytripsolo.home', ['trips' => $trips]);
        }

        public function hideTrip(Request $r)
        {
            $trip_id = $r->input('trip_id');
            $trip = SoloTrip::find($trip_id);
            $trip->delete();
        }

        public function restoreTrip(Request $r)
        {
            $trip_id = $r->input('trip_id');
            $trip = SoloTrip::withTrashed()->find($trip_id);
            $trip->restore();
        }
    }
