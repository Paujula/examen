
<?php 
     require 'connexion.php';

     if (!Empty($_POST)){
        extract($_POST);
        $valide = true;
    
        if(isset($_POST['btnA'])){
          
    
          $codeProjet =trim($codeProjet);
          $nomProjet =trim($nomProjet) ;
          $dateLancement = trim($dateLancement);
          $duree = trim($duree);
          $nomLocalite = trim($nomLocalite);

          $codLocalite= null;  
         
          
          if(!empty($codeProjet)&&  !empty($nomProjet) &&  !empty($dateLancement) &&  !empty($duree) &&  !empty($nomLocalite)){
    
            $req2=$dbconn->prepare("SELECT * FROM localite WHERE nomLocalite='$nomLocalite '"); 
            $req2->execute();
            $resultat2=$req2->fetch(PDO::FETCH_OBJ);
               

            if($resultat2 ){
                $codLocalite = $resultat2->codLocalite;
              }
        
    
    
    
            $req= $dbconn->prepare("INSERT INTO projet (codeProjet, nomProjet, dateLancement, duree,codLocalite) VALUES ('$codeProjet','$nomProjet','$dateLancement', '$duree',  '$codLocalite') ");
            $req->execute();
            
              if($req){
                echo '<P style="color:green">Ajout éffectué avec succès !</P> ';
                
              }else {
              echo "Erreur lors de l'ajout" ;
              }
            }else{
                "Localite non trOuvé";
            }
          
        }
    
    }
    
    

?>