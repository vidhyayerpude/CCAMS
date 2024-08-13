<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
 if(isset($_POST['submit']))
  {

$appnum=mt_rand(100000000, 999999999);
     $fname=$_POST['fname'];
     $email=$_POST['email'];
     $mobnum=$_POST['mobnum'];
     $fathername=$_POST['fathername'];
     $add=$_POST['address'];
     $state=$_POST['state'];
     $city=$_POST['city'];
     $pincode=$_POST['pincode'];
     $occupationtype=$_POST['occupationtype'];
     $monthlyincome=$_POST['monthlyincome'];
     $pancard=$_FILES["pancard"]["name"];
$extension1 = substr($pancard,strlen($pancard)-4,strlen($pancard));
$addressproof=$_FILES["addressproof"]["name"];
$extension2 = substr($addressproof,strlen($addressproof)-4,strlen($addressproof));
$allowed_extensions = array(".jpg","jpeg",".png",".gif",".pdf",".PDF");
if(!in_array($extension1,$allowed_extensions))
{
echo "<script>alert('Pics has Invalid format. Only jpg / jpeg/ png /gif /pdf format allowed.');</script>";
}
// if(!in_array($extension2,$allowed_extensions))
// {
// echo "<script>alert('Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
// }

else {


    $pancard=md5($pancard).time().$extension1;
    $addressproof=md5($addressproof).time().$extension2;
    move_uploaded_file($_FILES["pancard"]["tmp_name"],"pancard/".$pancard);
 move_uploaded_file($_FILES["addressproof"]["tmp_name"],"addressproof/".$addressproof);
     $sql="insert into tblapplication(ApplicationNumber,FullName,Email,MobileNumber,FatherName,Address,State,City,Pincode,Occupationtype,MonthlyIncome,Pancard,Addressproof)values(:appnum,:fname,:email,:mobnum,:fathername,:add,:state,:city,:pincode,:occupationtype,:monthlyincome,:pancard,:addressproof)";
$query=$dbh->prepare($sql);
$query->bindParam(':appnum',$appnum,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':fathername',$fathername,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':pincode',$pincode,PDO::PARAM_STR);
$query->bindParam(':occupationtype',$occupationtype,PDO::PARAM_STR);
$query->bindParam(':monthlyincome',$monthlyincome,PDO::PARAM_STR);
$query->bindParam(':pancard',$pancard,PDO::PARAM_STR);
$query->bindParam(':addressproof',$addressproof,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo '<script>alert("Credit card application request has been sent successfully. Application Number is "+"'.$appnum.'")</script>';
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<!-- <title>Corporate Bank a Banking Category Bootstrap responsive Website Template | Home :: w3layouts</title> -->
<title>Credit Card</title>
<!-- .css files -->
	<link href="css/bars.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/font-awesome.css" />
<!-- //.css files -->
<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- //Default-JavaScript-File -->
<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Ropa+Sans:400,400i&amp;subset=latin-ext" rel="stylesheet">
<!-- //fonts -->
<!-- scrolling script -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //scrolling script -->
</head>
<!-- //Head -->
<!-- Body -->
<body>
	
		
		<?php include_once('includes/header.php');?>
		<!-- //Top-Bar -->
		<div class="banner-main jarallax">
			<div class="container">
				<div class="banner-inner">
					<div class="col-md-5 banner-left">
						<form action="#" method="post" enctype="multipart/form-data">
						<h3>Apply For Credit Card</h3>
								<label>Full Name</label>
								<input type="text" placeholder="Full Name" name="fname" required="true">
								<label>Your mail</label>
								<input type="email" placeholder="Your mail" required="true" name="email" />
								<label>Phone number</label>
							<input type="tel" placeholder="Phone number" maxlength="10" pattern="[0-9]+" required="true" name="mobnum"/>
							<label>Father's Name</label>
								<input type="text" placeholder="Father's Name" name="fathername" required="true">
								<label>Enter Address</label>
								<textarea placeholder="Enter Address" name="address"></textarea>
								<label>State</label>
								<input type="text" placeholder="State" name="state" required="true">
								<label>City</label>
								<input type="text" placeholder="City" name="city" required="true">
								<label>Pincode</label>
								<input type="text" placeholder="Pincode" name="pincode" required="true">
								<div>
								<label>Occupation type</label>
								<select name="occupationtype">
									<option value=""> Choose Occupation type</option>
									<option value="Salaried"> salaried</option>
									<option value="Business"> Business</option>
									<option value="Self-Employeed"> Self-Employeed</option>
									<option value="Government Employee"> Government Employee</option>
									<option value="Others"> Others</option>
								</select>
							</div>
							<input type="text" placeholder="Enter Monthly Income" name="monthlyincome" required="true"/>
							<label>Upload Pan Card</label>
							<input type="file"  name="pancard" required="true"/>
							<label>Upload Address Proof</label>
							<input type="file"  name="addressproof" required="true"/>
							
							<div class="submit">
								<input type="submit" name="submit" value="Apply">
							</div>
						</form>
					</div>
					<div class="col-md-7 banner-right">
						<h1>Benefits of Credit Cards</h1>
						<h4>Credit cards provide a convenient way to make purchases without carrying cash. Many credit cards offer rewards programs such as cashback, travel miles, or points for every dollar spent.In emergencies or unexpected situations, credit cards can serve as a source of funds. They provide a financial safety net when cash is not readily available.</h4>
							<div class="banner-right-text">
								<div class="main-icon">
									<i class="fa fa-share" aria-hidden="true"></i>
								</div>
								<p>Easy access to credit</p>
							<div class="clearfix"></div>
							</div>
							<div class="banner-right-text">
								<div class="main-icon">
									<i class="fa fa-share" aria-hidden="true"></i>
								</div>
								<p>Building a line of credit</p>
							<div class="clearfix"></div>
							</div>
							<div class="banner-right-text">
								<div class="main-icon">
									<i class="fa fa-share" aria-hidden="true"></i>
								</div>
								<p>EMI facility</p>
							<div class="clearfix"></div>
							</div>
							<div class="banner-right-text">
								<div class="main-icon">
									<i class="fa fa-share" aria-hidden="true"></i>
								</div>
								<p>Incentives and offers</p>
							<div class="clearfix"></div>
							</div>
							<div class="banner-right-text">
								<div class="main-icon">
									<i class="fa fa-share" aria-hidden="true"></i>
								</div>
								<p>Flexible credit</p>	
							<div class="clearfix"></div>
							</div>

	<div class="banner-right-text">
								<div class="main-icon">
									<i class="fa fa-share" aria-hidden="true"></i>
								</div>
								<p>Record of expenses</p>	
							<div class="clearfix"></div>
							</div>


								<div class="banner-right-text">
								<div class="main-icon">
									<i class="fa fa-share" aria-hidden="true"></i>
								</div>
								<p>Purchase protection</p>	
							<div class="clearfix"></div>
							</div>


								<div class="banner-right-text">
								<div class="main-icon">
									<i class="fa fa-share" aria-hidden="true"></i>
								</div>
								<p>Most accepted method of payment</p>	
							<div class="clearfix"></div>
							</div>


								<div class="banner-right-text">
								<div class="main-icon">
									<i class="fa fa-share" aria-hidden="true"></i>
								</div>
								<p>Insurance coverage</p>	
							<div class="clearfix"></div>
							</div>

								<div class="banner-right-text">
								<div class="main-icon">
									<i class="fa fa-share" aria-hidden="true"></i>
								</div>
								<p>Make travel easy</p>	
							<div class="clearfix"></div>
							</div>



					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

<?php include_once('includes/footer.php');?>

	<script src="js/jarallax.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>

	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
	<script src="js/bars.js"></script>
</body>
<!-- //Body -->
</html>
<!-- //html -->