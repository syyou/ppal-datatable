<?php

namespace App\Http\Controllers;

use App\Init;
use Illuminate\Http\Request;

use Mapper;
use Cornford\Googlmapper\Facades\MapperFacade;
use Illuminate\Support\Facades\Route;

class InitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function initIndex()
    {
        Mapper::map(
            40.743161,
            -73.893224,
            [
                'zoom' => 15,
                'markers' => ['title' => 'My Location', 'animation' => 'DROP'],
                'clusters' => ['size' => 10, 'center' => true, 'zoom' => 10]
            ]
        );

        $data['warning']='Test Dev_101';
        return \View::make('init')->with($data);

    }

    /**
     * Show the form for creating a new resource.*
     * @aboutOusrself
     */
    public function ourAbout()
    {
        //
        return view( 'about' );
    }

    /**
     * Show the form for creating a new resource.*
     * @aboutOusrself
     */
    public function ourServices ()
    {
        return view( 'services' );
    }

    /**
     * Show the form for creating a new resource.*
     * @aboutOusrself
     */
    public function ourContact()
    {
        Mapper::map(
            44.743161,
            -79.893224,
            [
                'zoom' => 15,
                'markers' => ['title' => 'My Location', 'animation' => 'DROP'],
                'clusters' => ['size' => 10, 'center' => true, 'zoom' => 10]
            ]
        );

        return view( 'contact' );
    }


    public function destroy(Init $init)
    {
        //
    }
}
