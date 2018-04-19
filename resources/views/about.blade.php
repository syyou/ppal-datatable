@extends('layouts.master')
@section('title', 'about')

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
                        My Goal <small> SMILE  </small>
                    </h3>
                </div>
            </div>
        </div>
    </div>

   <div class="jumbotron" style="opacity: 0.6;">
        <div class="container text-center">
            <h2> my app </h2>
        </div>
    </div>

@endsection