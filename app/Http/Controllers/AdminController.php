<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;

use App\Models\order;

class AdminController extends Controller
{
    public function product()
    {
        if (Auth::id())
        {    
            if(Auth::user()->usertype=='1')
            {
                return view('admin.product');
            }
            else 
            {
                return redirect()->back();
            }
           
        }
        else
        {
            return redirect('login');
        }

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

    public function showorder()
    {
        $order=order::all();

        return view('admin.showorder',compact('order'));
    }

    public function updatestatus($id)
    {
        $order=order::find($id);

        $order->status='terkirim';

        $order->save;

        return redirect()->back();
    }

    public function admin(){
        $user=auth()->user();
        $data=new $user;
        $data->nama=$user->name;
        return redirect()->back();
    }
}
