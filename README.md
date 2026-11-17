# Ingresssos
Ingressos é um sistema de venda e gerencimento de ingressos, criado do zero, inicialmente sem framework e desenvolvido totalmente sem auxílio de IA.
Tem como objetivo principal, desenvolvimento de capacidade pessoal de se arquiteturar um sistema planejado, documentado e funcional, criando e modificando o projeto todo com planejando prévio, evitando decisões impulsivas tomadas sem conhecimento de suas concequências. 

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
- Em desenvolvimento

## Resultados Esperados
- Em desenvolvimento

## Documentações
- **ADR**: Registro de Decisões de Arquitetura, em resumo, uma documentação que detalha motivo de criação/modificação de cada função do sistema, como uma auditoria do código.