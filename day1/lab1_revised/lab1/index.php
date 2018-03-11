<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   
</head>
<body>
    <?php
        $today = date("F j, Y.");
        $time ;
       
       if (date("a") == "pm"){
          $time =  "evening!";
         // include "evening.css";
        echo "<link rel = 'stylesheet' href='evening.css' />" ;
       } 

       else {
          $time = "morning!";
          echo "<link rel = 'stylesheet' href='morning.css' />" ;
       }

       $message = "Good " . $time ." It is ".$today;
       echo "<h1>$message</h1>";

       //import external function and do calculation
       include "function.php";
       $result1 = circle(55);
       $result2 = circle(1.2,4);
       $result3 = circle("eeweqweqwe",4);
       $result4 = circle(-1,3);
       echo "<h1>$result1</h1>";
       echo "<h1>$result2</h1>";
       echo "<h1>$result3</h1>";
       echo "<h1>$result4</h1>";
   echo "<h1>" . circle(23) . "</h1>";

      //count down
      echo "<ul>";
       for ($i =  date("j"); $i>=0 ;$i--){
           
           echo "<li>$i</li>";
       }
       echo"</ul>";
    ?>
</body>
</html>