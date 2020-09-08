<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class collectionController extends Controller
{
    public function collectionAction(){
        $collection=DB::select('SELECT * FROM collection');
        return view('/collection',['collection'=>$collection]);
    }
}
