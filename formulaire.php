<?php 
  require 'connexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <fieldset>
        <h1>SAISIE DES PROJETS</h1>
        <form action="enregistrement.php" method="post">
            <table>
                <tr>
                    <td><label for="">Code projet</label></td>
                    <td> <input type="text" name="codeProjet" required> </td>
                </tr>

                <tr>
                    <td><label for="">Nom du projet</label></td>
                    <td> <input type="text" name="nomProjet" required></td>
                </tr>

                <tr>
                    <td><label for="">Date de lancement</label></td>
                    <td> <input type="date" name="dateLancement" required></td>
                </tr>

                <tr>
                    <td><label for="">Durée</label></td>
                    <td> <input type="text" name="duree" required></td>
                </tr>

                <tr>
                    <td><label for="">Localité</label></td>
                    <td> <select name="nomLocalite"  id="" required>
                        <option value="" selected disabled>Sélectionnez une localité</option>
                        
                        <?php
                        $req=$dbconn->prepare("SELECT * FROM localite ");
                        $req->execute();
                        $resultat= $req->fetchall(PDO::FETCH_OBJ);
                            foreach($resultat as $value){
                     echo'     <option value=" '. $value->nomLocalite.'"> '. $value->nomLocalite.'</option>';
                            }  
                    ?>     
                    </select> </td>
                </tr>

                <tr>
                    <td> <button type="submit" name="btnA">Soumettre</button></td>
                    <td> <button type="reset" name='' >Annuler</button></td>
                </tr>
            </table>
        </form> 
    </fieldset>
    </div><br>
                <?php 
            require 'list.php';
            ?>          
</body>
</html>