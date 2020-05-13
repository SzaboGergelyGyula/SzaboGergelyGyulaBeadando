<a href="index.php">Home</a>
<?php if(!IsUserLoggedIn()) : ?>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=login">Login</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=register">Register</a>
<?php else : ?>
        <span> &nbsp; | &nbsp; </span>
        <a href="index.php?P=my_recipes">My recipes</a>
        <span> &nbsp; | &nbsp; </span>
        <a href="index.php?P=add_recipe">Add recipe</a>
        <span> &nbsp; | &nbsp; </span>
        <?php if(isset($_SESSION['permission']) && $_SESSION['permission'] =2) : ?>
            <a href="index.php?P=manage_users">Manage users</a>
            <span> &nbsp; | &nbsp; </span>
        <?php endif; ?>
    <a href="index.php?P=logout">Logout</a>
<?php endif; ?>