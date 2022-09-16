<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        echo "You are registered as " . $_POST["email"] . " using POST method";
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        echo "You are registered as " . $_GET["email"] . " using GET method";
    }
?>