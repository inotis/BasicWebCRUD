<?php
include_once("/functions/layouts_function.php");

$anchor = array(
    0=>"Home",
    1=>"Create",
    2=>"View"
);    
    
$link = array(
    0=>"?page=content",
    1=>"?page=create",
    2=>"?page=view"
);    
   
nav($anchor,$link,"wrap","wrap");

?>