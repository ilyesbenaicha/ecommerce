<?php
require_once("Mysql.php");
class Promo extends Mysql
{

	// Les attributs privés
	private $_id;
	private $_titre;
	private $_code;
	private $_d_debut;
	private $_d_fin;
	
	// Méthode magique pour les setters & getters
	public function __get($attribut) {
		if (property_exists($this, $attribut)) 
                return ( $this->$attribut ); 
        else
			exit("Erreur dans la calsse " . __CLASS__ . " : l'attribut $property n'existe pas!");     
    }

    public function __set($attribut, $value) {
        if (property_exists($this, $attribut)) {
            $this->$attribut = (mysqli_real_escape_string($this->get_cnx(), $value)) ;
        }
        else
        	exit("Erreur dans la calsse " . __CLASS__ . " : l'attribut $property n'existe pas!");
    }

	public function details($id)
	{
		$q = "SELECT * FROM promo WHERE id ='$id'";
		$res = $this->requete($q);
		$row = mysqli_fetch_array( $res); 
		$pro = new Promo();
		
		$pro->_id 			= $row['id'];
		$pro->_titre 		= $row['titre'];
		$pro->_code 		= $row['code'];
		$pro->_d_debut		= $row['d_debut'];
		$pro->_d_fin        = $row['d_fin'];
		return $pro;
	}


	public function liste()
	{
		$q = "SELECT * FROM promo ORDER BY id";
		$list_pro = array(); // Tableau VIDE
		$res = $this->requete($q);
		while($row = mysqli_fetch_array( $res)){
			$pro = new Promo();

		$pro->_id 			= $row['id'];
		$pro->_titre 	    = $row['titre'];
		$pro->_code 		= $row['code'];
		$pro->_d_debut 	    = $row['d_debut'];
		$pro->_d_fin        = $row['d_fin'];
				
			$list_pro[]=$pro;
		}
		
		return $list_pro;
	}
	
	public function ajouter()
	{
	    $q = "INSERT INTO promo( id,titre,code,d_debut,d_fin) VALUES 
	  		(  null				, '$this->_titre'		,
			  '$this->_code'	,'$this->_d_debut' , '$this->_d_fin'
			)";
		$res = $this->requete($q);
		return mysqli_insert_id($this->get_cnx());
	}
	
	public function modifier(){
		$q = "UPDATE promo SET
			  titre 	= '$this->_titre',
			  code      = '$this->_code' ,
			  d_debut   = '$this->_d_debut',
			  d_fin     = '$this->_d_fin'

			  WHERE id = '$this->_id' ";
	  
		$res = $this->requete($q);
		return $res;
	}

	public function supprimer($id){
		$q = "DELETE FROM promo WHERE id = '$id'";
		$res = $this->requete($q);
		return $res;
	}	 
}
?>