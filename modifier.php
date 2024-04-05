<?php 


require 'connexion.php';


if (isset($_GET['modif'])) {

	$id=$_GET['modif'];


	$req = $dbconn->prepare("SELECT * FROM projet,localite
     WHERE projet.codLocalite= localite.codLocalite
     AND codeProjet='$id'");
     
	$req->execute();
	$resultat = $req->fetch(PDO::FETCH_OBJ);
    $value=$resultat;

}



if (!Empty($_POST)){
    extract($_POST);
    $valide = true;

    if(isset($_POST['btnM'])){
      

      $codeProjet =trim($codeProjet);
      $nomProjet = trim($nomProjet);
      $dateLancement = trim($dateLancement);
      $duree = trim($duree);
      $nomLocalite = trim($nomLocalite);

      $codLocalite= null;   //Réinitialisez idArtiste à null avant chaque insertion
      
      if(!empty($codeProjet) && !empty($nomProjet) && !empty($dateLancement) && !empty($duree) && !empty($nomLocalite)){

        $req2=$dbconn->prepare("SELECT codLocalite FROM localite WHERE nomLocalite= '$nomLocalite' "); 
        $req2->execute();
        $resultat2=$req2->fetch(PDO::FETCH_OBJ);
    

              if($resultat2 ){
             $codLocalite = $resultat2->codLocalite;
           }




        $req= $dbconn->prepare("UPDATE projet SET codeProjet='$codeProjet', nomProjet= '$nomProjet', dateLancement= '$dateLancement', duree= '$duree', codLocalite= '$codLocalite' WHERE codeProjet = '$id'");
        $req->execute();

          if($req){
            echo '<P style="color:green">Modification éffectué avec succès !</P> ';
          }else {
          echo "Erreur lors de la modification" ;
          }
        }
      
    }

}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
	<title>modifier</title>
       
</head>
<body>
    <h1 >Modifier votre projet</h1><br>

    <div class="container" >
        
        <form action=""  method="POST" enctype= "multipart/form-data" >
        <table>
                <tr>
                    <td><label for="" class="label">Code projet</label></td>
                    <td> <input type="text" class="text" name="codeProjet" value="<?php echo $value->codeProjet ?>" required> </td>
                </tr>

                <tr>
                    <td><label  for="" class="label">Nom du projet</label></td>
                    <td> <input type="text" class="text" name="nomProjet" value="<?php echo $value->nomProjet ?>" required></td>
                </tr>

                <tr>
                    <td><label for="" class="label">Date de lancement</label></td>
                    <td> <input type="date" class="text" name="dateLancement" value="<?php echo $value->dateLancement ?>" required></td>
                </tr>

                <tr>
                    <td><label for="" class="label">Durée</label></td>
                    <td> <input type="text" class="text" name="duree" value="<?php echo $value->duree ?>" required></td>
                </tr>

                <tr>
                    <td><label for="" class="label">Localité</label></td>
                    <td> <select name="nomLocalite" class="select"  id="" required>
                        <option value="" selected disabled>Sélectionnez une localité</option>
                        
                        <?php
                        $req=$dbconn->prepare("SELECT * FROM localite ");
                        $req->execute();
                        $resultat= $req->fetchall(PDO::FETCH_OBJ);
                            foreach($resultat as $val){
                     echo'     <option value=" '. $val->nomLocalite.'"> '. $val->nomLocalite.'</option>';
                            }  
                    ?>     
                    </select> </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="submit" name="btnM" >Modifier</button><br></td>
                </tr>

            </table>
            
        </form>
        </div>
</body>
</html>