<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class DashboardController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();

        return view('dashboard')->with('products', $products);
    }

    public function adminAdd()
    {
        return view('adminAdd');
    }

    public function saveProduct(Request $req)
    {
        $body = $req->all();

        $file  = $req->file('book-image');
        $fileName = $file->getClientOriginalName();
        $req->file('book-image')->move(public_path("img/"), $fileName);

        $title = $body['title'];
        $status=false;
        $candidate = DB::table('products')->where('title',$title)->value('title');

        if($candidate) {
            return "<script>alert('Carte cu asa titlu deja este in baza de date')</script>";
        }else{
            DB::table('products')->
            insert([
                'title'=>$body['title'],
                'description'=>$body['description'],
                'text'=>$body['content'],
                'price'=>$body['price'],
                'img'=>$fileName
            ]);
            return redirect("/admin");
        };
    }

    public function adminDelete(Request $req){
        $body = $req->all();
        $id=$body['deleted-id'];

        DB::table('products')->where('id',$id)->delete();

        return redirect("/admin");
    }

    public function adminEdit($id){
        $product = DB::table('products')->get()->where('id',$id);

        return view('adminEdit')->with('product',$product);
    }

    public function adminEditSave(Request $req){
        $body = $req->all();
        $id = $body['id'];
        $file  = $req->file('book-image');
        $fileName = $file->getClientOriginalName();
        $req->file('book-image')->move(public_path("img/"), $fileName);

        DB::table('products')->where('id',$id)->update(
            [
                'title'=>$body['title'],
                'description'=>$body['description'],
                'text'=>$body['content'],
                'price'=>$body['price'],
                'img'=>$fileName
            ]);
        return redirect("/admin");
    }
}
