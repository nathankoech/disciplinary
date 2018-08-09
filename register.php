<?php 
include "connect.php";
extract($_POST);
$con = "";
if(isset($_POST['register']))
{

$regno = $_POST['regno'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$password = $_POST['password'];
$birth = $_POST['birth'];
$gender = $_POST['gender'];
$status = $_POST['status'];

   $sql = mysql_query("SELECT * FROM student WHERE regno='$regno'");
	$r = mysql_num_rows($sql); // count the output amount
    if ($r > 0) {
	 $con .= '
  <div class="col-sm-8 col-lg-offset-2"> 

    <div class="alert alert-error">

        <a href="#" class="close" data-dismiss="alert">&times;</a>

        <strong>Error!</strong> The Registration Number has already been used.

    </div>
</div>	

';

	}
	else{
        
		
	$sql1 = mysql_query("INSERT INTO student(username,password,regno,fname,mname,lname,birth,gender,status,accepted) 
VALUES('$username','$password','$regno','$fname','$mname','$lname','$birth','$gender','$status','0')");
	

     
        
	
	if($sql1)
	{
		$con .= '
	<div class="col-sm-8 col-lg-offset-2">	

    <div class="alert alert-success">

        <a href="#" class="close" data-dismiss="alert">&times;</a>

        <strong>Success!</strong> You have registered successfully. Wait for your account to be activated by the Admin. 

    </div>
 </div>	

';
	}
	else
	{
		$con .= '
  <div class="col-sm-8 col-lg-offset-2"> 

    <div class="alert alert-error">

        <a href="#" class="close" data-dismiss="alert">&times;</a>

        <strong>Error!</strong> Your registration was not successfull.

    </div>
</div>	

';
  }
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
		<title>Student Registration</title>
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
	 Contact Section
	 ================================================ -->
	  <section class="login" id="login">
	   <div class="container">
	    <?php echo $con; ?>
	    <div class="row">
		  <div class="col-lg-4 col-lg-offset-4">
				<h1 class="text-center">Student Registration</h1>
				<br>
				<form role="form" method="post" id="regform">
				  <div class="form-group">
				    <label>Registraion Number</label>
					<input name="regno" type="text" class="form-control" placeholder="Enter Registration Number...">
				  </div>
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
				  <a href="../Displinary/" class="btn btn-large btn-success full-width">LOGIN</a>
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
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="js/html5shiv.js"></script>
	<script src="js/retina.js"></script>
	<script src="js/application.js"></script>
	<script src="js/bootstrapValidator.min.js"></script>
	<script src="js/pi.js"></script>
	
	<script>
	 $(document).ready(function() {
    $('#regform').bootstrapValidator({
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
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55127761-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
