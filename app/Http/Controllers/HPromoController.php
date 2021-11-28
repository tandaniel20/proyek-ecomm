<?php

namespace App\Http\Controllers;

use App\Models\DPromo;
use App\Models\HPromo;
use App\Rules\promoHargaKelebihan;
use App\Rules\promoHargaKosong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HPromoController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function deletePromo(Request $request, $id){
        $deletedRows = DPromo::where('id_promo',$id)->delete();
        $deletedRows = HPromo::where('id',$id)->delete();

        return redirect('admin/promo');
        return view('admin.promo',[
            'title' => "Promo",
            'promo' => HPromo::all(),
            'current' => HPromo::first(),
        ]);
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
        // dd($request);
        $validatedData = $request->validate([
            'judul' => 'required|unique:h_promo,judul',
            'jangkawaktu' => 'required|numeric|min:1',
            'harga1' => [new promoHargaKosong($request->buku1), new promoHargaKelebihan($request->buku1)],
            'harga2' => [new promoHargaKosong($request->buku2), new promoHargaKelebihan($request->buku2)],
            'harga3' => [new promoHargaKosong($request->buku3), new promoHargaKelebihan($request->buku3)],
            'harga4' => [new promoHargaKosong($request->buku4), new promoHargaKelebihan($request->buku4)],
            'harga5' => [new promoHargaKosong($request->buku5), new promoHargaKelebihan($request->buku5)],
        ]);

        $addPromo = new HPromo;
        $addPromo->judul = $request->judul;
        // $addPromo->jangkawaktu = $request->jangkawaktu;
        $addPromo->save();

        $hPromo = HPromo::where('judul',$request->judul)->first();
        $hPromo->tanggal_exp = $hPromo->updated_at->addDays($request->jangkawaktu);
        $hPromo->save();
        $hPromo = HPromo::where('judul',$request->judul)->first();

        if ($request->buku1 != "null"){
            $addDPromo = new DPromo;
            $addDPromo->id_promo = $addPromo->id;
            $addDPromo->id_buku = $request->buku1;
            $addDPromo->harga_promo = $request->harga1;
            $addDPromo->tanggal_exp = $hPromo->tanggal_exp;
            $addDPromo->save();
        }
        if ($request->buku2 != "null"){
            $addDPromo = new DPromo;
            $addDPromo->id_promo = $addPromo->id;
            $addDPromo->id_buku = $request->buku2;
            $addDPromo->harga_promo = $request->harga2;
            $addDPromo->tanggal_exp = $hPromo->tanggal_exp;
            $addDPromo->save();
        }
        if ($request->buku3 != "null"){
            $addDPromo = new DPromo;
            $addDPromo->id_promo = $addPromo->id;
            $addDPromo->id_buku = $request->buku3;
            $addDPromo->harga_promo = $request->harga3;
            $addDPromo->tanggal_exp = $hPromo->tanggal_exp;
            $addDPromo->save();
        }
        if ($request->buku4 != "null"){
            $addDPromo = new DPromo;
            $addDPromo->id_promo = $addPromo->id;
            $addDPromo->id_buku = $request->buku4;
            $addDPromo->harga_promo = $request->harga4;
            $addDPromo->tanggal_exp = $hPromo->tanggal_exp;
            $addDPromo->save();
        }
        if ($request->buku5 != "null"){
            $addDPromo = new DPromo;
            $addDPromo->id_promo = $addPromo->id;
            $addDPromo->id_buku = $request->buku5;
            $addDPromo->harga_promo = $request->harga5;
            $addDPromo->tanggal_exp = $hPromo->tanggal_exp;
            $addDPromo->save();
        }

        return redirect('admin/promo');
        return view('admin.promo',[
            'title' => "Promo",
            'promo' => HPromo::all(),
            'current' => HPromo::first(),
        ]);
    }

    public function cekUpdate(Request $request, $id){
        $validatedData = $request->validate([
            'judul' => 'required|unique:h_promo,judul,'.$id,
            'jangkawaktu' => 'required|numeric|min:1',
            'harga1' => [new promoHargaKosong($request->buku1), new promoHargaKelebihan($request->buku1)],
            'harga2' => [new promoHargaKosong($request->buku2), new promoHargaKelebihan($request->buku2)],
            'harga3' => [new promoHargaKosong($request->buku3), new promoHargaKelebihan($request->buku3)],
            'harga4' => [new promoHargaKosong($request->buku4), new promoHargaKelebihan($request->buku4)],
            'harga5' => [new promoHargaKosong($request->buku5), new promoHargaKelebihan($request->buku5)],
        ]);

        $hPromo = HPromo::where('id',$id)->first();
        $hPromo->judul = $request->judul;
        $hPromo->save();

        $hPromo = HPromo::where('judul',$request->judul)->first();
        $hPromo->tanggal_exp = $hPromo->updated_at->addDays($request->jangkawaktu);
        $hPromo->save();
        $hPromo = HPromo::where('judul',$request->judul)->first();

        if ($request->buku1 != "null"){
            $updateDPromo = DB::table('d_promo')->where('id_promo',$hPromo->id)->where('id_buku',$request->buku1)->update(
                [
                    'harga_promo' => $request->harga1,
                    'tanggal_exp' => $hPromo->tanggal_exp,
                ]
            );
        }
        if ($request->buku2 != "null"){
            $updateDPromo = DB::table('d_promo')->where('id_promo',$hPromo->id)->where('id_buku',$request->buku2)->update(
                [
                    'harga_promo' => $request->harga2,
                    'tanggal_exp' => $hPromo->tanggal_exp,
                ]
            );
        }
        if ($request->buku3 != "null"){
            $updateDPromo = DB::table('d_promo')->where('id_promo',$hPromo->id)->where('id_buku',$request->buku3)->update(
                [
                    'harga_promo' => $request->harga3,
                    'tanggal_exp' => $hPromo->tanggal_exp,
                ]
            );
        }
        if ($request->buku4 != "null"){
            $updateDPromo = DB::table('d_promo')->where('id_promo',$hPromo->id)->where('id_buku',$request->buku4)->update(
                [
                    'harga_promo' => $request->harga4,
                    'tanggal_exp' => $hPromo->tanggal_exp,
                ]
            );
        }
        if ($request->buku5 != "null"){
            $updateDPromo = DB::table('d_promo')->where('id_promo',$hPromo->id)->where('id_buku',$request->buku5)->update(
                [
                    'harga_promo' => $request->harga5,
                    'tanggal_exp' => $hPromo->tanggal_exp,
                ]
            );
        }

        return redirect('admin/promo');
        return view('admin.promo',[
            'title' => "Promo",
            'promo' => HPromo::all(),
            'current' => HPromo::first(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HPromo  $hPromo
     * @return \Illuminate\Http\Response
     */
    public function show(HPromo $hPromo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HPromo  $hPromo
     * @return \Illuminate\Http\Response
     */
    public function edit(HPromo $hPromo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HPromo  $hPromo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HPromo $hPromo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HPromo  $hPromo
     * @return \Illuminate\Http\Response
     */
    public function destroy(HPromo $hPromo)
    {
        //
    }
}
