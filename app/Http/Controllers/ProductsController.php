<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(){
        $products = DB::table('products')->get();
        return view('index')->with('products',$products);
    }

    public function showDetails(Request $req){
        $id = $req->route('id');
        $item = DB::table('products')->where("id",$id)->get();
        return view('details')->with('item',$item);
    }
}
