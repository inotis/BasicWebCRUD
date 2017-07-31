<?php 
include_once("include/session.php");
include_once("include/dbconnect.php");
include_once("functions/layouts_function.php");
include_once("functions/query_function.php");
include_once("functions/validation_function.php");

include_once("layouts/head.php");
include_once("layouts/navigations.php");

//var_dump($_GET);

//* Not a good idea when we navigate away from index.php...somehow I managed to fix it
if(isset($_GET))
{
     switch($_GET["page"]){
        case "home":
            include("content.php");
            break;
        case "create_data":
            include("create_data.php");
            break;
        case "view":
            include("view.php");
            break;
        case "delete":
            include("delete.php");
            break;
        case "update":
            include("update.php");
            break;
         case "content":
            include("content.php");
            break;
     }   
    
}

//*/

include_once("layouts/footer.php");

?>