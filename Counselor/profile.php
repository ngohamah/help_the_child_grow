<?php require('../database_credentials.php');
  session_start();
  $pid=$_SESSION['person_id'];

  $conn = new mysqli(servername,username,password,dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }   

  /*get judge information */
  $sql = "SELECT * FROM `Person` WHERE `personID`='$pid'";

  $results= $conn->query($sql);
  $rows = mysqli_fetch_assoc($results);

  if($results->num_rows==1){
    $type=$rows['type'];
    $fname=$rows["fname"];
    $lname=$rows["lname"];
    $dob=$rows['dob'];
    $gender=$rows['gender'];
    $address=$rows['address'];
    $tel=$rows['tel'];
    $plang=$rows['primary_language'];
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
                <h1 style="margin-bottom:-20px; margin-top:-30px">Counselor Profile</h1>
                <div class="container pdiv1" style="height:180px; width:600px; margin-left:90px"> 
                    <div class="row align-items-start" style="float:left; margin-right:110px;">
                        <div class="col">
                            <span><p><strong>Name:</strong> <?php echo $fname.' '.$lname?></p></span>
                            <span><p><strong>Gender:</strong><?php echo $gender?></p></span>
                            <span><p><strong>DOB:</strong> <?php echo $dob?></p></span>
                        </div>
                    </div>
                    <div class="row align-items-end" style="float:left;">
                        <div class="col">
                            <span><p><strong>Address:</strong> <?php echo $address?></p></span>
                            <span><p><strong>Phone Number:</strong><?php echo $tel?></p></span>
                            <span><p><strong>Primary Language:</strong> <?php echo $plang?></p></span>
                        </div>
                    </div>
                </div>
                <h3 class="h3-profile">Edit Login Infos</h3>
                <div class="container-fluid pdiv1 special-bottom-margin" style="width:600px; height:500px; margin-left:90px;">
                    
                    <form method="post" class='editprofile'>
                        <label class="specialinputbox" style="margin-top:-100px">Enter new username</label><input type="text" name='newuname' placeholder="Enter new username" class='specialinputbox'>
                        <label>Enter old Password</label><input type="password" name='oldpass' placeholder="Enter old password" class='specialinputbox'>
                        <label>Enter New Password</label><input type="password" name='newpass' placeholder="Enter new password" class='specialinputbox'>
                        <label>Confirm New Password</label><input type="password" name='cnewpass' placeholder="Confirm new password" class='specialinputbox'>
                        <small>
                            <?php
                                if(isset($_POST['edit'])){
                                    $nuname=$_POST['newuname'];
                                    $old_pass=$_POST['oldpass'];
                                    $new_pass=$_POST['newpass'];
                                    $cnew_pass=$_POST['cnewpass'];

                                    //checking if old password equal to password in database.
                                    $sql= "SELECT `userid`, `username`, `psw` FROM `Userlogins` WHERE userid='$pid'";
                                    $results= $conn->query($sql);
                                    $rows = $results->fetch_assoc();
                                    
                                    if($rows['psw']==$old_pass){
                                        //old and new are thesame, check if new passwords are thesame then update db 
                                        if($new_pass==$cnew_pass){
                                            $sql2 = "UPDATE `Userlogins` SET `username`='$nuname',`psw`='$new_pass' WHERE `userid`='$pid'";
                                            if($conn->query($sql2)=== TRUE){
                                                echo "<p style='color:green'>Updated Successfully</p>";
                                            }else{
                                                echo "Error updating record: " . $conn->error;
                                            }
                                            
                                        }
                                    }else{
                                        echo "<p style='color:red'>You entered a wrong old password</p>";
                                    }    
                                }
                            ?>
                        </small>
                        <input type="submit" name='edit' value="Update" class="specialinputbox" style="margin-top:0; padding:0 0 0;">
                    </form>
                </div>
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