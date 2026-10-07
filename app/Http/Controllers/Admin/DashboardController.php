<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\AdminDummy;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::now('Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM Y');

        return view('admin.dashboard', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'today' => $today,
            'cards' => AdminDummy::cards(),
            'attendance' => AdminDummy::attendance(),
            'activities' => AdminDummy::activities(),
            'quickLinks' => AdminDummy::quickLinks(),
            'schedules' => AdminDummy::todaySchedule(),
        ]);
    }
}
