<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something was posted
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];

  if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

    //read from database

    $query = "select * from users where user_name = '$user_name' limit 1";


    $result = mysqli_query($con, $query);

    if ($result) {
      if ($result && mysqli_num_rows($result) > 0) 
      {

        $user_data = mysqli_fetch_assoc($result);
        if($user_data['password'] === $password)
        {

          $_SESSION['user_id'] = $user_data['user_id'];
          header("Location: index.php");
          die;
        }
      }
    }
    echo "wrong username or password!";
  } else 
  {
    echo "Please enter some valid information!";
  }
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


</head>

<body>
  <style type="text/css">

   
    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #002424, #091a79, #00d4ff);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background:  linear-gradient(#00d4ff, #0434ed, #090f79);
    }

    .logo{
      width: 200px;
    }

    #log{
      width: 200px;
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }

    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
  </style>
  <section class="h-100 gradient-form" style="background-color: #0F0F0F;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="https://www.citynetgroup.com/assets/images/logo/CITYNETPNGLOW.png" class="logo" alt>
                    <h4 class="mt-1 mb-5 pb-1">The dream Team</h4>
                  </div>

                  <form method="POST">
                    <p>Please login to your account</p>

                    <div class="form-outline mb-4">
                      <input type="text" id="form2Example11" class="form-control" name="user_name" placeholder="Username or email address" />
                      <label class="form-label" for="form2Example11">Username</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example22" class="form-control" name="password" />
                      <label class="form-label" for="form2Example22">Password</label>
                    </div>  
                    <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" id="log" type="submit" value="login">Login</button>
                    </div>
                    
                    <div class="text-center pt-1 mb-5 pb-1">



                      <a class="text-muted" href="#!">Hai dimenticato la password?</a>
                    </div>

                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Non hai un account?</p>
                      <a href="signup.php">
                        <button type="button" class="btn btn-outline-danger">Registrati</button>
                      </a>
                    </div>

                  </form>

                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">We are more than just a company</h4>
                  <p class="small mb-0">Non sapevi nemmeno di poter avere un ventaglio di clienti così ampio?
                    <br>
                    Vieni con noi in questo viaggio alla scoperta delle TUE potenzialità.
                    <br>
                    PRONTI? SI PARTE!
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>