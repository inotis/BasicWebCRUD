<?php 
include("include/session.php");
include("include/dbconnect.php");
include_once("functions/layouts_function.php");
include_once("functions/query_function.php");

// var_DUMP($_SESSION); // temp testing (TT) 
// var_dump($_POST); //TT

// Defining the variables that would be used in this page for query. VAR
$userInput = array();
$tableName = "sandbox";
$tableFields = array(
    0=>"firstName",
    1=>"lastName",
    2=>"company",
    3=>"companyId"
);

// IDEA: I should set all the possible variables here in the beginning to make it easier to change them, notice that firstName is repeated twice, in line 27 and 57. Perhaps I might want to store the different names in a name array, different labels in a label array. I would also want to add in a class field  


// Check if the form is submitted, if so, does the relevant actions
if(isset($_POST["submit"]))
{
    // Assigning $_POST data into variables. VAR
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $company = $_POST["company"];
    $companyId = $_POST["companyId"];
    
    // Assigning user's input into array. VAR: Add in different table's field as required
    $userInput = array(
    0=>$firstName,
    1=>$lastName,
    2=>$company,
    3=>$companyId    
    );
    
    // Escapes User's input before submission
    $userInput = escapeUserInputs($userInput);
    
    // INSERT QUERY :: Can add in validations around here
    insertQuery($tableName, $userInput, $tableFields);
}
else
{
    $firstName = "";
    $lastName = "";
    $company = "";
    $companyId = "0";
}

// Start of form
formStart("index.php", "post", "basicForm");

    textField("First Name","firstName",$firstName);
    textField("Last Name","lastName",$lastName);
    textField("Company Name","company",$company);
    textField("Company ID","companyId",$companyId);

    formSubmit("submit", "Submit Form");


formEnd();

?>