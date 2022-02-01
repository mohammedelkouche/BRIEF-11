<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="FormTest.php" method= "POST" >
        <input type="text" name ="ancien" placeholder= "l'ancien index">
        <input type="text" name = "nouvel" placeholder= "le nouvel index">
        <input type="submit" name ="envoyer" value="envoyer">
    </form>
    <?php 

    // CLASS
    // class Tranche {
    //     // Properties

    // }
  
    
    if(isset($_POST['envoyer'])){
    $Ancien_index = $_POST["ancien"] ;
    $Nouvel_index = $_POST["nouvel"] ;
    $Consommation = $Nouvel_index - $Ancien_index ;

        // tarif
    $tarif_1 = 0.794 ;
    $tarif_2 = 0.883 ;
    $tarif_3 = 0.9451 ;
    $tarif_4 = 1.04889;
    $taux_TVA = 0.14 ;

    
    if($Consommation < 150){


        if($Consommation <= 100){
           $tranch_1 = $Consommation * $tarif_1 ;
           echo "le montant HT ".$tranch_1 ."<br>" ;
           echo "le montant taxes du tranche 1 : ".$montant_taxes = $tranch_1 * $taux_TVA ;
        }
        elseif($Consommation>= 101 &&  $Consommation <= 150 ){

            $result_1 = 100 * $tarif_1 ;
            $tranch_2 = $Consommation - 100 ;
            $result_2 = $tranch_2 * $tarif_2 ;
            echo "le montant HT du tranche 1".$result_1 ."<br>";
            echo "le montant HT du tranche 2".$result_2 ."<br>";
            echo "le montant taxes du tranche 1 : ".$montant_taxes = $result_1 * $taux_TVA ."<br>";
            echo "le montant taxes du tranche 2 : ".$montant_taxes = $result_2 * $taux_TVA ."<br>";

        }


    }elseif($Consommation > 150){
        if($Consommation>=151 && $Consommation<=210 ){
            $result_3 = $Consommation * $tarif_3 ;
            echo $result_3 ;
        // }elseif($Consommation >= 211 && $Consommation<= 310){
        //     $result_3 = $Consommation * $tarif_3 ;
        //     echo $result_3 ."<br>";
            
            
        }

    elseif($Consommation>=211 && $Consommation<=310){
          $result_4 = 210 * $tarif_3;
          echo $result_4 . "<br>";
          $tranch_4 = $Consommation - 210 ;
          echo $tranch_4 ."<br>";
          $result_5 = $tranch_4 * $tarif_4;

        //   echo $result_4;
          echo $result_5;

        }
    }


    }
    
    ?>
</body>
</html>



