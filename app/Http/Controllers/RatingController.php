<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{

    public function ratePage($id){
        $rates = Rating::where('id_buku', $id)->get();
        $jumlahRating = 0;
        foreach ($rates as $r) {
            $jumlahRating += $r->rate;
        }
        if (count($rates) != 0) $current = $jumlahRating / count($rates);
        else $current = 0;
        return view('user.ratePage',[
            'kategori' => Kategori::all(),
            'buku' => Buku::where('id',$id)->first(),
            'currentRate' => $current,
        ]);
    }

    public function rateSubmit(Request $req, $id){
        $deleteRates = Rating::where('id_user', Auth::user()->id)->where('id_buku',$id)->delete();
        $newRate = new Rating;
        $newRate->id_user = Auth::user()->id;
        $newRate->id_buku = $id;
        $newRate->rate = $req->rate;
        $newRate->response = $req->responseUser;
        $newRate->save();
        return redirect('buku/'.$id.'/detail');
    }

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
