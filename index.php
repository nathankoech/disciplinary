<?php 
   error_reporting(E_ERROR);	
   session_start(); 
   include('connect.php');	
   ob_start();

$message="";
if(count($_POST)>0) { 

$password = $_POST["password"];
$username = $_POST["username"];
$usertype = $_POST["usertype"];

   switch ($usertype) {
   
    case 'admin':

		$result = mysql_query("SELECT * FROM admin WHERE username='" .$username. "' and password = '". $password."' AND admin.usertype=1");
		$row  = mysql_fetch_array($result);
		if(is_array($row)) {
			$_SESSION["id"] = $row['id'];
			$_SESSION["username"] = $row['username'];
			header("Location: admin/");
		} else {
			$message .= '
			<div class="col-lg-4 col-lg-offset-4">	
		
			<div class="alert alert-error">
		
				<a href="#" class="close" data-dismiss="alert">&times;</a>
		
				<strong>Error!</strong> Invalid Username Or Password.
		
			</div>
		 </div>	
		
		';
		}
	 break;
	 	
	case 'dean':
	    
		$result = mysql_query("SELECT * FROM dean WHERE username='" .$username. "' and password = '". $password."' AND dean.usertype=1");
		$row  = mysql_fetch_array($result);
		if(is_array($row)) {
			$_SESSION["id"] = $row['id'];
			$_SESSION["username"] = $row['username'];
			header("Location: dean/");
		} else {
			$message .= '
			<div class="col-lg-4 col-lg-offset-4">	
		
			<div class="alert alert-error">
		
				<a href="#" class="close" data-dismiss="alert">&times;</a>
		
				<strong>Error!</strong> Invalid Username Or Password.
		
			</div>
		 </div>	
		
		';
		}
	
	break;
		
	case 'staff':
	    
		$result = mysql_query("SELECT * FROM staff WHERE username='" .$username. "' and password = '". $password."' AND staff.usertype=1");
		$row  = mysql_fetch_array($result);
		if(is_array($row)) {
			$_SESSION["id"] = $row['id'];
			$_SESSION["username"] = $row['username'];
			header("Location: staff/");
		} else {
			$message .= '
			<div class="col-lg-4 col-lg-offset-4">	
		
			<div class="alert alert-error">
		
				<a href="#" class="close" data-dismiss="alert">&times;</a>
		
				<strong>Error!</strong> Invalid Username Or Password.
		
			</div>
		 </div>	
		
		';
		}
	
	break;
	
    case 'student':
	
	    $result = mysql_query("SELECT * FROM student WHERE username='" .$username. "' and password = '". $password."' AND student.accepted=1");
		$row  = mysql_fetch_array($result);
		if(is_array($row)) {
			$_SESSION["id"] = $row['id'];
			$_SESSION["username"] = $row['username'];
			header("Location: student/");
		} else {
			$message .= '
			<div class="col-lg-4 col-lg-offset-4">	
		
			<div class="alert alert-error">
		
				<a href="#" class="close" data-dismiss="alert">&times;</a>
		
				<strong>Error!</strong> Invalid Username Or Password.
		
			</div>
		 </div>	
		
		';
		}
		
	break;
	
	default:
	 $message .= '
			<div class="col-lg-4 col-lg-offset-4">	
		
			<div class="alert alert-error">
		
				<a href="#" class="close" data-dismiss="alert">&times;</a>
		
				<strong>Error!</strong> Invalid Username Or Password.
		
			</div>
		 </div>	
		
		';
		
	break;	
		
 }
 
 }
?>
<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<head>

		<!-- ==============================================
		Title and Meta Tags
		=============================================== -->
		<meta charset="utf-8">
		<title>Displinary Management System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		
		<!-- ==============================================
		CSS
		=============================================== --> 
		<link rel="stylesheet" href="css/bootstrap.css">   
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/bootstrapValidator.min.css">
		<link rel="stylesheet" href="css/displinary.css">
		
		
		
		<!-- ==============================================
		Feauture Detection
		=============================================== -->
		<script src="js/modernizr-2.6.2.min.js"></script>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
     </head>

<body>

     <!-- ==============================================
	 Login Section
	 ================================================ -->
	  <section class="login" id="login">
	   <div class="container">
	    <?php echo $message; ?>
	    <div class="row">
		  <div class="col-lg-4 col-lg-offset-4">
				<h1 class="text-center">Displinary Management System</h1>
				<br>
				<form method="post" id="loginform"> 
				  <div class="form-group">
				    <label for="name">Username</label>
					<input name="username" type="text" class="form-control" placeholder="Enter Username...">
				  </div>
				  <div class="form-group">
				    <label for="password">Password</label>
					<input name="password" type="password" class="form-control"  placeholder="Enter Password...">
				  </div>
				  <div class="form-group">
				    <label for="usertype">User Type</label>
					<select name="usertype" type="text" class="form-control" >
					  <option value="admin">Admin</option>
					  <option value="dean">Dean</option>
					  <option value="staff">Staff</option>
					  <option value="student">Student</option>
					 </select>
				  </div>
				  <div>
				  <br/>
				  <button type="submit" name="login" class="btn btn-large btn-success full-width">SUBMIT</button><br/><br/>
				  <a href="register.php" class="btn btn-large btn-success full-width">STUDENT REGISTRATION</a>
				  </div>
				</form>
			</div><!-- /.col-lg-7 -->
			
			
		 </div><!-- /.row -->	
	  </div><!-- /.container -->
	</section>
	
	<!-- ==============================================
	 Scripts
	 =============================================== -->
	 
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/respond.min.js"></script>
	<script src="js/html5shiv.js"></script>
	<script src="js/retina.js"></script>
	<script src="js/application.js"></script>
	<script src="js/bootstrapValidator.min.js"></script>
	<script src="js/pi.js"></script>
	<script>
	 $(document).ready(function() {
    $('#loginform').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
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
                        min: 4,
                        message: 'The password must have at least 4 characters'
                    }
                }
            },
        }
    });
});
	</script>
	
</body>
</html>
