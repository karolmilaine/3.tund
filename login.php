<?php 
	require("../../config.php");

	//räsi(hash):
	//echo hash("sha512","Romil");
	//GET ja POSTi muutujad
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	//var_dump(5.5); näitab tüüpi
	//MUUTUJAD:
	$signupEmailError = "";
	$signupPasswordError ="";
 	$signupFirstNameError ="";
 	$signupLastNameError ="";
	$signupEmail = "";
	$signupGender="";

 	
	// on üldse olemas selline muutja
	if( isset( $_POST["signupEmail"] ) ){
		
		//jah on olemas - isset
		//kas on tühi - empty
		if( empty( $_POST["signupEmail"] ) ){
			
			$signupEmailError = "See väli on kohustuslik";
			
		} else {
			//email on olemas
			$signupEmail = $_POST["signupEmail"];
		}
}

	if(isset($_POST["signupPassword"])){
 		
 		if(empty($_POST["signupPassword"])){
 			
 			$signupPasswordError= "Parool on kohustuslik";
 		}else{

 			//kui parool oli olemas -isset
 			//parool ei olnud tühi -empty
 		

//kas pikkus vähemalt 8
if(strlen($_POST["signupPassword"]) <8 ) {
$singupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk ";
	}
	}
	}


if(isset($_POST["signupFirstName"])){
 		
 		if(empty($_POST["signupFirstName"])){
 			
 			$signupFirstNameError="Eesnime sisestamine on kohustuslik";
 		}
 	}
 	if(isset($_POST["signupLastName"])){
 		
 		if(empty($_POST["signupLastName"])){
 			
 			$signupLastNameError="Perekonnanime sisestamine on kohustuslik";
 		}
 	}
	
	//Gender
	if(isset($_POST["signupGender"])){
		if(empty($_POST["signupGender"])){
			
		}
	}

// peab olema email ja parool
//ühtegi errorit

if (isset($_POST["signupEmail"])&&
	isset($_POST["signupPassword"])&&
	$signupEmailError=="" &&
	empty($signupPasswordError)

){
	//salvestame andmebaasi
	echo "Salvestan... <br>";
	echo "email:".$signupEmail."<br>";
	echo "password:".$_POST["signupPassword"]."<br>";
	$password= hash("sha512", $_POST["signupPassword"]);
	echo "password hashed: ".$password."<br>";
	
	//echo $serverUsername;
	
	//ÜHENDUS
	$database = "if16_karojyrg_2";
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	
	
	//sqli rida
	$stmt = $mysqli->prepare("INSERT INTO user_sample(email, password)VALUES(?,?)");
	
	// kui eelmine lause oli vb valesti kirjutatud, siis kontrollida saab nii: echo $mysqli->error;
	
	//bind param- stringina üks täht iga muutuja kohta, mis tüüp
	//string -s (siia alla kuuluvad varchar ja kõik muu)
	//integer - i
	//float (double)- d
	//küsimärgid asendada muutujaga
	// "ss" tähendab et signupemail ja password on mõlemad stringid
	
	$stmt->bind_param("ss",$signupEmail, $password);
	
	//täida käsku
	if($stmt->execute()) {
		echo "salvestamine õnnestus";
	} else {
		echo "ERROR".$stmt->error;
	}
	
	//panen ühenduse kinni
	$stmt->close();
	$mysqli->close();
	
}


 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logi sisse või loo kasutaja</title>
</head>
<body>

	<h1>Logi sisse</h1>
	<form method="POST">
		
		<label>E-post</label>
		<br>
		
		<input name="loginEmail" type="text">
		<br><br>
		
		<input name="loginPassword" placeholder="Parool" type="password">
		<br><br>
		
		<input type="submit" value="Logi sisse">
		
		
	
	
	
	<h1>Loo kasutaja</h1>
	<form method="POST">
		
		<label>E-post</label>
		<br>
		
		<input name="signupEmail" type="text" placeholder="E-post"> <?php= $signupEmailError; ?>
		
		
		<br><br>
		
		<input type="password" name="signupPassword" placeholder="Parool" > <?php echo $signupPasswordError; ?>
		
		<br><br><br>
		
		<input name="signupFirstName" placeholder="Eesnimi"> <?php echo $signupFirstNameError; ?><br>

		<br>
		
		<input name="signupLastName" placeholder="Perekonnanimi">  <?php echo $signupFirstNameError; ?><br>

		<br><br>

		Sugu:<br>
		<?php
		if($signupGender =="mees"){ ?>
		<input type="radio" name="signupGender" value="mees" checked> Mees<br>
		<?php }else { ?>
		<input type="radio" name="signupGender" value="mees"> Mees<br>
		<?php } ?>
		<?php if($signupGender=="naine"){ ?>
		<input type="radio" name="signupGender" value="naine" checked> Naine<br>
		<?php }else { ?>
		<input type="radio" name="signupGender" value="naine"> Naine<br>
		<?php } ?>
		<?php if($signupGender=="Muu"){ ?>
		<input type="radio" name="signupGender" value="muu" checked> Muu<br>
		<?php }else { ?>
		<input type="radio" name="signupGender" value="muu"> Muu<br>
		<?php } ?>
		
		
		<br>
		
		SĆ¼nnipĆ¤ev:<br>
		<input type="date" name="sĆ¼nnipĆ¤ev" max="2006-12-31">
		<br><br>
		
		Keel:<br>
		<select name="keel">
		<option value="eesti keel">eesti keel</option>
		<option value="vene keel">vene keel</option>
		<option value="inglise keel">inglise keel</option>
		</select>
		<br><br>
		
		<input type="submit" value="Loo kasutaja">
		
		
		
	</form>

</body>
</html>







