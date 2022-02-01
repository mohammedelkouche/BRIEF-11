<?php
    // config
    class Tranche {
        public $borneMin;
        public $borneMax;
        public $tarif;

        function __construct($bmin, $bmax, $tar){
            $this->borneMin = $bmin;
            $this->borneMax = $bmax;
            $this->tarif = $tar;
        }

        function infos(){
            echo "Borne min: $this->borneMin. Borne max: $this->borneMax. Tarif: $this->tarif";
        }
    }
    $tva = 14;
    $timbre = 0.45;
    $redevance= [
        "small" => 22.65,
        "medium" => 37.05,
        "large" => 46.20
    ];
    //$redevance = array("small" => 22.65, "medium" => 37.05, "large" => 46.20);
    $tarifs = [
        new Tranche(0, 100, 0.794), 
        new Tranche(101, 150, 0.883),
        new Tranche(151, 210, 0.9451),
        new Tranche(211, 310, 1.0489),
        new Tranche(311, 510, 1.2915),
        new Tranche(511, null, 1.4975)
    ];

    $oldIndex;
    $newIndex;
    $consommation;
    $montantsFacture = array(); // tableau où on va stocker les montants facturés
    $montantsHT = array();; // tableau où on va stocker les montants HT

    if (isset($_POST["submit"])) {
        $oldIndex = $_POST["oldIndex"];
        $newIndex = $_POST["newIndex"];
        $calibre = $_POST["calibre"];
        $consommation = $newIndex - $oldIndex;
        // $consommation <= 150
        if($consommation <= 150) {
            // $consommation <= 100
            if($consommation <= $tarifs[0]->borneMax) {
                $montantsFacture[0] = $consommation;
                $montantsHT[0] = $consommation * $tarifs[0]->tarif;
            }
            // 100 < $consommation <= 150
            else {
                $montantsFacture[0] = 100;
                $montantsFacture[1] = $consommation - $montantsFacture[0];
                $montantsHT[0] = $montantsFacture[0] * $tarifs[0]->tarif;
                $montantsHT[1] = $montantsFacture[1] * $tarifs[1]->tarif;
            }
        }
        // $consommation > 150
        else {
            if($consommation <= $tarifs[2]->borneMax) {
                $montantsFacture[2] = $consommation ;
                $montantsHT[2] = $montantsFacture[2] * $tarifs[2]->tarif;
                echo $montantsFacture[2] ."<br>" ;
                echo $montantsHT[2] ;
            }elseif(){
                
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calcul</title>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="text" name="oldIndex">
        <input type="text" name="newIndex" > <br>
        <input type="radio" value="small" name="calibre" >small<br>
        <input type="radio" value="medium" name="calibre">medium<br>
        <input type="radio" value="large" name="calibre">large <br>
        <input type="submit" value="calcul" name="submit">
    </form>


</body>
</html>




