<div class="top-main">
  <div class="number">
    <?php
    $sql = "SELECT * from tblpage where PageType='contactus'";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    $cnt = 1;
    if ($query->rowCount() > 0) {
      foreach ($results as $row) {               ?>
        <h3><i class="fa fa-phone" aria-hidden="true"></i> <?php echo htmlentities($row->MobileNumber); ?></h3>
        <h3><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo htmlentities($row->Email); ?></h3>
        <div class="clearfix"></div><?php $cnt = $cnt + 1;
                                  }
                                } ?>
  </div>
  <div class="social-icons">
    <ul class="top-icons">
      <li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
      <li><a href="https://x.com/X"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
      <li><a href="https://www.google.com/"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
      <li><a href="https://in.pinterest.com/"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
      <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
    </ul>

    <div class="clearfix"></div>
  </div>
  <div class="clearfix"></div>
</div>
<!-- Top-Bar -->
<div class="top-bar">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">home</a></li>
          <li><a href="about.php">about</a></li>
          <li><a href="contact.php">contact</a></li>
          <li><a href="check-status.php">Check Status</a></li>
          <li><a href="admin/index.php">admin</a></li>

        </ul>
      </div>
    </div>
  </nav>
</div>
<div class="logo">
  <a href="index.php"><!--<i class="fa fa-inr" aria-hidden="true"></i>-->Credit Card <span>Application System</span></a>
</div>