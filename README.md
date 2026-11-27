# Ingressos
Ingressos é um sistema de venda e gerencimento de ingressos criado do zero, inicialmente sem framework e desenvolvido totalmente sem auxílio de IA.
Tem como objetivo principal, o desenvolvimento da capacidade pessoal de se arquitetar um sistema planejado, documentado e funcional, criando e modificando o projeto todo com planejando prévio, evitando decisões impulsivas tomadas sem conhecimento de suas consequências. 

## Requisitos 
- Git
- Docker Compose

## Como Subir
O PHP e o Composer rodam dentro do conteiner docker, não há necessidade de instalação aparte.
O projeto está na porta **localhost:8080**, certifique-se de que não há nenhuma aplicação ocupando ela.

```bash
    docker compose build
    docker compose up -d
```
Deve abrir em http://localhost:8080

## Rotas Disponíveis
- http://localhost:8080/
- http://localhost:8080/saude

OBS: Quaisquer rotas não presentes no projeto retornarão 'ERROR 404'.

## Resultados Esperados
- http://localhost:8080 :

```bash
    array(2) { 
        ["status"]=> int(200) 
        ["mensagem"]=> string(22) "Voce esta na rota home" 
    }
```

- http://localhost:8080/saude :
```bash
    array(4) {
        ["status"]=> int(200)
        ["ambiente"]=> string(3) "dev"
        ["version"]=> string(5) "0.0.0"
        ["mensagem"]=> string(19) "Voce esta na rota saude"
    }
```

## Documentações
- **ADR**: Registro de Decisões de Arquitetura, em resumo, uma documentação que detalha motivo de criação/modificação de cada função do sistema, como uma auditoria do código.