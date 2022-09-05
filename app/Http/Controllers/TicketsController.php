<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index(){
        $tickets = Tickets::select('id','departure','TotalSum','created')->get();
        $arr = array();

        for ($i = 0; $i <= 100; $i++){
            $arr['day'.+$i]['count'] = 0;
            $arr['day'.+$i]['gmv'] = 0;
        }

        foreach ($tickets as $ticket){
            if ($ticket->departure){
                $departure = Carbon::parse($ticket->departure);
                $created = Carbon::parse($ticket->created);
                $dayDiff = $created->diffInDays($departure);
                $arr['day'.+$dayDiff]['count'] += 1;
                $arr['day'.+$dayDiff]['gmv'] += $ticket->TotalSum;
            }
        }
        $keys = array_column($arr, 'count');
        array_multisort($keys, SORT_DESC, $arr);
        $arr = array_filter($arr, function($element) {
            return $element['count'] !== 0;
        });
        return view('component.tickets', compact('arr'));

        //var_dump($tickets);
    }
}
