<?php 
	//GET ja POSTi muutujad
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	$signupPasswordError ="";
 	$signupFirstNameError ="";
 	$signupLastNameError ="";
 	$signupDateError ="";
 	$termsAgreementError ="";
	
	// on üldse olemas selline muutja
	if( isset( $_POST["signupEmail"] ) ){
		
		//jah on olemas
		//kas on tühi
		if( empty( $_POST["signupEmail"] ) ){
			
			$signupEmailError = "See väli on kohustuslik";
			
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
		
		<input name="signupEmail" type="text"> <?php echo $signupEmailError; ?>
		
		<br><br>
		
		<input name="signupPassword" placeholder="Parool" type="password"> <?php echo $signupPasswordError; ?>
		
		<br><br><br>
		
		<input name="signupFirstName" placeholder="Eesnimi"> <?php echo $signupFirstNameError; ?><br>

		<br>
		
		<input name="signupLastName" placeholder="Perekonnanimi">  <?php echo $signupFirstNameError; ?><br>

		<br><br>

        <form>
		Sugu:<br>
		<input type="radio" name="sugu" value="mees" checked> Mees<br>
		<input type="radio" name="sugu" value="naine"> Naine<br>
		<input type="radio" name="sugu" value="muu"> Muu
		</form>

		<br>
		
		<form>
		SÃ¼nnipÃ¤ev:<br>
		<input type="date" name="sÃ¼nnipÃ¤ev" max="2006-12-31">
		<br><br>
		
		<form>
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







