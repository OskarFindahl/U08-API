<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecipeList;

class RecipeListController extends Controller
{



    public function __construct() {
        $this->middleware('auth:api');
    }
   
   


    public function index() 
    {
        return RecipeList::all();
    }

    public function show($id) 
    {
        return RecipeList::findOrFail($id);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'item_id' => 'required',
                    
        ]);
        return RecipeList::create($request->all());
    }

    public function destroy($id) 
    {
        return RecipeList::destroy($id);
    }
}
