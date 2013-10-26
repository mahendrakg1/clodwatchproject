<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
        <?php 
        require_once 'cpu.php';
        ?>
        
    </script>
       
       
    </head>
    <body>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <div class="container">
            <h1><a href="#">CLOUD WATCH GRAPH</a></h1>
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <ul class="nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Downloads</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="span2">
                    <ul class="nav nav-list" id="select">
                        <li onclick="loadXMLDoc()"><a href="#">Cpu Utilization</a></li>
                        <li><a href="#">DiskReadBytes</a></li>
                        <li id="3"><a href="diskreadop.php">DiskReadOps</a></li>
                         <li id="4"><a href="diskwrite.php">DiskWriteBytes</a></li>
                         <li id="5"><a href="networkin.php">NetworkIn</a></li>
                         <li><a href="networkout.php">NetworkOut</a></li>
                        <li><a href="statusfailed.php">StatusCheckFailed</a></li>
                       
                    </ul>

                </div>
                <div id="graph" class="span5">

                </div>
                <div id="graph1" class="span5">

                </div>
            </div>



        </div>

        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="js/bootstrap.js"></script>

    </body>
</html>
