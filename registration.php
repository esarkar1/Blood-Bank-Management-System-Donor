<?php
error_reporting(0);

if(isset($_POST['submit'])){

  $name=$_POST['name'];
  $passs=$_POST['passs'];
  $confpass=$_POST['confpass'];
  $email =$_POST['email'];
  $pnum=$_POST['pnum'];
  $gender= $_POST['gender'];
  $dateofbirth =$_POST['dateofbirth'];
  
  if(empty($name)){
  $error_msg['name'] = "Name is required";
}

else if(!preg_match("/^[a-zA-Z-]*$/", $name)){
  $error_msg['name'] = "Only letters allowed";
}

  if(empty($passs)){
  $error_msg['passs'] = "Password is required";
}
 if(empty($confpass)){
  $error_msg['confpass'] = " Confirm Password is required";
}
  else if($passs != $confpass){
  $error_msg['pass3'] = "Password don't match";
}

else if(!preg_match('/^(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $passs)){
  $error_msg['pass3'] = "Password don't meet requirments!";
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $error_msg['email'] = "Invalid email address";
}

if(empty($pnum)){
  $error_msg['pnum'] = "Phone Number is required";
}

if(empty($gender)){
  $error_msg['gender'] = "Gender is required";
}


if(empty($dateofbirth)){
  $error_msg['dateofbirth'] = "Date of Birth is required";
}

}

$host = "localhost";
                $user = "emon";
                $pass = "123";
                $db = "blood";
            
            
                $conn = mysqli_connect($host, $user, $pass, $db);
                if(mysqli_connect_error()) {
                    echo "Database Connection Failed!";
                    echo "<br>";
                    echo $conn ->connect_error;
                }
                else {
            
                    echo "Database Connection Successful!";
                    $stmt1 = $conn->prepare("insert into donor (name, passs, email,  pnum, gender,dateofbirth ) VALUES ( ?, ?, ?, ?, ?, ?)");
                    $stmt1->bind_param("ssssss",$p1, $p2, $p3, $p4, $p5, $p6);
                    $p1 = $name;
                $p2 = $passs;
                    $p3 = $email;
                    $p4 = $pnum;
                    $p5 = $gender; 
                    $p6 = $dateofbirth;
           
                    
                   
                    $status = $stmt1->execute();
            
                    if($status) {
                        echo "Data Insert Successful!";
                        $insert_flag = 1;

                         
                    }
                    else {
                        echo "Failed to Insert Data";
                        echo "<br>";
                        echo $conn->error;
                    }
                }
            
            
                $conn->close();
            
                



                    
               
            
            

?>





<!DOCTYPE html>
<html>
    <head>
        
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <style>
.error {color: #FF0000;}
</style>
    </head>
    <body>

        
          <?php include 'header.php' ?>

             <fieldset>
    <legend align="center" style="font-size: 2.0em">Registration</legend>
             <form name="sign" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="POST"align="center">

               

   <table cellpadding="2" width="50%" bgcolor="E0E0E0" align="center"cellspacing="2">

  Customer Name: <input type="text" name="name" >
   <?php
     if(isset($error_msg['name'])){
     echo"<div class='error'>" .$error_msg['name']. "</div>";
   }
 ?>
<br><br>

  E-mail: <input type="text" name="email" placeholder="18-36074-1@student.aiub.edu">
   <?php
     if(isset($error_msg['email'])){
     echo"<div class='error'>" .$error_msg['email']. "</div>";
   }
 ?>

  <br><br>
        

  PASSWORD: <input type="text" name="passs" >

  <?php
     if(isset($error_msg['passs'])){
     echo"<div class='error'>" .$error_msg['passs']. "</div>";
   }

   if(isset($error_msg['pass3'])){
     echo"<div class='error'>" .$error_msg['pass3']. "</div>";
   }

  ?>
  
  <br><br>
  CONFIRM PASSWORD: <input type="text" name="confpass">
  <?php
     if(isset($error_msg['confpass'])){
     echo"<div class='error'>" .$error_msg['confpass']."</div>"; 
      }

  ?>
<br><br>


  Phone Number: <input type="text" name="pnum" pattern="[0-9]{11}">
   <?php
     if(isset($error_msg['pnum'])){
     echo"<div class='error'>" .$error_msg['pnum']. "</div>";
   }
 ?>
<br><br>

  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <?php
     if(isset($error_msg['gender'])){
     echo"<div class='error'>" .$error_msg['gender']. "</div>";
   }
     ?>

  <br><br>

  DATE OF BIRTH: <input type="Date" name="dateofbirth" min="1953-01-01" max="2021-03-31">
  <?php
     if(isset($error_msg['dateofbirth'])){
     echo"<div class='error'>" .$error_msg['dateofbirth']. "</div>";
   }
     ?>
  <br><br>


  <input type="submit" name="submit" value="Submit">  

  <br><br>
  
</form>
<div id="errorMsg">
  </div>
</table>

     <?php include 'footer.php' ?>
  </fieldset>

  <?php
echo "<h2>Your Output:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $passs;
echo "<br>";
echo $confpass;
echo "<br>";
echo $pnum;
echo "<br>";
echo $gender;
echo "<br>";
echo $dateofbirth;
echo "<br>";

?>

   

</html>

<script>
      function validate() {
        var isValid = false;
        var name = document.forms["sign"]["name"].value;
        var email = document.forms["sign"]["email"].value;
        var passs = document.forms["sign"]["passs"].value;
        var confpass = document.forms["sign"]["confpass"].value;
        var pnum = document.forms["sign"]["pnum"].value;
        var gender = document.forms["sign"]["gender"].value;
        var dateofbirth = document.forms["sign"]["dateofbirth"].value;
        
      


        if(name == "" || email == ""|| passs == ""|| confpass == ""|| pnum == ""|| gender == ""|| dateofbirth == "") {
          document.getElementById("errorMsg").innerHTML = "<b>Please fill up the form properly.</b>";
          document.getElementById("errorMsg").style.color = "red";
        }
        else {
          isValid = true;
        }

        return isValid;
      }
    </script>

