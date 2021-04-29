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

if($_SERVER['REQUEST_METHOD']=="POST"){
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
<!DOCTYPE html>
<html>
 <head>  

           <title>complain</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
               <?php include 'header.php' ?>  
      </head>  
      <body>  
        <fieldset>
    <legend align="center" style="font-size: 2.0em">Complain</legend>
           <div class="container">  
                 
    <form action="" method="POST">
    <level>complain</level>
    <input type="text"id="complain"name="complain">
    <br>
    
    <input type="submit" value="submit">
</form>



<script>
function submit() {

            var complain = document.getElementById("complain").value;
            

            if(complain == "" ) {
                document.getElementById("p1").innerHTML = "Fill up the form properly";
                document.getElementById("p1").style.color = "red";
            }

            else {

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        document.getElementById("p1").innerHTML = xhttp.responseText;
                        document.getElementById("p1").style.color = "green";
                    }
                }

                xhttp.open("POST", "ComplainAction.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("complain="+complain);
            }
        }
        </script>