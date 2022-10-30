@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', 'Page Not Found!')


{{-- __($exception->getMessage() ?: 'Oops! Page Not Found!') --}}