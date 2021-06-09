<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'user_recipe_list_name_id', 'item_id', 'item_name'];


    public function users(){
        return $this->belongsTo(User::class);
    }

    public function userRecipeListName(){
        return $this->belongsTo(UserRecipeListName::class);
    }


}
