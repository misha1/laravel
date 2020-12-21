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

        return view('list', ['data' => Plastinky::simplepaginate(8)]);
    }

    public function ShowOne($id){
        $plastinky = new Plastinky();
        return view('onepl', ['data' => $plastinky->find($id)]);
    }
    public function update($id){
        $plastinky = new Plastinky();
        return view('plastinkyUpdate', ['data' => $plastinky->find($id)]);
    }
    public function updateSubmit($id, PlastinkyRequest $req){
        $plastinky = Plastinky::find($id);
        $plastinky->name = $req->input('name');
        $plastinky->genre = $req->input('genre');
        $plastinky->date = $req->input('date');
        $plastinky->desc = $req->input('desc');
        $plastinky->save();
        return redirect()->route('plastinky-one', $id)->with('success', 'Спасибо, все прошло успешно!');
    }
}
