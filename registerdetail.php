
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="./assets/ico/favicon.png">
        <title>Registration Form</title>    
        <link href="./dist/css/bootstrap.css" rel="stylesheet">   
        <link href="signin.css" rel="stylesheet">
        <script>
          function validateForm()
          {
             var pass1 = document.forms["myform"]["pass"].value;
             var pass2 = document.forms["myform"]["pass1"].value;
             if (pass1 != pass2)
             {
                alert("password does not matches");
                 return false;
             }
          }
        </script>
    </head>

    <body style="background-image: url('kk.jpg')">
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <div class="container">
            <h1><a href="#">CLOUD WATCH GRAPH</a></h1>
            <?php
            echo "&nbsp&nbsp<b>" . $_GET['msg'] . "</b>";
            ?>
            <form class="form-signin" name="myform"  action="Register.php" method="post" onsubmit="return validateForm();"  >
                <h2 class="form-signin-heading">Register yourself</h2>
                <input type="text" class="form-control" placeholder="User_Name" id="username" name="username"  >
                <input type="text" class="form-control" placeholder="Access Key" name="acess" >
                <input type="password" class="form-control" placeholder="secret Key" name="secret" >
                <input type="password" class="form-control " name="pass"  placeholder="Password" >
                <input type="password" class="form-control " name="pass1"  placeholder="confirm Password">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </form>
          </div> 
    </body>
</html>
