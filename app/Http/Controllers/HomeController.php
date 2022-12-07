<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;

use App\Models\Keranjang;


class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;

        if($usertype=='1'){
            return view('admin.home');
        }else{
            $data=product::paginate(3);
            $user=auth()->user();

            $count=Keranjang::where('phone', $user->No_hp)->count();
            return view('user.home',compact('data','count'));
        }
    }

    public function index(){

        if(Auth::id()){

            return redirect('redirect');
        }else{
            $data=product::paginate(3);

            return view('user.home',compact('data'));

        }
    }

    public function search(Request $request){

        $search=$request->search;

        if($search=='')
        {
            $data=product::paginate(3);

            return view('user.home',compact('data'));
        }

        $data=product::where('nama_produk','like', '%'.$search.'%')->get();

        return view('user.home',compact('data'));
    }

    public function Keranjang(Request $request ,$id){
        if(Auth::id())
        {
            $user=auth()->user();
            $product=product::find($id);
            $Keranjang=new Keranjang;

            

            $Keranjang->name=$user->name;

            $Keranjang->phone=$user->No_hp;

            $Keranjang->alamat=$user->alamat;

            $Keranjang->product_tittle=$product->nama_produk;

            $Keranjang->harga=$product->Harga;

            $Keranjang->jumlah=$request->jumlah;

            $Keranjang->save();

            return redirect()->back()->with('message', 'Berhasil Menambahkan Produk Produk');
        }else{
            return redirect('login');
        }
    }

    public function isikeranjang(){

        $user=auth()->user();
        $cart=Keranjang::where('phone', $user->No_hp)->get();

        $count=Keranjang::where('phone', $user->No_hp)->count();
        return view('user.isikeranjang', compact('count','cart'));
    }
}
