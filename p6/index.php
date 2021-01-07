<?php
require_once './php/db_connect.php';

$n = mysqli_real_escape_string($db, $_POST['name']);
$g = mysqli_real_escape_string($db, $_POST['gender']);
?>

<html lang="en">
<head><script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "hints.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>Project 6</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Bootstrap Css -->
    <link href="bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style -->
    <link href="plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="plugins/Lightbox/dist/css/lightbox.css" rel="stylesheet">
    <link href="plugins/Icons/et-line-font/style.css" rel="stylesheet">
    <link href="plugins/animate.css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
     <link href="mycss.css" rel="stylesheet">
    <!-- Icons Font -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Preloader
	============================================= -->
    <div class="preloader"><i class="fa fa-circle-o-notch fa-spin fa-2x"></i></div>
    <!-- Header
	============================================= -->
    <section class="main-header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="myimg/logo/logo.png" class="img-responsive" alt="logo"></a>
                </div>
                <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                    <div class="col-md-8 col-xs-12 nav-wrap">
                        <ul class="nav navbar-nav">
                            <li><a href="#welcome" class="page-scroll">Home</a></li>
                            <li><a href="#services" class="page-scroll">Baby Names</a></li>
                            <li><a href="#portfolio" class="page-scroll">Results</a></li>
                           <!-- <li><a href="#team" class="page-scroll">About</a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <br>
       
    </section>

    <!-- Welcome
	============================================= -->
    
    <section id="welcome">
        <div class="container">
            <h2>Welcome To <span> Baby Name Voting</span></h2>
            <hr class="sep">
            <p></p>
            <img class="img-responsive center-block wow fadeInUp" data-wow-delay=".3s" src="myimg/welcome/welcome.png" alt="logo">
        </div>
    </section>

    <!-- Services

	============================================= -->
        
         <section id="services">
        <div class="container">
                <h2>Vote for the names</h2>
                <hr class="light-sep">
                <p>This site will let you vote on different baby names</p>
            </div>
        </div>
  
    
            
            
            <form action="index.php" method="post">
            <p>Please enter a name to be added to the list of names. </p> 
                 <p>Gender:
      <input type="radio" id="male" name = "gender" <?php if (isset($g) && $g=="M") echo "checked";?> value="Male" checked/> Male
      <input type="radio" id="female" name = "gender" <?php if (isset($g) && $g=="F") echo "checked";?> value="Female" /> Female
      
             </p>
                <input type="text" name="name" onkeyup="showHint(this.value)"><br>
            <p>Suggested: <span id="txtHint"></span></p>    
           
            
            <br>
            <input type="submit">
            </form>
    
        </section>
     <!-- Portfolio
	============================================= -->
    <section id="portfolio">
        <div class="container-fluid">
           <h2>Results</h2>
            <?php 
    // $n = mysqli_real_escape_string($db, $_POST['name']);
   // $g = mysqli_real_escape_string($db, $_POST['gender']);
    
    
    $selectStmt = "SELECT * FROM `newbabynames` WHERE `name` = '$n' AND `gender` = '$g';";
    $result = $db->query($selectStmt);
            
            
            
      
    if ($result->num_rows )
    {
        // ITS NOT PROPERLY UPDATING IT KEEPS GOING TO THE ELSE
        //UPDATES THE VOTE +1 IF THE NAME AND GENDER ARE EQUAL
        $statement = "UPDATE `newbabynames` SET `vote` = `vote` + 1 WHERE `name` = '$n' AND `gender` = '$g';";
    }
    else
        // IF NOT ALREADY IN THE TABLE WE ADD IT TO THE TABLE
    {
       $statement = "INSERT INTO `newbabynames` (`id`, `name`,`gender`,`vote`) VALUES (NULL, '$n','$g','1');";
    
    
        
    }
    
    
?>

       <?php
if($db->query($statement)) {
    echo '        <div class="alert alert-success">Values updated/inserted successfully.</div>' . PHP_EOL;
} else {
    echo '        <div class="alert alert-danger">Something failed: (' . $db->errno . ') ' . $db->error . '</div>' . PHP_EOL;
    exit();
}
    
?> 
   
    
    <?php
    
$malebabies = "SELECT DISTINCT * FROM `newbabynames` WHERE `gender` = 'M' ORDER BY `vote`  DESC;";
$femalebabies = "SELECT DISTINCT * FROM `newbabynames` WHERE `gender` = 'F' ORDER BY `vote` DESC;"; 

    
$result = $db->query($malebabies);
$result2 = $db->query($femalebabies);
    ?>
<div class="row col-md-12">
    <div class="col-md-6 portfolio-item">
        
    <h2>Boy Names</h2>
        <img class="img-responsive center-block wow fadeInUp" data-wow-delay=".3s" src="myimg/welcome/welcome2.png" alt="logo">
        
    <table>
    <tr>
        <td><span id="boy">Rank</span></td>
        <td><span id="boy">Name</span></td>
        <td><span id="boy">Votes</span></td>
    </tr>
        
        <?php
        $count = 1;
        while (($row = $result->fetch_assoc()) && ($count < 11))
        {
            echo "<tr>";
            echo "<td>".$count."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["vote"]."</td>";
            echo "</tr>";
            
            $count += 1;
        }
        ?>
        <br>
    </table>
    </div>
    <div class="col-md-6 portfolio-item">
     <h2>Girl Names</h2>
        <img class="img-responsive center-block wow fadeInUp" data-wow-delay=".3s" src="myimg/welcome/welcome3.png" alt="logo">
    <table>
    <tr>
        <td><span id="girl">Rank</span></td>
        <td><span id="girl">Name</span></td>
        <td><span id="girl">Votes</span></td>
    </tr>
        
        <?php
        $count = 1;
        while (($row = $result2->fetch_assoc()) && ($count < 11))
        {
            echo "<tr>";
            echo "<td>".$count."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["vote"]."</td>";
            echo "</tr>";
            
            $count += 1;
        }
      

        $db->close();
        ?>
        <br>
    </table>
    </div>
</div>
            

     
            
    </section>
    
    

    
  
    
    
   <!-- TEAM
	============================================= -->
        
         <!--
     <section id="team">
        <div class="container">
            <h2>Developer and Designer</h2>
            <hr class="sep">
            <p></p>
            <div class="row wow fadeInUp" data-wow-delay=".3s">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <div class="team">
                        <img class="img-responsive center-block" src="myimg/profile/profile.png" alt="2">
                        <h4>Salomon Yanez</h4>
                        <p>Developer and Designer</p>
                        <div class="team-social-icons">
                            <a href="https://voodooraptor.blogspot.com/"><img class="img-responsive center-block" src="myimg/blogger/bloggericon.png" alt="1"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                   
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <!-- Footer
	============================================= -->
    <footer>
        <section id="Credit">
        <div class="container">
            <h1>Credit</h1>
            <p id = "footertext"> If you're interested in the template I used it was <a href="https://shapebootstrap.net/item/1525198-rise-multipurpose-html5-template" >RISE</a>.
            </p>
            <br>
            
            <h6>Salomon Yanez - Florida Atlantic University</h6>
        </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-assets/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- JS PLUGINS -->
    <script src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="plugins/countTo/jquery.countTo.js"></script>
    <script src="plugins/inview/jquery.inview.min.js"></script>
    <script src="plugins/Lightbox/dist/js/lightbox.min.js"></script>
    <script src="plugins/WOW/dist/wow.min.js"></script>
    <!-- GOOGLE MAP -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
</body>

</html>