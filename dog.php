<?php
class Dog
{
    private $dog_weight = 0;
    private $dog_breed = "no breed";
    private $dog_color = "no color";
    private $dog_name = "no name";
    private $error_message = "??";
}
// ---------------------------------- Constructor ------------------------------------------
function __construct($value1, $value2, $value3, $value4)
{
    $name_error = $this->set_dog_name($value1) == TRUE ? 'TRUE,' : 'FALSE,';
    $breed_error = $this->set_dog_breed($value2) == TRUE ? 'TRUE,' : 'FALSE,';
    $color_error = $this->set_dog_color($value3) == TRUE ? 'TRUE,' : 'FALSE,';
    $weight_error= $this->set_dog_weight($value4) == TRUE ? 'TRUE' : 'FALSE';
    $this->error_message = $name_error . $breed_error . $color_error . $weight_error;

}
//------------------------------------toString----------------------------------------------
public function __toString()
{       
     return $this->error_message;
}

// ------------------------------ Set Methods ----------------------------------------------


function set_dog_name($value)
{
    $error_message = TRUE;(ctype_alpha($value) && strlen($value) <= 20) ? $this->dog_name = $value : $error_message = FALSE;
    return $error_message;
}
    function set_dog_weight($value)
    {
        $error_message = TRUE;(ctype_digit($value) && ($value > 0 && $value <= 120)) ? $this->dog_weight = $value : $error_message = FALSE;
        return $error_message;
    }
function set_dog_breed($value)
{
    $error_message = TRUE;
    ((ctype_alpha($value))&&($this->validator_breed($value) === TRUE)&&strlen($value) <= 35) ? $this->dog_breed = $value : $error_message = FALSE;    return $error_message;
}
function set_dog_color($value)
{
    $error_message = TRUE;(ctype_alpha($value) && strlen($value) <= 15) ? $this->dog_color = $value : $error_message = FALSE;
    return $error_message;
}

}
// ----------------------------------------- Get Methods -----------------------------------
function get_dog_name()
{
    return $this->dog_name;
}
function get_dog_weight()
{
    return $this->dog_weight;
}
function get_dog_breed()
{
    return $this->dog_breed;
}
function get_dog_color()
{
    return $this->dog_color;
}
function get_properties()
{
    return "$this->dog_weight,$this->dog_breed,$this->dog_color.";
}


}
function display_properties()    {
print "Dog weight is $this->dog_weight. 
Dog breed is $this->dog_breed. 
Dog color is  $this->dog_color.";
}
declare(strict_types=1);
function get_properties() : string
{return "$this->dog_weight,$this->dog_breed,$this->dog_color.";}
}
// ----------------------------------General Method------------------------------------------
private function validator_breed($value)
{
    $breed_file = simplexml:load_file("breeds.xml");
    $xmlText = $breed_file->asXML();
    if(stristr($xmlText, $value) === FALSE)
    {
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}


?>