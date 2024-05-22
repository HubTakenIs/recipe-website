<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Recipes;

class RecipesController extends Controller
{
    //
    public function index()
    {
        $recipes = Recipes::all();
        return view('recipes.index', ['recipes' => $recipes]);
    }
    public function create()
    {
        return view('recipes.create');
    }
    public function about()
    {
        return view('recipes.about');
    }
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'recipeName' => 'required',
            'recipeContent' => 'required',
            'imageUrl' => 'nullable'
        ]);
        $newRecipe = Recipes::Create($data);
        return redirect(route('recipes.index'));
    }
}
