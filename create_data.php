<?php 
include_once("include/session.php");
include_once("include/dbconnect.php");
include_once("functions/layouts_function.php");
include_once("functions/query_function.php");
include_once("functions/validation_function.php");

include_once("layouts/head.php");
include_once("layouts/navigations.php");

// var_DUMP($_SESSION); // temp testing (TT) 
// var_dump($_POST); //TT

// Defining the variables that would be used in this page for query. VAR
$tableName = "sandbox";

// User Input Variable
$firstName;
$lastName;
$company;
$companyId;

// Storing User's input into Array for QUERY, initialized as blank
$userInput = array(   
    $firstName = "",
    $lastName = "",
    $company = "",
    $companyId = "0"
);

// Stores User's original input before ESCAPING
$userOriginal = $userInput;

// Storing HTML Display Labels into Array
$tableLabels = array(
    0=>"First Name",
    1=>"Last Name",
    2=>"Company ",
    3=>"Company ID"
);

// Storing MySQL Table Fields into Array, aka name="" tags
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
    
    // Assigning user's input into array. VAR: Add in different table's field as required
    $userInput = array(
        0=>$_POST[$tableFields[0]],
        1=>$_POST[$tableFields[1]],
        2=>$_POST[$tableFields[2]],
        3=>$_POST[$tableFields[3]]    
    );
    
    // Keep the original data input of Users for returning during update error
    $userOriginal = $userInput;
    // Escapes User's input before submission
    $userInput = escapeUserInputs($userInput);
    
    // Basic conditionals to remind users of missing fields :: could this be made into a function as well?
    if(isempty($userInput[0]) && isempty($userInput[1]))
    {
        echo "First Name and Last Name required";
    }
    else if (isempty($userInput[0]))
    {
        echo "First Name required"; 
    }
    else if (isempty($userInput[1]))
    {
        echo "Last Name required"; 
    }
    else
    {
        insertQuery($tableName, $userInput, $tableFields);    
    }
    
}

// Start of form
formStart("index.php?page=create_data", "post", "basicForm");


// There would be a display error, bug when user subitted their input. "\" would appear before quotes or other special characters
// I could store user's original input in a separate array for display
    textField($tableLabels[0],$tableFields[0],$userOriginal[0]);
    textField($tableLabels[1],$tableFields[1],$userOriginal[1]);
    textField($tableLabels[2],$tableFields[2],$userOriginal[2]);
    textField($tableLabels[3],$tableFields[3],$userOriginal[3]);

    formSubmit("submit", "Submit Form");


formEnd();

include_once("layouts/footer.php");
?>