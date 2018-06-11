<?php require('connection.php') ?>
<?php require('functions.php') ?>
<!DOCTYPE html>
<html>
<?php

      if($_SERVER["REQUEST_METHOD"] == "POST"){

          //Primary
          $primary_bg_color = $_POST['primary_bg_color'];
          $primary_fg_color = $_POST['primary_fg_color'];

          $primary_logo_file = $_FILES['primary_logo']['tmp_name'];

          $primary_logo = uploadFile($_FILES['primary_logo'], 'image/bg-logo/');

          $primary_logo_white = uploadFile($_FILES['primary_logo_white'], 'image/bg-logo/');

          $primary_logo_tag = uploadFile($_FILES['primary_logo_tag'], 'image/bg-logo/');
          //copy logo folder file - logo_white
          //$primary_logo = uploadFile($_FILES['primary_logo'], 'image/bg-logo/');
          $logo_white = $primary_logo;

          //copy('image/bg-logo/logo1.png', 'image/bg-logo/logo_white.png');
          //$logo_white = uploadFile($_FILES['primary_logo'], 'image/bg-logo/', 'logo_white.png');

          //Secondary
          $secondary_bg_color = $_POST['secondary_bg_color'];
          $secondary_fg_color = $_POST['secondary_fg_color'];
          $secondary_logo_file = $_FILES['secondary_logo'];

          $secondary_logo = uploadFile($_FILES['secondary_logo'], 'image/bg-logo/');

          //Upload logo folder file - logo_black
          $logo_black = $secondary_logo;
          //copy('image/bg-logo/logo2.png', 'image/bg-logo/logo_black.png');
          //$logo_black = uploadFile($_FILES['secondary_logo'], 'image/bg-logo/', 'logo_black.png');

          //Option1
          $option1_bg_color = $_POST['option1_bg_color'];
          $option1_fg_color = $_POST['option1_fg_color'];
          $option1_logo = uploadFile($_FILES['option1_logo'], 'image/bg-logo/');

          //Option2
          $option2_bg_color = $_POST['option2_bg_color'];
          $option2_fg_color = $_POST['option2_fg_color'];
          $option2_logo = uploadFile($_FILES['option2_logo'], 'image/bg-logo/');

          //font
          $font_name = $_POST['font_name'];
          $font_light = uploadFile($_FILES['font_light'], 'fonts/');
          $font_bold = uploadFile($_FILES['font_bold'], 'fonts/');
          $font_regular = uploadFile($_FILES['font_regular'], 'fonts/');

          //insert into database
          $sql = "INSERT INTO logos
          (primary_bg_color, primary_fg_color, primary_logo_file, primary_logo_white, primary_logo_tag ,
          secondary_bg_color ,secondary_fg_color, secondary_logo,
          option1_bg_color, option1_fg_color,option1_logo,
          option2_bg_color, option2_fg_color, option2_logo,
          font_name, font_light, font_bold, font_regular, logo_white, logo_black)
          VALUES
          ('{$primary_bg_color}', '{$primary_fg_color}', '{$primary_logo}', '{$primary_logo_white}', '{$primary_logo_tag}',
           '{$secondary_bg_color}', '{$secondary_fg_color}' ,'{$secondary_logo}',
           '{$option1_bg_color}', '{$option1_fg_color}', '{$option1_logo}',
           '{$option2_bg_color}','{$option2_fg_color}','{$option2_logo}',
           '{$font_name}', '{$font_light}', '{$font_bold}', '{$font_regular}', '{$logo_white}', '{$logo_black}')";

          if ($conn->query($sql) === TRUE) {

              $last_id = $conn->insert_id;

              $route = "http://" . $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
              $route .= '?id='.$last_id;


               header('Location: '. $route);

          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }

          $conn->close();
          //inserted in database
        }


        if(isset($_GET['id'])) {


          $logo_id = $_GET['id'];
          $sql = "SELECT * FROM logos where id='{$logo_id}'";
          $result = $conn->query($sql);

          if($result->num_rows > 0){
            //logo fetched
              $logo_result = $result->fetch_assoc();

          }else{
            //redirect to form.php
             echo 'Design Not Found';
             die();
          }

        }else{
           //   $route = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
           // //   var_dump($route);
           //  //  die();
           //   $route = str_replace("index.php","", $route.'/form.php');
           //   header('Location: '. $route);
        }

    ?>

  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--<link rel="stylesheet" type="text/css" href="color.css"> -->

    <style>
    @font-face {
          font-family: 'font_light';
          src: url(<?php echo 'fonts/'.$logo_result['font_light']; ?>);
    }
    @font-face {
          font-family: 'font_regular';
          src: url(<?php echo 'fonts/'.$logo_result['font_regular']; ?>);
    }
    @font-face {
          font-family: 'font_bold';
          src: url(<?php echo 'fonts/'.$logo_result['font_bold']; ?>);
    }

    .primary-color{
        background: <?php echo isset($logo_result['primary_bg_color']) ? $logo_result['primary_bg_color'] : '#000'; ?>;
        border-color: <?php echo isset($logo_result['primary_bg_color']) ? $logo_result['primary_bg_color'] : '#000'; ?>;;
        color: <?php echo isset($logo_result['primary_fg_color']) ? $logo_result['primary_fg_color'] : '#fff'; ?>;;
      }
      .secondary-color{
        background: <?php echo isset($logo_result['secondary_bg_color']) ? $logo_result['secondary_bg_color'] : '#f26522'; ?>;
        color: <?php echo isset($logo_result['secondary_fg_color']) ? $logo_result['secondary_fg_color'] : '#000'; ?>;
      }
      .option1-color{
        background: <?php echo isset($logo_result['option1_bg_color']) ? $logo_result['option1_bg_color'] : '#1d1e1f'; ?>;
        color: <?php echo isset($logo_result['option1_fg_color']) ? $logo_result['option1_fg_color'] : '#737070'; ?>;
      }
      .option2-color{
        background: <?php echo isset($logo_result['option2_bg_color']) ? $logo_result['option2_bg_color'] : '#483103'; ?>;
        color: <?php echo isset($logo_result['option2_fg_color']) ? $logo_result['option2_fg_color'] : '#b9beda'; ?>;
      }
      .primary-text-color{
        color: <?php echo isset($logo_result['primary_bg_color']) ? $logo_result['primary_bg_color'] : '#000'; ?>;
      }
      .secondary-text-color{
        color:<?php echo isset($logo_result['secondary_bg_color']) ? $logo_result['secondary_bg_color'] : '#f26522'; ?>;
      }

    </style>
  </head>
  <body>

    <!-- page 1 start -->
    <div class="page primary-color" id="page1">
      <h1 class="p1_brand_name">BRAND</h1>
      <div class="p1_logo_image">
        <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
      </div>
    </div>
    <!-- page 1 end -->

    <!-- page 2 start -->
    <div class="page secondary-color" id="page2">
      <h1 class="f_brand_name">01.</h1>
      <h1 class="s_brand_name">LOGO DESIGN</h1>
      <div class="s_logo_image">
        <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
      </div>
    </div>
    <!-- page 2 end -->

    <!-- page 3 start -->
    <div class="page page_detail primary-color" id="page3">
      <div class="page_detail_top_heading">
        <span class="page_detail_logo_image">
          <img src="image/main-logo/logo.png">
        </span>
        <span class="page_detail_brand_identity primary-text-color">
          <p>Brand Identity Standards</p>
        </span>
      </div>
      <div class="border-line primary-color"></div>
      <div class="page_detail_body">
        <div class="page_detail_nav">
          <div class="page_detail_nav_border secondary-color"></div>
          <div class="primary-text-color page_detail_presentation_design">
            Corporate Design
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            The Corporate logo should be used at all times.
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            This is to make sure the logo and brand are used in a consistent manner across all communications.
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            While the primary logo color is preferred, alternate colors can be used depending on the environment in which the logo is enclosed.
          </div>
        </div>
        <div class="page_detail_nav_boby">

          <p class="p3_silder_heading primary-text-color p3_primary">Primary logo</p>
          <div class="p3_cover_silder_logo">
             <img src="image/bg-logo/<?php echo $logo_result['primary_logo_file'] ?>">
          </div>

          <div class="p3_main_logo">
            <div class="p3_nav_boby_left">
              <p class="p3_silder_heading primary-text-color">Logo Color 1</p>
              <div class="p3_logo">
                 <img src="image/bg-logo/<?php echo $logo_result['primary_logo_file'] ?>">
              </div>
            </div>

            <div class="p3_nav_boby_left">
              <p class="p3_silder_heading primary-text-color">Logo Color 2</p>
              <div class="p3_logo">
                 <img src="image/bg-logo/<?php echo $logo_result['secondary_logo'] ?>">
              </div>
            </div>

            <div class="p3_nav_boby_left">
              <p class="p3_silder_heading primary-text-color">Logo Color 3</p>
              <div class="p3_logo">
                 <img src="image/bg-logo/<?php echo $logo_result['option1_logo'] ?>">
              </div>
            </div>

            <div class="p3_nav_boby_left">
              <p class="p3_silder_heading primary-text-color">Logo Color 4</p>
              <div class="p3_logo">
                 <img src="image/bg-logo/<?php echo $logo_result['option2_logo'] ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- page 3 end -->

    <!-- page 4 start -->
    <div class="page page_detail primary-color" id="page4">
      <div class="page_detail_top_heading">
        <span class="page_detail_logo_image">
          <img src="image/main-logo/logo.png">
        </span>
        <span class="page_detail_brand_identity primary-text-color">
          <p>Brand Identity Standards</p>
        </span>
      </div>
      <div class="border-line primary-color"></div>
      <div class="page_detail_body">
        <div class="page_detail_nav">
          <div class="page_detail_nav_border secondary-color"></div>
          <div class="primary-text-color page_detail_presentation_design">
            Logo Variations
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            The Logo may include the brand's tagline, "Wall Street Deals for Main Street Investors" .
          </div>
        </div>
        <div class="page_detail_nav_boby">

          <p class="p3_silder_heading primary-text-color p4_primary">Primary logo</p>
          <div class="p3_cover_silder_logo">
             <img src="image/bg-logo/<?php echo $logo_result['primary_logo_file'] ?>">
          </div>

          <p class="p3_silder_heading primary-text-color p4_primary_end">Primary Logo With Tagline Included</p>
          <div class="p3_cover_silder_logo">
             <img src="image/bg-logo/<?php echo $logo_result['primary_logo_tag'] ?>">
          </div>

        </div>
      </div>
    </div>
    <!-- page 4 end -->

    <!-- page 5 start -->
    <div class="page page_detail primary-color" id="page5">
      <div class="page_detail_top_heading">
        <span class="page_detail_logo_image">
          <img src="image/main-logo/logo.png">
        </span>
        <span class="page_detail_brand_identity primary-text-color">
          <p>Brand Identity Standards</p>
        </span>
      </div>
      <div class="border-line primary-color"></div>
      <div class="page_detail_body">
        <div class="page_detail_nav">
          <div class="page_detail_nav_border secondary-color"></div>
          <div class="primary-text-color page_detail_presentation_design">
            Logo Variations
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            The Logo may include the brand's tagline, "Wall Street Deals for Main Street Investors" .
          </div>
        </div>
        <div class="page_detail_nav_boby">

          <div class="p5_bg_row">
            <div class="p5_bg_col">
              <p class="p5_silder_heading primary-text-color">Background 1</p>
              <div class="p5_cover_silder_logo primary-color">
                 <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
              </div>
            </div>
            <div class="p5_bg_col">
              <p class="p5_silder_heading primary-text-color">Background 2</p>
              <div class="p5_cover_silder_logo secondary-color">
                 <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
              </div>
            </div>
          </div>

          <div class="p5_bg_row p5_row">
            <div class="p5_bg_col">
              <p class="p5_silder_heading primary-text-color">Background 3</p>
              <div class="p5_cover_silder_logo option1-color">
                 <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
              </div>
            </div>
            <div class="p5_bg_col">
              <p class="p5_silder_heading primary-text-color">Background 4</p>
              <div class="p5_cover_silder_logo option2-color">
                 <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- page 5 end -->

    <!-- page 6 start -->
    <div class="page secondary-color" id="page6">
      <h1 class="f_brand_name">02.</h1>
      <h1 class="s_brand_name">TYPOGRAPHY</h1>
      <div class="s_logo_image">
        <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
      </div>
    </div>
    <!-- page 6 end -->

    <!-- page 9 start -->
    <div class="page page_detail primary-color" id="page7">
      <div class="page_detail_top_heading">
        <span class="page_detail_logo_image">
          <img src="image/main-logo/logo.png">
        </span>
        <span class="page_detail_brand_identity primary-text-color">
          <p>Brand Identity Standards</p>
        </span>
      </div>
      <div class="border-line primary-color"></div>
      <div class="page_detail_body">
        <div class="page_detail_nav">
          <div class="page_detail_nav_border secondary-color"></div>
          <div class="primary-text-color page_detail_presentation_design">
            Corporate Typography
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            Our font families should be used to help ensure the consistent look and feel of the brand across all media.
            <br>
            <br>
            <br>
            Proxima Nova is the brand's primary font, and should be used wherever possible. The web-friendly alternate for Proxima Nova is Montserret.
            <br>
            <br>
            <br>
            <br>
            The regular weight should be used for body copy. The bold weight should be used for headlines.Light should be used for headlines that counter the weight of bold headlines.

          </div>
        </div>
        <div class="page_detail_nav_boby">
             <!-- Cover Silde -->
             <div class="p7_cover_silder primary-text-color">
                <div class="box_left">
                   <p class="p7_silder_heading primary-text-color"><?php echo isset($logo_result['font_name']) ? $logo_result['font_name'] : 'Default'; ?> Light</p>
                   <h3 class="f_letter" style="font-family: font_light !important;">A <span style="font-family: font_light !important;">a</span></h3>
                </div>
                <div class="box_left">
                   <p class="capital_letter" style="font-family: font_light !important;">ABCDEFGHIJKLMNOPQRSTUVWXYZ</p>
                   <p class="small_letter" style="font-family: font_light !important;">abcdefghijklmnopqrstuvwxyz</p>
                   <p class="numeric_letter" style="font-family: font_light !important;">0123456789(,.;:?!$&*)</p>
                </div>
             </div>
             <div style="clear:both"></div>
             <div class="p7_cover_silder primary-text-color">
                <div class="box_left">
                   <p class="p7_silder_heading primary-text-color"><?php echo isset($logo_result['font_name']) ? $logo_result['font_name'] : 'Default'; ?> Regular</p>
                   <h3 class="f_letter" style="font-family: font_regular !important;">A <span style="font-family: font_regular !important;">a</span></h3>
                </div>
                <div class="box_left">
                   <p class="capital_letter" style="font-family: font_regular !important;">ABCDEFGHIJKLMNOPQRSTUVWXYZ</p>
                   <p class="small_letter" style="font-family: font_regular !important;">abcdefghijklmnopqrstuvwxyz</p>
                   <p class="numeric_letter" style="font-family: font_regular !important;">0123456789(,.;:?!$&*)</p>
                </div>
             </div>
             <div style="clear:both"></div>
             <div class="p7_cover_silder primary-text-color">
                <div class="box_left">
                   <p class="p7_silder_heading primary-text-color"><?php echo isset($logo_result['font_name']) ? $logo_result['font_name'] : 'Default'; ?> Bold</p>
                   <h3 class="f_letter" style="font-family: font_bold !important;">A <span style="font-family: font_bold !important;">a</span></h3>
                </div>
                <div class="box_left">
                   <p class="capital_letter" style="font-family: font_bold !important;">ABCDEFGHIJKLMNOPQRSTUVWXYZ</p>
                   <p class="small_letter" style="font-family: font_bold !important;">abcdefghijklmnopqrstuvwxyz</p>
                   <p class="numeric_letter" style="font-family: font_bold !important;">0123456789(,.;:?!$&*)</p>
                </div>
             </div>
        </div>
      </div>
    </div>
    <!-- page 7 end -->

    <!-- page 8 start -->
    <div class="page secondary-color" id="page8">
      <h1 class="f_brand_name">03.</h1>
      <h1 class="s_brand_name">COLOR</h1>
      <div class="s_logo_image">
        <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
      </div>
    </div>
    <!-- page 8 end -->

    <!-- page 9 start -->
    <div class="page page_detail primary-color" id="page9">
      <div class="page_detail_top_heading">
        <span class="page_detail_logo_image">
          <img src="image/main-logo/logo.png">
        </span>
        <span class="page_detail_brand_identity primary-text-color">
          <p>Brand Identity Standards</p>
        </span>
      </div>
      <div class="border-line primary-color"></div>
      <div class="page_detail_body">
        <div class="page_detail_nav">
          <div class="page_detail_nav_border secondary-color"></div>
          <div class="primary-text-color page_detail_presentation_design">
            Corporate <br>Colors
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            Primary brand colors should be used in all occasions for Sharestates communications.
            <br>
            <br>
            <br>
            The palette has been designed to give a direction to the brand,offering flexibility in the design of an literature off and online.
          </div>
        </div>
        <div class="page_detail_nav_boby">

          <p class="p11_silder_heading primary-text-color">Primary Brand Colors</p>
          <!-- Cover Silde -->
          <div class="p9_cover_silder">
              <div class="box_left">
                  <div class="p9_cover_silder_logo primary-color">
                      <div class="p9_logo_div_image"></div>
                      <div class="p9_color_codes primary-text-color">
                          <p> <b>HEX&nbsp; </b><span> <?php echo isset($logo_result['primary_bg_color']) ? $logo_result['primary_bg_color'] : '#000'; ?>; </span></p>
                          <p> <b>RGB&nbsp; </b><span> <?php echo convert2Rgb($logo_result['primary_bg_color']); ?></span></p>
                          <p> <b>CMYK</b><span><?php echo hex2cmyk("{$logo_result['primary_bg_color']}"); ?></span></p>
                      </div>
                  </div>
              </div>
              <div class="box_right">
                  <div class="p9_cover_silder_logo secondary-color">
                      <div class="p9_logo_div_image"></div>
                      <div class="p9_color_codes primary-text-color">
                          <p> <b>HEX&nbsp; </b><span> <?php echo isset($logo_result['secondary_bg_color']) ? $logo_result['secondary_bg_color'] : '#000'; ?>;</span></p>
                          <p> <b>RGB&nbsp; </b><span> <?php echo convert2Rgb($logo_result['secondary_bg_color']); ?></span></p>
                          <p> <b>CMYK</b><span>100, 83, 38, 29</span></p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="p9_cover_silder">
              <div class="box_left">
                  <div class="p9_cover_silder_logo option1-color">
                      <div class="p9_logo_div_image"></div>
                      <div class="p9_color_codes primary-text-color">
                          <p> <b>HEX&nbsp; </b><span> <?php echo isset($logo_result['option1_bg_color']) ? $logo_result['option1_bg_color'] : '#000'; ?></span></p>
                          <p> <b>RGB&nbsp; </b><span>  <?php echo convert2Rgb($logo_result['option1_bg_color']); ?></span></p>
                          <p> <b>CMYK</b><span>97, 70, 23, 7</span></p>
                      </div>
                  </div>
              </div>
              <div class="box_right">
                  <div class="p9_cover_silder_logo option2-color">
                      <div class="p9_logo_div_image"></div>
                      <div class="p9_color_codes primary-text-color">
                          <p> <b>HEX&nbsp; </b><span> <?php echo isset($logo_result['option2_bg_color']) ? $logo_result['option2_bg_color'] : '#000'; ?></span></p>
                          <p> <b>RGB&nbsp; </b><span>  <?php echo convert2Rgb($logo_result['option2_bg_color']); ?></span></p>
                          <p> <b>CMYK</b><span>14, 13, 12, 0</span></p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="p9_content primary-text-color">
              <p>To ensure color consistency, please adhere to these specifications and use qualified vendors and reliable reproduction methods.</p>
              <p>Use this reference to ensure accuracy when matching colors for printed materials.</p>
          </div>

        </div>
      </div>
    </div>
    <!-- page 9 end -->

    <!-- page 10 start -->
    <div class="page secondary-color" id="page10">
      <h1 class="f_brand_name">04.</h1>
      <h1 class="s_brand_name">PRESENTATION</h1>
      <div class="s_logo_image">
        <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
      </div>
    </div>
    <!-- page 10 end -->

    <!-- page 11 start -->
    <div class="page page_detail primary-color" id="page11">
      <div class="page_detail_top_heading">
        <span class="page_detail_logo_image">
          <img src="image/main-logo/logo.png">
        </span>
        <span class="page_detail_brand_identity primary-text-color">
          <p>Brand Identity Standards</p>
        </span>
      </div>
      <div class="border-line primary-color"></div>
      <div class="page_detail_body">
        <div class="page_detail_nav">
          <div class="page_detail_nav_border secondary-color"></div>
          <div class="primary-text-color page_detail_presentation_design">
            Presentation Design
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            The following are examples of slide templates that can be used for corporate presentations.
          </div>
        </div>
        <div class="page_detail_nav_boby">
          <!-- Cover Silde -->
          <p class="p11_silder_heading primary-text-color">Cover Slide</p>
          <div class="p11_cover_silder">
            <div class="p11_cover_silder_logo p11_logo_img primary-color">
              <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
              <!-- <div class="p11_logo_div_image">
              </div> -->
              <p class="p11_box_title">Presentation Title Goes Here</p>
            </div>
            <div class="p11_cover_silder_logo p11_logo_img secondary-color">
              <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
              <!-- <div class="p11_logo_div_image">
              </div> -->
              <p class="p11_box_title">Presentation Title Goes Here</p>
            </div>
          </div>

          <!-- Background Colors -->
          <p class="p11_silder_heading primary-text-color">Background Color 3</p>
          <div class="p11_cover_silder p11_margin_0">
            <div class="p11_cover_silder_logo primary-color">
              <div class="p11_logo_background_image">
                <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
              </div>
              <p class="p11_background_title">Slide Title <br>Goes Here</p>
              <p class="p11_background_subtitle">Subtitle Goes Here</p>
            </div>
            <div class="p11_cover_silder_logo secondary-color">
              <div class="p11_logo_background_image">
                <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
              </div>
              <p class="p11_background_title">Slide Title <br>Goes Here</p>
              <p class="p11_background_subtitle">Subtitle Goes Here</p>
            </div>
          </div>
          <div class="p11_cover_silder">
            <div class="p11_cover_silder_logo option1-color">
              <div class="p11_logo_background_image">
                <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
              </div>
              <p class="p11_background_title">Slide Title <br>Goes Here</p>
              <p class="p11_background_subtitle">Subtitle Goes Here</p>
            </div>
            <div class="p11_cover_silder_logo option2-color">
              <div class="p11_logo_background_image">
                <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
              </div>
              <p class="p11_background_title">Slide Title <br>Goes Here</p>
              <p class="p11_background_subtitle">Subtitle Goes Here</p>
            </div>
          </div>


        </div>
      </div>
    </div>
    <!-- page 11 end -->

    <!-- page 12 start -->
    <div class="page page_detail primary-color" id="page12">
      <div class="page_detail_top_heading">
        <span class="page_detail_logo_image">
          <img src="image/main-logo/logo.png">
        </span>
        <span class="page_detail_brand_identity primary-text-color">
          <p>Brand Identity Standards</p>
        </span>
      </div>
      <div class="border-line primary-color"></div>
      <div class="page_detail_body">
        <div class="page_detail_nav">
          <div class="page_detail_nav_border secondary-color"></div>
          <div class="primary-text-color page_detail_presentation_design">
            Presentation Design
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            The following are examples of slide templates that can be used for corporate presentations.
          </div>
        </div>
        <div class="page_detail_nav_boby">

          <!-- Background Colors -->
          <p class="p12_silder_heading primary-text-color">Background Color 3</p>
          <div class="p12_cover_silder">
            <div class="p12_cover_silder_logo">
              <div class="p12_sub_nav primary-color">
                <div class="p12_logo_background_image">
                  <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
                </div>
              </div>
              <div class="p12_sub_body">
                <p>Slide Title</p>
              </div>
            </div>
            <div class="p12_cover_silder_logo">
              <div class="p12_sub_nav secondary-color">
                <div class="p12_logo_background_image">
                  <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
                </div>
              </div>
              <div class="p12_sub_body">
                <p>Slide Title</p>
              </div>
            </div>
          </div>
          <div class="p12_cover_silder">
            <div class="p12_cover_silder_logo">
              <div class="p12_sub_nav option1-color">
                <div class="p12_logo_background_image">
                  <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
                </div>
              </div>
              <div class="p12_sub_body">
                <p>Slide Title</p>
              </div>
            </div>
            <div class="p12_cover_silder_logo">
              <div class="p12_sub_nav option2-color">
                <div class="p12_logo_background_image">
                  <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
                </div>
              </div>
              <div class="p12_sub_body">
                <p>Slide Title</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- page 13 end -->

    <!-- page 13 start -->
    <div class="page secondary-color" id="page13">
      <h1 class="f_brand_name">05.</h1>
      <h1 class="s_brand_name">ADVERTISEMENTS</h1>
      <div class="s_logo_image">
        <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
      </div>
    </div>
    <!-- page 13 end -->

    <!-- page 14 start -->
    <div class="page page_detail primary-color" id="page14">
      <div class="page_detail_top_heading">
        <span class="page_detail_logo_image">
          <img src="image/main-logo/logo.png">
        </span>
        <span class="page_detail_brand_identity primary-text-color">
          <p>Brand Identity Standards</p>
        </span>
      </div>
      <div class="border-line primary-color"></div>
      <div class="page_detail_body">
        <div class="page_detail_nav">
          <div class="page_detail_nav_border secondary-color"></div>
          <div class="primary-text-color page_detail_presentation_design">
            Display <br>Ad Design
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            The following are examples of best brand practices for display ads.
          </div>
        </div>
        <div class="page_detail_nav_boby">
          <p class="p14_silder_heading primary-text-color">Ad Examples</p>
          <div class="p14_cover_silder">
            <div class="p14_bg_body">
              <img src="image/ads/body.png" class="body_img" alt="">
              <div class="p14_image_absolute">
                <div class="logo_body">
                  <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>" class="logo_body" alt="">
                </div>
              </div>
            </div>
            <div class="p14_bg_nav">
              <img src="image/ads/nav.png" class="nav_img" alt="">
              <div class="logo_nav">
                <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>"  alt="">
              </div>
            </div>
            <div class="p14_bg_footer">
              <img src="image/ads/footer.png" class="footer_img" alt="">
              <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>" class="logo_footer" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- page 14 end -->

    <!-- page 15 start -->
    <div class="page secondary-color" id="page15">
      <h1 class="f_brand_name">06.</h1>
      <h1 class="s_brand_name">E-MAIL</h1>
      <div class="s_logo_image">
        <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
      </div>
    </div>
    <!-- page 15 end -->

    <!-- page 16 start -->
    <div class="page page_detail primary-color" id="page16">
      <div class="page_detail_top_heading">
        <span class="page_detail_logo_image">
          <img src="image/main-logo/logo.png">
        </span>
        <span class="page_detail_brand_identity primary-text-color">
          <p>Brand Identity Standards</p>
        </span>
      </div>
      <div class="border-line primary-color"></div>
      <div class="page_detail_body">
        <div class="page_detail_nav">
          <div class="page_detail_nav_border secondary-color"></div>
          <div class="primary-text-color page_detail_presentation_design">
            E-Mail <br>Design
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            The following are examples of best brand practices for e-mail design.
          </div>
        </div>
        <div class="page_detail_nav_boby">

          <div class="p16_body_profile">
            <div class="p16_border_bottom">
              <p class="p16_email_heading primary-text-color">E-Mail Signature Example</p>
              <div class="p16_profile">
                <div class="p16_profile_image">
                  <img src="image/bg-logo/<?php echo $logo_result['primary_logo_file'] ?>" alt="">
                </div>
                <div class="p16_profile_text">
                  <p class="p16_name primary-text-color">Jone Smith | Job Title</p>
                  <p class="p16_email secondary-text-color">Jone@sharestates.com</p>
                  <p class="p16_contact primary-text-color">1-212-201-0705</p>
                  <p class="p16_address primary-text-color">11 Middle Neck Road</p>
                  <p class="p16_subaddress primary-text-color">Suite 400A, Great Neck, NY 11021</p>
                </div>
              </div>
            </div>
          </div>
          <div class="p16_body_bottom">
            <div class="p16_website secondary-text-color">
              <span>website.com</span>
              <img src="image/e-mail/linkedin_logo.png" alt="">
              <img src="image/e-mail/twitter_logo.png" alt="">
              <img src="image/e-mail/facebook_logo.png" alt="">
            </div>
            <div class="p16_detail_text primary-text-color">
              <p>
                CONFIDENTIALITY NOTICE: This email and any attachments are for the exclusive and confidential use of the intended recipient. If
                you are not the intended recipient, please do not read, distribute or take action in reliance upon this message. If you have received
                this in error, please notify us immediately by return email and promptly delete this message and its attachments from your system.
              </p>
            </div>
            <div class="p16_detail_text_bottom primary-text-color">
              <p>
                Because most e-mail clients currently do not offer support for CSS3 custom font embedding, <br>
                Arial is acceptable for use in e-mail signatures.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- page 16 end -->

    <!-- page 17 start -->
    <div class="page secondary-color" id="page17">
      <h1 class="f_brand_name">07.</h1>
      <h1 class="s_brand_name">SOCIAL MEDIA</h1>
      <div class="s_logo_image">
        <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
      </div>
    </div>
    <!-- page 17 end -->

    <!-- page 18 start -->
    <div class="page page_detail primary-color" id="page18">
      <div class="page_detail_top_heading">
        <span class="page_detail_logo_image">
          <img src="image/main-logo/logo.png">
        </span>
        <span class="page_detail_brand_identity primary-text-color">
          <p>Brand Identity Standards</p>
        </span>
      </div>
      <div class="border-line primary-color"></div>
      <div class="page_detail_body">
        <div class="page_detail_nav">
          <div class="page_detail_nav_border secondary-color"></div>
          <div class="primary-text-color page_detail_presentation_design">
            Social Media Profiles
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            The following are examples of best brand practices for Social Media account.
          </div>
        </div>
        <div class="page_detail_nav_boby">

          <p class="p18_silder_heading primary-text-color">Facebook</p>
          <div class="p18_cover_silder p18_facebook">
            <img src="image/social-media/facebook.png" class="p18_facebook_bg" alt="">
            <div class="p18_facebook_logo primary-color">
              <img src="image/bg-logo/<?php echo $logo_result['primary_logo_file'] ?>" class="">
            </div>
            <div class="p18_facebook_cover_logo primary-color">
              <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>" class="">
            </div>
          </div>

          <div class="new_row">
            <div class="p18_col_60">
              <p class="p18_silder_heading primary-text-color">Twitter</p>
              <div class="p18_cover_silder p18_twitter">
                <img src="image/social-media/twitter.png" class="p18_twitter_bg" alt="">
                <div class="p18_twitter_logo primary-color">
                  <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>" class="">
                </div>
                <div class="p18_twitter_dp_logo primary-color">
                  <img src="image/bg-logo/<?php echo $logo_result['primary_logo_file'] ?>" class="">
                </div>
              </div>
            </div>
            <div class="p18_col_40">
              <p class="p18_silder_heading primary-text-color">Instagram</p>
              <div class="p18_cover_silder p18_instagram">
                <img src="image/social-media/instagram.png" class="p18_instagram_bg" alt="">
                <div class="p18_instagram_logo primary-color">
                   <img src="image/bg-logo/<?php echo $logo_result['primary_logo_file'] ?>">
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- page 18 end -->

    <!-- page 19 start -->
    <div class="page secondary-color" id="page19">
      <h1 class="f_brand_name">08.</h1>
      <h1 class="s_brand_name">STATIONARY</h1>
      <div class="s_logo_image">
        <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
      </div>
    </div>
    <!-- page 19 end -->

    <!-- page 20 start -->
    <div class="page page_detail primary-color" id="page20">
      <div class="page_detail_top_heading">
        <span class="page_detail_logo_image">
          <img src="image/main-logo/logo.png">
        </span>
        <span class="page_detail_brand_identity primary-text-color">
          <p>Brand Identity Standards</p>
        </span>
      </div>
      <div class="border-line primary-color"></div>
      <div class="page_detail_body">
        <div class="page_detail_nav">
          <div class="page_detail_nav_border secondary-color"></div>
          <div class="primary-text-color page_detail_presentation_design">
            Stationary Designs
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            The following are examples of best brand practices for Stationary Designs.
          </div>
        </div>
        <div class="page_detail_nav_boby">

          <p class="p20_silder_heading primary-text-color">Business Card</p>
          <div class="p20_cover_silder card">
            <div class="p20_left">
              <img src="image/stationary/card.png" class="card_img" alt="">
              <div class="p20_card_logo primary-color">
                <img src="image/bg-logo/<?php echo $logo_result['primary_logo_file'] ?>">
              </div>
            </div>
          </div>

          <p class="p20_silder_heading primary-text-color">Envelope</p>
          <div class="p20_cover_silder envelope">
            <img src="image/stationary/envelope.png" class="envelope_img" alt="">
            <div class="p20_envelope_logo primary-color">
              <img src="image/bg-logo/<?php echo $logo_result['primary_logo_file'] ?>">
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- page 20 end -->

    <!-- page 21 start -->
    <div class="page page_detail primary-color" id="page21">
      <div class="page_detail_top_heading">
        <span class="page_detail_logo_image">
          <img src="image/main-logo/logo.png">
        </span>
        <span class="page_detail_brand_identity primary-text-color">
          <p>Brand Identity Standards</p>
        </span>
      </div>
      <div class="border-line primary-color"></div>
      <div class="page_detail_body">
        <div class="page_detail_nav">
          <div class="page_detail_nav_border secondary-color"></div>
          <div class="primary-text-color page_detail_presentation_design">
            Stationary Designs
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            The following are examples of best brand practices for Stationary Designs.
          </div>
        </div>
        <div class="page_detail_nav_boby">
          <p class="p21_silder_heading primary-text-color">Letterhead</p>
          <div class="p21_cover_silder letter">
            <img src="image/stationary/letterhead.png" class="letter_img" alt="">
            <div class="p21_logo primary-color">
              <img src="image/bg-logo/<?php echo $logo_result['primary_logo_file'] ?>">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- page 21 end -->

    <!-- page 22 start -->
    <div class="page secondary-color" id="page22">
      <h1 class="f_brand_name">09.</h1>
      <h1 class="s_brand_name">MERCHANDISING</h1>
      <div class="s_logo_image">
        <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
      </div>
    </div>
    <!-- page 22 end -->

    <!-- page 23 Start -->
    <div class="page page_detail primary-color" id="page23">
      <div class="page_detail_top_heading">
        <span class="page_detail_logo_image">
          <img src="image/main-logo/logo.png">
        </span>
        <span class="page_detail_brand_identity primary-text-color">
          <p>Brand Identity Standards</p>
        </span>
      </div>
      <div class="border-line primary-color"></div>
      <div class="page_detail_body">
        <div class="page_detail_nav">
          <div class="page_detail_nav_border secondary-color"></div>
          <div class="primary-text-color page_detail_presentation_design">
            Designs For Merchandise
          </div>
          <div class="primary-text-color page_detail_presentation_design_detail">
            The following are examples of best brand practices for Merchandise Designs.
          </div>
        </div>
        <div class="page_detail_nav_boby">

          <div class="p23_new_row">
            <div class="p23_col_50 p23_col_margin_both">
              <p class="p23_s_silder_heading primary-text-color ">VEHICLE WRAPPING</p>
            </div>
            <div class="p23_col_50 p23_col_margin_both">
              <p class="p23_s_silder_heading primary-text-color ">MUGS</p>
            </div>
            <div class="p23_col_60">
              <div class="p23_s_cover_silder vehicle">
                <img src="image/merchandise/vehicle.png" class="vehicle_img" alt="">
                <div class="vehicle_logo">
                  <img src="image/bg-logo/<?php echo $logo_result['primary_logo_file'] ?>">
                </div>
              </div>
            </div>
            <div class="p23_col_40">
              <div class="p23_s_cover_silder mug">
                <img src="image/merchandise/mug.png" class="mug_img" alt="">
                <div class="mug_logo">
                  <img src="image/bg-logo/<?php echo $logo_result['primary_logo_file'] ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="p23_new_row">
            <div class="p23_col_50 p23_col_margin">
              <p class="p23_s_silder_heading primary-text-color">TSHIRTS</p>
            </div>
            <div class="p23_col_50 p23_col_margin">
              <p class="p23_s_silder_heading primary-text-color">CAPS</p>
            </div>
            <div class="p23_col_50">
              <div class="p23_s_cover_silder tshirt">
                <img src="image/merchandise/tshirt.png" class="tshirt_img" alt="">
                <div class="tshirt_logo">
                  <img src="image/bg-logo/<?php echo $logo_result['primary_logo_white'] ?>">
                </div>
              </div>
            </div>
            <div class="p23_col_50">
              <div class="p23_s_cover_silder cap">
                <img src="image/merchandise/cap.png" class="cap_img" alt="">
                <div class="cap_logo">
                  <img src="image/bg-logo/<?php echo $logo_result['primary_logo_file'] ?>">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- page 23 end -->

<script>

function convertHex(hex,opacity){
   hex = hex.replace('#','');
   r = parseInt(hex.substring(0,2), 16);
   g = parseInt(hex.substring(2,4), 16);
   b = parseInt(hex.substring(4,6), 16);

   result = 'rgba('+r+','+g+','+b+')';
   return result;
}

function hexToCMYK (hex) {
    var computedC = 0;
    var computedM = 0;
    var computedY = 0;
    var computedK = 0;

    hex = (hex.charAt(0)=="#") ? hex.substring(1,7) : hex;

    if (hex.length != 6) {
     alert ('Invalid length of the input hex value!');
     return;
    }
    if (/[0-9a-f]{6}/i.test(hex) != true) {
     alert ('Invalid digits in the input hex value!');
     return;
    }

    var r = parseInt(hex.substring(0,2),16);
    var g = parseInt(hex.substring(2,4),16);
    var b = parseInt(hex.substring(4,6),16);

    // BLACK
    if (r==0 && g==0 && b==0) {
     computedK = 1;
     return [0,0,0,1];
    }

    computedC = 1 - (r/255);
    computedM = 1 - (g/255);
    computedY = 1 - (b/255);

    var minCMY = Math.min(computedC,Math.min(computedM,computedY));

    computedC = ((computedC - minCMY) / (1 - minCMY)).toFixed(2) ;
    computedM = ((computedM - minCMY) / (1 - minCMY)).toFixed(2) ;
    computedY = ((computedY - minCMY) / (1 - minCMY)).toFixed(2) ;
    computedK = (minCMY).toFixed(2);
    return 'cmyk('+computedC+','+computedM+','+computedY+','+computedK+')';
}


$('h2').html(hexToCMYK('#A7D136'));
$('h1').html(convertHex('#A7D136'));

</script>
  </body>
</html>
