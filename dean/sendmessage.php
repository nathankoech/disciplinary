<?php 
  error_reporting(E_ERROR);	
  session_start(); 
  include('../connect.php'); 
  ob_start();
  
    $username = $_SESSION['username'];
    $result = mysql_query("SELECT * FROM dean WHERE username='$username'");
	$r = mysql_num_rows($result); 
    if ($r == 0) {
	 header("Location: ../");
	}
?>

<?php
	
$con = "";
if(isset($_POST['se']))
{

$regno = $_POST['regno'];
$subject = $_POST['subject'];
$message = $_POST['message'];
     
		
	$sql1 = mysql_query("INSERT INTO message (regno,subject,message,date_added) 
VALUES('$regno','$subject','$message',now())");
		
	if($sql1)
	{
		$emailSent = true;
	}
	else
	{
		$hasError = true;
  }
	}
else
{
	$con = "";
}


?> 		

<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<head>

		<!-- ==============================================
		Title and Meta Tags
		=============================================== -->
		<meta charset="utf-8">
		<title>Dean - Displinary Management System</title>
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
		<link rel="stylesheet" href="../css/bootstrapValidator.min.css">
		<link rel="stylesheet" href="../css/dean.css">
		
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
                <a class="navbar-brand"> Disciplinary</a>
				
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse novelist-nav">
			   <ul class="nav navbar-nav navbar-left">
                    
                    <li>
                        <a class="user"><?php
			   include('../connect.php');
			   $username =$_SESSION['username'];
			   $result = mysql_query("SELECT * FROM dean WHERE username='$username'");
			   while($row = mysql_fetch_array($result))
						{
						echo $row['username'];
						} ?></a>
                    </li>
				</ul>	
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a href="../dean/">Dashboard</a>
                    </li>
                    <li>
                        <a href="incidentlist.php">Incident Reports</a>
                    </li>
					
                    <li>
                        <a href="message.php">Messages</a>
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
	 Student Section
	 =============================================== -->
	 <section class="dean" id="dean">
     <div class="container">
	 
	 <?php if(isset($hasError)) { //If errors are found ?>
              <p class="alert alert-danger">Please check if you've filled all the fields with valid information and try again. Thank you.</p>
            <?php } ?>

            <?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
              <div class="alert alert-success">
                <p><strong>Message Successfully Saved!</strong></p>
                <p>Thank you for using our Message Form, <strong><?php echo $username;?></strong>! The message has been Sent Successfully.</p>
              </div>
            <?php } ?>
	 
		  <div class="row">
			 <div id="sidebar" class="col-md-3">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h5 class="panel-title">Account Links</h5>
					</div>
					<div id="sidenav" class="panel-body">
					   <ul class="list-unstyled nav sidenav">
					     <li><a href="incidentlist.php">Incident Reports&nbsp;&nbsp;&nbsp;
						 <span class="label label-info">
						 <?php
						   include('../connect.php');
						   $result = mysql_query("SELECT * FROM incident");
						   $num_rows = mysql_num_rows($result);
						   echo $num_rows; ?>
						   </span>
			             </a></li>
						 
						 <hr>
						 <li><a href="message.php">Messages&nbsp;&nbsp;&nbsp;
						 <span class="label label-info">
						 <?php
						   include('../connect.php');
						   $result = mysql_query("SELECT * FROM message");
						   $num_rows = mysql_num_rows($result);
						   echo $num_rows; ?>
						   </span>
						</a></li>
						<li><a href="sendmessage.php">Send Message</a></li>
					  </ul>
					 
					</div>
				</div>
				
			</div>
				
			<div class="col-md-9">
			  
			  <div id="welcome" class="panel panel-success">
			   <div class="panel-heading">
				  <h3 class="panel-title">Message</h3>
			   </div>
			   <div class="panel-body">
			    <form role="form" method="post" id="editform">
				  <div class="form-group">
				    <label>Registraion Number</label>
					<input name="regno" type="text" class="form-control" placeholder="Enter Registration Number...">
				  </div>
				  <div class="form-group">
				    <label>Subject</label>
					<input name="subject" type="text" class="form-control" placeholder="Enter Subject...">
				  </div>
				   <div class="form-group">
				  	<label>Your Message</label>
					<textarea name="message" rows="5" class="form-control" placeholder="Enter Message..."></textarea>
				  </div>
				  
				  <div>
				  <br/><br/>
				  <button type="submit" name="se" class="btn btn-large btn-success full-width">SUBMIT</button><br/><br/>
				  </div>
				</form>
			     	
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
	<script src="../js/bootstrapValidator.min.js"></script>
	<script src="../js/waypoints.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="../js/respond.min.js"></script>
	<script src="../js/html5shiv.js"></script>
	<script src="../js/retina.js"></script>
	<script src="../js/pi.js"></script>
   <script>
	 $(document).ready(function() {
    $('#editform').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
		regno: {
                message: 'The Registration Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Registration Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 15,
                        max: 15,
                        message: 'The Registration Name must be more than 15 and less than 15 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/-]+$/,
                        message: 'The Registration Name can only consist of alphabetical and numbers'
                    }
                }
            },
		subject: {
                message: 'The Subject is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Subject is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The Subject must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z /-''""@_.,]+$/,
                        message: 'The Subject can only consist of alphabetical'
                    }
                }
            },
		 message: {
                message: 'The Message is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Message is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        message: 'The Message must be more than 2 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z /-''""@_.,]+$/,
                        message: 'The Message can only consist of alphabetical and numerals'
                    }
                }
            },
        }
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
