<?php

namespace App\Services\Trippbo;

use App\Services\Travelomatix\Hotels;
use PhpParser\Node\Stmt\Foreach_;

class FundMyTripHotelBookingBot
{
    public function getHotelOrderInformation($hotelOrder)
    {
        $hotels = new Hotels();
        $params = [];
        $params['checkinDate'] = $hotelOrder->checkin_date;
        $params['noOfNights'] = $hotelOrder->numberOfNights;

        $params['cityId'] = $hotelOrder->city_code;
        $params['passengers'] = [];
        $params['passengers'][] = ['NoOfAdults' => 1, 'NoOfChild' => 0];
        $params['roomCount'] = 1;

        $search_results = $hotels->getHotels($params);

        $hotel = [];
        foreach ($search_results as $result) {
            if ($result['HotelCode'] == $hotelOrder->hotel_code) {
                $hotel = $result;
            }
        }

        $selected_room = [];
        $rooms = $hotels->getHotelRooms($hotel['ResultToken']);
        foreach ($rooms as $room) {
            if ($room['room_code'] == $hotelOrder->room_code) {
                $selected_room = $result;
            }
        }

        $reserve = $hotels->reserveHotelRoom($hotel['ResultToken'], $room['RoomUniqueId']);

        $blockRoomId = $reserve['BlockRoomId'];

        $hotelOrder->block_room_id = $blockRoomId;
        $hotelOrder->result_token = $hotel['ResultToken'];
        $hotelOrder->last_price = ceil(CurrencyManagement::getPrice($reserve['HotelRoomsDetails'][0]['Price']['CurrencyCode'], 'USD', $reserve['HotelRoomsDetails'][0]['Price']['OfferedPriceRoundedOff']));
        $hotelOrder->last_price_currency = 'USD';
        $hotelOrder->save();

        return true;
    }
}
