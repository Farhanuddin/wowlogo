<?php

      function chkFloat($value){

        if(is_float($value)){
           $value = sprintf('%0.2f', $value); 
           return $value*100;
        }else{
           return $value;
        }

      }

      function convert2Rgb($colorhex){
        $result = list($r, $g, $b) = sscanf($colorhex, "#%02x%02x%02x");
        $result = implode(", ", $result);
        return $result;
      }

      function hex2cmyk($hex) {
           $color = str_replace('#','',$hex);
            $var1 = array(
               'r' => hexdec(substr($color,0,2)),
               'g' => hexdec(substr($color,2,2)),
               'b' => hexdec(substr($color,4,2)),
            );

            if (is_array($var1)) {
               $r = $var1['r'];
               $g = $var1['g'];
               $b = $var1['b'];
            } else {
               $r = $var1;
            }
            $cyan = 255 - $r;
            $magenta = 255 - $g;
            $yellow = 255 - $b;
            $black = min($cyan, $magenta, $yellow);
            $cyan = @(($cyan    - $black) / (255 - $black));
            $magenta = @(($magenta - $black) / (255 - $black));
            $yellow = @(($yellow  - $black) / (255 - $black));

          return chkFloat($cyan).",".chkFloat($magenta).",".chkFloat($yellow).",".chkFloat($black);
        
      }


      function uploadFile($file, $path, $filename=null){
        if(!empty($file))
        {
          $path = $path;
          if(is_null($filename)){
            $filename = uniqid().'-'.basename($file['name']);
          }else{
            $filename = $filename;
          }
          
          $path = $path.$filename;

          try{
              if(move_uploaded_file($file['tmp_name'], $path)) {
                  return $filename;
              } else{
                  //echo "There was an error uploading the file, please try againzz!".$filename.'<br>';
              }
      
          }catch(\Exception $e){
              //echo $e->getMessage();
          }
        }
      }