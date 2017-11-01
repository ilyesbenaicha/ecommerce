<?php
require_once("Mysql.php");
class Produit extends Mysql
{
	// Les attributs privés
	private $_id;
	private $_libelle;
	private $_description;
	private $_image;
	private $_prix;
	private $_id_categorie;

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
		$q = "SELECT * FROM produit WHERE id ='$id'";
		$res = $this->requete($q);
		$row = mysqli_fetch_array( $res); 
		$prod = new Produit();
		
		$prod->_id 			= $row['id'];
		$prod->_libelle 	= $row['libelle'];
		$prod->_image 		= $row['image'];
		$prod->_description	= $row['description'];
		$prod->_prix        = $row['prix'];
		$prod->_id_categorie= $row['id_categorie'];
		return $prod;
	}


	public function liste()
	{
		$q = "SELECT * FROM produit ORDER BY libelle";
		$list_prod = array(); // Tableau VIDE
		$res = $this->requete($q);
		while($row = mysqli_fetch_array( $res)){
			$prod = new Produit();

		$prod->_id 			= $row['id'];
		$prod->_libelle 	= $row['libelle'];
		$prod->_image 		= $row['image'];
		$prod->_description	= $row['description'];
		$prod->_prix        = $row['prix'];
		$prod->_id_categorie= $row['id_categorie'];
		
			$list_prod[]=$prod;
		}
		
		return $list_prod;
	}
	
	public function ajouter()
	{
	    $q = "INSERT INTO produit(id, libelle, description, image,prix,id_categorie) VALUES 
	  		(  null				, '$this->_libelle'		,
			  '$this->_description'	,'$this->_image' , $this->_prix , $this->_id_categorie
			)";
		$res = $this->requete($q);
		return mysqli_insert_id($this->get_cnx());
	}
	
	public function modifier(){
		$q = "UPDATE produit SET
			  libelle 	= '$this->_libelle',
			  image = IF('$this->_image' = '', image, '$this->_image') ,
			  description = '$this->_description',
			  prix=$this->_prix

			  WHERE id = '$this->_id' ";
	  
		$res = $this->requete($q);
		return $res;
	}

	public function supprimer($id){
		$q = "DELETE FROM produit WHERE id = '$id'";
		$res = $this->requete($q);
		return $res;
	}	 
}
?>