<?php
include_once "../../config.php";
class livraisoncore
{
	function afficherLivraison($l){
		//var_dump($e);
		$etat=$e->getEtat();
		$region=$e->getRegion();
		$ville=$e->getVille();
		$rue=$e->getRue();
		$numero=$e->getNumero();

		echo "Etat: " .$etat. "<br>"; //ou bien echo("CIN :".$e->getCin. "<br>"); ou ma na3mlouch l init lfou9
		echo "Region :" .$region. "<br>";
		echo "Ville: " .$ville. "<br>";
		echo "Rue: " .$rue. "<br>";
		echo "Numero: " .$numero. "<br>";
	}
	function afficherLivraisons(){
		$c=Config::getConnexion();
		$sql="SELECT * FROM livraison";
		try{
			$liste=$c->query($sql);
			return $liste;

		}catch(Exception $e){
			die('Erreur : ' .$e->getMessage());
		}

	}
   function afficherLivraisonssanslivreurs(){
    $c=Config::getConnexion();
    $sql="SELECT * FROM livraison where pseudoLivreur is NULL";
    try{
      $liste=$c->query($sql);
      return $liste;

    }catch(Exception $e){
      die('Erreur : ' .$e->getMessage());
    }

  }
function supprimerlivraison($id){
      $sql="DELETE FROM livraison where id= :id";
      $db = config::getConnexion();
        $req=$db->prepare($sql);
      $req->bindValue(':id',$id);
      try{
          $req->execute();
         // header('Location: index.php');
        }
        catch (Exception $e){
          die('Erreur: '.$e->getMessage());
      }
    
}
function modifierlivraison($livraison,$idd){
      $db = config::getConnexion();
      $sql="UPDATE livraison SET etat=:etat,pseudoLivreur=:pseudoLivreur WHERE id=:idd";
      try{
      $req=$db->prepare($sql);

    
      $pseudoLivreur=$livraison->getPseudoLivreur();
  
      $etat=$livraison->getEtat();
      $req->bindValue(':pseudoLivreur',$pseudoLivreur);
      $req->bindValue(':idd',$idd);
   
      $req->bindValue(':etat',$etat);
      $s=$req->execute();
    }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
    
  }
function modifierlivraison1($livraison,$idd){
      $db = config::getConnexion();
      $sql="UPDATE livraison SET pseudoLivreur=:pseudoLivreur,dateLivraison=:dateLivraison WHERE id=:idd";
      try{
      $req=$db->prepare($sql);

    
      $pseudoLivreur=$livraison->getPseudoLivreur();
      $dateLivraison=$livraison->getdateLivraison();
      $req->bindValue(':dateLivraison',$dateLivraison);
      $req->bindValue(':pseudoLivreur',$pseudoLivreur);
      $req->bindValue(':idd',$idd);
   
      $s=$req->execute();
    }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
    
  }
/*function modifierlivraison2($livraison,$idd){
      $db = config::getConnexion();
      $sql="UPDATE livraison SET dateLivraison=:dateLivraison WHERE id=:idd";
      try{
      $req=$db->prepare($sql);

    
      $dateLivraison=$livraison->getdateLivraison();

      $req->bindValue(':dateLivraison',$dateLivraison);
      $req->bindValue(':idd',$idd);
   
      $s=$req->execute();
    }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
    
  }*/
  function modifierlivraison3($idd){
      $db = config::getConnexion();
      $sql="UPDATE livraison SET etat=:etat WHERE id=:idd";
      try{
      $req=$db->prepare($sql);

      $req->bindValue(':idd',$idd);
      $req->bindValue(':etat',"Donnée au livreur");
      $req->execute();
    }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
        }
    
  }
   function modifierlivraison4($idd){
      $db = config::getConnexion();
      $sql="UPDATE livraison SET etat=:etat WHERE id=:idd";
      try{
      $req=$db->prepare($sql);

      $req->bindValue(':idd',$idd);
      $req->bindValue(':etat',"Effectuée");
      $req->execute();
    }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
        }
    
  }
 function ajouterlivraison($l){
 		$sql="insert into livraison (rue,numero,region,ville) values (:rue,:numero,:region,:ville)";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);

        $rue=$l->getRue();
        $numero=$l->getNumero();
        $region=$l->getRegion();
        $ville=$l->getVille();
        $req->bindValue(':rue',$rue);
        $req->bindValue(':numero',$numero);
        $req->bindValue(':region',$region);
        $req->bindValue(':ville',$ville);

            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

  } 
  function reccupererinformations($id){
      $db = config::getConnexion();
      $sql="SELECT * from livraison where id=$id";
      $liste=$db->query($sql);
      return $liste;
    }

}

 ?>


