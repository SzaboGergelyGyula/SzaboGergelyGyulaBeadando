
<?php
    $query = "SELECT id, recipe_name, liked, dislike, hozzaadas_datuma FROM recipes ORDER BY hozzaadas_datuma";
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
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                <?php foreach ($recipes as $r) : ?>
                    <?php $i++; ?>
                    <tr>
                        <td><a href="?P=recipe&r=<?=$r['id']?>"><?=$r['recipe_name'] ?></a></td>
                        <td><?=$r['liked'] ?></td>
                        <td><?=$r['dislike'] ?></td>
                        <td>matekképlet</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
