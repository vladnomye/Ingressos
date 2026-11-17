<?php
namespace tests;

use PHPUnit\Framework\TestCase;
use ingressos\Testando;

class ExampleTest extends TestCase
{
    public function testFreteGratis()
    {
        $compra = new Testando();

        if($compra->freteGratis(150) !== false)
        {
            $texto = 'tá errado' . PHP_EOL;
            echo $texto;
        }else
        {
            echo 'tá certo' . PHP_EOL;
        }
    }
}