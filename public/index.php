<?php
// Inclusion de l'autoload de composer
require __DIR__.'/../vendor/autoload.php';

// Inclusion de mes Controllers
require __DIR__.'/../app/Controllers/CoreController.php';
require __DIR__.'/../app/Controllers/MainController.php';

// Inclusion de mes Models
require __DIR__.'/../app/Models/UsersModel.php';

// Inclusion de mes Utils
require __DIR__.'/../app/Utils/DBData.php';

// Instance de AltoRouter
$router = new AltoRouter();

// J'utilise la méthode setBasePath
$baseUrl = isset($_SERVER['BASE_URI']) ? trim($_SERVER['BASE_URI']) : '/';
$router->setBasePath($baseUrl);

// Déclarations des routes avec la méthode 'map'
$router->map('GET|POST', '/', ['MainController', 'home'], 'home');
$router->map('GET|POST', '/confirmation', ['MainController', 'confirmation'], 'confirmation');
// J'utilise la méthode match de Altorouter
$match = $router->match();


if ($match) {

    // Je stock dans des variables les noms de mon controlleur déterminé & de la méthode
    $controllerName = $match['target'][0];
    $actionName = $match['target'][1];

    // J'instancie mon controller
    // ex: $controller = new MainController();
    $controller = new $controllerName($baseUrl);

    // J'appel la méthode correspondant à la route (déterminée par AltoRouteur)
    // ex: $controller->home()
    $controller->$actionName($match['params']);

// Sinon c'est une 404 !
} else {

    $controller = new MainController();
    $controller->notFound();
}

