<!DOCTYPE html>
<html>
    <head>
        
        <title>View Profile</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <?php include 'header13.php' ?>
        <fieldset>
    <legend align="center" style="font-size: 2.0em">Welcome</legend>

            <br>
             
             <?php include 'sidebar.php' ?>
             <?php  
      session_start();  
      if(isset($_SESSION["name"]))  
      {  
           if((time() - $_SESSION['last_login_timestamp']) > 60) // 900 = 15 * 60  
           {  
                header("location:logout.php");  
           }  
           else  
           {  
                $_SESSION['last_login_timestamp'] = time();  
                echo "<h1 align='center'>".$_SESSION["name"]."</h1>";  
               // echo '<h1 align="center">'.$_SESSION['last_login_timestamp'].'</h1>';  
                echo "<p align='center'><a href='logout.php'><span style='color: blue'>Logout</a></p>";  

                

           }  
      }  
      else  
      {  
           header('location:login.php');  
      }  
      ?>  


             <?php include 'footer.php' ?>
               </fieldset>


        
</body>

</html>
