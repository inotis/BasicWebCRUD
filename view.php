<?php 
include_once("include/session.php");
include_once("constants.php");
include_once("include/dbconnect.php");
include_once("functions/layouts_function.php");
include_once("functions/query_function.php");
include_once("functions/validation_function.php");

include_once("layouts/head.php");
include_once("layouts/navigations.php");

// INSERT CONTENT FROM HERE

// var_dump($_POST);//TT

// ADD in a custom panel for SELECT QUERY here, something like a filter system. This could be based off the below arrays. Depending on how things goes, might need to introduce other variables in the SELECT function

// The following runs the DELETE QUERY
if(isset($_POST["delete"]))
{
    $selected = $_POST["checkbox"]; //default name for all checkbox
    // var_dump($_POST);
    $size = count($selected);
    // echo count($selected);
    $count = 0;

    for($i = 0; $i < $size; $i++){
        $deleteQry = "DELETE FROM sandbox WHERE sandbox.id = " ;
        $deleteQry .= $selected["$i"];
        $deleteQry .= " LIMIT 1";
        mysqli_query($connection, $deleteQry);
        $count ++;
    }

    echo $count . " data deleted.";
}

$tableFields = array(
    0=>"id",
    1=>"firstName",
    2=>"lastName",
    3=>"company",
    4=>"companyId"
);

$tableLabels = array(
    0=>"ID",
    1=>"First Name",
    2=>"Last Name",
    3=>"Company",
    4=>"Company ID"
);

$conditions = "id >=0 ORDER by id ASC";
//$conditions = "id = 55";

formStart("index.php?page=view","post","view");

    selectQuery("sandbox",$tableFields,$tableLabels,$conditions);
    formSubmit("delete", "Delete");

formEnd();
// END 

include_once("layouts/footer.php");
?>