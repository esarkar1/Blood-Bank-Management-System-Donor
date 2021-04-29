<!DOCTYPE html>
<html>
    <head>
        
        <title>Change Profile Picture</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <?php include 'header1.php' ?>

<fieldset>
    <legend align="center" style="font-size: 2.0em">Upload Profile Picture</legend>

            <br>
             
              <?php include 'sidebar.php' ?>
            <form action="uploadprofile.php" method="post" enctype="multipart/form-data">
 Select new image to upload:
  <input type="file" name="image" id="image">
  <input type="submit" value="Upload Image" name="submit">

</form>

</table>
  </fieldset>


    <?php include 'footer.php' ?>

   </body>
          
</html>

<?php
error_reporting(0);
if(isset($_POST['submit'])){
  $image_name = $_FILES['image']['name'];
  $image_type = $_FILES['image']['type'];
  $image_size = $_FILES['image']['name'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  

  move_uploaded_file($image_tmp_name,"Customer/$image_name");

  echo "<img src='Customer/$image_name' width='300' height='350'><br>";
}
?>