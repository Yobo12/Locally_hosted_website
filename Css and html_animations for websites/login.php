<?php
class Login
{
    private $error = "";

    public function Evaluate($data)
    {
        foreach ($data as $key => $value) {
            if (empty($value)) {
                $this->error .= $key . " is empty! <br>"; // Concatenate error message
            }

            if ($key == "email") {
                
                if(!filter_var($value,FILTER_VALIDATE_EMAIL)){

                    $this->error .= "Invalid email address <br>";
                }
                           }

                           if ($key == "lastname") {
                
                            if(is_numeric($value)){
            
                                $this->error .= "Invalid lastname <br>";
                            }
                                       }

                                       if ($key == "firstname") {
                
                                        if(is_numeric($value)){
                        
                                            $this->error .= "Invalid firstname <br>";
                                        }
                                                   }
        }

        if ($this->error == "") {
            // No error, proceed to create user
            $this->Create_user($data);
        } else {
            return $this->error; // Return error message
        }
    }

    function Create_user($data)
    {
        $email = $data['email'];
        $password = $data['password'];

         //$UrlAddress = strtolower($FirstName) . " . " . strtolower($LastName); // Generate URL address
         $UserID = $this->Create_userid();
        //creating the query
        $query = "INSERT INTO user_input 
                (userid ,email, password)
                VALUE ($UserID,'$email','$password')";




        // Uncomment the following lines if you have a database class to execute the query
         $db = new ConnectTOLogIn();
        $db->save($query);
        
        return $query; // Return query (for testing purposes)
    }

    private function Create_userid()
    {
        $length = rand(4, 19); // Generating random number for user ID using a function called rand
        $number = "";

        for ($i = 0; $i < $length; $i++) {
            $new_rand = rand(0, 9); // Generate random digit or select random number from 0 to 9
            $number .= $new_rand; // Append digit to user ID
        }

        return $number; // Return generated user ID
    }
}
    //Tring to instantiate the login class 

    
?>