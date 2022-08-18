<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TripController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getTrips(Request $request)
    {
        $trips = Trip::whereDate('date', Carbon::parse($request->input('date')))->get();
        return $request->ajax() ? view('component.trips', compact('trips'))->render() : response()->json(['error' => 'Ошибка']);
    }
}
