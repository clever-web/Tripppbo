<?php

namespace App\Http\Controllers;

use App\Models\FeaturedPackage;
use App\Models\PackageCountryDestination;
use App\Services\Sriggle\HolidayService;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function selectHolidayIndex(Request $r)
    {

        $a = new HolidayService();
        $res = $a->getPackageDetails($r['package_id']);

        $package_options = FeaturedPackage::where('package_id', $r['package_id'])->first();


        $hotel_only = false;
        if ($r->has("hotel_only")) {
            $hotel_only = true;
        }
        return view("holidays.paxes", ['hotel_only' => $hotel_only, 'package_id' => $r['package_id'], 'package_details' => $res, 'departure_airport_id' => $r['from_airport'], 'package_options' => $package_options]);
    }
    public function index(Request $r)
    {
        $airport_id = '';
        $country_id = '';
        $start_date = '';
        $end_date = '';

        if ($r->has("airport"))
        {
            $airport_id = $r['airport'];
        }
        if ($r->has("country_id"))
        {
            $country_id = $r['country_id'];
        }
        if ($r->has("start"))
        {
            $start_date = $r['start'];
        }
        if ($r->has("end"))
        {
            $end_date = $r['end'];
        }
        $list = [];
        $t = PackageCountryDestination::where('active' , true)->get();

        foreach($t as $c)
        {


        }
        $theme = -1;
        if ($r->has("theme"))
        {
            $theme = $r['theme'];
        }
        return view("holidays.holiday-main", ['theme' => $theme, 'countries' => $t, 'airport_id' => $airport_id, 'country_id' => $country_id, 'start_date' => $start_date, 'end_date' => $end_date]);
    }

    public function getAvailableHolidays(Request $r)
    {


        $theme = -1;
        if ($r->has("theme"))
        {
            $theme = $r['theme'];
        }

        $params =[];
        $params['theme'] = $theme;
        $params['airport_id'] = $r['airport_id'];
        $params['country_id'] = $r['country_id'];

        if ($r->has('start_date'))
        {
            $params['start_date'] = $r['start_date'];
        }



        if ($r->has('end_date'))
        {
            $params['end_date'] = $r['end_date'];
        }



        $a = new HolidayService();
        return $a->getHolidays($params);
    }
    public function getPackageDetailsIndex(Request $r)
    {
        $package_options = FeaturedPackage::where('package_id', $r['id'])->first();
        $a = new HolidayService();

        return view("holidays.holiday-details", ['package_id' => $r['id'], 'package_options' => $package_options]);
    }

    public function getPackageDetails(Request $r)
    {

        $a = new HolidayService();

        return $a->getPackageDetails($r['id']);
    }

    public function getHotelsDetails(Request $r)
    {
        $a = new HolidayService();

        $list = json_decode($r['hotels'], true);


        $params = [];
        $params['hotels'] = $list;
        $params['checkinDate'] = $r['checkinDate'];
        $params['checkoutDate'] = $r['checkoutDate'];
        $params['rooms'] = json_decode($r['rooms'], true);



        $resp =    $a->getHotelsDetails($params);

        return $resp;
    }

    public function bookHoliday(Request $r)
    {
        $params = [];
        $params['paxes_details'] = json_decode($r['paxes_details'], true);
        $params['contact_info'] = json_decode($r['contact_info'], true);
        $params['flight'] = json_decode($r['flight'], true);
        $params['selected_hotels'] = json_decode($r['selected_hotels'], true);
        $params['package_details'] = json_decode($r['package_details'], true);
        $params['selected_rooms'] = json_decode($r['selected_rooms'], true);
        //  return  $params['package_details'];
        $a = new HolidayService();
        return  $a->bookHoliday($params);
    }

    public function getFeaturedPackages()
    {
        $a = new HolidayService();
        return  $a->getFeaturedPackages();
    }
}
