<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function sampleform($name=null)
    {
        return 'hi&nbsp;&nbsp;&nbsp;'.$name;
    }
}
