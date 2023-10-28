<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTimeZone;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function createTZlist()
    {
        $timezone_array = DateTimeZone::listAbbreviations();
        $timezone_list = array();
        foreach ($timezone_array as $zone)
            foreach ($zone as $item)
                if (is_string($item['timezone_id']) && $item['timezone_id'] != '')
                    $timezone_list[] = $item['timezone_id'];
        $timezone_list = array_unique($timezone_list);
        asort($timezone_list);
        return array_values($timezone_list);
    }

    public function setTimeZone(Request $request)
    {
        if (in_array($request->timezone, array_values(array_diff($this->createTZlist(), timezone_identifiers_list())))) {
            session(['timezone' => $request->timezone]);
        }
    }
}
