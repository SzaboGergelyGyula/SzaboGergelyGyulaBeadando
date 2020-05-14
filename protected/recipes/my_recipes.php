<?php if(!isset($_SESSION['permission'])|| $_SESSION['permission'] < 0) : ?>
    <h1>Page access is forbidden!</h1>
<?php else : ?>
<?php
    $ID = $_SESSION['uid'];
    $query = "SELECT id, recipe_name, liked, dislike FROM recipes WHERE uid = $ID";
    require_once DATABASE_CONTROLLER;
    $recipes = getList($query);
?>

    <?php if(count($recipes) <= 0) : ?>
        <h1>No recipe found in the database</h1>
    <?php else : ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Recipe name</th>
                    <th scope="col">Liked</th>
                    <th scope="col">Disliked</th>
                    <th scope="col">Arány</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                <?php foreach ($recipes as $r) : ?>
                    <?php $i++; ?>
                    <tr>
                        <td><a href="?P=recipe&r=<?=$r['id'] ?>"><?=$r['recipe_name'] ?></a></td>
                        <td><?=$r['liked'] ?></td>
                        <td><?=$r['dislike'] ?></td>
                        <td>matekképlet</td>
                        <td><a href="#">Edit</a></td>
                        <td><a href="#">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
<?php endif; ?>