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
    $montantsHT = array(); // tableau où on va stocker les montants HT

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
                $montantsFacture[2] = $consommation;
                $montantsHT[2] = $consommation * $tarifs[2]->tarif;
            }
            else if($consommation <= $tarifs[3]->borneMax) {
                $montantsFacture[3] = $consommation;
                $montantsHT[3] = $consommation * $tarifs[3]->tarif;
            }
            else if($consommation <= $tarifs[4]->borneMax) {
                $montantsFacture[4] = $consommation;
                $montantsHT[4] = $consommation * $tarifs[4]->tarif;
            }
            else{
                $montantsFacture[5] = $consommation;
                $montantsHT[5] = $consommation * $tarifs[5]->tarif;
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

    <table>
        <?php
            if (isset($_POST["submit"])) {
                foreach($montantsFacture as $key => $value) {
        ?>
            <tr>
                <td><?php echo $value ;?></td>
                <td><?php echo $tarifs[$key]->tarif ;?></td>
                <td><?php echo $montantsHT[$key] ;?></td>
                <td><?php echo $tva . "%";?></td>
                <td><?php echo $montantsHT[$key] * $tva /100 ;?></td>
            </tr>
        
        <?php
                }
            }
        ?>
        <!-- <!-- <tr>    -->
            <td></td>
            <td></td>
            <!-- <td><?php // echo $redevance[$calibre];?></td> -->
            <!-- <td><?php //echo $tva . "%";?></td>
            <td><?php //echo $redevance[$calibre] * $tva /100 ;?></td> -->
        <!-- </tr> --> 
    </table>
</body>
</html>

