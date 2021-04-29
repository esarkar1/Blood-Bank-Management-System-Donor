<!DOCTYPE html>
<html>
    <head>
        
        <title>Forget Password</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
    	 <?php include 'header.php' ?>
             <fieldset>
    <legend align="center" style="font-size: 2.0em">Forget Password</legend>
             <form action="forgetpass.php" method="post" align="center">

                 <div class="container">
    <label for="enemail"><b>Enter Email</b></label>
    <input type="text" placeholder="Enter Email" name="enemail" required><br>

    <label for="npass"><b>Enter New Password</b></label>
    <input type="text" placeholder="Enter new password" name="npass" required><br>
    
    <br>
    <div class="container" style="background-color:#f1f1f1">
     <button type="submit">Submit</button>
    <label>
        </fieldset>
   </form>
   
    <?php include 'footer.php' ?>

   </body>
</html>
