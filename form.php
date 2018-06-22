<!DOCTYPE html>
<html>
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
                <strong>WOW LOGO </strong> Manual <span></span>
              </h4>
              <form target="_blank" action="index.php" method="post" enctype="multipart/form-data">
                <div class="panel panel-default">
                  <div class="panel-heading">LOGOS</div>
                  <div class="panel-body">
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="primary_logo">Primary Logo:</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="primary_logo"  name="primary_logo" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2" for="secondary_logo">Variation 1:</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="secondary_logo"  name="secondary_logo" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2" for="option1_logo">Variation 2:</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="option1_logo"  name="option1_logo" required>
                        </div>
                      </div>   

                      <div class="form-group">
                        <label class="control-label col-sm-2" for="option2_logo">Variation 3:</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="option2_logo"  name="option2_logo" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2" for="primary_logo_white">Primary Logo white:</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="primary_logo_white"  name="primary_logo_white" required>
                        </div>
                      </div>
                                        
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="primary_logo_tag">Primary Logo(Tag):</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="primary_logo_tag"  name="primary_logo_tag" required>
                        </div>
                      </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading">Colors</div>
                  <div class="panel-body">

                    <div class="form-group">

                        <label class="control-label col-sm-1" for="primary_bg_color">Primary Color:</label>  
                        <div class="col-sm-5">
                          <input type="color" class="form-control" id="primary_bg_color" name="primary_bg_color" required>
                        </div>

                        <label class="control-label col-sm-1" for="primary_fg_color">FG Color:</label>
                        <div class="col-sm-5">
                          <input type="color" class="form-control" id="primary_fg_color" name="primary_fg_color" required>
                        </div>

                    </div>

                    <div class="form-group">

                      <label class="control-label col-sm-1" for="secondary_bg_color">Variation 1:</label>
                      <div class="col-sm-5">
                        <input type="color" class="form-control" id="secondary_bg_color" name="secondary_bg_color" required>
                      </div>

                      <label class="control-label col-sm-1" for="secondary_fg_color">FG Color:</label>
                      <div class="col-sm-5">
                        <input type="color" class="form-control" id="secondary_fg_color" name="secondary_fg_color" required>
                      </div>

                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-1" for="option1_bg_color">Variation 2:</label>
                      <div class="col-sm-5">
                        <input type="color" class="form-control" id="option1_bg_color" name="option1_bg_color" required>
                      </div>

                      <label class="control-label col-sm-1" for="option1_fg_color">FG Color:</label>
                      <div class="col-sm-5">
                        <input type="color" class="form-control" id="option1_fg_color" name="option1_fg_color" required>
                      </div>

                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-1" for="option2_bg_color">Variation 3:</label>
                      <div class="col-sm-5">
                        <input type="color" class="form-control" id="option2_bg_color" name="option2_bg_color" required>
                      </div>

                      <label class="control-label col-sm-1" for="option2_fg_color">FG Color:</label>
                      <div class="col-sm-5">
                        <input type="color" class="form-control" id="option2_fg_color" name="option2_fg_color" required>
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
