@extends('layouts.master')
@section('title', 'services')

@section('nav.barr')
    @parent
    @include('layouts.navbar')
@endsection

@section('about')
    @parent

    <h1 class="text-center" style="color:black; font-family: 'Arvo', Georgia, Times, serif;	font-size: 45px; font-weight: 600; line-height: 100px;">IT SYYOU</h1>
@endsection


@section('content')
    @parent
    <div class="jumbotron jumbotron-sm" style="background-color: deepskyblue;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <h3 class="h2">
                        Your Future <small> IT professional .. </small>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron" style="opacity: 0.6;">
        <div class="container text-center">
            <p>
                Welcome
            </p>

        </div>
    </div>
@endsection

