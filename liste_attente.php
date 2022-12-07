<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbhotel";
// Creer la connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// verifie la connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
?>
<!DOCTYPE html>
<html>

	<title>Projet Armel</title>
		<link rel="stylesheet" type="text/css" href="Css.css">
		<meta charset="utf8">
    <section class="page">
           	  <nav>
               <div id="naim">
           	  	 	<a > Hotel ARMEL</a>
           	  	 </div>
           	  	 <div class="button">
           	  	 	<a href="index.php" >Registre et Disponibilité </a>
           	  	 	<a href="liste_attente.php" >liste d'attente</a>
           	     </div>
           	  </nav>
</head>

<body>
<div align="center">
    
	 <?php 
	 
  print"<h2>Liste des chambres disponibles de l'Hotel :</h2>";
  
  $qq2=mysqli_query($conn,"select numporte,prix from chambre where numclient=0 ");
  print'<table border="1" class="tab"><tr><th>NUMERO PORTE</th><th>PRIX/JOUR</th></tr>';
	while($rst2=mysqli_fetch_assoc($qq2)){
	 print"<tr>";
	         echo"<td>".$rst2['numporte']."</td>";
	         echo"<td>".$rst2['prix']."</td>";
	         print"</tr>";
	}
	  print'</table>';
  
  ?>
  <?php 
	 
  print"<h2>Liste des réservations en cours :</h2>";
  
  $qqs=mysqli_query($conn,"select * from attente order by datedebut");
  print'<table border="1" class="tab"><tr><th>ID</th><th>PRIX</th><th>DEBUT</th><th>FIN</th><th>CONTACT CLIENT</th></tr>';
	while($rsts=mysqli_fetch_assoc($qqs)){
	 print"<tr>";
	         echo"<td>".$rsts['id']."</td>";
	         echo"<td>".$rsts['prix']."</td>";
	         echo"<td>".$rsts['datedebut']."</td>";
	         echo"<td>".$rsts['datefin']."</td>";
	         echo"<td>".$rsts['numclient']."</td>";
	         print"</tr>";
	}
	  print'</table>';
  $mess='';
  ?>
  <?php
  //validation du reservation 
  $id=@$_POST['id'];
  $num=@$_POST['nump'];
  if(isset($_POST['boutval'])&&!empty($num)){
  $rq=mysqli_query($conn,"select * from attente where id='$id'");
  if($sq=mysqli_fetch_assoc($rq))
  {$datedeb=$sq['datedebut'];
  $datef=$sq['datefin'];
  $numcli=$sq['numclient'];}


  //reservation
  $rk=mysqli_query($conn,"update chambre set datedebut='$datedeb',datefin='$datef',numclient='$numcli' where numporte='$num'");
  //suppression a la liste d'attente
  $rk2=mysqli_query($conn,"delete from attente where id='$id'");
   if($rk && $rk2){
   $mess='<b class="succes">Réservation validée !</b>';
      }
   else $mess='<b class="erreur">Erreur de réservation !</b>';}?>



  <?php 
  //suppression de la liste d'attente
   if(isset($_POST['boutsupp'])&&!empty($id)){
  $rqs=mysqli_query($conn,"delete  from attente where id='$id'");
      if($rqs){
      $mess='<b>Suppréssion éffecuée !</b>';
      }
     else $mess='<b>Impossible de supprimer !</b>';}?>



  <h2>Confirmer une réservation</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
  <table align="">
  
     <tr ><td></td><td> <?php print $mess;?></td></tr>
    <tr><td></td><td><strong >NUMERO PORTE :</strong></td></tr>
   <tr><td></td><td><input type="text" name="nump" class="champ" size="25"  ></td></tr>
   <tr><td></td><td><strong>ID :</strong></td></tr>
   <tr><td></td><td><input type="number" name="id" min="0" class="champ" size="25"></td></tr>
      <tr><td></td><td><input type="submit" name="boutval" value="Valider" class="bouton" ></td></tr>
       <tr><td></td><td><input type="submit" name="boutsupp" value="Supprimer" class="bouton" ></td></tr>

  </table>
  </div>
</body>
</html>