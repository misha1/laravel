<?php

namespace App\Http\Controllers;

use App\Models\Vinylrecords;
use Illuminate\Http\Request;
use App\Http\Requests\VinylrecordsRequest;

class VinylrecordsController extends Controller
{
    public function submit(VinylrecordsRequest $req){
        $rec = new Vinylrecords();
        $rec->name = $req->input('name');
        $rec->genre = $req->input('genre');
        $rec->date = $req->input('date');
        $rec->desc = $req->input('desc');
        $rec->save();

        return redirect()->route('vinylrecords-data')->with('success', 'Спасибо, все прошло успешно!');
    }

    public function allData(){

        return view('list', ['data' => Vinylrecords::simplepaginate(8)]);
    }

    public function ShowOne($id){
        $rec = new Vinylrecords();
        if ($rec->find($id) === null) {
            abort(404);
        }
        else
            return view('onepl', ['data' => $rec->find($id)]);
    }
    public function update($id){
        $rec = new Vinylrecords();
        if ($rec->find($id) === null) {
            abort(404);
        }
        else
            return view('vinylrecordsUpdate', ['data' => $rec->find($id)]);
    }
    public function updateSubmit($id, Vinylrecords $req){
        $rec = Vinylrecords::find($id);
        $rec->name = $req->input('name');
        $rec->genre = $req->input('genre');
        $rec->date = $req->input('date');
        $rec->desc = $req->input('desc');
        $rec->save();
        return redirect()->route('vinylrecords-one', $id)->with('success', 'Спасибо, все прошло успешно!');
    }
    public function delete($id){
        Vinylrecords::find($id)->delete();
        return redirect()->route('vinylrecords-data')->with('success', 'Спасибо, все прошло успешно!');

    }
}
