<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de recettes</title>
    <style>
        /* Style pour le champ de recherche */
        #recherche {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style pour le conteneur des résultats */
        #results {
            margin-top: 20px;
        }

        /* Style pour chaque résultat de recette */
        .recipe {
            margin-bottom: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
            overflow: hidden;
        }

        .recipe a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease;
        }

        .recipe a:hover {
            background-color: #e0e0e0;
        }
    </style>
    <script>
        function searchRecipes() {
            const searchInput = document.getElementById("recherche").value.trim().toLowerCase();
            const resultsDiv = document.getElementById("results");

            // Vérifier si le champ de recherche est vide
            if (searchInput === "") {
                // Effacer les résultats affichés s'il n'y a pas de recherche
                resultsDiv.innerHTML = "";
                return; // Sortir de la fonction si le champ est vide
            }

            // Requête AJAX pour récupérer les résultats de la recherche
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    const results = JSON.parse(this.responseText);
                    resultsDiv.innerHTML = ""; // Effacer les résultats précédents
                    results.forEach(recipe => {
                        const recipeDiv = document.createElement("div");
                        recipeDiv.classList.add("recipe");

                        // Créer un lien autour du nom de la recette
                        const recipeLink = document.createElement("a");
                        recipeLink.href = `details_recette.php?id=${recipe.ID_recette}`;
                        recipeLink.textContent = recipe.Nom_recette;
                        recipeDiv.appendChild(recipeLink);

                        resultsDiv.appendChild(recipeDiv);
                    });
                }
            };
            xhr.open("GET", `recherche_recettes.php?recherche=${encodeURIComponent(searchInput)}`, true);
            xhr.send();
        }
    </script>
</head>
<body>
    <h1>Recherche de recettes</h1>
    <label for="recherche">Recherche :</label>
    <input type="text" id="recherche" name="recherche" placeholder="Nom de la recette, ingrédients, temps de préparation/cuisson" oninput="searchRecipes()">

    <div id="results">
        <!-- Les résultats de la recherche seront affichés ici -->
    </div>
</body>
</html>
