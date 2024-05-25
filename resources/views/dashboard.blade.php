<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body>
    <h1>Your Recipes</h1>
    @foreach ($recipes as $recipe )
    <li>{{$recipe}}</li>
    @endforeach
</body>
</html>