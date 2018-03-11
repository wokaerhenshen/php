<?php
    const pi = 3.1415926;
    $result;
    function circle($radius, $round=2){
        if (is_numeric($radius) == 0 ){
          $result = "please input a number!";
        }

        else if ($radius <= 0 ){
          $result = "please input a positive number!";
        }

        else {

            $result = pi*$radius*$radius;
            $result = round($result,$round);
           
        }

       return $result;
    }
?>