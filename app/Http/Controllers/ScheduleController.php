<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Redirect,Response;

class ScheduleController extends Controller
{

    public function index()
    {
        if(request()->ajax())
        {

         $start = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
         $end = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');

         $data = Schedule::whereDate('start_date', '>=', $start)->whereDate('end_date',   '<=', $end)->get(['id','start_date', 'end_date']);
         return Response::json($data);
        }
        return view('schedule');
    }


    public function create(Request $request)
    {
        $insertArr = [ 'link' => $request->link,
                       'start_date' => $request->start_date,
                       'end_date' => $request->end_date
                    ];
        $event = Schedule::insert($insertArr);
        return Response::json($event);
    }


    public function update(Request $request)
    {
        $where = array('id' => $request->id);
        $updateArr = ['link' => $request->link,'start_date' => $request->start_date, 'end_date' => $request->end_date];
        $event  = Schedule::where($where)->update($updateArr);

        return Response::json($event);
    }


    public function destroy(Request $request)
    {
        $event = Schedule::where('id',$request->id)->delete();

        return Response::json($event);
    }


}
