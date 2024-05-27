<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipe-App</title>
    <link rel="stylesheet" href="style.css">
    <script>
        async function getRandom(){
        url = 'https://www.themealdb.com/api/json/v1/1/random.php';
        const response = await fetch(url);
        const recipe =  await response.json();
        //console.log(recipe);
        //console.log(recipe.meals[0]);
        let name = recipe.meals[0].strMeal
        let image =recipe.meals[0].strMealThumb
        let instructions =recipe.meals[0].strInstructions
        document.getElementById('recipe-name').innerHTML = name
        document.getElementById('thumb-nail').setAttribute('src',image)
        let ul = document.createElement('ul')
        for (let i = 1; i < 21; i++){
            //ingredients
            let ingredient = 'strIngredient' + i
            let di = Object.getOwnPropertyDescriptor(recipe.meals[0],ingredient)
            // meassure
            let measure = "strMeasure" + i
            let dm = Object.getOwnPropertyDescriptor(recipe.meals[0], measure)
            if ((di.value)){
                console.log(`ingredient ${i}: ${di.value} : meassure ${dm.value}`)
                let li =document.createElement('li')
                li.innerText = `${dm.value} ${di.value} `
                ul.appendChild(li) } }
        const div = document.getElementById('ingredients')
        div.appendChild(ul)
        document.getElementById('instructions').innerText = instructions }
        </script>
</head>
<body >
    <x-mynav/>
    <div class ='random' >
        <p>Don't know what you want?</p>
        <button onclick="getRandom()">Get Random Recipe</button>
    </div>
    <h1 id="recipe-name"></h1>
    <img id='thumb-nail'>
    <div id="ingredients"></div>
    <p id ="instructions">
    
</body>
</html>