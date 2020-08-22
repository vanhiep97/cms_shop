<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Milon\Barcode\DNS1D;

class BarcodeController extends Controller
{
    public function barcode()
    {
        $d = new DNS1D();
        $d->setStorPath(__DIR__.'/cache/');
        echo $d->getBarcodeHTML('9119441918847', 'EAN13');
    }
}
