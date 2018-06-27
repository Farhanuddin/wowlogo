<?php 

 session_start(); 

require('connection.php') ?>
<!DOCTYPE html>
<html>

<?php
    $msg = '';
    
    if (isset($_POST['username']) && isset($_POST['password'])) {

        //Checking from DB
          $login_sql = "SELECT * FROM users where username = '{$_POST['username']}' AND password = '{$_POST['password']}'";
          
          if($result=mysqli_query($conn,$login_sql)){

            $rowcount=mysqli_num_rows($result);

            if($rowcount == 1){
               //Loggedin
               $result = mysqli_fetch_row($result);

               $_SESSION['logged_in'] = true;
               $_SESSION['username'] = $result[1];
               $_SESSION['msg'] = 'Successfully Authorized';

               //cheap
               $route = "http://" . $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
               $route = str_replace("/login.php","", $route);
               $route .= '/form.php';

               header('Location: '. $route);

            }else{

               //invalid username and password
               $_SESSION['logged_in'] = false;
               $_SESSION['msg'] = 'Invalid Username and Password';
               $_SESSION['class'] = 'Danger';

               $route = "http://" . $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
               header('Location: '. $route);               
            }



          }else{
            echo("Error description: " . mysqli_error($con));
          }


    }
?>

  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>
  <body class="form_body">
    <div class="container">
       <div class="row">
          <div class="col-md-8">
            <div class="form_main">
              <h4 class="heading">
                <strong>WOW LOGO </strong> Login Page <span></span>
              </h4>
              <?php 
                if(isset($_SESSION['logged_in']) && !$_SESSION['logged_in']){
              
                    echo '<div class="alert alert-danger">
                     <strong>Error! </strong>'.$_SESSION["msg"].'
                    </div>';

                }
              ?>
              <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
                <div class="panel panel-default">
                  <div class="panel-heading">Login</div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="username">Username:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="username" name="username" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-4" for="password">Password:</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="password" required>
                          </div>
                        </div>

                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-10 col-sm-2">
                          <button type="submit" name="login" class="btn btn-default">Login</button>
                        </div>
                      </div>
                 </form>  
               </div>


                    <!-- <div class="form-group">
                      <label class="control-label col-sm-2" for="option1_logo">Option 1 Logo:</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="option1_logo"  name="option1_logo" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="option2_logo">Option 2 Logo:</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="option2_logo"  name="option2_logo" required>
                      </div>
                    </div> -->

                  </div>
                </div>
             <!--    <div class="panel panel-default">
                  <div class="panel-heading">Color</div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="option1_bg_color">Color 1:</label>
                          <div class="col-sm-9">
                            <input type="color" class="form-control" id="option1_bg_color" name="option1_bg_color" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="option2_bg_color ">Color 2:</label>
                          <div class="col-sm-9">
                            <input type="color" class="form-control" id="option2_bg_color " name="option2_bg_color" required>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
                <!-- <div class="panel panel-default">
                  <div class="panel-heading">Option 1</div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="option1_bg_color">BG Color:</label>
                      <div class="col-sm-10">
                        <input type="color" class="form-control" id="option1_bg_color" name="option1_bg_color" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="option1_fg_color">FG Color:</label>
                      <div class="col-sm-10">
                        <input type="color" class="form-control" id="option1_fg_color" name="option1_fg_color" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="option1_logo">Option 1 Logo:</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="option1_logo"  name="option1_logo" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">Option 2</div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="option2_bg_color">BG Color:</label>
                      <div class="col-sm-10">
                        <input type="color" class="form-control" id="option2_bg_color" name="option2_bg_color" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="option2_fg_color">FG Color:</label>
                      <div class="col-sm-10">
                        <input type="color" class="form-control" id="option2_fg_color" name="option2_fg_color" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="option2_logo">Option 2 Logo:</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="option2_logo"  name="option2_logo" required>
                      </div>
                    </div>
                  </div>
                </div> -->
          <!--       <div class="panel panel-default">
                  <div class="panel-heading">Font</div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="font_name">Font Name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="font_name" name="font_name" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="font_light">Font Light:</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="font_light" name="font_light" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="font_bold">Font Bold:</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="font_bold" name="font_bold" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="font_regular">Font Regular:</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="font_regular" name="font_regular" required>
                      </div>
                    </div>
                  </div>
                </div> -->
<!--                 <div class="form-group">
                  <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-default">Generate</button>
                  </div>
                </div> -->
              </form>
             </div>
          </div>
       </div>
    </div>
  </body>
</html>
