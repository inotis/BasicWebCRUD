<?php 

// Testing to set a list and assigning Foreign Keys, such that subsequent data entry on a different table would be related by foreign key

include_once("functions/layouts_function.php");

$label = array(
    0=>"List of Data"
);

$name = array(
    0=>"selections"
);

$formSelections = array(
    0=>"Option A",
    1=>"Option B",
    2=>"Option B"
);

formStart("testing.php", "post", "form");

listField($label[0], $name[0], "form", $formSelections);

formEnd();

?>