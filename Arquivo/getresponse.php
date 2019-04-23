
<?php 
	$responses['Como e seu nome'] = " Meu nome é Carlinhos.";
	$responses['sobre'] = " teste.";
	
	$responses["bem"] = "Que bom, fico feliz por isso";
	
	$q = $_GET["q"];

	$response = "";

	if ($q != "") {
		# code...
		$q = strtolower($q);
		foreach ($responses as $r => $value) {
			# code...
			if (strpos($r, $q) !== false) {
				# code...
				$response = $value;
			}
			
		}
	}
	$noresponse = "Me Desculpe, ainda estou aprendendo, minhas respostas são limitadas.";
	echo $response == "" ? $noresponse : $response;
?>