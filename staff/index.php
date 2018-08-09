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
$username = $_SESSION['username'];
$result = mysql_query("SELECT * FROM staff WHERE username='$username'");

while($row = mysql_fetch_array($result))
  {
    $id=$row['id'];
	$uname=$row['username'];
	$password=$row['password'];
	$lecid=$row['lecid'];
	$fname=$row['fname'];
	$mname=$row['mname'];
	$lname=$row['lname'];
	$birth=$row['birth'];
	$gender=$row['gender'];
	$status=$row['status'];
  }
?>	

<?php
	
$con = "";
if(isset($_POST['register']))
{

$regno = $_POST['lecid'];
$username = $_POST['username'];
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

        	
	$sql1 = mysql_query("INSERT INTO incident(regno,username,fname,mname,lname,subject,offender,incidentcategory,context,campuslocation,outsidelocation,incidenttime,date,month,year,reportedby,message,date_added) 
VALUES('$regno','$username','$fname','$mname','$lname','$subject','$offender','$incidentcategory','$context','$campuslocation','$outsidelocation','$incidenttime','$date','$month','$year','$reportedby','$message',now())");
	
      
	
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
                <p><strong>Message Successfully Sent!</strong></p>
                <p>Thank you for using our incident report form, <strong><?php echo $username;?></strong>! Your email was sent successfully.</p>
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
						   $result = mysql_query("SELECT * FROM message WHERE regno='$lecid'");
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
				  <h3 class="panel-title">Incident Form</h3>
			   </div>
			   <div class="panel-body">
			    <form role="form" method="post" id="addstudentform">
				   <div class="form-group">
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
					<input name="subject" type="text" class="form-control" placeholder="Enter Subject">
				  </div>
				   <div class="form-group">
                   <label>Culprit's/ offender's name</label>
                   <input type="text" class="form-control" name="offender"  placeholder="Enter Culprit's Name"/>
                  </div>
				  <div class="form-group">
                   <label>Incident Category</label>
                   <select name="incidentcategory" class="form-control">
				   <option value="Bullying">Bullying</option>
				   <option value="Abortion">Abortion</option>
				   <option value="Raping">Raping</option>
				   <option value="Stealing/Theft">Stealing/Theft</option>
				   <option value="Drinking Alcohol">Drinking Alcohol</option>
				   <option value="Drugs">Drugs</option>
				   <option value="Exam Malpractices">Exam Malpractices</option>
				   <option value="Fighting">Fighting</option>
				   <option value="Destruction of Property">Destruction of Property</option>
				   <option value="Sneaking">Sneaking</option>
				   <option value="Rioting">Rioting</option>
				   <option value="Others">Others</option>
                   </select>
                  </div>
				  <div class="form-group">
				   <label>Incident context</label>
				   <select name="context" class="form-control">
				    <option value="Inside Campus">Inside Campus</option>
					<option value="Outside Campus">Outside Campus </option>
				   </select>
				  </div>
				  <div class="form-group">
				  <label>Campus location</label>
					  <select name="campuslocation" class="form-control">
					      <option value="NONE">NONE</option>
					  <option value="MESS">MESS</option>
					  <option value="HOSTEL">HOSTEL</option>
					  <option value="PLAYING GROUND">PLAYING GROUND</option>
					  <option value="SWIMMING POOL">SWIMMING POOL</option>
					  <option value="ADMINISTRATION OFFICES">ADMINISTRATION OFFICES</option>
					  <option value="STUDENT CENTRE">STUDENT CENTRE</option>
					  <option value="AUDITORIUM">AUDITORIUM</option>
					  <option value="LIBRARY">LIBRARY</option>
					  <option value="CHANCELLOR'S COURT">CHANCELLOR'S COURT</option>
					  <option value="LECTURE HALLS">LECTURE HALLS</option>
					  <option value="MAIN GATE">MAIN GATE</option>
					  <option value="CHAPEL">CHAPEL</option>
					  <option value="NANDOS">NANDOS</option>
					  <option value="GUEST HOUSE">GUEST HOUSE</option>
					  <option value="STAFF QUARTERS">STAFF QUARTERS</option>
					  </select>
					</div>
					<div class="form-group">
					  <label>Outside location</label>						 
					  <select name="outsidelocation" class="form-control">
					      <option value="NONE">NONE</option>
						  <option value="RAFIKI">RAFIKI</option>
						  <option value="KAMPI MOTO">KAMPI MOTO</option>
						  <option value="MERCY NJERI">MERCY NJERI</option>
						  <option value="OLIVE">OLIVE</option>
						  <option value="KIAMUNYI">KIAMUNYI</option>
						  <option value="MOGOTIO">MOGOTIO </option>
						  <option value="MENENGAI">MENENGAI</option>
						  <option value="OLOIKA">OLOIKA</option>
						  <option value="NAKURU TOWN">NAKURU TOWN</option>
						  </option>
						   </select>
				    </div>  
					<div class="form-group"> 	
				   <label>Incident Time</label>
					 <input type="text" class="form-control" name="incidenttime" placeholder="Incident Time..."  />
				  </div>
				  
				  <div class="form-group"> 	          
				   <label>Incident Date</label>
					<select name="date" class="form-control">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
					</select >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<select name="month" class="form-control">
					<option value="JAN">JAN</option>
					<option value="FEB">FEB</option>
					<option value="MAR">MAR</option>
					<option value="APR">APR</option>
					<option value="MAY">MAY</option>
					<option value="JUN">JUN</option>
					<option value="JUL">JUL</option>
					<option value="AUG">AUG</option>
					<option value="SEP">SEP</option>
					<option value="OCT">OCT</option>
					<option value="NOV">NOV</option>
					<option value="DEC">DEC</option></select> <br/>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<select name="year" class="form-control">
					<option value="2010">2010</option>
					<option value="2011">2012</option>
					<option value="2012">2012</option>
					<option value="2013">2013</option>
					<option value="2014">2014</option>
					<option value="2015">2015</option>
					<option value="2016">2016</option>
					<option value="2017">2017</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					</select>
				  </div> 	

				  <div class="form-group"> 	          
				   <label>Reported by</label>
					<div class="radio">
					 <label><input type="radio" name="reportedby" value="referee">Referee</label>
				    </div>
					 <div class="radio">
					  <label><input type="radio" name="reportedby" value="victim">Victim</label>
					</div>
				  </div>
				  
				  <div class="form-group">
				  	<label>Message</label>
					<textarea name="message" rows="7" class="form-control" placeholder="Enter Message"></textarea>
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
