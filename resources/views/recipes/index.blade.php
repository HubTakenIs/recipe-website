<!DOCTYPE html>
<html lang="en">
  <head>
  @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipe-App</title>
    <link rel="stylesheet" href="style.css">
   
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Recipes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/create">Create Recipe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li>
        @if(Auth::check())
        <form style="" method="post" action="{{route('logout')}}">
            @csrf
            @method('post')
                <button type="submit" class="hover:underline me-4 md:me-6">Logout</button>
            </form>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="/random">Random</a>
        </li>
    </div>
  </div>
</nav>
	  <h1>RECIPES Page</h1>
      <div class="container-fluid min-vh-100 w-100 d-flex flex-column justify-content-center align-items-center">

      
      @foreach($recipes as $recipe)
        <div class="card" style="width: 50%;">
            <img src="{{$recipe->imageUrl}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$recipe->recipeName}}</h5>
            <p class="card-text">{{$recipe->recipeContent}}</p>
        </div>
        <div class="card-body">
            <a href="{{route('recipes.edit', ['recipe' => $recipe])}}" class="card-link">Edit Recipe</a>
            <form method="post" action="{{route('recipes.delete', ['recipe'=>$recipe])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete Post"/>
                    </form>
        </div>
      
       
        </div>

       
        
      @endforeach
      </div>
  </body>
</html>