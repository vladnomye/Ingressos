<?php
namespace ingressos;

class Response
{
    public function init(string $uri)
    {
        if($uri !== '/')
        {
            throw new \Exception ("Uri não identificada, passada como parametro da função " . strtoupper( __FUNCTION__));
            return ['status' => 404];
        }
        $status = [
            'status' => 200,
            'mensagem' => 'Voce esta na rota home'
        ];
        var_dump($status);
        return $status;
    }
    
    public function saude(array $env, string $uri)
    {
        if($uri != '/saude')
        {
            throw new \Exception ("Uri não identificada, passada como parametro da função " . strtoupper( __FUNCTION__));
            return ['status' => 500];
        }

        if(!$env)
        {
            throw new \Exception ("Especifique as variáveis de ambiente antes de chamar a função " . strtoupper(__FUNCTION__));
            return ['status' => 500];
        }
         $status = [
            'status' => 200,
            'ambiente' => $env['environment'],
            'version' => $env['version'],
            'mensagem' => 'Voce esta na rota saude'
        ];
        var_dump($status);
        return $status;
    }
}
