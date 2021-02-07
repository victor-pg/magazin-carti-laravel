<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        $cartProducts = DB::table('cart')->get();
        $message='';
        if(count($cartProducts)==0){
            $message="Cosul este gol";
            return view('cart')->with("message",$message);
        }else{
            return view('cart')->with("cartProducts",$cartProducts);
        }

        
    }
    public function addToCart(Request $req){
        $body = $req->all();
        $candidate = DB::table('cart')->get()->where('id',$body['id']);
        $item = DB::table('products')->get()->where('id',$body['id']);
        $id=$body['id'];
        if(count($candidate)>0){
            echo "<script> alert('Deja adaugat in cos');</script>";
            return redirect("/#$id"); 
        }else{
            $item = json_decode($item,true);
            $try = 
            DB::table('cart')->
            insert([
                'id'=>$item[$body['id']-1]['id'],
                'title'=>$item[$body['id']-1]['title'],
                'description'=>$item[$body['id']-1]['description'],
                'text'=>$item[$body['id']-1]['text'],
                'price'=>$item[$body['id']-1]['price'],
                'img'=>$item[$body['id']-1]['img']
            ]);
            return redirect("/#$id"); 
        }
    }

    public function getDetails($id){
        $item = DB::table('cart')->get()->where('id',$id);

        return view('cartDetails')->with('item',$item);
    }
}
