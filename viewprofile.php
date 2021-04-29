<!DOCTYPE html>
<html>
    <head>
        
        <title>View Profile</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <?php include 'header1.php' ?>
        <fieldset>
    <legend align="center" style="font-size: 2.0em">Welcome</legend>

            <br>
             
             <?php include 'sidebar.php' ?>
              <fieldset>
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
                //echo '<h1 align="center">'.$_SESSION['last_login_timestamp'].'</h1>';  
                echo "<p align='center'><a href='logout.php'>Logout</a></p>";  
           }  
      }  
      else  
      {  
           header('location:login.php');  
      }  
      ?>  


             <legend align="center" style="font-size: 2.0em">PROFILE</legend>
             <table cellpadding="2" width="50%" bgcolor="E0E0E0" align="center"cellspacing="2">
    <tr>
      <td>NAME :</td>
      <td>MD. AKHTARUZZAMAN EMON</td>
    </tr>

    <tr>
      <td>EMAIL :</td>
      <td>18-36074-1@student.aiub.edu</td>
    </tr>
     <tr>
      <td>GENDER</td>
      <td>Male</td>
    </tr>
      
</table>
</fieldset>
</fieldset>

<?php include 'footer.php' ?>
        
</body>

</html>
