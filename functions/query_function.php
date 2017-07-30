<?php

// Takes in user input as an array and escapes "unacceptable" characters
function escapeUserInputs($insertArray){
    
    global $connection; // required to access variables from outside the scope of the function
    $size = count($insertArray);
    $i = 0;

    // loop through the array of data to be INSERT and apply mysqli_real_escape to each
    for($i; $i < $size; $i++)
    {
        $insertArray[$i] = mysqli_real_escape_string($connection, $insertArray[$i]);    
    }
    
    return $insertArray; 
}

// INSERT QUERY, $insertArray refers to the data to be inserted. $tableFields refers to the fields columns within the table in the database 
function insertQuery($tableName,$insertArray,$tableFields){
    
    global $connection; // required to access variables from outside the scope of the function
    $size = count($insertArray);
    $i = 0;

    // SQL QUERY construction starts here
    $query = "INSERT INTO ". $tableName . "(";
    
    // The following loop is used to create the first part of the INSERT SQL QUERY (fields)
    for($i; $i < $size; $i++)
    {
        if($i == $size-1)
        {
            $query .= $tableFields[$i];            
        }
        else
        {
            $query .= $tableFields[$i]. " , ";   
    
        }
    }
    $query .= ") VALUES (";
    
    $i = 0; // resets the counter to 0
    // The following loop is used to create the second part of the INSERT SQL QUERY (values) 
    for($i; $i < $size; $i++)
    {        
        if($i == $size-1)
        {
            $query .= " ' " . $insertArray[$i] . " ' ";            
        }
        else
        {
            $query .= " ' " . $insertArray[$i] . " ' " . " , ";   
    
        }
    }        
    $query .= ")";

//echo $query; //TT

    $results = mysqli_query($connection, $query);

    // Feedback if data was INSERTED properly
    if($results) 
    {
        echo "Update Successful!"; 
    } 
    else 
    {
        echo "Update Failure!";
    }

    
}

?>