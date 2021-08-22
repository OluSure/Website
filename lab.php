<?php
    require_once("dog.php");
    $lab = new Dog;
    // -------------------Set Properties--------------------------
    $dog_error_message = $lab->set_dog_name('Fred');
    print $dog_error_message == TRUE ? 'Name update successful<br/>' : 'Name update not successful<br/>';
    $dog_error_message = $lab->set_dog_weight(50);
    print $dog_error_message == TRUE ? 'Weight update successful<br />' : 'Weight update not successful<br />';
    $dog_error_message = $lab->set_dog_breed('Lab');
    print $dog_error_message == TRUE ? 'Breed update successful<br />' : 'Breed update not successful<br />';
    $dog_error_message = $lab->set_dog_color('Yellow');
    print $dog_error_message == TRUE ? 'Color update successful<br />' : 'Color update not successful<br />';
    //-----------------------------Get Properties---------------------------
    print $lab->get_dog_name() . "<br/>";
    print $lab->get_dog_weight() . "<br />";
    print $lab->get_dog_breed() . "<br />";
    print $lab->get_dog_color() . "<br />";
    $lab->display_properties();
    $dog_properties = $lab->get_properties();
    function clean_input($value)
    {
        $bad_chars = array("{", "}", "(", ")", ";", ":", "<", ">", "/", "$");
        $value = str_ireplace($bad_chars,"",$value);
        // On this part below the string replace above removed special characters
        $value = htmlentities($value); // Removes any html from the string and turns it into &lt; format
    $value = strip_tags($value) // Strips html and PHP tags        
    if (get_magic_quotes_gpc())        
    {                
        $value = stripslashes($value);  // Gets rid of unwanted quotes        
    }
    return $value;
}
if ((isset($_POST['dog_name'])) && (isset($_POST['dog_breed'])) && (isset($_POST['dog_color'])) && (isset($_POST['dog_weight'])))
{
    $dog_name = clean_input($_POST['dog_name']);
    $dog_breed = clean_input($_POST['dog_breed']);
    $dog_color = clean_input($_POST['dog_color']);
    $dog_weight = clean_input($_POST['dog_weight']);
    $lab = new Dog($dog_name,$dog_breed,$dog_color,$dog_weight);

    list($dog_weight, $dog_breed, $dog_color) = explode(',', $dog_properties);
    print "Dog weight is $dog_weight. Dog breed is $dog_breed. Dog color is $dog_color.";

?>