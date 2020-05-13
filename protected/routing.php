<?php 
if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';

	switch ($_GET['P']) {
        case 'home': require_once PROTECTED_DIR.'normal/home.php'; break;
        
        case 'register' : require_once PROTECTED_DIR.'user/register.php'; break;
        case 'login' : require_once PROTECTED_DIR.'user/login.php'; break;
        
        case 'my_recipes' : require_once PROTECTED_DIR.'recipes/my_recipes.php'; break;
        case 'add_recipe' : require_once PROTECTED_DIR.'recipes/add_recipe.php'; break;
        case 'manage_users' : require_once PROTECTED_DIR.''; break;

		case 'logout': isUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;

        
        default: require_once PROTECTED_DIR.'normal/404.php'; break;
	}

?>