<?php function inverteData($data){    
   $parteData = explode("/", $data);    
   $dataInvertida = $parteData[2] . "-" . $parteData[1] . "-" . $parteData[0];
   return $dataInvertida;			
} ?>

