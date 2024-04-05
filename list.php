<?php
       require 'connexion.php';

       ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>affiche</title>
</head>
<body>
       <table border="1" class="list" >
        <tr >
            <th>Code du Projet</th>
            <th>Nom du Projet</th>
            <th>Date de lancement</th>
            <th>Durée</th>
            <th>Code de la localité</th>
            <th>Actions</th>

        </tr>


        <?php 

        $req=$dbconn->prepare("SELECT * FROM projet,localite
        where projet.codLocalite= localite.codLocalite");
        $req->execute();
        $resultat = $req->fetchall(PDO::FETCH_OBJ);

        foreach($resultat as $value){?>
        
        <tr>
            <td style="padding:15px;" ><?php echo $value->codeProjet ?></td>
            <td style="padding:15px;" ><?php echo $value->nomProjet ?></td>
            <td style="padding:15px;" ><?php echo $value->dateLancement ?></td>
            <td style="padding:15px;" ><?php echo $value->duree ?></td>
            <td style="padding:15px;" ><?php echo $value->codLocalite?></td>
            <td><a href="modifier.php?modif=<?php echo $value->codeProjet?>"><input type="submit" value="Modifier"></a></td>
            
            
        </tr>
        
        <?php
           

        }
        ?> 
       </table>

    
</body>
</html>