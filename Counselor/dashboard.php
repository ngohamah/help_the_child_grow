<?php require('../database_credentials.php');
  session_start();
  $pid=$_SESSION['person_id'];

  $conn = new mysqli(servername,username,password,dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }   

  /*get judge information */
  $sql = "SELECT `fname`, `lname` FROM `Person` WHERE `personID`='$pid'";

  $results= $conn->query($sql);
  $rows = mysqli_fetch_assoc($results);

  if($results->num_rows==1){
      $fname=$rows["fname"];
      $lname=$rows["lname"];
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>HelpTheChildGrow |</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
  </head>
   <body>
    <section>
        <div class="dashboard">
            <div class="sidebar" style="height:100%;">
                <span><img src="../images/profile.png" alt="home-icon"/><a href="profile.php">Profile</a> </span>
                <span><img src="../images/opportunity.png" alt="opportunities-icon"/><a href="opportunities.php">Opportunities</a> </span>
                <span><img src="../images/resources.png" alt="resources-icon"/><a href="resources.php">Resources</a> </span>
                <span><img src="../images/voluntary.png" alt="vs-icon"/><a href="volunteeringservice.php">Volunteering Service</a> </span>
                <hr>
                <span><img src="../images/owner.png" alt="principal-icon"/><a href="principals.php">Principals</a> </span>
                <span><img src="../images/teacher-at-the-blackboard.png" alt="teacher-icon"/><a href="teachers.php">Teachers</a> </span>
                <span><img src="../images/family.png" alt="parentinfos-icon"/><a href="parentinfos.php">Parents</a> </span>
                <span><img src="../images/write.png" alt="student-icon"/><a href="students.php">Students</a> </span>
                <span style="margin-top:100px;"><img src="../images/logout.png" alt="logout-icon"/><a href="../login.php" >Logout</a> </span>
            </div>
            <div class="display-dashboard">
              <h1>Welcome <?php echo 'Dear'.' '.$fname.' '.$lname?></h1>
            </div>

        </div>
    </section>
    <footer style="clear:both;">
        <p><img src="../images/happy-children.png" alt="footer-image" class="footer-image"> HelpTheChildGrow &copy; 2021</p>
    </footer>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>