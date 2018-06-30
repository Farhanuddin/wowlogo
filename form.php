<?php session_start();  
require('functions.php')
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    
  </head>
  <body class="form_body">
    <div class="container">
       <div class="row">
          <div class="col-md-8">
            <div class="form_main">
              <h4 class="heading">
                <strong>WOW LOGO </strong> Manual <span></span>
              </h4>

              <?php 
              
                if(isset($_GET['logout']) && $_GET['logout']){
                   
                   session_destroy();
                   header('Location:'. getBaseUrl().'login.php');
                }
              ?>

              <?php
              if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
              ?>
                    <div class="dropdown btn_dropdown logout">
                      <button class="btn btn-login btn-primary btn-right dropdown-toggle f_btn" type="button" data-toggle="dropdown" aria-expanded="false"> <?php echo ucwords($_SESSION['username']); ?> Logged in
                      <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>?logout=true">Logout</a></li>
                        </ul>
                  </div>
              <?php 
              }
              ?>


              <?php 
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
              
                    echo '<div class="alert alert-success">
                      <strong>Success! </strong>'.$_SESSION["msg"].'
                    </div>';

                }else{

                   $route = "http://" . $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                   $route = str_replace("/form.php","", $route);
                   $route .= '/login.php';
                   header('Location: '. $route);   

                }
              ?>

              <form target="_blank" action="index.php" method="post" enctype="multipart/form-data">
                <div class="panel panel-default">
                  <div class="panel-heading">Logo</div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="primary_bg_color">BG 1:</label>
                          <div class="col-sm-9">
                            <input type="color" class="form-control" id="primary_bg_color" name="primary_bg_color" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="primary_logo">Logo 1:</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control" id="primary_logo" name="primary_logo" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="secondary_bg_color">BG 2:</label>
                          <div class="col-sm-9">
                            <input type="color" class="form-control" id="secondary_bg_color" name="secondary_bg_color" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="primary_logo_white">Logo 2:</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control" id="primary_logo_white"  name="primary_logo_white" required>
                          </div>
                        </div>
                      </div>
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
                <div class="panel panel-default">
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
                </div>
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
                <div class="panel panel-default">
                  <div class="panel-heading">Font</div>
              <!--     <div class="panel-body">
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
                  </div> -->

                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="font1_text">Font(1) Text:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="font1_text" name="font1_text" required>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                         <label class="control-label col-sm-3" for="font_light">Font Light:</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control" id="font_light" name="font_light" required>
                          </div>
                        </div>
                      </div>

                    </div>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="font2_text">Font(2) Text:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="font2_text" name="font2_text" required>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="font_bold">Font Bold:</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control" id="font_bold" name="font_bold" required>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="font3_text">Font(3) Text:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="font3_text" name="font3_text" required>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="font_regular">Font Regular:</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control" id="font_regular" name="font_regular" required>
                          </div>
                        </div>
                      </div>

                    </div>
                </div>
              
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-default">Generate</button>
                  </div>
                </div>
              </form>
             </div>
          </div>
       </div>
    </div>
  </body>
</html>
