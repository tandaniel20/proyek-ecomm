<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Buku_Kategori;
use App\Models\DPromo;
use App\Models\Kategori;
use App\Models\Rating;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'judul' => 'required|unique:buku,judul',
            'harga' => 'required',
            'stock' => 'required',
            'penulis' => 'required',
            'berat' => 'required | numeric',
            'tahun' => 'required | numeric | digits:4',
            'bahasa' => 'required',
            'berat' => 'required | numeric',
            'dimensi1' => 'required | numeric',
            'dimensi2' => 'required | numeric',
            'cover' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('imageBuku')){
            $buku = new Buku;
            $buku->judul = $request->judul;
            $buku->harga = $request->harga;
            $buku->stock = $request->stock;
            $buku->penulis = $request->penulis;
            $buku->penerbit = $request->penerbit;
            $buku->tahun = $request->tahun;
            $buku->bahasa = $request->bahasa;
            $buku->berat = $request->berat;
            $buku->dimensi = $request->dimensi1.' x '.$request->dimensi2;
            $buku->cover = $request->cover;
            $buku->deskripsi = $request->deskripsi;
            $buku->save();

            Storage::putFileAs('/public/imageBuku', $request->file('imageBuku'), $buku->id.".png");
        }else{
            return redirect()->back()->withErrors(['msg' => 'Image buku belum dipilih!']);
        }
        return redirect('admin/buku');
    }

    public function cekUpdate(Request $request, $id){
        $validatedData = $request->validate([
            'judul' => 'required|unique:buku,judul,'.$id,
            'harga' => 'required',
            'stock' => 'required',
            'penulis' => 'required',
            'berat' => 'required | numeric',
            'tahun' => 'required | numeric | digits:4',
            'bahasa' => 'required',
            'berat' => 'required | numeric',
            'dimensi1' => 'required | numeric',
            'dimensi2' => 'required | numeric',
            'cover' => 'required',
            'deskripsi' => 'required',
        ]);
        $buku = Buku::where('id',$id)->first();
        $buku->judul = $request->judul;
        $buku->harga = $request->harga;
        $buku->stock = $request->stock;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun = $request->tahun;
        $buku->bahasa = $request->bahasa;
        $buku->berat = $request->berat;
        $buku->dimensi = $request->dimensi1.' x '.$request->dimensi2;
        $buku->cover = $request->cover;
        $buku->deskripsi = $request->deskripsi;
        $buku->save();
        return redirect('admin/buku');
    }

    public function delete($id){
        $buku = Buku::find($id);
        // dd($kategori);
        $buku->delete();
        $bukuKategori = Buku_Kategori::where('id_buku',$id)->delete();
        return redirect('admin/buku');
    }

    public function detailBuku($id){
        $buku = Buku::where('id',$id)->first();

        $rates = Rating::where('id_buku', $id)->get();
        $jumlahRating = 0;
        foreach ($rates as $r) {
            $jumlahRating += $r->rate;
        }
        if (count($rates) != 0) $current = $jumlahRating / count($rates);
        else $current = 0;

        if (Auth::check()){
            if (count(Wishlist::where('id_user',Auth::user()->id)->where('id_buku',$id)->get()) > 0){
                if (count(DPromo::where('id_buku',$id)->get()) > 0){
                    return view('buku',[
                        'buku' => $buku,
                        'kategori' => Kategori::all(),
                        'wishlist' => 'true',
                        'dpromo' => DPromo::where('id_buku',$id)->orderBy('harga_promo','ASC')->first(),
                        'currentRate' => $current,
                        'responseUsers' => Rating::where('id_buku', $id)->get(),
                    ]);
                }
                return view('buku',[
                    'buku' => $buku,
                    'kategori' => Kategori::all(),
                    'wishlist' => 'true',
                    'currentRate' => $current,
                    'responseUsers' => Rating::where('id_buku', $id)->get(),
                ]);
            }
        }
        if (count(DPromo::where('id_buku',$id)->get()) > 0){
            return view('buku',[
                'buku' => $buku,
                'kategori' => Kategori::all(),
                'dpromo' => DPromo::where('id_buku',$id)->orderBy('harga_promo','ASC')->first(),
                'currentRate' => $current,
                'responseUsers' => Rating::where('id_buku', $id)->get(),
            ]);
        }
        return view('buku',[
            'buku' => $buku,
            'kategori' => Kategori::all(),
            'currentRate' => $current,
            'responseUsers' => Rating::where('id_buku', $id)->get(),
        ]);
    }

    public function wishBuku($id){
        $wishlist = new Wishlist;
        $wishlist->id_buku = $id;
        $wishlist->id_user = Auth::user()->id;
        $wishlist->save();
        return redirect('buku/'.$id.'/detail');
    }

    public function removeWishBuku($id){
        $deleteWishlist = Wishlist::where('id_user',Auth::user()->id)->where('id_buku',$id)->delete();
        return redirect('buku/'.$id.'/detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(buku $buku)
    {
        //
    }
}
