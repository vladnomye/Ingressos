<?php
require_once __DIR__ . '/../vendor/autoload.php';

use ingressos\Testando;

$valor = new Testando();
$valor2 = $valor->freteGratis(1);
echo($valor2);