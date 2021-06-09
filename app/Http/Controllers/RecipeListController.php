<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecipeList;

class RecipeListController extends Controller
{



    public function __construct() {
        $this->middleware('auth:api');
    }
   
   


    public function index($ListId) 
    {
        $userId = auth()->user();
        return RecipeList::where('user_id',$userId['id'])->where('user_recipe_list_name_id',$ListId)->get();  
        
    }

    public function show($id) 
    {
        return RecipeList::findOrFail($id);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'user_recipe_list_name_id' => 'required',
            'item_id' => 'required',
            'item_name' => 'required',
                    
        ]);

        $recipeExists = RecipeList::where('user_recipe_list_name_id', '=', $request->input('user_recipe_list_name_id'))->where('item_id', '=', $request->input('item_id'))->first();
if ($recipeExists === null) {
   // Member Not Found Your Kohali Stuffs Goes Here..
   return RecipeList::create($request->all());
}
        
    }

    public function destroy($ItemId, $ListId) 
    {
        $userId = auth()->user();
        return RecipeList::where('item_id', $ItemId)->where('user_recipe_list_name_id', $ListId)->where('user_id', $userId['id'])->delete();
    }
}
