<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
  {
    
    $appno=$_GET['viewid'];
    $ressta=$_POST['status'];
    $remark=$_POST['restremark'];
     $maximumlimit=$_POST['maximumlimit'];
   $query=mysqli_query($con, "update tblapplication set Status='$ressta',Remark='$remark', MaximumLimit='$maximumlimit'  where ApplicationNumber='$appno'");
    if ($query) {
   
    echo '<script>alert("Credit card application has been updated.")</script>';
    echo "<script type='text/javascript'> document.location ='all-ccapplication.php'; </script>";
  }
  else
    {
    
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}
 

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CCAMS | View Credit Card Application Details</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

 <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Credit Card Application Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">View Credit Card Application Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Credit Card Application Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <?php
 $appno=$_GET['viewid'];
$ret=mysqli_query($con,"select * from tblapplication where ApplicationNumber='$appno'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
            <table class="table table-bordered data-table">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 User Details</td></tr>

    <tr>
    <th>Application Number</th>
    <td><?php  echo $row['ApplicationNumber'];?></td>
    <th>Full Name</th>
    <td><?php  echo $row['FullName'];?></td>
 </tr>
 <tr>
    <th>Email</th>
    <td><?php  echo $row['Email'];?></td>
    <th>MobileNumber</th>
    <td><?php  echo $row['MobileNumber'];?></td>
 </tr>
 <tr>
    <th>Father's Name</th>
    <td><?php  echo $row['FatherName'];?></td>
    <th>Address</th>
    <td><?php  echo $row['Address'];?></td>
 </tr>
 <tr>
    <th>State</th>
    <td><?php  echo $row['State'];?></td>
    <th>City</th>
    <td><?php  echo $row['City'];?></td>
 </tr>
 <tr>
    <th>Pincode</th>
    <td><?php  echo $row['Pincode'];?></td>
    <th>Occupationtype</th>
    <td><?php  echo $row['Occupationtype'];?></td>
 </tr>
 <tr>
    <th>Monthly Income</th>
    <td><?php  echo $row['MonthlyIncome'];?></td>
    <th>Pancard</th>
    <td> <a href="../pancard/<?php echo $row['Pancard'];?>" width="100" height="100" target="_blank"> <strong style="color: red">View Pancard</strong></a></td>
 </tr>
 <tr>
    <th>Address Proof</th>
    <td><a href="../addressproof/<?php echo $row['Addressproof'];?>" width="100" height="100" target="_blank"> <strong style="color: red">View Address Proof</strong></a></td>
    
 </tr>
 <tr>
    <th>Application Status</th>
    <td> <?php  
    $status=$row['Status'];

if($row['Status']=="")
{
  echo "Wait for approval";
}
if($row['Status']=="Accepted")
{
  echo "Your application has been accepted";
}
if($row['Status']=="Rejected")
{
  echo "Your application has been rejected";
}


     ;?></td>
      <th>Application Date</th>
    <td><?php  echo $row['ApplicationDate'];?></td>
  </tr>
  <tr>
    <th>Remark</th>
    <?php if($row['Remark']==""){ ?>
      <td><?php echo "Not Updated Yet"; ?></td>
      <?php } else { ?>
    <td><?php  echo $row['Remark'];?></td><?php } ?>
    <th>Maximum Limit</th>
     <?php if($row['MaximumLimit']==""){ ?>
      <td><?php echo "Not Updated Yet"; ?></td>
      <?php } else { ?>
    <td><?php  echo $row['MaximumLimit'];?></td><?php } ?>
 </tr>
</table><?php  }  
?>
                <?php

  if($status=="" ){ ?>

   <table class="table table-bordered data-table">
<form name="submit" method="post"> 
<tr>
    <th>Remark :</th>
    <td colspan="6">
    <textarea name="restremark" placeholder="" rows="5" cols="14" class="form-control" required="true"></textarea></td>
  </tr>

  <tr>
    <th>Status :</th>
    <td>
   <select name="status" id="status" class="form-control" required="true" >
    <option value="">Select</option>
     <option value="Accepted">Accepted</option>
      <option value="Rejected">Rejected</option>

   </select></td>
  </tr>
 

  <tr id="maxlimit">
    <th>Maximum Limit :</th>
    <td>
   <input type="text" name="maximumlimit" id="maximumlimit" pattern="[0-9]+" title="only numbers" class="form-control">

   </td>
  </tr>
    <tr align="center" style="text-align: center';">
    <td ><button type="submit" name="submit" class="btn btn-primary">Update</button></td>
  </tr>
</form>
  <?php } ?>
 


</table>   
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('includes/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<script type="text/javascript">

  //For report file
  $('#maxlimit').hide();
  $(document).ready(function(){
  $('#status').change(function(){
  if($('#status').val()=='Accepted')
  {
  $('#maxlimit').show();
  jQuery("#maximumlimit").prop('required',true);  
  }
  else{
  $('#maxlimit').hide();
  }
})}) 
</script>
</body>
</html>
<?php } ?>