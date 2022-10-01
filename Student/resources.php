<?php require('../database_credentials.php');
  session_start();
  $pid=$_SESSION['person_id'];

  $conn = new mysqli(servername,username,password,dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }   

  /*getting information for courses */
  $sql1 = "SELECT * FROM `_Resource`";

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
            <div class="sidebar">
                <span><img src="../images/profile.png" alt="home-icon"/><a href="profile.php">Profile</a> </span>
                <span><img src="../images/course.png" alt="courses-icon"/><a href="courses.php">Courses</a> </span>
                <span><img src="../images/opportunity.png" alt="opportunities-icon"/><a href="opportunities.php">Opportunities</a> </span>
                <span><img src="../images/voluntary.png" alt="vs-icon"/><a href="volunteeringservice.php">Volunteering Service</a> </span>
                <span><img src="../images/resources.png" alt="resources-icon"/><a href="resources.php">Resources</a> </span>
                <span style="margin-top:150px;"><img src="../images/logout.png" alt="logout-icon"/><a href="../login.php">Logout</a> </span>
            </div>
            <div class="display-dashboard">
                <form action="resources.php" method="post">
                    <div class="container-fluid cdiv1" >
                        <h3>Resources</h3>
                        <input type="submit" class="btn btn-success addbutton" name="view" value="Refresh">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ResourceID</th>
                                    <th scope="col">ResourceName</th>
                                    <th scope="col">DateAcquired</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Purpose</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $results= $conn->query($sql1);

                                    if ($results->num_rows > 0) {
                                        // output data of each row
                                        while($row = $results->fetch_assoc()) {
                                        echo "<tr style='
                                                line-height:5px;
                                                padding: 2px;
                                                font-size:14px;
                                                font-weight:400;'>";
                                        echo "<td>".$row["resourceID"]."</td>
                                                <td>".$row["resourcename"]."</td>
                                                <td>".$row["date_acquired"]."</td>
                                                <td>".$row["category"]."</td>
                                                <td>".$row["purpose"]."</td>";   
                                        ?><td colspan='2'> 
                                            <!-- getting specified record to be updated by id. -->
                                            <a href="resources.php?selectid=<?php echo $row['resourceID'];?>" 
                                            class='btn btn-success' style="height:25px; width:60px; padding:0; margin-top:0;">Select</a>
                                            </td>
                                        </tr>
                                        <?php
                                        }   
                                    } else {
                                        echo "0 results";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="container-fluid cdiv1 special-bottom-margin" >

                        <h3>Resources you are currently using.</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">studentID</th>
                                    <th scope="col">resourceID</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    //select query:
                                    $sql = "SELECT * FROM `StudentResources` WHERE studentID='$pid'";
                                    $results= $conn->query($sql);
                                    
                                    if($results->num_rows>0){
                                        // output data of each row
                                        while($row = $results->fetch_assoc()) {
                                            echo "<tr style='
                                                    line-height:5px;
                                                    padding: 2px;
                                                    font-size:14px;
                                                    font-weight:400;'>";
                                            echo "<td>".$row["studentID"]."</td>
                                                    <td>".$row["resourceID"]."</td>";          
                                            ?><td colspan='2'> 
                                                <!-- getting specified record to be updated by id. -->
                                                <a href="resources.php?removeid=<?php echo $row['resourceID'];?>" class='btn btn-danger'
                                                style="height:28px; width:70px; padding:0; margin-top:0;">Remove</a>
                                                </td>
                                            </tr>
                                            <?php
                                            }                                    
                                    }else {echo "0 results";}
                                    //checking if select button has been clicked to add course to studentcourse table
                                    if(isset($_GET['selectid'])){
                                        $resourceid=$_GET['selectid'];

                                        //check if student already selected the course
                                        $sql = "SELECT * FROM `StudentResources` WHERE studentID=$pid AND serviceID=$resourceid";
                                        $results= $conn->query($sql);
                                        
                                        if($results->num_rows!=1){
                                            //no record exist, insert new selection
                                            $sql = "INSERT INTO `StudentResources`(`studentID`, `resourceID`) VALUES ($pid,$resourceid)";
                                            if ($conn->query($sql) === TRUE) {
                                                echo "<p style='color:green; margin-left:60px;'>New resource added</p>";
                                            } else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                            }
                                        }else{
                                            echo "<p style='color:red; margin-left:60px;'>Resource already exist</p>";
                                        }
                                    }

                                    if(isset($_GET['removeid'])){
                                        $resourceid=$_GET['removeid'];
                                        
                                        // sql to delete a record
                                        $sql = "DELETE FROM `StudentResources` WHERE studentID=$pid AND resourceID=$resourceid";

                                        if ($conn->query($sql) === TRUE) {
                                            echo "<p style='color:red; margin-left:60px;'>One resource removed</p>";
                                        } else {
                                            echo "Error deleting record: " . $conn->error;
                                        }

                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </form>
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