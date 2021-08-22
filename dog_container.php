<?php
class Dog_container
{
    private $app;
    private $dog_location;
    function __construct($value)
    {
        if (function_exists('clean_input'))
        {
            $this->app = $value;
        }
        else
        {
            exit;
        }
     }
     public function set_app($value)
     {
         $this->app = $value;
        }
        public function get_dog_application()
        {
            $xmlDoc = new DOMDocument();
            if ( file_exists("dog_applications.xml") )
            {
                $xmlDoc->load( 'dog_applications.xml' );
                $searchNode = $xmlDoc->getElementsByTagName( "type" );
                foreach( $searchNode as $searchNode )
                {   
                     $valueID = $searchNode->getAttribute('ID');  
                       if($valueID == $this->app)
 {    $xmlLocation = $searchNode->getElementsByTagName( "location" );   
     return $xmlLocation->item(0)->nodeValue;  
       break; 
       }
    }
}    
return FALSE;
}
function create_object($properties_array)
{ 
     $dog_loc = $this->get_dog_application();  
     if(($dog_loc == FALSE) || (!file_exists($dog_loc))) 
      {  
            return FALSE; 
         }  
         else
           {  
                 require_once($dog_loc);  
                   $class_array = get_declared_classes();   
         $last_position = count($class_array) - 1;     
            $class_name = $class_array[$last_position]; 
                   $dog_object = new $class_name($properties_array);        
                   return $dog_object;        
                }
            }
        }
        class GetBreeds 
        {
            function __construct($properties_array)
            {
                 //get_breeds constructor
                 if (!(method_exists('dog_container', 'create_object')))
                 { 
                     exit;
                    }
                }
                private $result = "??";
                public function get_select($dog_app)
                {
                     if 
                     (($dog_app != FALSE) && ( file_exists($dog_app)))
                     {     
                         $breed_file = simplexml:load_file($dog_app);     
                         $xmlText = $breed_file->asXML();     
                         $this->result = "<select name='dog_breed' id='dog_breed'>";     
                         $this->result = $this->result . "<option value='-1' selected>Select a dog breed</option>";   
                          foreach ($breed_file->children() as $name => $value)   
                           {   
                                $this->result = $this->result . "<option value='$value'>$value</option>";  
                            }      
                            $this->result = $this->result . "</select>";             
                            return $this->result;    
                        } 
                        else 
                        {             
                            return FALSE;    
                        }
                    }
    }
 ?>