<?php require('../database_credentials.php');
  session_start();
  $pid=$_SESSION['person_id'];

  $conn = new mysqli(servername,username,password,dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }   

  /*getting information for courses */
  $sql1 = "SELECT * FROM `Opportunity`";

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
                <form action="opportunities.php" method="post">
                    <div class="container-fluid cdiv1" >
                        <h3>Opportunities</h3>
                        <input type="submit" class="btn btn-outline-secondary addbutton" name="add" value="Add">
                        <input type="submit" class="btn btn-outline-secondary addbutton" name="view" value="Refresh">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">OppID</th>
                                    <th scope="col">OpportunityName</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">DeadlineOfApplication</th>
                                    <th scope="col">ProgramStartDate</th>
                                    <th scope="col">DurationOfProgram</th>
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
                                        echo "<td>".$row["oppID"]."</td>
                                                <td>".$row["opportunityname"]."</td>
                                                <td>".$row["category"]."</td>
                                                <td>".$row["deadlineOfApplication"]."</td>
                                                <td>".$row["programStartDate"]."</td>
                                                <td>".$row["durationOfProgram_months"]."</td>";          
                                        ?><td colspan='2'> 
                                            <!-- getting specified record to be updated by id. -->
                                                <a href="opportunities.php?editID=<?php echo $row['oppID'];?>#nav" 
                                                class='btn btn-success' style="height:28px; width:60px; padding:2px; margin-top:0;">Edit</a>
                                            </td>
                                            <td>
                                                <a href="opportunities.php?deleteid=<?php echo $row['oppID'];?>#nav" 
                                                class='btn btn-danger' style="height:28px; width:60px; padding:2px; margin-top:0;">Delete</a>
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
                        <h3>Update, Add or Delete Opportunity</h3>
                        <table class="table">
                            <thead>
                                <th scope="col">OppID</th>
                                <th scope="col">OpportunityName</th>
                                <th scope="col">Category</th>
                                <th scope="col">DeadlineOfApplication</th>
                                <th scope="col">ProgramStartDate</th>
                                <th scope="col">DurationOfProgram</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    //checking if edit button has been clicked.
                                    if(isset($_GET['editID'])){
                                        $oppid=$_GET['editID'];

                                        //select query:
                                        $sql = "SELECT * FROM `Opportunity` WHERE oppID='$oppid'";
                                        $results= $conn->query($sql);

                                        if($results->num_rows==1){
                                            $row = $results->fetch_assoc();
                                            $oppid=$row['oppID'];
                                            $oppname=$row['opportunityname'];
                                            $cat=$row['category'];
                                            $doa=$row['deadlineOfApplication'];
                                            $psd=$row['programStartDate'];
                                            $dop=$row['durationOfProgram_months'];
                                        }
                                    }
                                    if(isset($_GET['deleteid'])){
                                        $oppid=$_GET['deleteid'];

                                        //select query:
                                        $sql = "SELECT * FROM `Opportunity` WHERE oppID='$oppid'";
                                        $results= $conn->query($sql);

                                        if($results->num_rows==1){
                                            $row = $results->fetch_assoc();

                                            $oppid=$row['oppID'];
                                            $oppname=$row['opportunityname'];
                                            $cat=$row['category'];
                                            $doa=$row['deadlineOfApplication'];
                                            $psd=$row['programStartDate'];
                                            $dop=$row['durationOfProgram_months'];
                                        }
                                    }

                                ?>
                                <!-- record to be modified -->
                                <tr class="modify" id='nav'>
                                    <td style="visibility:hidden"><input type="number" placeholder="Enter oppID" value="<?php echo $oppid ?>" name="oppid"></td>
                                    <td><input type="text" placeholder="Enter opportunityname" value="<?php echo $oppname ?>" name="oppname"></td>
                                    <td><input type="text" placeholder="Enter category" value="<?php echo $cat ?>" name="cat"></td>
                                    <td><input type="date" placeholder="Enter deadlineOfApplication" value="<?php echo $doa ?>" name="doa"></td>
                                    <td><input type="date" placeholder="Enter programStartDate" value="<?php echo $psd ?>" name="psd"></td>
                                    <td><input type="number" placeholder="Enter durationOfProgram_months" value="<?php echo $dop ?>" name="dop"></td>
                                <?php
                                    //change action once a button is clicked.
                                    if(isset($_GET['editID']))
                                    {
                                        echo "
                                        <td colspan='2'>
                                            <input type='submit' class='btn btn-outline-secondary modifybutton' name='updaterecord' value='Update'>
                                        </td>
                                        ";
                                    }else if(isset($_POST['add'])){
                                        echo "
                                        <td colspan='2'>
                                            <input type='submit' class='btn btn-outline-secondary modifybutton' name='addrecord' value='Add'>
                                        </td>
                                        ";
                                    }else if(isset($_GET['deleteid'])){
                                        echo "
                                        <td colspan='2'>
                                            <input type='submit' class='btn btn-outline-secondary modifybutton' name='deleterecord' value='Delete'>
                                        </td>
                                        ";
                                    }else{
                                        echo "
                                        <td colspan='2'>
                                            <input type='submit' class='btn btn-outline-secondary modifybutton' value='Pending...'>
                                        </td>
                                        ";
                                    }
                                ?>
                                </tr>
                                <small style="margin-left:80px;">
                                    <?php
                                        //adding record to table.
                                        if(isset($_POST['addrecord'])){
                                            $row = $results->fetch_assoc();
                                            
                                            // $oppid=$_POST['oppid']; -> irrelevant since this is on auto increment.
                                            $oppname=$_POST['oppname'];
                                            $cat=$_POST['cat'];
                                            $doa=$_POST['doa'];
                                            $psd=$_POST['psd'];
                                            $dop=$_POST['dop'];

                                            
                                            //query 03 - add
                                            $sql3 = "INSERT INTO `Opportunity`(`opportunityname`, `category`, 
                                            `deadlineOfApplication`, `programStartDate`, `durationOfProgram_months`) 
                                            VALUES ('$oppname','$cat','$doa','$psd','$dop')";

                                            if (mysqli_query($conn, $sql3)) {
                                            echo "<p style='color:green;'>New record created successfully</p>";
                                            }else {
                                            echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
                                            }
                                        }

                                        //updating record
                                        if(isset($_POST['updaterecord'])){
                                            $oppid=$_POST['oppid'];
                                            $oppname=$_POST['oppname'];
                                            $cat=$_POST['cat'];
                                            $doa=$_POST['doa'];
                                            $psd=$_POST['psd'];
                                            $dop=$_POST['dop'];

                                            
                                            //query 02 - update
                                            $sql2 = "UPDATE `Opportunity` SET `opportunityname`='$oppname',
                                            `category`='$cat',`deadlineOfApplication`='$doa',`programStartDate`='$psd',
                                            `durationOfProgram_months`=$dop WHERE oppID=$oppid"; 

                                            if ($conn->query($sql2) === TRUE) {
                                            echo "<p style='color:green'>Record updated successfully</p>";
                                            } else {
                                            echo "Error updating record: " . $conn->error;
                                            }

                                        }
                                        
                                        //deleting record
                                        if (isset($_GET['deleteid'])){
                                            $oppid=$_GET['deleteid'];
                                            // sql to delete a record
                                            $sql = "DELETE FROM `Opportunity` WHERE oppID=$oppid";

                                            if ($conn->query($sql) === TRUE) {
                                                echo "Record deleted successfully";
                                            } else {
                                                echo "Error deleting record: " . $conn->error;
                                            }
                                        }
                                    ?>
                                </small>
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