<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function index()
    {
        $dates = Date::with('shifts', 'employees')->get();

        return response()->json(['success' => true, 'data' => $dates, 'message' => 'Berhasil']);
    }

    public function generateNormal(Request $request)
    {
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = $startDate->copy()->endOfYear();

        $generatedDate = [];
        while ($startDate->lte($endDate)) {
            if (!$startDate->isWeekend()) {
                $generatedDate[] = $startDate->format('Y-m-d');
            }
            $startDate->addDay();
        };

        foreach ($generatedDate as $date) {
            $dates = Date::create([
                'date' => $date,
                'employee_id' => $request->input('employee_id'),
                'shift_id' => $request->input('shift_id')
            ]);
        }

        return response()->json(['success' => true, 'data' => $generatedDate, 'message' => 'Berhasil']);
    }

    public function generateCustom(Request $request)
    {
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = $startDate->copy()->endOfYear();

        $workDay = $request->input('work_day');
        $offDay = $request->input('off_day');

        $generatedDate = [];

        while ($startDate->lte($endDate)) {
            for ($i = 0; $i < $workDay; $i++) {
                $generatedDate[] = $startDate->format('Y-m-d');
                $startDate->addDay();
            }
    
            $startDate->addDays($offDay);
        }

        foreach ($generatedDate as $date) {
            $dates = Date::create([
                'date' => $date,
                'employee_id' => $request->input('employee_id'),
                'shift_id' => $request->input('shift_id')
            ]);
        }

        return response()->json(['success' => true, 'data' => $generatedDate, 'message' => 'Berhasil']);
    }

}
