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
    }
    $tva = 14;
    $timbre = 0.45;
    $redevance= [
        "small" => 22.65,
        "medium" => 37.05,
        "large" => 46.20
    ] ;
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
    $totalMontantHT = 0; // somme des MontantHT
    $totalMontanttaxes = 0 ;// somme des totals Montant taxes
    $totalTva;
    $sousTotalMontantHT;
    $sousTotalMontanttaxes;
    $totalElecricité ;
    $montantsFacture = array(); // tableau où on va stocker les montants facturés
    $montantsHT = array(); // tableau où on va stocker les montants HT
    $montantsTaxes = array(); // tableau où on va stocker les montants TAXES

    $consomationTranche = array (
        "tranche 1" ,
        "tranche 2" ,
        "tranche 3" ,
        "tranche 4" ,
        "tranche 5" ,
        "tranche 6" 
    );
    if(isset($_POST["submit"])) {
        $oldIndex = $_POST["oldIndex"];
        $newIndex = $_POST["newIndex"];
        $calibre = $_POST["calibre"];
        $consommation = $newIndex - $oldIndex;
        $montantTaxesCalibre = $redevance[$calibre] * $tva /100 ;
        // $consommation <= 150
        if($consommation <= 150) {
            // $consommation <= 100 
            if($consommation <= $tarifs[0]->borneMax) {
                $montantsFacture[0] = $consommation;
                $montantsHT[0] = $consommation * $tarifs[0]->tarif;
                $montantsTaxes[0] = $montantsHT[0] * $tva /100 ;
            }
            // 100 < $consommation <= 150
            else {
                $montantsFacture[0] = 100;
                $montantsFacture[1] = $consommation - $montantsFacture[0] ;
                $montantsHT[0] = $montantsFacture[0] * $tarifs[0]->tarif ;
                $montantsTaxes[0] = $montantsHT[0] * $tva /100;
                $montantsHT[1] = $montantsFacture[1] * $tarifs[1]->tarif ;
                $montantsTaxes[1] = $montantsHT[1] * $tva /100 ;

            }
        }
        // $consommation > 150
        else {
            if($consommation <= $tarifs[2]->borneMax) {
                $montantsFacture[2] = $consommation;
                $montantsHT[2] = $consommation * $tarifs[2]->tarif;
                $montantsTaxes[2] = $montantsHT[2] * $tva /100;
            }
            else if($consommation <= $tarifs[3]->borneMax) {
                $montantsFacture[3] = $consommation;
                $montantsHT[3] = $consommation * $tarifs[3]->tarif;
                $montantsTaxes[3] = $montantsHT[3] * $tva /100;
            }
            else if($consommation <= $tarifs[4]->borneMax) {
                $montantsFacture[4] = $consommation;
                $montantsHT[4] = $consommation * $tarifs[4]->tarif;
                $montantsTaxes[4] = $montantsHT[4] * $tva /100;
            }
            else{
                $montantsFacture[5] = $consommation;
                $montantsHT[5] = $consommation * $tarifs[5]->tarif;
                $montantsTaxes[5] = $montantsHT[5] * $tva /100;
            }
        }
        foreach ($montantsHT as $key => $value){
            $totalMontantHT += $montantsHT[$key];
        }
        $sousTotalMontantHT = $totalMontantHT + $redevance[$calibre];
        foreach ($montantsTaxes as $key => $value){
            $totalMontanttaxes += $montantsTaxes[$key];
        }
        $totalTva = $totalMontanttaxes + $montantTaxesCalibre ;
        $sousTotalMontanttaxes = $totalTva + $timbre ;
        $totalElecricité = $sousTotalMontantHT + $sousTotalMontanttaxes ;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">    
    <title>calcul</title>
</head>
<body>
    <h1>SIMULATEUR DE FACTURE D'ELECTRICITE</h1>
    <form action="index.php" method="POST">
        <input class="entrer" type="text" name="oldIndex" placeholder= "Ancien index">
        <input class="entrer" type="text" name="newIndex" placeholder= "Nouvel index"> <br>
        <input class="radio" type="radio" value="small" name="calibre" >small<br>
        <input class="radio" type="radio" value="medium" name="calibre">medium<br>
        <input class="radio" type="radio" value="large" name="calibre">large <br>
        <input type="submit" value="calcul" name="submit">
    </form>

    <table class="table table-bordered table-hover table-light table-striped ">
        <tr>
            <th>CONSOMMATION ELECRTICITE</th>
            <th>FACTURé</th>
            <th>P.U</th>
            <th>MONTANT HT</th>
            <th>TAUX TVA</th>
            <th>MONTANT TAEXES</th>
        </tr>
        <?php
            if (isset($_POST["submit"])) {
                foreach($montantsFacture as $key => $value) {
        ?>
            <tr>
                <td><?php echo $consomationTranche[$key] ;?></td>
                <td><?php echo $value ;?></td>
                <td><?php echo $tarifs[$key]->tarif ;?></td>
                <td><?php echo $montantsHT[$key] ;?></td>
                <td><?php echo $tva . "%";?></td>
                <td><?php echo $montantsTaxes[$key] ;?></td>
            </tr>
        
        <?php
                }
            }
        ?>
        <tr>
            <td>REDEVANCE FIX ELECTRICITE</td>          
            <td></td>
            <td></td>
            <td><?php  echo $redevance[$calibre];?></td> 
            <td><?php  echo $tva . "%";?></td>
            <td><?php echo $montantTaxesCalibre ;?></td> 
        </tr>
        <tr>
            <td>TAXES POUR LE COMPTE DE L'ETAT</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>TOTAL TVA </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $totalTva ; ?></td>
        </tr>
        <tr>
            <td>TIMBRE </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $timbre ?></td>
        </tr>
        <tr>
            <td>SOUS-TOTAL</td>
            <td></td>
            <td></td>
            <td><?php echo $sousTotalMontantHT ;?></td>
            <td></td>
            <td><?php echo $sousTotalMontanttaxes ;?></td>
        </tr>
        <tr>
            <td>TOTAL ELECTICITE</td>
            <td></td>
            <td></td>
            <td><?php echo $totalElecricité ;?></td>
            <td></td>
            <td></td>
        </tr>

        
    </table>
</body>
</html>

