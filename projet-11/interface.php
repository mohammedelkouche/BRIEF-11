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
        <label  for="">l'ancien index</label> 
            <input type="text" name ="ancien" placeholder= "l'ancien index">
        <label  for="">le nouvel index</label> 
            <input type="text" name = "nouvel" placeholder= "le nouvel index">
        <label  for="">type du compteure</label> 
            <select name="select" id="">
                <option disabled hidden selected value="">calibre</option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
        <div>
            <input type="submit" name ="envoyer" value="calculer le totale de ma facture">
        </div>
        
    </form>
    


    <?php
           if(isset($_POST['envoyer'])){
            $Ancien_index = $_POST["ancien"] ;
            $Nouvel_index = $_POST["nouvel"] ;
            // $Consommation = $Nouvel_index - $Ancien_index  ;
            }
    
    ?>

</body>
</html>