<?php 
 require './helpers/dbConnection.php';
 require './helpers/helpers.php';


 if($_SERVER['REQUEST_METHOD'] == "POST"){

    $email    = CleanInputs($_POST['email']);
    $password = CleanInputs($_POST['password']);


    $errors = [];

    if(!validate($email,1)){
        $errors['email'] = " Email : Requierd Field";
      }elseif(!validate($email,3)){
          $errors['email'] = "Email : Invalid Email";
      }


      if(!validate($password,1)){
        $errors['Password'] = "Password : Requierd Field";
      }elseif(!validate($password,5)){
          $errors['Password'] = "Password : Invalid Length , Length must Be >= 6 CH";
        }  


        if(count($errors) > 0){
            $_SESSION['Message'] = $errors;
        }else{
             // login code .... 

          $password = md5($password);
          $sql = "select * from users where email ='$email' and password = '$password'";
          $op  = mysqli_query($con,$sql);

          if(mysqli_num_rows($op) == 1){
              // continue ....
             $_SESSION['user'] = mysqli_fetch_assoc($op);

             header("Location: ".url('index.php'));
          }else{

            $_SESSION['Message'] = ['Error in Your Credentials try Again .... '];
          }



        }

 }






 require './Layouts/header.php';
?>


<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>

                     <?php 
                            printMessages();
                     ?>


                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword"   name="password" type="password" placeholder="Enter password" />
                                            </div>
                                            <!-- <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div> -->
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <input type="submit" class="btn btn-primary"value="Login">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
          


<div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./asset/js/scripts.js"></script>
    </body>
</html>
