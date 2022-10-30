<?php

namespace App\Jobs;

use App\Services\Travelomatix\Hotels;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class scrapCity implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $city_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($city_id)
    {
        $this->city_id = $city_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $hotels = new Hotels();
        $params = [];
        $params['checkinDate'] = '2022-04-01';
        $params['noOfNights'] = '3';
        $params['cityId'] = $this->city_id;
        $params['roomCount'] = 1;
        $params['adultCount'] = 1;
        $params['childCount'] = 0;
        $params['passengers'] = [];

        $params['passengers'][] = ['NoOfAdults' => 1, 'NoOfChild' => 0];

        $results = $hotels->getHotels($params);

        foreach ($results as $result) {
            $scraper = new scrapHotel($result['ResultToken'], $this->city_id);
            dispatch($scraper);
        }
    }
}
