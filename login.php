<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="./assets/ico/favicon.png">
        <title>sign in form</title>   
        <link href="./dist/css/bootstrap.css" rel="stylesheet">   
        <link href="signin.css" rel="stylesheet">
        <script>
            function validateForm()
            {
                var x = document.forms["signinform"]["emailid"].value;
                if (x == "")
                {
                    alert("enter email id");
                    return false;
                }
                else
                {
                    var y = document.forms["signinform"]["pass"].value;
                    if (y == "")
                    {
                        alert("enter password");
                        return false;
                    }

                }
            }

        </script>
    </head>
    <body style="background-image: url('kk.jpg')">
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <div class="container">
            <h1><a href="#">CLOUD WATCH GRAPH</a></h1>
            <div class="page-header" >
                <center><h2>Welcome to cloud watch website  <br/> you can see your usage graph</h2></center>
            </div>
            <div class="container">
                <?php
                echo "&nbsp&nbsp<b>" . $_GET['msg'] . "</b>";
                ?>
                <form class="form-signin" name="signinform" action ="sign_process.php" method="post" onsubmit="return validateForm();">
                    <h2 class="form-signin-heading">Please sign in</h2>
                    <input type="text" class="form-control" name="user_name" placeholder="User Name" >
                    <div class="row">
                        <li class="span12"><a href="#">      </a></li></div>
                    <input type="password" class="form-control" name="pass"  placeholder="Password">
                    <div class="row">
                        <li class="span12"><a href="#">      </a></li></div>
                    <button class="btn btn-primary btn-large"  type="submit">Sign in</button><br/>
                </form>
            </div>
        </div> 
    </body>
</html>
