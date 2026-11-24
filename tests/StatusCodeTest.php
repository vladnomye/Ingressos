<?php declare(strict_types = 1);
namespace tests;

use PHPUnit\Framework\TestCase;
use ingressos\Response;

class StatusCodeTest extends TestCase
{
    private const envFalse =  ['environment' => 'dev', 'version' => '0.0.0'];
    
    public function testCheckStatusCodeUnknowRoute()
    {
        $resposta = new Response;
        $statusTest = $resposta->init('/rotaFalsa');
        $this->assertEquals(404, $statusTest['status']);
    }

    public function testCheckStatusCodeHome()
    {
        $resposta = new Response;
        $statusTest = $resposta->init('/');
        $this->assertEquals(200, $statusTest['status']);
    }
    
    public function testCheckStatusBodyRouteSaude()
    {
        $resposta = new Response;
        $statusTest = $resposta->saude(self::envFalse, '/saude');
        $this->assertEquals(200, $statusTest['status']);
        $this->assertEquals('dev', $statusTest['ambiente']);
    }
}
