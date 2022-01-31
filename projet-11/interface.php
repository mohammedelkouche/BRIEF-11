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
        
    </form>
    


    <?php

            $tranches = array() ;
 
            // Associative Arrays 
            $redevance = array(
                "tarif_1" => 0.794 ;
                "tarif_2" => 0.883 ;
                "tarif_3" => 0.9451 ;
                "tarif_4" => 1.04889 ;
                "tarif_5" => 1.2915 ;
                "tarif_6" => 1.4975 ;
            ) 
            
            class Tache {

                // constructeur
                public function__construct($BornMin,$BornMax,$Tarif){
                    $this -> 
                }
            }
            
            // tranche1 = new Tache (0,100,0.794);
            // tranche2 = new Tache (101,150,0.794);
            // tranche3 = new Tache (0,100,0.794);
            // tranche4 = new Tache (0,100,0.794);
            // tranche5 = new Tache (0,100,0.794);
            // tranche6 = new Tache (0,100,0.794);

            //  push dans le tableaux $tranches 


           if(isset($_POST['envoyer'])){
            $Ancien_index = $_POST["Ancien"] ;
            $Nouvel_index = $_POST["Nouvel"] ;
            $Consommation = $Nouvel_index - $Ancien_index  ;
            // echo $Ancien_index ;   
            // echo $Nouvel_index ;
            // echo  $Consommation ;
              

            }
    ?>

</body>
</html>