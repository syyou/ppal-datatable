@extends('layouts.master')
@section('title', 'contact')

@section('nav.barr')
    @parent
    @include('layouts.navbar')
@endsection

@section('about')
    @parent
@endsection


@section('content')
    @parent

    <div class="jumbotron jumbotron-sm" style="background-color: deepskyblue;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <h3 class="h2">
                        Contact ME <small>hunt4dear@gmail.com</small></h3>
                </div>
            </div>
        </div>
    </div>

@endsection

