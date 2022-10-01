<?php require('database_credentials.php');
  session_start();
  $pid=$_SESSION['person_id'];

  $conn = new mysqli(servername,username,password,dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }   

  /*get judge information */

  $sql = "SELECT `person_id`, `fname`, `lname`, `usertype`, `Gender`, 
  `dob`, `email`, `phone_no`, `zip_code`, `city` FROM `person` WHERE `person_id`='$pid'";

  $results= $conn->query($sql);
  $rows = mysqli_fetch_assoc($results);

  if($results->num_rows==1){
    $fname=$rows["fname"];
    $lname=$rows["lname"];
    $usertype=$rows["usertype"];
    $gender=$rows["Gender"];
    $dob=$rows["dob"];
    $email=$rows["email"];
    $pnum=$rows["phone_no"];
    $zipcode=$rows["zip_code"];
    $city=$rows["city"];
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Crime&Law</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
   <body>
    <section>
      <div class="dashboard">
        <div class="sidebar">
          <span><img src="images/judge.png" alt="home-icon"/><a href="profile.php">Profile</a> </span>
          <span><img src="images/court.png" alt="court-icon"/><a href="court.php">View Courts</a> </span>
          <span><img src="images/lawyer.png" alt="lawyer-icon"/><a href="lawyer.php">View Lawyers</a> </span>
          <span><img src="images/head.png" alt="culprit-icon"/><a href="culprit.php">View Culprits</a> </span>
          <span><img src="images/mace.png" alt="mace-icon"/><a href="cases.php">View Court Cases</a> </span>
          <span><img src="images/prison.png" alt="prison-icon"/><a href="prison.php">View Prisons</a> </span>
          <span style="margin-top:150px;"><img src="images/logout.png" alt="logout-icon"/><a href="index.php">Logout</a> </span>
        </div>
        <div class="display-dashboard">
          <h3 class="h3-profile">Profile</h3>
          <div class="container pdiv1"> 
            <div class="row align-items-start" style="float:left; margin-right:100px;">
              <div class="col">
                <span><p>Name: <?php echo $fname.' '.$lname?></p></span>
                <span><p>Role: <?php echo $usertype?></p></span>
                <span><p>Gender: <?php echo $gender?></p></span>
                <span><p>Dob: <?php echo $dob?></p></span>
              </div>
            </div>
            <div class="row align-items-end" style="float:left;">
              <div class="col">
                <span><p>Email: <?php echo $email?></p></span>
                <span><p>Phone Number: <?php echo $pnum?></p></span>
                <span><p>Zipcode: <?php echo $zipcode?></p></span>
                <span><p>City: <?php echo $city?></p></span>
              </div>
            </div>
          </div>
          <h3 class="h3-profile">Edit Login Infos</h3>
          <div class="container-fluid pdiv1 special-bottom-margin" style="height:300px;">
            <?php
              if(isset($_POST['edit'])){
                $new_email=$_POST['newemail'];
                $new_pass=$_POST['newpass'];

                //query
                $sql1 = "UPDATE `person` SET `email`='$new_email' WHERE person_id='$pid'";
                $sql2 = "UPDATE `userlogin` SET `pass`='$new_pass' WHERE userid='$pid'";
                
              }
            ?>
            
            <form method="post">
              <label>New Email Address</label><input type="text" name='newemail' placeholder="Enter new Email">
              <label>New Password</label><input type="password" name='newpass' placeholder="Enter new password">
              <small>
                <?php
                  if(isset($_POST['edit'])){
                    if ($conn->query($sql1)=== TRUE && $conn->query($sql2)=== TRUE) {
                      echo "<p style='color:green;'>Record updated successfully</>";
                    } else {
                      echo "<p style='color:red;'>Error updating record</p>";
                    }
                  }
                ?>
              </small>
              <input type="submit" name='edit' value="Update">
            </form>
          </div>
        </div>

      </div>
    </section>
    <footer style="clear:both;">
        <p><img src="images/mace.png" alt="footer-image" class="footer-image"> Crime&Law &copy; 2021</p>
    </footer>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>