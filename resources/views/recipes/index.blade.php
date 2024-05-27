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
    <x-mynav/>
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