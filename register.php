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
                <a  href="login.php">Login</a>
                <a class="active" href="register.php">Register</a>
              </div> 
        </form> 
      </header>
      <section class="register">
        <form action="register.php" method="post">
            <div class="rcontainer">
              <h1>Register</h1>
              <p style="font-weight:600">Please fill in this form to create an account as a Counselor or a Student.</p>
              <hr>
              <label for="Firstname"><b>Firstname</b></label>
              <input type="text" placeholder="Enter firstname" name="fname" id="fname" required>

              <label for="Lastname"><b>Lastname</b></label>
              <input type="text" placeholder="Enter Lastname" name="lname" id="lname" required>

              <label for="usertype"><b>Who is this account for?</b></label>
              <select name="usertype">
                  <option value="counselor">Counselor </option>
                  <option value="student">Student</option>
              </select><br>

              <label for="dob" class="ldob"><b>Date Of Birth</b></label>
              <input type="date" placeholder="Enter date of birth" name="dob" id="dob" class="dob" required>
              
              <label for="gender" class="lgender"><b>Gender</b></label>
              <select name="gender" class="gender">
                <option value="male">Male </option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>

              <br>
              <label for="address"><b>Address</b></label>
              <input type="text" placeholder="Enter address" name="address" id="address" required>

              <label for="phonenumber"><b>Phone Number</b></label>
              <input type="text" placeholder="Enter Phone Numer" name="tel" id="tel" required>
                
              <label for="language"><b>Primary Language</b></label>
              <input type="text" placeholder="Enter primary language" name="plang" id="plang" required>

              <hr> 
              <label for="username"><b>Username</b></label>
              <input type="text" placeholder="Enter username" name="uname" minlength='5' required>

              <label for="psw"><b>Password</b></label>
              <input type="text" placeholder="Enter Password" name="psw" id="psw" maxlength='20' required>

              <label for="psw-repeat"><b>Repeat Password</b></label>
              <input type="text" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" maxlength='20' required>
              <hr>
              <input type="submit" class="registerbtn" name="register" value="Register">
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
