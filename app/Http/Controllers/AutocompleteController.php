    <?php

    namespace App\Http\Controllers;

    use App\Models\Country;
    use App\Models\HotelbedsLocationDestination;
    use App\Models\WorldCity;

    use App\Services\Trippbo\TravelomatixHotelModel;
    use Illuminate\Http\Request;
    use App\Services\Sriggle\SriggleGeneralService;
    use App\Models\SriggleCity;
    use App\Models\SriggleAirport;

    class AutocompleteController extends Controller
    {

        public function airport_by_id(Request $r)
        {
            $a = new SriggleGeneralService();
            return  $a->AirportById($r['airport_id']);
        }

        public function new_autocomplete(Request $r)
        {
            $keyword = $r->input('keyword');
            $x = new TravelomatixHotelModel();

            return $x->suggestLocations($keyword);
        }

        public function SriggleAutocompleteCity(Request $r)
        {
            $s = new SriggleGeneralService();
            $results = $s->AutocompleteCity($r['keyword']);
            return $results;
        }
        public function SriggleAutocompleteByCityId(Request $r)
        {
            $s = new SriggleGeneralService();
            return  $result = SriggleCity::where('city_id', $r['city_id'])->take(1)->get();
        }
        public function airportAutocomplete(Request $r)
        {
            $s = new SriggleGeneralService();
            return $s->AutocompleteAirport($r['keyword']);
        }
        public function getAirportById(Request $r)
        {

            return SriggleAirport::where('airport_id', $r['airport_id'])->take(1)->get();
        }
        /*  public function autocomplete_activity(Request $r)
        {
            $keyword = $r->input('keyword');
            $x = new Autocomplete();

            return $x->autocomplete($keyword);
        }

        public function autocomplete_airport(Request $r)
        {
            $keyword = $r->input('keyword');
            $x = new Autocomplete();

            return $x->autocomplete_airport($keyword);
        }

        public function autocomplete_activity_2(Request $r)
        {
            $keyword = $r->input('keyword');
            $x = new Autocomplete();

            return $x->autocomplete_activity_2($keyword);
        }
        public function byCity(Request $r)
        {

            $cities = HotelbedsLocationDestination::where('name', 'LIKE', ucfirst($r['keyword']) . "%")->take(10)->get();

            $to_return = [];
            foreach ($cities as $city) {
                $to_return[] = [
                    'id' => $city->id,
                    'country' => Country::where('code', $city->isoCode)->first()->name,
                    'name' => $city->name,


                ];
            }
            return $to_return;
        } */
    }
