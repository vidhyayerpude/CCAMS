<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>CCAMS | About Us</title>
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
			
<!-- about -->
<section class="about" id="about">
	<div class="container">
	<div class="about-heading">
		<h2>Check Credit Card Status</h2>
	</div>
		<div class="about-grids">
		<div class="col-md-12 about-left">
			<div class="col-md-12 banner-left">
						<form action="" method="post" enctype="multipart/form-data">
						<h3>Check Your Credit Card Application Status</h3>
								<label>Search Credit Card Application by Name/ Email / Mobile Number</label>
								<input  id="searchdata" name="searchdata"  type="text" required="true">
								<div class="submit">
								<input type="submit" name="search" value="Search">
							</div>
						</form>
					</div>
		</div>
		
		<div class="col-md-12 about-right" style="padding-top: 30px;">
			 <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
			<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Application Number</th>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Apply Date</th>
                    <th>Credit Limit</th>
                  </tr>
                  </thead>
                  <tbody>

<?php
$sql="select * from tblapplication where FullName like '%$sdata%' || Email like '%$sdata%' || MobileNumber like '%$sdata%' || ApplicationNumber like '%$sdata%'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>

                  <tr>
                    <td><?php echo $cnt;?></td>
                    <td><?php  echo htmlentities($result->ApplicationNumber);?></td>                   
                    <td><?php echo ($result->FullName);?></td>
                    <td><?php echo ($result->MobileNumber);?></td>
                    <td><?php echo ($result->Email);?></td>
                    
                    <?php if($result->Status==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="badge badge-primary"><?php  echo htmlentities($result->Status);?></span>
                                        </td>
<?php } ?> 
                   <td><?php echo ($result->ApplicationDate);?></td>
                  
<?php if($result->Status==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                 <?php } ?>
                     <?php if($result->Status=="Rejected"){ ?>

                     <td class="font-w600"><?php echo "Credit Card Application has been rejected"; ?></td>
<?php } else { ?>
      
     <td><?php echo ($result->MaximumLimit);?></td>
<?php } ?>
                  </tr>
                  
                  </tbody>
                  <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  <?php }} ?>
                
                </table>
			
			
		</div>
		<div class="clearfix"></div>
		</div>
		</div>
</section>
<!-- //about -->



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