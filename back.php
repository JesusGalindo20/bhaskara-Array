<?php
include 'funcoes.php';
echo '<pre>';

$a = 12;
$b = 1;
$c = 12;


$ai = (int)$_POST['ai'];
$af = (int)$_POST['af'];
$bi = (int)$_POST['bi'];
$bf = (int)$_POST['bf'];
$ci = (int)$_POST['ci'];
$cf = (int)$_POST['cf'];


$a_valores = array();
$b_valores = array();
$c_valores = array();


for ($i=$ai; $i <= $af; $i++) {
  $a_valores[] = $i;
}

for ($i=$bi; $i <= $bf; $i++) {
    $b_valores[] = $i;
}

for ($i=$ci; $i <= $cf; $i++) {
    $c_valores[] = $i;
}


$resultados = array();

foreach ($a_valores as $chave_a => $valor_a) {
  foreach ($b_valores as $chave_b => $valor_b) {
    foreach ($c_valores as $chave_c => $valor_c) {
      $resultado_temp = calc_bhaskara($valor_a, $valor_b, $valor_c);
      if($resultado_temp != NULL && $resultado_temp['x1'] != NULL && $resultado_temp['x2'] != NULL){
      $resultados[] = $resultado_temp;
    connect_and_write_db($a, $b, $c, $resultado_temp['delta'], $resultado_temp['x1'], $resultado_temp['x2']);
    }
    }
  }
}

var_dump($resultados);






?>