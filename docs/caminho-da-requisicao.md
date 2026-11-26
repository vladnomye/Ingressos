# Caminho da Requisição

## Para que serve?
É uma documentação que visa documentar os seguintes comandos: ***dig***, ***openssl s_client*** e ***curl -v***.
Objetivo final é entender para que servem e o que fazem.

## Explicação geral
- ***dig*** : Comando usado para se investigar informações do DNS de algum site/dominio.

- ***openssl s_client*** :

- ***curl - v*** :

## Retornos
- ***dig*** : 
```bash
    dig www.google.com
    #Versão do OS (Sistema Operacional) usado no comando.
    ; DiG 9.18.39-0ubuntu0.24.04.9-Ubuntu  www.google.com;
    #Local de execução do comando, neste caso, CMD.
    ;; global options: +cmd
    ;; Got answer:
    #Infos sobre a requisição, formato query, sem erros, id da requisição, respostas.
    ;; opcode: QUERY, status: NOERROR, id: 51174
    ;; flags: qr rd ra; QUERY: 1, ANSWER: 8, AUTHORITY: 0, ADDITIONAL: 1

    ;; OPT PSEUDOSECTION:
    ; EDNS: version: 0, flags:; udp: 65494
    # Pergunta feita para esse DNS. 
    ;; QUESTION SECTION:
    ;www.google.com.                        IN      A

    #Respostas recebidas, no caso se refere aos ips disponíveis ao se acessar este DNS, alterna entre ips dependendo da carga de cada um.
    ;; ANSWER SECTION:
    www.google.com.         42      IN      A       142.251.152.119
    www.google.com.         42      IN      A       142.251.151.119
    www.google.com.         42      IN      A       142.251.156.119
    www.google.com.         42      IN      A       142.251.157.119
    www.google.com.         42      IN      A       142.251.150.119
    www.google.com.         42      IN      A       142.251.155.119
    www.google.com.         42      IN      A       142.251.153.119
    www.google.com.         42      IN      A       142.251.154.119
    #Tempo percorrido na execução do comando.
    ;; Query time: 0 msec
    #IP de quem perguntou, no caso, o meu.
    ;; SERVER: 127.0.0.53#53(127.0.0.53) (UDP)
    ;; WHEN: Thu Nov 26 17:54:00 -03 2026
    ;; MSG SIZE  rcvd: 171
```
- ***openssl s_client*** :
```bash

```

- ***curl - v*** :
```bash

```
