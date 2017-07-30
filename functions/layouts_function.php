<?php

// Contains functions to make it easier to write HTML 

// In the context of my functions, $label refers to the text shown to end users
// $name refers to the "name" of the tags, I should add in a $class variable in the future
// $value refers to the data inputted by users

// Use this function to create a textbox for form input.
function textField($label, $name, $value){

    $field = '<input type="text"'; 
    $field .= 'name="';
    $field .= $name;
    $field .= '" value="';
    $field .= $value;
    $field .= '">';
 
    echo ucwords($label) . "&nbsp" . $field ."<br>";    

}

// the opening tag of forms
function formStart($action, $method, $id){
    
    $form = '<form action="';
    $form .= $action;
    $form .= '" method="';
    $form .= $method;
    $form .= '" id="';
    $form .= $id;
    $form .= '">';
    
    echo $form;
}

// input submission for form
function formSubmit($name, $value){
    
    $submit = '<input type="submit" name ="';
    $submit .= $name;    
    $submit .= '" value="';
    $submit .= $value;
    $submit .= '"/>';

    echo $submit;
    
    // <input type="submit" name="submit" value="Create Account" />
}

// list of options for form submission
function listField($label, $name, $formName, $array){
    
    echo ucwords($label) . "&nbsp";  
    
    $size = count($array);
    
    $list = '<select name="';
    $list .= $name;
    $list .= '" form="';
    $list .= $formName;
    $list .= '">';
    
    echo $list;
    
    $i = 0;
    
    for ($i; $i < $size; $i++)
    {
        $option = '<option value="';
        $option .= $array[$i];
        $option .= '">';
        $option .= $array[$i];
        $option .= '</option>';
        
        echo $option;
    }
    
    echo '</select><br>';
    

    // <select name="company" form="userInput">
    // <option value="Not Applicable">Not Applicable</option>
    // </select>
    
}

// closing tags for form
function formEnd(){
    
    $form = '</form>';

    echo $form;
}
 


?>