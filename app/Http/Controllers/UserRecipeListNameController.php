<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRecipeListName;

class UserRecipeListNameController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
   
   


    public function index() 
    {
        $userId = auth()->user();
        return UserRecipeListName::where('user_id',$userId['id'])->get();

       
    }

    public function show($id) 
    {
        return UserRecipeListName::findOrFail($id);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
                    
        ]);
        return UserRecipeListName::create($request->all());
    }

    public function destroy($id) 
    {
        return UserRecipeListName::destroy($id);
    }
}
