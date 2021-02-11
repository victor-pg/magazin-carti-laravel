<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cartProducts = DB::table('cart')->get();
        $message = '';
        $totalPrice = 0;
        if (count($cartProducts) == 0) {
            $message = "Cosul este gol";
            return view('cart')->with("message", $message);
        } else {
            foreach ($cartProducts as $cartItem) $totalPrice += $cartItem->price;
            return view('cart')->with("cartProducts", $cartProducts)->with("totalPrice", $totalPrice);
        }
    }
    public function addToCart(Request $req)
    {
        // $body = $req->all();
        // $candidate = DB::table('cart')->get()->where('id',$body['id']);
        // $item = DB::table('products')->get()->where('id',$body['id']);
        // $id=$body['id'];
        // if(count($candidate)>0){
        //     echo "<script> alert('Deja adaugat in cos'); location.href='http://localhost:8000/#1'</script>";
        // }else{
        //     $item = json_decode($item,true);
        //     $try = 
        //     DB::table('cart')->
        //     insert([
        //         'id'=>$item[$body['id']-1]['id'],
        //         'title'=>$item[$body['id']-1]['title'],
        //         'description'=>$item[$body['id']-1]['description'],
        //         'text'=>$item[$body['id']-1]['text'],
        //         'price'=>$item[$body['id']-1]['price'],
        //         'img'=>$item[$body['id']-1]['img']
        //     ]);
        //     return redirect("/#$id"); 
        // }
        $body = $req->all();
        $id = $body['id'];
        $candidate = DB::table('cart')->where('id', $id)->get();
        $item = DB::table('products')->where('id', $id)->get();

        if (count($candidate) > 0) {
            echo "<script> alert('Deja adaugat in cos'); location.href='http://localhost:8000/#1'</script>";
        } else {
                DB::table('cart')->insert([
                    'id'=>$item[0]->id,
                    'title' => $item[0]->title,
                    'description' => $item[0]->description,
                    'text' => $item[0]->text,
                    'price' => $item[0]->price,
                    'img' => $item[0]->img
                ]);
            return redirect("/#$id");
        }

        return $item[0]->id;
    }

    public function removeFromCart($id)
    {
        $tryToDelete = DB::table('cart')->where('id', $id)->delete();
        if (!$tryToDelete) return "<script>alert('Eroare'); location.href='http://localhost:8000/cart';</script>";
        else return redirect("/cart");
    }
}
