<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function index()
    {
        return view('cms.modules.imports.index');
    }

    public function create()
    {
        return view('cms.modules.imports.import_bill');
    }
}
