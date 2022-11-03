<?php

namespace App\Http\Controllers;

use App\Models\Coment;
use Illuminate\Http\Request;

class ComentController extends Controller
{
    public function index(){
        $coments = Coment::all();
        return view('/event/{id}', compact('coments'));
    }

    public function store(Request $request){
        $coment = new Coment;
        $coment->descricao = $request->descricao;
        $user = auth()->user();
        $coment->user_id = $user->id;
        $coment->event_id = $user->id;
        $coment->save();

        return redirect('/')->with('msg', 'Comentário publicado com sucesso!');
    }
    public function show(){

        return view('events.show');
    }
}
