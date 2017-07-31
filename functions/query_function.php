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
        if($i == $size-1) // the last item will be without comma ","
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

// SELECT QUERY, $conditions is used for WHERE
// IDEA: I should split this query into 2 or more segments , as compared to a single long SELECT query
function selectQuery($tableName,$tableFields,$tableLabels,$conditions){
    
    global $connection; // required to access variables from outside the scope of the function
    $size = count($tableFields);
    $i = 0; // initialize counter

    // var_dump($tableFields); //TT
    // echo $size;//TT
        
//--------------------PART 1: SQL QUERY construction starts here
    $query = "SELECT ";
    
    // The following loop is used to create the first part of the SELECT SQL QUERY (fields)
    for($i; $i < $size; $i++)
    {
        if($i == $size-1) // the last item will be without comma ","
        {
            $query .= $tableFields[$i];             
        }
        else
        {
            $query .= $tableFields[$i] . " , ";   
        }
    }
    
    $query .= " FROM ";
    $query .= $tableName;

    // if $conditions array is set and is not empty, add in WHERE statement
    if(isset($conditions) && !isempty($conditions))
    {
        $query .= " WHERE ";
        $query .= $conditions;

    }

    // echo $query . "<br>"; //TT
    
    $results = mysqli_query($connection, $query);

    // Feedback if data was INSERTED properly
    /* if($results) 
    {
        echo "Retrieval Successful!"; 
    } 
    else 
    {
        echo "Retrieval Failure!";
    } */ //TT

//--------------------PART 2: Display query results into browser
    
    
    // the following check if the number of results SELECTed is more than 0, if so, loop and echo them
    
    // Table Start
    echo '<table>';
    
    echo '<tr>';
    $i = 0; // re-initialize $i, counter
    // Popluate Header of Table
    for($i; $i<$size;$i++)
    {
        echo '<th>';
        echo $tableLabels[$i];
        echo '</th>';
    }
    // Final Column for checkbox    
    echo '<th>';
    echo "Select";
    echo '</th>';
    
    echo '</tr>';
    
    $i = 0; // reinitialize $i
    
    if (mysqli_num_rows($results) > 0) // for each row of results
    {
        while($row = mysqli_fetch_assoc($results)) // honestly, I'm not too certain about this loop, perhaps I might want to experiment re-writing as a for loop?
        {
            echo '<tr>'; 
            
            for($i; $i < $size; $i++)
            {
                echo "<td>";
                echo $row[$tableFields[$i]];
                echo "</td>";      
            }  
            $i=0; // reinitialize (reset the counter for each field, i.e. start again from first field)      

            // Add Select to the last column
            echo "<td>";
                $checkbox = '<input name="' . CHECKBOX .'" type="checkbox" value="';
                $checkbox .= $row[$tableFields[$i]]; // $i initialized as 0, which should be the primary key
                $checkbox .= '"> ';
            echo $checkbox;
            echo "</td>";
            
            echo '</tr>';
            //var_dump(mysqli_fetch_assoc($results));  
            //echo mysqli_num_rows($results);
        }
        
    }
    echo '</table>';
        
}

// DELETE QUERY




?>