<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorias;
use App\Models\platillos;
use App\Models\eventos;


class cliente extends Controller
{
    //
    public function menucliente(){

        $leerdatos['lista']=Categorias::all();
        $menu['platillos']=Platillos::all();
        return view('burguesia.menu',$leerdatos,$menu);
    }
    
}
