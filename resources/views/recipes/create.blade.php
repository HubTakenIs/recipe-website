

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
  
    </div>
  </div>
</nav>
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
