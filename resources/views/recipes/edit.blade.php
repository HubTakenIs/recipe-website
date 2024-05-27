

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
	  <h1>Edit Recipe</h1>
      <form method="post" action="{{route('recipes.update', ['recipe' => $recipe])}}" >
      @csrf
      @method('put')
            <div>
                <label>Recipe Name</label>
                <input type="text" name="recipeName" placeholder="Recipe Name"  value="{{$recipe->recipeName}}"/>
            </div>
            <div>
                <label>Recipe Content</label>
                <input type="text" name="recipeContent" placeholder="Recipe Content"  value="{{$recipe->recipeContent}}" />
            </div>
            <div>
                <label>Recipe Image URL</label>
                <input type="text" name="imageUrl" placeholder="Recipe Image URL" value="{{$recipe->imageUrl}}" />
            </div>

            <button type="submit" formmethod="post" formaction="{{route('recipes.update', ['recipe' => $recipe])}}">Update Recipe</button>
            </div>
           
      </form>
      @if($errors->any())
      
        <ul>
            @foreach($errors->all() as $error )
            <li>{{$error}}</li>
            @endforeach
        </ul>
      
      @endif
  </body>
</html>
