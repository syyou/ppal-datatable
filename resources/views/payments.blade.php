@extends('layouts.master')
@section('title', 'Payments')

@section('nav.barr')
    @parent
    @include('layouts.navbar')
@endsection

@section('massage')
    @parent
    @include('layouts.alerts')
@endsection

@section('about')
    @parent
    <h1 class="text-center" style="color:black; font-family: 'Arvo', Georgia, Times, serif;	font-size: 45px; font-weight: 600; line-height: 100px;">IT Link USA</h1>
@endsection

@section('content')

    @parent
    @if (isset($vsuccess) and ($vsuccess = 'success'))
        @include('payments.paypal.checkoutsuccess')
    @else
        @include('payments.paypal.expresscheckout')
        @include('consent.termsconditionpayment')
    @endif

    <br/>
    <br/>
@endsection

