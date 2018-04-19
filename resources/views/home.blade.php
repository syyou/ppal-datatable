@extends('layouts.master')
@section('title', 'Dashboard')

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
@endsection


@section('content')

<div class="container">
    <div class="row">

        @section('sidebar.left')
            @parent

            <div class="col-sm-4 col-md-3 col-xs-12">

                <div class="sidebar">
                    <div class="mini-submenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </div>
                    <div class="list-group">
                        <span href="#" class="list-group-item active">
                            Class Dashboard
                            <span class="pull-right" id="slide-submenu">
                                <i class="fa fa-timesx"></i>
                            </span>
                        </span>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-comment-o"></i> Notice Board
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-search"></i> Search Topics
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-user"></i> Info
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-folder-open-o"></i> Topic <span class="badge">14</span>
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-bar-chart-o"></i> Status <span class="badge">14</span>
                            </a>
                            <a href="payment/getdata" class="list-group-item">
                                <i class="fa fa-envelope"></i> Email
                            </a>
                    </div>
                </div>
            </div>

        @endsection

    </div>
</div>

@endsection
