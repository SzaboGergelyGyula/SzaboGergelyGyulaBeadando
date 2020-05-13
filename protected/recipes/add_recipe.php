<?php if(!isset($_SESSION['permission'])|| $_SESSION['permission'] < 0) : ?>
    <h1>Page access is forbidden!</h1>
<?php else : ?>
    <?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addRecipe'])) {
        $postData = [
            'uid' => $_SESSION['uid'],
            'recipe_name' => $_POST['recipe_name'],
            'hozzavalok' => $_POST['hozzavalok'],
            'elkeszites' => $_POST['elkeszites'],
            'hozzaadas_datuma' => date("Y/m/d")
        ];

        if(empty($postData['recipe_name']) || empty($postData['hozzavalok']) || empty($postData['elkeszites']) ) {
            echo "Hiányzó adat(ok)!";
        } else{
            $query = "INSERT INTO recipes (uid, recipe_name, hozzavalok, elkeszites, hozzaadas_datuma) VALUES (:uid, :recipe_name, :hozzavalok, :elkeszites, :hozzaadas_datuma)";
            $params = [
                ':uid' => $postData['uid'],
                ':recipe_name' => $postData['recipe_name'],
                ':hozzavalok' => $postData['hozzavalok'],
                ':elkeszites' => $postData['elkeszites'],
                ':hozzaadas_datuma' => $postData['hozzaadas_datuma']
            ];
            require_once DATABASE_CONTROLLER;
            if(!executeDML($query, $params)){
                echo "Hiba az adatbevitel során";
            }header('Location: index.php');
        }
    }
    ?>



<form method="post">
	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="recipeName">Recipe name</label>
			<input type="text" class="form-control" id="recipeName" name="recipe_name" >
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="recipeHozzavalok">Hozzávalok</label>
			<input type="text" class="form-control" id="recipeHozzavalok" name="hozzavalok" >
		</div>
    </div>

    <div class="form-row">
		<div class="form-group col-md-12">
			<label for="recipeElkeszites">Elkészítés</label>
			<input type="text" class="form-control" id="recipeElkeszites" name="elkeszites" >
		</div>
    </div>

    <button type="submit" class="btn btn-primary" name="addRecipe">Add Recipe</button>
</form>
<?php endif; ?>