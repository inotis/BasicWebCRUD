<?php
include_once("/functions/layouts_function.php");

$anchor = array(
    0=>"Home",
    1=>"Create",
    2=>"View",
    3=>"Delete",
    4=>"Update",
    5=>"Placeholder"
);    
// The following will break when we run any POST / GETs which redirects from index.php to other pages. To counter this, we need to add in the prefix and the query parameter within the action's page. Depending on how things goes, might want to add that prefix into formStart()    
$link = array(
    0=>"?page=home",
    1=>"?page=create_data",
    2=>"?page=view",
    3=>"?page=delete",
    4=>"?page=update",
    5=>"?page=content"
);  

/*$link = array(
    0=>"index.php",
    1=>"create_data.php",
    2=>"view.php",
    3=>"content.php"
);*/    
   
nav($anchor,$link,"wrap","wrap");

?>