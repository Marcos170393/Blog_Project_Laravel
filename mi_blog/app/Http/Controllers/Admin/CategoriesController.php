<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //Control de loguo
    public function __contruct(){
        $this->middleware('auth');
    }   
    
    public function index(){
        return view('admin.categories.index');
        
    }

    // ####### Metodo para crear categorias #########
    public function store(Request $request){
            dump($request->all());
            die();
    }
}
