<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DPromo;
use App\Models\Kategori;
use App\Models\Keranjang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function addToCart(Request $req, $id){
        $currentBuku = Buku::where('id',$id)->first();
        if ($req->jumlahBarang == 0){
            return redirect()->back()->withErrors(['msg' => 'Total barang tidak boleh 0!']);
        }
        else if ($currentBuku->stock < $req->jumlahBarang){
            return redirect()->back()->withErrors(['msg' => 'Stock Buku tidak mencukupi!']);
        }else{
            $cekKeranjang = Keranjang::where('id_user',Auth::user()->id)->where('id_buku',$id)->get();
            if (count($cekKeranjang)>0){
                $keranjang = Keranjang::where('id_user',Auth::user()->id)->where('id_buku',$id)->first();
                $keranjang->qty = $keranjang->qty + $req->jumlahBarang;
                $keranjang->save();
            }else{
                $newData = new Keranjang;
                $newData->id_user = Auth::user()->id;
                $newData->id_buku = $id;
                $newData->qty = $req->jumlahBarang;
                $newData->save();
            }
            return redirect()->back()->withErrors(['msg' => 'Tertambah ke Keranjang']);
        }
    }

    public function detailKeranjang(){
        $listPromo = [];
        foreach (Buku::all() as $b) {
            $promo = DPromo::where('id_buku', $b["id"])->where('tanggal_exp','>=',Carbon::now()->toDateTimeString())->orderBy('harga_promo', 'ASC')->first();
            if ($promo != null) {
                array_push($listPromo, $promo);
            }
        }
        return view('user.keranjang',[
            'kategori' => Kategori::all(),
            'keranjang' => Keranjang::where('id_user',Auth::user()->id)->get(),
            'dpromo' => $listPromo,
        ]);
    }

    public function removeKeranjang($id){
        $deleteData = Keranjang::where('id',$id)->delete();
        return redirect()->back();
    }

    public function tambahItem($id){
        $itemKeranjang = Keranjang::where('id',$id)->first();
        $buku = Buku::where('id',$itemKeranjang->id_buku)->first();
        if ($buku->stock < $itemKeranjang->qty + 1){
            return redirect()->back()->withErrors(['msg' => 'Quantity buku melebihi stock!']);
        }else{
            $itemKeranjang->qty = $itemKeranjang->qty+1;
            $itemKeranjang->save();
            return redirect('cart');
        }
    }

    public function kurangItem($id){
        $itemKeranjang = Keranjang::where('id',$id)->first();
        if ($itemKeranjang->qty == 1){
            $deleteItemKeranjang = Keranjang::where('id',$id)->delete();
        }else{
            $itemKeranjang->qty = $itemKeranjang->qty - 1;
            $itemKeranjang->save();
        }
        return redirect('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keranjang $keranjang)
    {
        //
    }
}
