<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $dateNow = Carbon::now()->toDateString();
        return view('cms.modules.home.index');
    }
}
