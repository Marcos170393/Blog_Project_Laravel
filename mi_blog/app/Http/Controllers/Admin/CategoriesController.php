<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catergory;
class CategoriesController extends Controller
{
    //Control de loguo
    public function __contruct(){
        $this->middleware('auth');
    }   
    
    public function index(){

        $list = Catergory::all();
        return view('admin.categories.index')
                ->with("categories",$list);
        
    }

    // ####### Metodo para crear categorias #########
    public function store(Request $request){
           
              $category = new Catergory();
              $category->name = $request->category;
              $category->description = $request->description;
              $category->save();
              return redirect()->back();
    }
}
