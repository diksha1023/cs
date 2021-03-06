<?php

session_start(); //gets session id from cookies, or prepa

if (session_id() == '' || !isset($_SESSION['u']) || !isset($_SESSION['p'])) { //if sid exists and login for sid exists
	header('Location: /');
}
  
else {

	require('db.php');
	$query = "SELECT fname,lname,email from `users-test` WHERE email='".$_SESSION['u']."'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_row($result);	

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Circuitstock SignUp/Login</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1"> 
            
            <title>Circuitstock SignUp/Login</title>
            
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/bootstrap-theme.min.css" rel="stylesheet" />

            <link rel="stylesheet" type="text/css" href="css/custom.css">
            <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
            
            <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300' rel='stylesheet' type='text/css'/>
		    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'/>
		    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"/>
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

		<style>
            body { background-image:url('images/bb.png') !important;}
			th,tr,td{padding:10px 10px 10px 10px;border-bottom: 1px solid #ddd; font-family:Roboto; color:white;}
			th{font-size:20px;}
			tr:hover {background-color: rgba(0,0,0,0.9);}
		</style>

    </head>
    <body class="my-body" style=" overflow-x: hidden;">
        <nav class="navbar navbar-fixed-top">
		  <div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand brnd"  href="index.php">Circuitstock</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse smallnav" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav" style="width:87%">
				<li><a class="navlink" href="index.php">HOME</a></li>
				<li><a class="navlink" href="products.php">PRODUCTS</a></li>
				<li><a class="navlink"  href="dropper.php">CIRCUIT DROPPER</a></li>
				<li><a class="navlink" href="contact.php">CONTACT US</a></li>
                <li class="active"><a class="navlink" href="index.php" style="color:#00ccff;">PROFILE <span class="sr-only">(current)</span></a></li>
				<li class="pull-right">				</li>

                           
                <li class="dropdown pull-right">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $row[0]." ".$row[1]; ?><img src="images/default.jpg" style="width:25px; height:25px; border-radius:100%; "/><span class="caret"></span></a>
				  <ul class="dropdown-menu ">
					<li><a href="#">My Profile</a></li>
					<li><a href="#"><a href="logout.php">Logout</a></a></li>
				  </ul>
				</li>    
			</ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

        <br><br><br>
		<div class="row" >
			<div class="col-sm-12">
			<center><img src="images/cstock.jpg"/></center>
			</div>
		</div> 

        <br><hr>


        </br>

        <div class="container">
			
			<div class="row" >
				
				<div class="col-md-12" style="box-shadow:0.5px 0.5px 10px grey ">
				
					<div class="row" style="margin-top:30px; margin-left:30px;">
						<div class="col-md-2">
							<img src="images/default.jpg" style="width:120px; height:120px;border-radius:20%;"/>						</div>
						<div class="col-md-6">
							<div style="font-family: 'Open Sans Condensed', sans-serif; font-size:50px; color:white;"><?php echo $row[0]." ".$row[1]; ?></div>							
                            <div style="font-family: 'Open Sans Condensed', sans-serif; font-size:20px; color:white; font-weight:bold;"><?php echo $row[2]; ?></div>						
                            <div style="font-family: 'Open Sans Condensed', sans-serif; font-size:20px;color:#1d58d6;">Loyalty Points : 0</div>							
							
						</div>
					</div>
					<br>
				
				</div>
			</div>
		
			<br><br>
			<div class="row" >
				
				<div class="col-sm-12" ">
					
					<div class="row" style="margin-top:30px; margin-left:30px;">
						
						<div class="col-md-12">
							<div style="font-family: 'Open Sans Condensed', sans-serif; font-size:50px;color:white;"><b>Your Orders</b></div>
						</div>
						<br><br><br><br><br><br>
						<div class="col-md-12" >
							<table style="letter-spacing:1px;">
							<tr ><th>SNo.</th><th>Customer Name</th><th>E-mail</th><th>Institutuion</th><th>Order Description</th><th>Circuit</th><th></th></tr>							</table>
							<br><br>
							
						</div>
					
					</div>
				
				</div>
				
			</div>
		
		
		
		
		</div>-->

        <br><br><br><br>

<!-- ====================================================== FOOTER =======================================================-->
		<div style="width:100%;">
		<div class="row" style="background-color:#392714; margin-right:0px;" ><br><br>
		
			<div class="col-sm-12"style="font-size:18px; font-family: 'Open Sans Condensed', sans-serif;">
			 <a href="index.php" style="color:white"><span style="margin-left:30px;">Home</span></a>
			 <a href="products.php" style="color:white"><span style="margin-left:30px;">Products</span></a>
			 <a href="dropper.php" style="color:white"><span style="margin-left:30px;">Order </span></a>
			 <a href="contact.php" style="color:white"><span style="margin-left:30px;">Contact</span></a>
			</div>
			
			</br></br></br>
			
			<div style="width:90px;margin-left:auto; margin-right:auto;">			
				<p><a href="#" style="color:white">  DISCLAIMER</a> </p>				
			</div>
	
			<div style="width:200px;margin-left:auto; margin-right:auto;">					
				<p style="color:#999999; ">  &copy; | Circuitstock | @India | 2016</p>	
			</div>
			
		</div>
		</div>
<!--======================================================= FOOTER ENDS =======================================================-->
      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>        

    </body>
    </html>

 <?php 

}

?>