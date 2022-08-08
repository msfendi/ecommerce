<?php

namespace App\Http\Controllers;

use App\Models\TokenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TokenController extends Controller
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
        $generateToken = Str::random(16);
        // tambah data ke database
        DB::table('token')->insert([
            'token_generate' => $generateToken,
            'expired_at' => Carbon::now()->addHour(),
        ]);

        $latestToken = DB::table('token')->latest('token_generate')->first();
        return redirect()->back()->with('alert', $latestToken);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TokenModel  $tokenModel
     * @return \Illuminate\Http\Response
     */
    public function show(TokenModel $tokenModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TokenModel  $tokenModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TokenModel $tokenModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TokenModel  $tokenModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TokenModel $tokenModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TokenModel  $tokenModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TokenModel $tokenModel)
    {
        //
    }
}
