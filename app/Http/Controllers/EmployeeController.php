<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->id) {
            $employees = Employee::with(['working_dates.shifts'])->where('id', $request->id)->get();
        } else {
            $employees = Employee::with(['working_dates.shifts'])->get();
        }

        return response()->json(['success' => true, 'data' => $employees, 'message' => 'Berhasil']);
    }
}
