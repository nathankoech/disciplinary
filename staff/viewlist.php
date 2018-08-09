<?php 
  error_reporting(E_ERROR);	
  session_start(); 
  include('../connect.php'); 
  ob_start();
  
    $username = $_SESSION['username'];
    $result = mysql_query("SELECT * FROM staff WHERE username='$username'");
	$r = mysql_num_rows($result); 
    if ($r == 0) {
	 header("Location: ../");
	}
?>

<?php
include('../connect.php');
$id = $_GET['id'];
$result = mysql_query("SELECT * FROM incident WHERE id='$id'");

while($row = mysql_fetch_array($result))
  {
    $id=$row['id'];
	$uname=$row['username'];
	$lecid=$row['regno'];
	$fname=$row['fname'];
	$mname=$row['mname'];
	$lname=$row['lname'];
	$subject=$row['subject'];
	$subject=$row['offender'];
	$subject=$row['incidentcategory'];
	$subject=$row['context'];
	$subject=$row['campuslocation'];
	$subject=$row['outsidelocation'];
	$subject=$row['incidenttime'];
	$subject=$row['date'];
	$subject=$row['month'];
	$subject=$row['year'];
	$subject=$row['reportedby'];
	$message=$row['message'];
	$date_added=$row['date_added'];
  }
?>	

<?php 
extract($_POST);
$uid = time();
$con = "";
if(isset($_POST['register']))
{

$id = $_POST['id'];
$username = $_POST['username'];
$regno = $_POST['lecid'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$subject = $_POST['subject'];
$offender = $_POST['offender'];
$incidentcategory = $_POST['incidentcategory'];
$context = $_POST['context'];
$campuslocation = $_POST['campuslocation'];
$outsidelocation = $_POST['outsidelocation'];
$incidenttime = $_POST['incidenttime'];
$date = $_POST['date'];
$month = $_POST['month'];
$year = $_POST['year'];
$reportedby = $_POST['reportedby'];
$message = $_POST['message'];

$sql1 = mysql_query("UPDATE incident SET regno='$regno', username='$username', fname='$fname', mname='$mname', lname='$lname', subject='$subject', offender='$offender', incidentcategory='$incidentcategory', campuslocation='$campuslocation', outsidelocation='$outsidelocation', incidenttime='$incidenttime', date='$date', month='$month', year='$year', reportedby='$reportedby', message='$message' WHERE id='$id'");

	$r = mysql_num_rows($sql1); // count the output amount
    if ($r > 0)
	{
	   
		$hasError = true;
	}
	else
	{
		$emailSent = true;
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
		<title>Staff - Displinary Management System</title>
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
		<link rel="stylesheet" href="../css/bootstrapValidator.min.css">
		<link rel="stylesheet" href="../css/student.css">
		
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
			   $result = mysql_query("SELECT * FROM staff WHERE username='$username'");
			   while($row = mysql_fetch_array($result))
						{
						echo $row['username'];
						} ?></a>
                    </li>
				</ul>	
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a href="../staff/">Dashboard</a>
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
	 <section class="student" id="student">
     <div class="container">
	  
	  <?php if(isset($hasError)) { //If errors are found ?>
              <p class="alert alert-danger">Please check if you've filled all the fields with valid information and try again. Thank you.</p>
            <?php } ?>

            <?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
              <div class="alert alert-success">
                <p><strong>Message Successfully Updated!</strong></p>
                <p>Thank you for using our incident report form, <strong><?php echo $username;?></strong>! Your email was updated successfully.</p>
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
						   $result = mysql_query("SELECT * FROM incident WHERE username='$username'");
						   $num_rows = mysql_num_rows($result);
						   echo $num_rows; ?>
						   </span>
			             </a></li>
						 
						 <hr>
						 <li><a href="message.php">Messages From Dean&nbsp;&nbsp;&nbsp;
						 <span class="label label-info">
						 <?php
						   include('../connect.php');
						   $result = mysql_query("SELECT * FROM message WHERE username='$username'");
						   $num_rows = mysql_num_rows($result);
						   echo $num_rows; ?>
						   </span>
						</a></li>
					  </ul>
					 
					</div>
				</div>
				
			</div>
				
			<div class="col-md-9">
			  
	         <div id="welcome" class="panel panel-success">
			   <div class="panel-heading">
				  <h3 class="panel-title">Edit Incident Form</h3>
			   </div>
			   <div class="panel-body">
			    <form role="form" method="post" id="addstudentform">
				   <div class="form-group">
				   <input name="id" type="hidden" value="<?php echo $id?>" class="form-control">
				   <input name="username" type="hidden" value="<?php echo $username?>" class="form-control">
				    <label>Lecturer ID</label>
					<input name="lecid" type="text" value="<?php echo $lecid?>" class="form-control" readonly="readonly">
				  </div> 
				  <div class="form-group">
				    <label>First Name</label>
					<input name="fname" type="text" value="<?php echo $fname?>" class="form-control" readonly="readonly">
				  </div>
				  <div class="form-group">
				    <label>Middle Name</label>
					<input name="mname" type="text" value="<?php echo $mname?>" class="form-control" readonly="readonly">
				  </div> 
				  <div class="form-group">
				    <label>Last Name</label>
					<input name="lname" type="text" value="<?php echo $lname?>" class="form-control" readonly="readonly">
				  </div> 
				 <div class="form-group">
				    <label>Subject</label>
					<input name="subject" type="text" value="<?php echo $subject?>" class="form-control">
				  </div>
				   <div class="form-group">
				    <label>Offender</label>
					<input name="offender" type="text" value="<?php echo $offender?>" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Incident Category</label>
					<input name="incidentcategory" type="text" value="<?php echo $incidentcategory?>" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Context</label>
					<input name="context" type="text" value="<?php echo $context?>" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Campus Location</label>
					<input name="campuslocation" type="text" value="<?php echo $campuslocation?>" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Outside Location</label>
					<input name="outsidelocation" type="text" value="<?php echo $outsidelocation?>" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Incident Time</label>
					<input name="incidenttime" type="text" value="<?php echo $incidenttime?>" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Date</label>
					<input name="date" type="text" value="<?php echo $date?>" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Month</label>
					<input name="month" type="text" value="<?php echo $month?>" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Year</label>
					<input name="year" type="text" value="<?php echo $year?>" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Reported By</label>
					<input name="reportedby" type="text" value="<?php echo $reportedby?>" class="form-control">
				  </div>
				  <div class="form-group">
				  	<label>Message</label>
					<textarea name="message" rows="7"  class="form-control"><?php echo $message?></textarea>
				  </div>
				  
				  <div>
				  <br/><br/>
				  <button type="submit" name="register" class="btn btn-large btn-success full-width">SUBMIT</button><br/><br/>
				  <a href="incidentlist.php" class="btn btn-large btn-success full-width">INCIDENT LIST</a>
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
	<script src="../js/waypoints.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="../js/respond.min.js"></script>
	<script src="../js/html5shiv.js"></script>
	<script src="../js/retina.js"></script>
	<script src="../js/bootstrapValidator.min.js"></script>
	<script src="../js/pi.js"></script>
	<script type="text/javascript">
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
   </script>
    <script>
	 $(document).ready(function() {
    $('#addstudentform').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
		lecid: {
                message: 'The Lecturer ID is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Lecturer ID is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 15,
                        message: 'The Lecturer ID must be more than 15 and less than 15 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/-]+$/,
                        message: 'The Lecturer ID can only consist of alphabetical and numbers'
                    }
                }
            },
		fname: {
                message: 'The First name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The First name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The First name must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The First name can only consist of alphabetical'
                    }
                }
            },
		 mname: {
                message: 'The Middle name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Middle name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The Middle name must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The Middle name can only consist of alphabetical'
                    }
                }
            },
			lname: {
                message: 'The Last name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Last name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The Last name must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The Last name can only consist of alphabetical'
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
                        regexp: /^[a-zA-Z0-9 /-]+$/,
                        message: 'The Subject can only consist of alphabetical'
                    }
                }
            },
			offender: {
                message: 'The Offender is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Offender is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The Offender must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The Offender can only consist of alphabetical'
                    }
                }
            },
			incidentcategory: {
                message: 'The Incident Category is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Incident Category is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        message: 'The Incident Category must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z .]+$/,
                        message: 'The Incident Category can only consist of alphabetical'
                    }
                }
            },
			context: {
                message: 'The Context is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Context is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        message: 'The Context must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z .]+$/,
                        message: 'The Context can only consist of alphabetical'
                    }
                }
            },
			campuslocation: {
                message: 'The Campus Location is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Campus Location is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        message: 'The Campus Location must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z .]+$/,
                        message: 'The Campus Location can only consist of alphabetical'
                    }
                }
            },
			outsidelocation: {
                message: 'The Outside Location is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Outside Location is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        message: 'The Outside Location must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z .]+$/,
                        message: 'The Outside Location can only consist of alphabetical'
                    }
                }
            },
			incidenttime: {
                message: 'The Incident Time is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Incident Time is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The Incident Time must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 .]+$/,
                        message: 'The Incident Time can only consist of alphabetical'
                    }
                }
            },
			date: {
                message: 'The Date is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Date is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 .]+$/,
                        message: 'The Date can only consist of alphabetical'
                    }
                }
            },
			month: {
                message: 'The Month is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Month is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 .]+$/,
                        message: 'The Month can only consist of alphabetical'
                    }
                }
            },
			year: {
                message: 'The Year is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Year is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 .]+$/,
                        message: 'The Year can only consist of alphabetical'
                    }
                }
            },
			reportedby: {
                message: 'The Reported By is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Reported By is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The Reported By must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 .]+$/,
                        message: 'The Reported By can only consist of alphabetical'
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
                        message: 'The Message must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 /-''""]+$/,
                        message: 'The Message can only consist of alphabetical and numericals'
                    }
                }
            },
        }
    });
});
	</script>
   
   
</body>
</html>
