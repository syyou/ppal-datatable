@extends('layouts.master')
@section('title', 'Welcome')

    @section('nav.affix')
        @parent
        <!-- @ include('layouts.navbar') -- return View::make('layouts.navbar', array('id' => $id)) -->
        @include('layouts.affix')
    @endsection

    @section('nav.barr')
        @parent
        <!-- @ include('layouts.navbar') -- return View::make('layouts.navbar', array('id' => $id)) -->
        @include('layouts.navbar')
    @endsection

    @section('massage')
        @parent
        @include('layouts.alerts')
    @endsection

    @section('about')
        @parent
        <h2 style="color:red;"></h2>
        <!-- script>  $(function(){   alert();   }); </script -->
    @endsection

    @section('content')
        @parent

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner itlinkCarouselImg" role="listbox">

                <div class="item active">
                    <img class="img-responsive" src= "{{ asset('images/#.png') }}" style="padding: 5px; opacity: 0.3;" alt="Image1">
                    <div class="carousel-caption" style="color: navy;">
                        <h1><strong>Our Mission and Vision</strong></h1>
                        <h3>IT Link USA</h3>
                    </div>
                </div>
                <div class="item">
                    <img class="img-responsive" src="{{ asset('images/#.png') }}" style="padding: 5px; opacity: 0.3;" alt="Image1">
                    <div class="carousel-caption" style="color:orangered;">
                        <h1><strong>Career Search and Goals</strong></h1>
                        <h3>Skill Build up</h3>
                    </div>
                </div>
                <div class="item">
                    <img class="img-responsive" src="{{ asset('images/#.png') }}" style="padding: 5px; opacity: 0.3;" alt="Image3">
                    <div class="carousel-caption" style="color:lawngreen;">
                        <h1><strong>Business Model Design</strong></h1>
                        <h3>Web Development</h3>
                    </div>
                </div>
                <div class="item">
                    <img class="img-responsive" src="{{ asset('images/#.png') }}" style="padding: 5px; opacity: 0.3;" alt="Image3">
                    <div class="carousel-caption" style="color:darkgreen;">
                        <h1><strong>Training and Consulting</strong></h1>
                        <h3>IT Training and Job Placement</h3>
                    </div>
                </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <h1 class="text-center" style="color:black; font-family: 'Arvo', Georgia, Times, serif;	font-size: 45px; font-weight: 600; line-height: 100px;">IT Link USA</h1>
        <br />

        <div class="container text-center">
            <div class="row" style="height: 300px;">

                <div class="col-sm-4">
                    <div class="img-responsive" style="display:block; height: 280px; width: 355px;">
                        {!! Mapper::render() !!}
                    </div>
                </div>

                <div class="col-sm-4">
                    <br/>

                    <div>Follow us on Facebook:</div>
                    <a href="https://www.facebook.com/#/" class="btn btn-info btn-lg btn-block" role="button" target="_new">
                        <i class="fa fa-facebook"></i> Facebook
                    </a>

                    <br/>
                    <div>Email us at IT Link USA:</div>
                    <a href="mailto:itlinkusa@gmail.com?Subject=New Contuct Information" class="btn btn-info btn-lg btn-block" role="button">
                        <i class="fa fa-envelope"></i> E-Mail
                    </a>
                    <br/>
                    <div>Your Review and Comments:</div>
                    <button type="button" class="btn btn-info btn-lg btn-block">
                        <i class="fa fa-comment"></i> Comments
                    </button>
                </div>

                <div class="col-sm-4">
                    <img src="{{ asset('images/#.png') }}" class="img-responsive" style="display:block; height: 270px; width: 355px;" alt="Image">
                </div>
            </div>
        </div>
    @endsection