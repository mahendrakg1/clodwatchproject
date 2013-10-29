<?php
include 'dbconnect.php';

 $sql="select * from user_details"; 
      $result=mysqli_query($con,$sql);
      $i=0;
      while($row=  mysqli_fetch_array($result))
      {
         if($row[1]==$_POST['user_name'])
         {  global $i;
         $i=1;
             break;
         }
      }
      if($i==1){
      if($row[2]==$_POST['pass']){
          session_start();
          $_SESSION['name']=$row[1];
          $_SESSION['id']=$row[0];
          $_SESSION['email_id']=$row[3];
          $_SESSION['status']="login";
          header("Location: gui.php?msg= welcome  $row[1] ");
          
      }
      else 
     header("Location: login.php?msg= incorrect password ");    
       
      }
      else
         header("Location: login.php?msg= incorrect user name");
         

?>
