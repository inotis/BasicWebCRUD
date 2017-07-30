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

// closing tags for form
function formEnd(){
    
    $form = '</form>';

    echo $form;
}
 
// controls site navigation
// $anchor refers to the text user will click. $link refers to the href source  
function nav($anchor, $link, $navClass, $ulClass){
    
    $size = count($anchor);
    $i = 0;
    
    echo '<nav class="' . $navClass . '"><ul class="' . $ulClass  .'">';
    
    for($i; $i<$size; $i++)
    {
        $navigation = '<li class="navigation"><a href="';
        $navigation .= $link[$i];
        $navigation .= '">';
        $navigation .= $anchor[$i];
        $navigation .= '</a></li>';
        
        echo $navigation;
    }
    
    echo '</ul></nav>';    
}

// Function for placeholder text
function lorem(){
    
    echo "<h2>";
    echo "Lorem Ipsum";
    echo "</h2>";
    
    echo "<p>";
    echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum <br> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? <br> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat <br> ";
    echo "</p>";
}

?>