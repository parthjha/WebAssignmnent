<?php     
         session_start();
         $name=$_SESSION['name'];     
         echo'welcome :'. $name.'<br>';
         echo'<a href="logout.php">Signout</a>'.'<br>'.'<br>';
          echo'<a href="submission.php">Purachase INFO Submission Form</a>'.'<br>'.'<br>'; 
          echo'<a href="listoforder.php">List Of Purachase Order</a>'.'<br>'.'<br>';
?>