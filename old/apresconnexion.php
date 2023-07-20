?php 



$email = $_POST["email"];
$password = $_POST["password"];

$connexion = new mysqli ("localhost", "root", "root", "ProjetECF"); 
$query = "SELECT * FROM `Utilisateur` WHERE Email = '$email' and 'Password' = '$password'";
echo $query;
$result = $connexion->query($query); 




?>