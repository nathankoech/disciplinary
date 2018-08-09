<?php 
  error_reporting(E_ERROR);	
  session_start(); 
  include('../connect.php'); 
  ob_start();
  
    $username = $_SESSION['username'];
    $result = mysql_query("SELECT * FROM admin WHERE username='$username'");
	$r = mysql_num_rows($result); 
    if ($r == 0) {
	 header("Location: ../");
	}
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<head>

		<!-- ==============================================
		Title and Meta Tags
		=============================================== -->
		<meta charset="utf-8">
		<title>Admin - Displinary Management System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<!-- ==============================================
		Favicons
		=============================================== --> 
		<link rel="shortcut icon" href="img/favicons/favicon.ico">
		<link rel="apple-touch-icon" href="img/favicons/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png">
		
		<!-- ==============================================
		CSS
		=============================================== --> 
		<link rel="stylesheet" href="../css/bootstrap.css">   
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/font-awesome.css">
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/animate.min.css">
		<link rel="stylesheet" href="../css/admin.css">
		
		<!-- ==============================================
		Fonts
		=============================================== -->
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
		
		
		<!-- ==============================================
		Feauture Detection
		=============================================== -->
		<script src="../js/modernizr-2.6.2.min.js"></script>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
     </head>

<body>
     
	  <!-- ==============================================
	 Navbar Section
	 =============================================== --> 
     <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".novelist-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"> Displinary</a>
				
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse novelist-nav">
			   <ul class="nav navbar-nav navbar-left">
                    
                    <li>
                        <a class="user"><?php
			   include('../connect.php');
			   $username =$_SESSION['username'];
			   $result = mysql_query("SELECT * FROM admin WHERE username='$username'");
			   while($row = mysql_fetch_array($result))
						{
						echo $row['username'];
						} ?></a>
                    </li>
				</ul>	
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a href="../admin/">Dashboard</a>
                    </li>
                    <li>
                        <a href="studentslist.php">Students</a>
                    </li>
					
                    <li>
                        <a href="stafflist.php">Staff</a>
                    </li>
					<li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;Account<b>
			  </b> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </div>
	
	 <!-- ==============================================
	 Admin Section
	 =============================================== -->
	 <section class="admin" id="admin">
     <div class="container">
		  <div class="row">
			 <div id="sidebar" class="col-md-3">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h5 class="panel-title">Account Links</h5>
					</div>
					<div id="sidenav" class="panel-body">
					   <ul class="list-unstyled nav sidenav">
					     <li><a href="studentslist.php">Students</a></li>
						 <li><a href="addstudent.php">Add Student</a></li>
						 <li><a href="acceptstudent.php">Accept Student&nbsp;&nbsp;&nbsp;
						 <span class="label label-info">
						 <?php
			   include('../connect.php');
			   $result = mysql_query("SELECT * FROM student WHERE accepted=0");
               $num_rows = mysql_num_rows($result);
               echo $num_rows; ?>
			   </span>
			             </a></li>
						 <hr>
						 <li><a href="stafflist.php">Staff</a></li>
						 <li><a href="addstaff.php">Add Staff</a></li>
						 <hr>
						 <li><a href="deanlist.php">Dean</a></li>
						 <li><a href="adddean.php">Add Dean</a></li>
					  </ul>
					 
					</div>
				</div>
				
			</div>
				
			<div class="col-md-9">
			  
	         <div id="welcome" class="panel panel-success">
			   <div class="panel-heading">
				  <h3 class="panel-title">Staff Members</h3>
			   </div>
			   <div class="panel-body">
			     <div class="table-responsive">
			     <table class="table table-bordered table-hover table-striped tablesorter">
								  <thead>
									<tr>
									  <th>Name</th>
									  <th>Username</th>
									  <th>Password</th>
									  <th>Occupation</th>
									  <th>Action</th>
									</tr>
								  </thead>
								  <tbody>
									<?php
			include('../connect.php');
			$result = mysql_query("SELECT * FROM staff");
					while($row = mysql_fetch_array($result))
						{
							echo '<tr>';
							echo '<td>'.$row['fname'].'&nbsp;'.$row['mname'].'&nbsp;'.$row['lname'].'</td>';
							echo '<td>'.$row['username'].'</td>';
							echo '<td>'.$row['password'].'</td>';
							echo '<td>'.$row['occupation'].'</td>';
							echo '<td>
							<a class="btn btn-success" href="editstaff.php?id=' . $row['id'] . '"><i class="icon-edit icon-large"></i>&nbsp;Edit</a>
							<a class="btn btn-danger" id="'.$row['id'].'" ><i class="icon-trash icon-large"></i>&nbsp;Delete</a></td>';
							echo '</tr>';
						}
			?>
									
								  </tbody>
								</table>
				 </div>						
			   </div>
			   </div>
			
			   
			  </div>
			  
			 </div>
			</div>
		  	</section>   

	
	<!-- ==============================================
	 Scripts
	 =============================================== -->
	 
	<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/waypoints.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="../js/respond.min.js"></script>
	<script src="../js/html5shiv.js"></script>
	<script src="../js/retina.js"></script>
	<script src="../js/pi.js"></script>
    <script type="text/javascript">
$(function() {


$(".btn-danger").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var id = element.attr("id");

//Built a url to send
var info = 'id=' + id;
 if(confirm("Are you sure you want to delete this Record?"))
		  {
        var parent = $(this).parent().parent();
            $.ajax({
             type: "GET",
             url: "deletestaff.php",
             data: info,
             success: function()
                   {
                    parent.fadeOut('slow', function() {$(this).remove();});
                   }
            });
         

          }
       return false;

    });

});
</script>
	<script type="text/javascript">
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
   </script>
</body>
</html>
