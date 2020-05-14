<?php
if(!array_key_exists('r',$_GET) || empty($_GET['r'])) :
    header('Location: index.php');
else:
    $query = "SELECT id, recipe_name, liked, dislike, hozzavalok, elkeszites FROM recipes WHERE id = :id";
    $params = [':id'=> $_GET['r']];
    require_once DATABASE_CONTROLLER;
    $recipe = getRecord($query, $params);
endif;

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['like'])) {
    $l = $recipe['liked'];
    $query = "UPDATE recipes SET likes=$l+1 WHERE id=:id";
    $params = [':id' => $_GET['r']];
    require_once DATABASE_CONTROLLER;
    if(!executeDML($query, $params)){
        echo "Hiba";
    }
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dislike'])) {
    $l = $query['dislike'];
    $query = "UPDATE recipes SET dislike=$l+1 WHERE id=:id";
    $params = [':id' => $_GET['r']];
    require_once DATABASE_CONTROLLER;
}
?>

<h1><?=$recipe['recipe_name']; ?></h1>
<h3>Hozzávalók:</h3>
<div><?=$recipe['hozzavalok']; ?></div>
<h3>Elkészítés:</h3>
<div><?=$recipe['elkeszites']; ?></div>

<?php if(isUserLoggedIn()) : ?>
    <button type="submit" class="btn btn-primary" name="like" value="like">Like</button>
    <button type="submit" class="btn btn-primary" name="dislike" value="dislike">Dislike</button>
<?php endif; ?>