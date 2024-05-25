<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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
    
    public function dashboard()
    {
   
        $recipes = Recipes::where('userId', Auth::id())->get();

        return view('dashboard', ['recipes' => $recipes]);
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
            'userId' =>'required',
            'recipeName' => 'required',
            'recipeContent' => 'required',
            'imageUrl' => 'nullable'
        ]);
        $newRecipe = Recipes::Create($data);
        return redirect(route('recipes.index'));
    }
    public function edit(Recipes $recipe )
    {
        return view('recipes.edit', ['recipe' => $recipe]);
    }

    public function update(Recipes $recipe, Request $request)
    {
        $data = $request->validate([
            'userId' => 'required',
            'recipeName' => 'required',
            'recipeContent' => 'required',
            'imageUrl' => 'nullable'
        ]);
        $recipe->update($data);
        return redirect(route('recipes.index'));
    }

    public function delete(Recipes $recipe){
        $recipe -> delete();
        return redirect(route("recipes.index"));
    }

    public function random(){
        return view('recipes.random');
    }
}
