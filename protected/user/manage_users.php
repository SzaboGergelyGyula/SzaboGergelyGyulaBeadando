<?php if(!isset($_SESSION['permission'])|| $_SESSION['permission'] < 2) : ?>
    <h1>Page access is forbidden!</h1>
<?php else : ?>
<?php
    $query = "SELECT nick_name, email, permission FROM users";
    require_once DATABASE_CONTROLLER;
    $users = getList($query);
?>

    <?php if(count($users) <= 0) : ?>
        <h1>No recipe found in the database</h1>
    <?php else : ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nick name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Permission</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                <?php foreach ($users as $u) : ?>
                    <?php $i++; ?>
                    <tr>
                        <td><?=$u['nick_name'] ?></td>
                        <td><?=$u['email'] ?></td>
                        <td><?=$u['permission'] ?></td>
                        <td>edit</td>
                        <td>delete</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
<?php endif; ?>