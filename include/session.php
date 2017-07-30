<?php

session_start();

function message() {
    if (isset($_SESSION["message"])) {
        $output = "<div class=\"message\">";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</div>";

        // clear message after use
        $_SESSION["message"] = null;

        //echo "Session Success";

        return $output;
    }
}

function errors() {
    if (isset($_SESSION["errors"])) {
        $errors = $_SESSION["errors"];

        // clear message after use
        $_SESSION["errors"] = null;

        //echo "Session Failed";

        return $errors;
    }
}
	
?>