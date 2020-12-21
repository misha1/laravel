<?php

namespace App\Http\Controllers;


use App\Http\Requests\PlastinkyRequest;
use App\Models\Plastinky;

class PlastinkyController extends Controller
{
    public function submit(PlastinkyRequest $req){
        $plastinky = new Plastinky();
        $plastinky->name = $req->input('name');
        $plastinky->genre = $req->input('genre');
        $plastinky->date = $req->input('date');
        $plastinky->desc = $req->input('desc');
        $plastinky->save();

        return redirect()->route('plastinky-data')->with('success', 'Спасибо, все прошло успешно!');
    }

    public function allData(){
        return view('list', ['data' => Plastinky::all()]);
    }
    public function ShowOne(){
        return view('list', ['data' => Plastinky::all()]);
    }
}
