<?php

namespace App\Nova;

use Illuminate\Database\Eloquent\Relations\BelongsTo as RelationsBelongsTo;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class SoloTrip extends Resource
{
    public static $group = 'Fund My Trip Solo';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\SoloTrip::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            BelongsTo::make('user')->sortable()->readonly(true),
            /*  Text::make('Goal'), */
            Text::make('Amount Raised', function () {
                return '$'.$this->totalAmountRaised();
            }),
            HasMany::make('Donations', 'soloTripDonation', \App\Nova\SoloTripDonation::class),
            Date::make('startdate')->sortable(),
            Date::make('enddate')->sortable(),
            Text::make('title')->hideFromIndex(),
            Text::make('destination')->hideFromIndex(),
            TextArea::make('description')->hideFromIndex(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return

            [
                (new Actions\PauseSoloTrip)->showOnTableRow(),

                (new Actions\ResumeSoloTrip)->showOnTableRow(),

            ];
    }
}
