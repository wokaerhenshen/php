<?php 

// echo "hello";

$types = array("familybb","condokarl","condominium","condo","condo/townhouse","family","condo","familyaa","Matt","MattTalent","MattExpert");

class ScreenShare
{

    function filter($types){

        $arraryLength = sizeof($types);

        for ($index = 0 ;$index <= $arraryLength -1 ; $index++){
            for ($j = $index+1 ; $j <= $arraryLength -1 ; $j++ ){
                if (isset($types[$index],$types[$j])){
                    if(is_numeric(strpos($types[$j],$types[$index]))) { 
                        unset($types[$j]);
                    }else if(is_numeric(strpos($types[$index],$types[$j]))){
                        unset($types[$index]);                 
                    }
                }
            }
        }
        $types = array_values($types);
        print_r($types) ;
    }



    function fizbuz($start,$finish){

        

        for ($index = $start ; $index <= $finish ; $index++){
            if ($index %3 == 0 && $index %5 == 0){
                echo "fizbuz<br>";
            }
            else if ($index %3 == 0){
                echo "fiz<br>";
            }
            else if ($index %5 == 0){
                echo "buz<br>";
            }

        }
    }

    function isPalindrone($test){
        if (empty($test)){
            return true;
        }else {
            for ($index = 0 ; $index < strlen($test)/2 ; $index++){
                if($test[$index] != $test[strlen($test)-1-$index]){
                    echo "false<br>";
                    return false;
                }
            }
            echo "true<br>";
            return true;
        }

    }

}



$newScreen = new ScreenShare();
$newScreen->fizbuz(1,15);
$newScreen->isPalindrone("eqeqweqw");

// echo $types[sizeof($types)-1] ;

$newScreen->filter($types);

$create = "CREATE TABLE screenShare(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR NOT NULL
);";

$inset = "INSERT INTO screenShare('id','name') VALUES('1','ika')";

$selet = "SELECT * FROM screenShare WHERE name LIKE '%ka%'";

$remove = "DELETE  FROM screenShare WHERE name LIKE '%ka%'";

?>