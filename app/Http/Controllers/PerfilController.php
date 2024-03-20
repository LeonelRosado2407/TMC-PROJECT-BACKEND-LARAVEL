<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\skins;
use App\Models\skinUser;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //primero recupero al usuario logueado
        $user = auth()->user();
        $userData = $user->userDataRelation;
        $skins = skinUser::where('user_id',$user->id)->get();
        dd($skins);


        // dd($userData);
        return view('pages.userData.perfil',[
            'userData' => $userData
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
