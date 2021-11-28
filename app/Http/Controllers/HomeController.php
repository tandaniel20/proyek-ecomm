<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Buku_Kategori;
use App\Models\DPromo;
use App\Models\HPromo;
use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function homeAll(){
        // $current_date = Carbon::now()->toDateTimeString();
        // dump($current_date);
        // update
        // $updateDPromo = DB::table('d_promo')->where('id_promo',2)->where('id_buku',1)->update(['tanggal_exp'=>"2021-11-14 20:03:05"]);
        $listBuku = Buku::all();
        $listPromo = [];
        foreach ($listBuku as $b) {
            $promo = DPromo::where('id_buku', $b["id"])->where('tanggal_exp','>=',Carbon::now()->toDateTimeString())->orderBy('harga_promo', 'ASC')->first();
            if ($promo != null) {
                array_push($listPromo, $promo);
            }
        }
        return view('home',[
            'buku' => $listBuku,
            'kategori' => Kategori::all(),
            'dpromo' => $listPromo,
        ]);
    }

    public function homeKategori($id){
        $idBuku = Buku_Kategori::where('id_kategori',$id)->get();
        $listBuku = [];
        foreach ($idBuku as $row) {
            $buku = Buku::where('id',$row["id_buku"])->first();
            array_push($listBuku, $buku);
        }
        $listPromo = [];
        foreach ($listBuku as $b) {
            $promo = DPromo::where('id_buku', $b["id"])->where('tanggal_exp','>=',Carbon::now()->toDateTimeString())->orderBy('harga_promo', 'ASC')->first();
            if ($promo != null) array_push($listPromo, $promo);
        }
        return view('home',[
            'buku' => $listBuku,
            'kategori' => Kategori::all(),
            'dpromo' => $listPromo,
            'filter' => Kategori::where('id',$id)->first()->namakategori,
        ]);
    }

    public function homePromo(){
        $listBuku = Buku::all();
        $listPromo = [];
        foreach ($listBuku as $b) {
            $promo = DPromo::where('id_buku', $b["id"])->where('tanggal_exp','>=',Carbon::now()->toDateTimeString())->orderBy('harga_promo', 'ASC')->first();
            if ($promo != null) array_push($listPromo, $promo);
        }
        $listBuku = [];
        foreach ($listPromo as $p) {
            $buku = Buku::where('id',$p["id_buku"])->first();
            array_push($listBuku, $buku);
        }
        return view('home',[
            'buku' => $listBuku,
            'kategori' => Kategori::all(),
            'dpromo' => $listPromo,
            'filter' => "Promo",
        ]);
    }

    public function homeSearch(Request $request){
        $listBuku = Buku::where('judul', 'like', "%".$request->searchKey."%")->get();
        $listPromo = [];
        foreach ($listBuku as $b) {
            $promo = DPromo::where('id_buku', $b["id"])->where('tanggal_exp','>=',Carbon::now()->toDateTimeString())->orderBy('harga_promo', 'ASC')->first();
            if ($promo != null) array_push($listPromo, $promo);
        }
        return view('home',[
            'buku' => $listBuku,
            'kategori' => Kategori::all(),
            'dpromo' => $listPromo,
            'filter' => '"'.$request->searchKey.'"',
        ]);
    }
}
