@extends('layouts.web')


@section('content')
    @include('web.home._welcome')
    @include('web.home._assessments')
    @include('web.home._today')
    @include('web.home._periods')
@endsection
