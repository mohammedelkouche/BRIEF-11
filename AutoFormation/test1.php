
<!-- php inside html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo"learn php" ?></title>
</head>
<body>

    <?php

        // variable $NameOfVariable = value

                $name = "mohammed" ;
                $age = 30 ;
            
                echo "  <h1>Hi, I'm a PHP script! </h1>";
                echo " <p>there was a man named $name he was $age yers old</p> ";
        // data type 

                // string 
                $phrase = " home page " ;

                // numbers 
                $age = 30 ;

                // float 
                $float = 3.14 ;

                // boolean
                $boolean1 = false ;
                $boolean2 = true ;

                $nothing = NULL ;

                echo  $phrase ."<br>" ;
                // echo  "<br>" ;
                echo  $age ;
                echo  "<br>" ;
                echo  $float;
                echo  "<br>" ;
                echo  "<br>" ;

                // Array 
                $array = array(
                    "name" => "brahim",
                    "age" => 30 ,
                    "stadier"   => "university" ,
                    
                );
                echo gettype($age);
                echo  "<br>" ;
                echo  "<br>" ;

                var_dump($array);
                echo  "<br>" ;
                echo  "<br>" ;

                // constant : define(name, value, case-insensitive)
                define("GREETING", "Welcome to solicode");
                echo GREETING;
                echo  "<br>" ;
                echo  "<br>" ;

                

        // Operator
                // exp 1
                echo 2+9 ;
                echo  "<br>" ;
                $num =30 ;
                $som= $num + 20 ;
                // $num += 20 ;
                echo $som ;
                echo  "<br>" ;
                echo  "<br>" ;

                // exp 2        
                $a = 2;  
                $b = 4;  
                $somme = $a + $b; 
                echo $somme; 
                echo  "<br>" ;
                echo  "<br>" ;


        // concatination 
                // exp 1
                echo "hello "." "."php"."<br>" ;
                echo $name ." was a nice man" ;
                echo  "<br>" ;
                echo  "<br>" ;


        // condition  
                $num1 = 0 ;
                $num2 = 20 ;
                if($num1 > $num2 ){
                    echo "the numbere $num1 is larger than numbere $num2 " ;
                    // echo "the number" ." " . " $num1" . " is larger than " . $num2  ;
                }elseif($num1 == $num2 ){
                    echo "the numbere $num1 is equale the numbere $num2  " ;
                }else{
                    echo "the numbere $num1 is smaler than numbere $num2 " ;
                }
        // loop
        echo  "<br>" ;
        echo  "<br>" ;

                // while 
                $a = 1 ;
                $b = 5 ;
                echo " table de multuplication 5 <br>";

                while($a <= 10){
                echo $b ." * ". $a." = " .$b*$a."<br>";
                $a ++ ; 
                }

                // do while 
                echo  "<br>" ;
                echo  "<br>" ;
                $a = 1 ;
                // $a = 11 ;
                $b = 5 ;
                do{
                    echo $b ."*". $a."=". $b*$a ."<br>";
                    $a ++ ;   
                }while($a <= 10 );
                
                // for
                echo  "<br>" ;
                echo  "<br>" ; 
                $b=5 ;
                for($a= 1  ; $a<=10 ; $a++){
                    echo $b ."*". $a."=". $b*$a ."<br>";
                }
            
                // foreach
                echo  "<br>" ;
                echo  "<br>" ;
                $array = [ 
                    "name " => " pen" ,
                    "color" => "blue"
                    ] ;
                foreach ($array as $key => $value){
                    echo $key . " : " . $value ."<br>";
                    // first loop = name : pen
                    // seond loop = color : blue

                }    
                // array
                echo  "<br>" ;
                echo  "<br>" ;

                    // Indexed Array (Numeric Array)
                // $name = array("mohammad" , "ahmed" , "ibrahim");
                // echo "the name of my freinds ". $name[0].",".$name[1].",".$name[2] ; 
                // foreach( $name as $value ) {
                //     echo "the name of my freinds $value <br />";
                // }
                $names[0] = "mohammad";
                $names[1] = "ahmed";
                $names[2] = "ibrahim";
                foreach( $names as $value ) {
                    echo "the name of my freinds $value <br />";   
                }
                // $numbers[0] = "one";
                // $numbers[1] = "two";
                // $numbers[2] = "three";
                // $numbers[3] = "four";
                // $numbers[4] = "five";
                // echo  "<br>" ;

                // foreach( $numbers as $value ) {
                //    echo "Value is $value <br />";
                // }
                echo  "<br>" ;
                echo  "<br>" ;  

                    // Associative Arrays
                $salaries = array("mohammad"=>("prix" =>9000,"age"=>23) , "ahmed" => 1000, "ibrahim" => 500);
         
                echo "Salary of mohammad is ". $salaries['mohammad']["age"] . "<br />";
                echo "Salary of ahmed is ".  $salaries['ahmed']. "<br />";
                echo "Salary of ibrahim is ".  $salaries['ibrahim']. "<br />";
                echo  "<br>" ;
                echo  "<br>" ;
                $array = [ 
                    "nam" => "pen" ,
                    "color" => "blue"
                    ] ;
                $array["height"]= 25 ;
                foreach ($array as $key => $value){
                    echo $key . ":" .  $value ."<br>";
                } 
  
                    // function 
        // function arguments
    echo "<br>";
    echo "<br>";


    function generateYears( $start , $end ){
        echo "<select name='years'>" ;
        for( $years = $start ; $years<= $end ; $years++ ){
            echo "<option value='$years'>".$years."</option>" ;
        }
        echo "</select> ";
    }
    generateYears("1998" , "2020") ;
     
        // function return
        
    echo "<br>";
    echo "<br>";

    function multiNum( $num ){
        $result =  $num *  $num ;
        return $result ;
    }
    echo multiNum( "10" ) ;

    // GET 
    echo "<br>";
    echo "<br>";
    ?>

    <form action="controle.php" method="GET">
        <input type="text" name="username" placeholder= "username"> 
        <input type="password" name="password" placeholder= "password">
        <input type="submit" value="login">
    </form>

    <?php
    // POST
    // echo "<br>";
    // echo "<br>";
    // echo "your user name is ".$_GET['username']."<br>";
    // echo "your password is ".$_GET['password']."<br>";
    ?>
    <!-- <form action="controle.php" method="POST">
    <input type="text" name="username"> 
    <input type="password" name="password">
    <input type="submit" value="login">
    </form> -->
    
</body>
</html>