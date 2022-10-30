<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class FundMyTripPassenger extends Resource
{
    public static $priority = 6;
    public static $group = 'Fund My Trip';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\FundMyTripPassenger::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'FirstName';

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
            BelongsTo::make('User'),
            BelongsTo::make('Trip'),
            Boolean::make('IsLeadPax','IsLeadPax'),
            Text::make('Title' , 'Title'),
            Text::make('FirstName' , 'FirstName'),
            Text::make('LastName' , 'LastName'),
            Text::make('DateOfBirth' , 'DateOfBirth'),
            Text::make('CountryCode' , 'CountryCode'),
            Text::make('ContactNo' , 'ContactNo'),
            Text::make('City' , 'City'),
            Text::make('PinCode' , 'PinCode'),
            Text::make('AddressLine1' , 'AddressLine1'),
            Text::make('Email' , 'Email'),


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
        return [];
    }
}
