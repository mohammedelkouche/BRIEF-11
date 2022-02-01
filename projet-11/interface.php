<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="interface.php" method = "POST" >
        <label  for="">Ancien index</label> 
            <input type="text" name ="Ancien" placeholder= "Ancien index">
        <label  for="">Nouvel index</label> 
            <input type="text" name = "Nouvel" placeholder= "Nouvel index">
        <label  for="">Type du compteure</label> 
            <select name="select" id="">
                <option disabled hidden selected value="">Calibre</option>
                <option value="">5-10</option>
                <option value="">15-20</option>
                <option value="">>30</option>
            </select>
        <div>
            <input type="submit" name ="envoyer" value="calculer le totale de ma facture">
        </div>
        <div>
            <table>
                <tr>
                    <th>CONSOMMATION ELECRTICITE</th>
                    <th>FACTURé</th>
                    <th>P.U</th>
                    <th>MONTANT HT</th>
                    <th>TAUX TVA</th>
                    <th>MONTANT TAEXES</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
            </table>
        </div>
        
    </form>
    


    <?php

            $tranches = array() ;
 
            // Associative Arrays 
            $redevance = array(
                "tarif_1" => 0.794 ,
                "tarif_2" => 0.883 ,
                "tarif_3" => 0.9451 ,
                "tarif_4" => 1.04889 ,
                "tarif_5" => 1.2915 ,
                "tarif_6" => 1.4975 ,
            ) 
            
            // class Tache {

            //     // constructeur

            //     public function__construct($Min,$Max,$Tarif){
            //         $this -> $BornMin = $Min ;
            //         $this -> $BornMax = $Max ;
            //         $this -> $Tarif = $Tarif ;

            //     }
            // }
            
            // tranche1 = new Tache (0,100,$redevance[tarif_1]);
            // tranche2 = new Tache (101,150,$redevance[tarif_2]);
            // tranche3 = new Tache (0,100,$redevance[tarif_3]);
            // tranche4 = new Tache (0,100,$redevance[tarif_4]);
            // tranche5 = new Tache (0,100,$redevance[tarif_5]);
            // tranche6 = new Tache (0,100,$redevance[tarif_6]);

            //  push dans le tableaux $tranches 


        //    if(isset($_POST['envoyer'])){
        //     $Ancien_index = $_POST["Ancien"] ;
        //     $Nouvel_index = $_POST["Nouvel"] ;
        //     $Consommation = $Nouvel_index - $Ancien_index  ;
        //     // echo $Ancien_index ;   
        //     // echo $Nouvel_index ;
        //     // echo  $Consommation ;
              

        //     }
    ?>

</body>
</html>