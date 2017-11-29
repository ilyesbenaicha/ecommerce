<?php 
require_once('verifier_access.php'); 

@$id = $_GET['id'];

if( !empty($id) ) {
	require_once("../classes/Produit.php");
	$prod= new Produit();
	$prod = $prod->details($id);
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Gestion des produits</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/lib/css/bootstrap.min.css"></link>
  <link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/lib/css/prettify.css"></link>
  <link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
  <style>input, textarea, select, .uneditable-input{height:auto;}#loadimg{display:none;}</style>      
</head>
<body>

  <?php require_once('header.php'); ?>

  <div class="container2">
    <h1><?php !empty($id) ? print("Modifier"):print("Ajouter") ?> un produit</h1>
  </div>

  <div class="container2">

   <div class="clear"><p>&nbsp;</p></div>
   <div id="resultat-bien"></div>
   <form id="form_bien" class="form_valid" method="POST" action="produit_new_action.php" enctype="multipart/form-data">

    <table class="tab_diapo" border="0">
       <tr>
        <th>
          id categorie :<span style="color:red;">*</span>            
        </th>
        <td>
          <select name="id_categorie">
            <?php 
            require_once("../classes/Categorie.php");
           $cat = new Categorie();  
          $liste = $cat->liste();
          foreach($liste as $data )
          {
           ?>
            <option value=' <?php echo $data->_id ?>'  <?php if (@$data->_id==@$prod->_id_categorie)  echo "selected";?>>  <?php echo  $data->_libelle ?></option> <?php } ?>
            
          </select>
         <!-- <input required type="text" name="id_categorie" id="id_categorie" validate="required" value="<?php echo @($prod->_id_categorie); ?>" /> -->
        </td>
      </tr>
      <tr>
        <th>
          Libellé :<span style="color:red;">*</span>            
        </th>
        <td>
          <input required type="text" name="libelle" id="libelle" validate="required" value="<?php echo @($prod->_libelle); ?>" />
        </td>
      </tr>

      <?php if( !empty($id) ) { ?>
      <tr>
        <th>
          Image actuelle :           
        </th>
        <td>  
          <img src="../upload/<?php echo $prod->_image; ?>" width="150" /> 
        </td>
      </tr>
      <?php } ?>

      <tr>
        <th>
          Image : <span style="color:red;">*</span>            </th>
          <td><input type="file" name="image" id="image" /></td>
        </tr>
             <tr>
        <th>
          prix :<span style="color:red;">*</span>            
        </th>
        <td>
          <input required type="text" name="prix" id="prix" validate="required" value="<?php echo @($prod->_prix); ?>" />
        </td>
      </tr>

        <tr>
          <th>Description :<span style="color:red;">*</span> </th>
          <td>
            <textarea required name="description" class="textarea" style="width: 810px; height: 200px" >
             <?php echo @$prod->_description; ?>
              </textarea>
         </td>
       </tr>


     </table>

     <?php if( !empty($id) ) { ?>
     <input type="hidden" name="id" value="<?php echo $id; ?>" />
     <?php } ?>

     <button type="submit" id="submit" class="btn btn-primary"><?php ( !empty($id) ) ? print ("Modifier"): print ("Ajouter") ?></button>
     <div id="loadimg"><img src="../images/loading.gif" width="25" height="25" /></div>
   </form>

 </div>

 <hr>

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.js"></script>
 <script src="js/bootstrap.validate.js"></script>
 <script src="js/bootstrap.validate.en.js"></script>
 <script type="text/javascript" src="js/jquery.form.js"></script>

 <script src="bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
 <script src="bootstrap-wysihtml5/lib/js/prettify.js"></script>
 <script src="bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

 <script>
   $('.textarea').wysihtml5();
   $(prettyPrint);

   function confirmDelete(delUrl) {
    if (confirm("Voulez vous vraiment supprimer ce Partenaire ?")) {
     document.location = delUrl;
   }
 }
</script>

</body>
</html>