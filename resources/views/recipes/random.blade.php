<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random</title>
    <script>
        async function getRandom(){
        url = 'https://www.themealdb.com/api/json/v1/1/random.php';
        const response = await fetch(url);
        const recipe =  await response.json();

        console.log(recipe);
        console.log(recipe.meals[0]);
    }
        </script>
</head>
<body >
    <div class ='random' >
        <button onclick="getRandom()">random recipe</button>
    </div>
</body>
</html>