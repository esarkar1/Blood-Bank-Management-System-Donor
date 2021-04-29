<?php
$host = "localhost";
                $user = "emon";
                $pass = "123";
                $db = "blood";

                // Mysqli object-oriented
                $conn = new mysqli($host, $user, $pass, $db);
            
                if($conn->connect_error)
                {
                    echo "Database Connection Failed!";
                    echo "<br>";
                    echo $conn->connect_error;
                }

                else
                {

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $c=$_POST['complain'];
    $SELECT="SELECT * from complain";
    $INSERT="INSERT Into complain (complain) values(?)";

                $stmt=$conn->prepare($INSERT);
                $stmt->bind_param("s",$c,);
                $stmt->execute();
                
              
              
              $stmt->close();
              $conn->close();
          }
      }

?>