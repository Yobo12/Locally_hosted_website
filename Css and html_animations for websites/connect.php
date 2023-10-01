<?php
    class ConnectTOLogIn{
        
        private $host = "localhost";
        private $username ="root";
        private $password = "";
        private $db ="login";
        
    
        //Creating functions
    
        //creating a function for the connection
        function connect(){
    
            $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
            return $connection;
        }
    
        //Creating a function to read from the database
        function read($query) 
        {
           $con = $this->connect();
           $result= mysqli_query($con,$query);
           if (!$result)
           {
               return false;
           }
           else 
           {
            $data = false;
              while($row = mysqli_fetch_assoc($result)){
                $data [] = $row;
           }
    
           return $data;
        }
    
    
        }
        //Creating a function to write or save to the database 
        
        function save($query){
            $con = $this->connect();
            $result= mysqli_query($con,$query); 
            
            if (!$result)
            {
                return false;
            }
            else 
            {
                return true;
            }
    
        }
    
        } 

        
    

?>