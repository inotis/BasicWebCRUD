<?php 

// Check if input is empty
function isempty($input){
    if(isset($input) && $input !== "")
    {
        //echo "not empty";
        return FALSE;
    }
    else
    {
        //echo "empty";
        return TRUE;
    }
}


?>