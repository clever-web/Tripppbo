    <?php

    namespace App\Http\Controllers;

    use App\Models\BookFlightOrder;
    use App\Models\BookHotelOrder;
    use App\Models\Country;
    use App\Models\FlightPassenger;
    use App\Models\HotelPassenger;
    use Illuminate\Http\Request;

    class BookPackageController extends Controller
    {
        //
        public function addPackagePassengers(Request $r)
        {
            // add flight passenger
            $month = $r->input('DateOfBirthMonth');
            $day = $r->input('DateOfBirthDay');
            $length = 2;
            $month = substr(str_repeat(0, $length).$month, -$length);
            $day = substr(str_repeat(0, $length).$day, -$length);
            $order_id = session('order_id');
            $flight_order = BookFlightOrder::where('order_id', $order_id)->first();
            $passenger = new FlightPassenger();
            $passenger->IsLeadPax = $r->input('IsLeadPax');
            $passenger->FirstName = $r->input('FirstName');
            $passenger->LastName = $r->input('LastName');
            $passenger->Gender = $r->input('Gender');
            $passenger->DateOfBirth = $r->input('DateOfBirthYear').'-'.$month.'-'.$day;
            $passenger->CountryCode = $r->input('Country');
            $passenger->CountryName = Country::where('code', $r->input('Country'))->first()->name;
            $passenger->ContactNo = $r->input('ContactNo');
            $passenger->City = $r->input('City');
            $passenger->PinCode = $r->input('PinCode');
            $passenger->AddressLine1 = $r->input('AddressLine1');
            $passenger->Email = $r->input('Email');
            $passenger->PaxType = $r->input('PaxType') == 'Adult' ? 1 : ($r->input('PaxType') == 'Child' ? 2 : 3);
            $passenger->Title = $r->input('Gender') == 1 ? 'Mr' : 'Ms';
            $passenger->flight_order_id = $flight_order->id;
            $passenger->save();

            // add hotel passenger

            $month = $r->input('DateOfBirthMonth');
            $day = $r->input('DateOfBirthDay');
            $length = 2;
            $month = substr(str_repeat(0, $length).$month, -$length);
            $day = substr(str_repeat(0, $length).$day, -$length);
            $order_id = session('order_id');
            $hotel_order = BookHotelOrder::where('order_id', $order_id)->first();
            $passenger = new HotelPassenger();
            $passenger->IsLeadPax = $r->input('IsLeadPax');
            $passenger->FirstName = $r->input('FirstName');
            $passenger->LastName = $r->input('LastName');
            $passenger->Gender = $r->input('Gender');
            $passenger->DateOfBirth = $r->input('DateOfBirthYear').'-'.$month.'-'.$day;
            $passenger->CountryCode = $r->input('Country');
            $passenger->CountryName = Country::where('code', $r->input('Country'))->first()->name;
            $passenger->ContactNo = $r->input('ContactNo');
            $passenger->City = $r->input('City');
            $passenger->PinCode = $r->input('PinCode');
            $passenger->AddressLine1 = $r->input('AddressLine1');
            $passenger->Email = $r->input('Email');
            $passenger->PaxType = $r->input('PaxType');
            $passenger->Title = $r->input('Gender') == 1 ? 'Mr' : 'Ms';
            $passenger->hotel_order_id = $hotel_order->id;
            $passenger->save();
        }
    }
