<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function productAction($id){
        $product=DB::select('SELECT * FROM collection WHERE id=:id',['id'=>$id]);

        return view('product',['product'=>$product]);
    }
}
