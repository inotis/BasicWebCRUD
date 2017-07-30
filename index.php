<?php 
include_once("include/session.php");
include_once("include/dbconnect.php");
include_once("functions/layouts_function.php");
include_once("functions/query_function.php");
include_once("functions/validation_function.php");

include_once("layouts/head.php");
include_once("layouts/navigations.php");

//var_dump($_GET);

switch($_GET["page"]){
    case "content":
        include("content.php");
        break;
    case "create":
        include("create_data.php");
        break;
    case "view":
        include("view_data.php");
        break;
}

include_once("layouts/footer.php");

?>