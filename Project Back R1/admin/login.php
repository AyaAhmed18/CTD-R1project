<?php
include_once("../includes/conn.php");//connection to the database
if($_SERVER["REQUEST_METHOD"] === "POST"){

  //create new account
  if(isset($_POST["create"])){

    $name =  $_POST["name"];
    $userName = $_POST["user-name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    //encrypt user password
    $hash = password_hash($pass,PASSWORD_DEFAULT);

    try{
      $sql = 'INSERT INTO `users`( `name`, `username`, `email`, `password`) VALUES (?,?,?,?)';
      $stmt=$conn->prepare($sql);
      $stmt ->execute([$name,$userName,$email,$hash]);
      header("Location: login.php");
      die();
    }catch(PDOException $e){
      echo "failed to insert user data:" .$e->getMessage();
    }
}
//login to the website by the created account
if(isset($_POST["login"])){
session_start();

$email = $_POST["email"];
$pass = $_POST["password"];

try{
    $sql = 'SELECT `name`,`password` FROM `users` WHERE `email` = ? and active = 1';
    $stmt=$conn->prepare($sql);
    $stmt->execute([$email]);
    if($stmt->rowCount() > 0){
        $result = $stmt->fetch();
        $hash = $result["password"];
        $name =$result["name"];
        //check user password
        $verify = password_verify($pass, $hash);
        if($verify){
            $_SESSION["logged"] = true;
            $_SESSION["name"] = $name;
            header("Location: meetings.php");

            die();
        }else{
            echo "No it's not the same password";
        }
    }else{
        echo "Email not found in our DB";
    }

}catch(PDOException $e){
    echo "Failed login: " . $e->getMessage();
}
}

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Education Admin | Login/Register</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>" id="log1" >
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="email" required="" name="email" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
                <input type="hidden" name="name" value=" <?php $name; ?>">
              </div>
              <div>
              <!--  <a class="btn btn-default submit" name="login" href ="">Log in</a>
-->
                <button type="submit"  class="btn btn-default " name="login" >Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>

              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i></i> Education Admin</h1>
                  <p>©2016 All Rights Reserved. Education Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form  method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Fullname" required="" name="name" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="user-name"/>
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" name="email"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <button type="submit" class="btn btn-default " name="create">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i></i> Education Admin</h1>
                  <p>©2016 All Rights Reserved. Education Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
