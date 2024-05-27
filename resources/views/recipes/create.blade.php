

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
	  <h1>Create Recipe</h1>
      <form methon="post" action="{{route('recipes.store')}}" >
      @csrf
      @method('post')
      <div>
                <input type="hidden" name="userId"  value="{{Auth::id()}}" />
            </div>      
      <div>
                <label>Recipe Name</label>
                <input type="text" name="recipeName" placeholder="Recipe Name" />
            </div>
            <div>
                <label>Recipe Content</label>
                <input type="text" name="recipeContent" placeholder="Recipe Content" />
            </div>
            <div>
                <label>Recipe Image URL</label>
                <input type="text" name="imageUrl" placeholder="Recipe Image URL" />
            </div>
            <div>
            <button type="submit" formmethod="post" formaction="/">Create a new Recipe</button>
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
