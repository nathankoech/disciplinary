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

<?php
	
$con = "";
if(isset($_POST['register']))
{

$occupation = $_POST['occupation'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$password = $_POST['password'];
$birth = $_POST['birth'];
$gender = $_POST['gender'];
$status = $_POST['status'];
     
		
	$sql1 = mysql_query("INSERT INTO staff (username,password,fname,mname,lname,occupation,birth,gender,status,usertype) 
VALUES('$username','$password','$fname','$mname','$lname','$occupation','$birth','$gender','$status','1')");
	

     
        
	
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
		<link rel="stylesheet" href="../css/bootstrapValidator.min.css">
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
	 
	  <?php if(isset($hasError)) { //If errors are found ?>
              <p class="alert alert-danger">Please check if you've filled all the fields with valid information and try again. Thank you.</p>
            <?php } ?>

            <?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
              <div class="alert alert-success">
                <p><strong>Details Successfully Saved!</strong></p>
                <p>Thank you for using our Add Staff Form, <strong><?php echo $username;?></strong>! The details have been saved successfully.</p>
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
				  <h3 class="panel-title">Add Staff</h3>
			   </div>
			   <div class="panel-body">
			    <form role="form" method="post" id="addstudentform">
				  <div class="form-group">
				    <label>First Name</label>
					<input name="fname" type="text" class="form-control" placeholder="Enter First Name...">
				  </div>
				  <div class="form-group">
				    <label>Middle Name</label>
					<input name="mname" type="text" class="form-control" placeholder="Enter Middle Name...">
				  </div> 
				  <div class="form-group">
				    <label>Last Name</label>
					<input name="lname" type="text" class="form-control" placeholder="Enter Last Name...">
				  </div> 
				  <div class="form-group">
				    <label>Occupation</label>
					<input name="occupation" type="text" class="form-control" placeholder="Enter Occupation...">
				  </div>
				  <div class="form-group">
				    <label>User Name</label>
					<input name="username" type="text" class="form-control" placeholder="Enter Username...">
				  </div>
				  <div class="form-group">
				    <label>Password</label>
					<input name="password" type="password" class="form-control"  placeholder="Enter Password...">
				  </div>
				  <div class="form-group">
				    <label>Birth</label>
					<input name="birth" type="text" class="form-control"  placeholder="Enter Birth...">
				  </div>
				  <div class="form-group">
				    <label>Gender</label>
					<select name="gender" type="text" class="form-control" >
					  <option value="male">Male</option>
					  <option value="female">Female</option>
					 </select>
				  </div>
				  <div class="form-group">
				    <label>Status</label>
					<select name="status" type="text" class="form-control" >
					  <option value="married">Married</option>
					  <option value="single">Single</option>
					  <option value="relationship">In a Relationship</option>
					 </select>
				  </div>
				  
				  <div>
				  <br/><br/>
				  <button type="submit" name="register" class="btn btn-large btn-success full-width">SUBMIT</button><br/><br/>
				  <a href="stafflist.php" class="btn btn-large btn-success full-width">STAFF LIST</a>
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
			occupation: {
                message: 'The Occupation is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Occupation is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The Occupation must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The Occupation can only consist of alphabetical'
                    }
                }
            },
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The username must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The username can only consist of alphabetical and number'
                    },
                    different: {
                        field: 'password',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
           password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must have at least 8 characters'
                    }
                }
            },
			birth: {
                message: 'The Birth is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Birth is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The Birth must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/-]+$/,
                        message: 'The Birth can only consist of alphabetical'
                    }
                }
            },
			gender: {
                message: 'The Gender is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Gender is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The Gender must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The Gender can only consist of alphabetical'
                    }
                }
            },
			status: {
                message: 'The Status is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Status is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The Status must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The Status can only consist of alphabetical'
                    }
                }
            },
        }
    });
});
	</script>
</body>
</html>
