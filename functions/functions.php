<?php

//Set the active page style dynamically in the navbar
function correctNav($local) {
    if ($_SERVER["REQUEST_URI"] === $local) {
        return "bg-gray-900 text-white";
    } else {
        return "text-gray-300 hover:bg-gray-700 hover:text-white";
    }
}

//Dumps info about a variable and die
function dd($url) {
    echo "<pre>";
    var_dump($url);
    echo "</pre>";
    die();
}