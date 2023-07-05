<?php


if(isset($_GET['input'])) {
		$input = $_GET['input']; 
		preg_match('/[0-9].*[0-9]/', $input, $value);
		$value = $value[0];

		if(preg_match('[,]', $value)==0) {
			echo json_encode("Favor especificar os centavos, utilizando vírgula");	
		}
		else {
			$arr = explode(',', $value);
			$reais = $arr[0];
			$cents = $arr[1];
			
			$notas = [100, 50, 20, 10, 5, 2, 1];
			$moedas = [50, 25, 10, 5, 1];		
			$reais_array = array();
			$cents_array = array();

			foreach($notas as $i) {
				$qtd_notas = floor($reais/$i);
				$reais = $reais - $qtd_notas*$i;
				array_push($reais_array, array("$i" => "$qtd_notas"));
			}	
			foreach($moedas as $i) {
				$qtd_moedas = floor($cents/$i);
				$cents = $cents - $qtd_moedas*$i;
				array_push($cents_array, array("$i" => "$qtd_moedas"));
			}				
							
			$array = array("Notas" => $reais_array, "Moedas" => $cents_array);
	
			echo json_encode($array);
		
		}
}

?>
