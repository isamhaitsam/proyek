<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class AdminController extends Controller
{
    public function product(){
        return view('admin.product');
    }

    public function uploadproduct(Request $request){

        $data=new product;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->foto=$imagename;

        $data->nama_produk=$request->nama_produk;

        $data->Harga=$request->Harga;

        $data->deskripsi_produk=$request->des;

        $data->jumlah=$request->jumlah;

        $data->save();

        return redirect()->back()->with('message', 'Berhasil Upload Produk');




    }

    public function allproduct(){
        $data=product::all();

        return view('admin.allproduct',compact('data'));
    }

    public function deleteproduct($id){

        $data=product::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Berhasil Menghapus Produk');;

    }

    public function updateproduct($id){

        $data=product::find($id);

        return view('admin.updateproduct',compact('data'));

    }


    public function update(Request $request ,$id){
        $data=product::find($id);

        $image=$request->file;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('productimage',$imagename);
            $data->foto=$imagename;
        }


        $data->nama_produk=$request->nama_produk;

        $data->Harga=$request->Harga;

        $data->deskripsi_produk=$request->des;

        $data->jumlah=$request->jumlah;

        $data->save();

        return redirect()->back()->with('message', 'Berhasil Update Produk');
    }

    public function admin(){
        $user=auth()->user();
        $data=new user;
        $data->nama=$user->name;
        return redirect()->back();
    }
}
