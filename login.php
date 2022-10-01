<?php require("database_credentials.php");
  session_start();
  
  $error='';
  // Create connection
  $conn = new mysqli(servername,username,password,dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  //check if form ahs been submitted
  if(isset($_POST["login"])){
    $uname = $_POST["uname"];
    $pass = $_POST["psw"];

    //query to get person_id.
    $sql1 = "SELECT `userid`, `username`, `psw` FROM `Userlogins` WHERE `username`='$uname'";

    $results1= $conn->query($sql1);
    $rows1 = $results1->fetch_assoc();  
    
    //checking if a user with the userid and password exist.
    if($results1->num_rows==1){
      $_SESSION['person_id']=$rows1['userid'];
      $id = $rows1['userid'];

      //checking if both username and password match
      if($rows1['username']==$uname && $rows1['psw']==$pass){

        //checking if user is a student or counselor
        $sql2="SELECT `type`FROM `Person` WHERE personID='$id'";

        $results2= $conn->query($sql2);
        $rows2 = $results2->fetch_assoc(); 

        if($rows2['type']=='student'){
          header("location:Student/dashboard.php");
        }else if($rows2['type']=='counselor'){
          header("location:Counselor/dashboard.php");
        }
      }else{
        $error.="Incorrect Password";
      }
    }else{
      $error.="Incorrect Username";
    }
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
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
      <header>
        <form action="" method="post">
            <div class="nav">
                <a class="active" href="login.php">Login</a>
                <a href="register.php">Register</a>
              </div> 
        </form> 
      </header>
      <section class="section">
        <form action="login.php" method="post">
            <div class="container">
              <label for="uname"><b>Username</b></label>
              <input type="text" placeholder="Enter username" name="uname" required>
          
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw" required>
              <small style="color:red;">
                <?php 
                  if(isset($_POST["login"])) {
                      echo $error;
                  }
                ?>
              </small>
              <input type="submit" value="Login" name="login">
            </div>
        </form>

      </section>
      <footer>
      <p><img src="images/happy-children.png" alt="footer-image" class="footer-image"> HelpTheChildGrow &copy; 2021</p>
      </footer>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

