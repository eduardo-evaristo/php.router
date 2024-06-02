<?php

//Getting the current URI and parsing it into path only
//$uri = rtrim(parse_url($_SERVER["REQUEST_URI"])["path"], "/");
$uri = rtrim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/"); //This returns only the path, not an array with all



//Definition of how our routes should take place
$routes = [
    "" => "controllers/index.php",
    "/" => "controllers/index.php",
    "/contact" => "controllers/contact.php",
    "/about" => "controllers/about.php"
];

//Function to abort when we can't route, this also sends an http code and die()/exit()
function abort($error = 404) {
    http_response_code($error);
    if (file_exists("views/{$error}.php")) {
        require_once "views/{$error}.php";
        exit();
    } else {
        require_once "views/404.php";
        exit();
    }   
}

//Function that takes care of routing, it receives the current URI and the possible routes of the website
function routeTo($currentURI, $websiteRoutes) {
    if (array_key_exists($currentURI, $websiteRoutes)) {
        require_once $websiteRoutes[$currentURI];
    } else {
        abort();
    }
}

routeTo($uri, $routes);