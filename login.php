<?php
include "header.php";
include "db.php";
session_start();
if (isset($_POST["name"]) && isset($_POST["phone"])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $q = "SELECT * FROM `users` WHERE uname='$name' && phone='$phone'";

  if ($rq = mysqli_query($db, $q)) {
    // if user already exists
    if (mysqli_num_rows($rq) == 1) {
      $_SESSION['userName'] = $name;
      $_SESSION['phone'] = $phone;
      header("location: index.php");
    } else {
      // if not registered
      $q = "select * from users where phone = '$phone'";
      if ($rq = mysqli_query($db, $q)) {
        // if no already used 
        if (mysqli_num_rows($rq) == 1) {
          echo "<script>alert($phone + 'is already used by another person')</script>";
        } else {
          // if no not used 
          // insert into users
          $q = "insert into `users` (`uname`,`phone`) values('$name' , '$phone')";
          if ($rq = mysqli_query($db, $q)) {
            $q = "select * from `users` where uname = '$name' and phone = '$phone'";
            if ($rq = mysqli_query($db, $q)) {
              if (mysqli_num_rows($rq) == 1) {
                // now we make login
                $_SESSION['userName'] = $name;
                $_SESSION['phone'] = $phone;
                header("location: index.php");
              }
            }
          }
        }
      }
    }
  }
}
?>


<body>
  <h1>ChatRoom</h1>
  <div class="login">
    <h2>Login</h2>
    <p>This ChatRoom is the best example to demonstrate the concept of ChatBot and it's completely for begginners.</p>
    <form action="" method="post">

      <h3>UserName</h3>
      <input type="text" placeholder="Short Name" name="name" required>

      <h3>Mobile No:</h3>
      <input type="number" placeholder="with country code" min="1111111" max="999999999999999" name="phone" required>
      </br>

      <button>Login / Register</button>

    </form>
  </div>
</body>

</html>