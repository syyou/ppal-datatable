<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use GuzzleHttp\Exception\GuzzleException;
//use GuzzleHttp\Client;

use App\User;
use Yajra\DataTables\Html\Builder;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard. *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /*
     * Datable Ajax
     */
    public function getPosts()
    {
        \Debugbar::info('test11');
        return \DataTables::of(User::all())->make(true);
    }




}
