# Caminho da Requisição

## Geral
Ao se digitar uma URL no navegador, uma série de processos internos ocorrem antes de ser efetuada a conectividade, segue alguns desses passos:

* Destrinchando uma URL: https://www.google.com.br/ 
    
    - Http(Schema da requisição): HTTP é padrão, sem certificado SSL, o contrário(https) é possuir o certificado.
    
    - www(World Wide Web): Rede global de informações, a maior parte das páginas existente é vinculada á essa rede.
    
    - google.com.br: Nome do domínio e tipo, .com.br é uma extenção do domínio, sendo .com a mais reconhecida mundialmente, usada principalmente por sites comerciais, auxiliando no alcance da pesquisa.

*Alguns processos que ocorrem durante requisição
    - Comunicação entre DNS e IP: Uma URL costuma ter um nome sob o IP, durante a conexão, o DNS contacta diretamente esse IP por detrás do domínio.
    - TLS: Parte da requisição em que se é verificado certificados, possui as chaves correspondentes, tudo por meio de uma série de handshakes.
    - Método e derivados: No caso de uma simples requisição, sem inserção de dados, o método é GET, o navegador envia a URL com o método, caminho requerida na url, formatos aceitos para resposta do servidor.

## Para que serve?
É uma documentação que visa abordar os seguintes comandos: ***dig***, ***openssl s_client*** e ***curl -v***.
Objetivo final é entender para que servem e o que fazem.

## Explicação geral
- ***dig*** : Comando usado para se investigar informações do DNS de algum site/dominio.

- ***openssl s_client*** : Um pacote que faz parte do comando openssl, é útil para se verificar/validar certificados presentes em uma página, uma boa opção para se acompanhar configuração SSL/TLS de servidores.

- ***curl - v*** : cURL é basicamente um comando útil para se testar conectivade com servidores, se um IP existir e aceitar a requisição GET que o curl envia, o retorno é informações sobre certificados, ip, porta, handshakes, e infos sobre a própria requisição.

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
    openssl s_client -connect www.google.com:443

    CONNECTED(00000003)
    depth=2 C = US, O = Google Trust Services LLC, CN = GTS Root R4
    verify return:1
    depth=1 C = US, O = Google Trust Services, CN = WE2
    verify return:1
    depth=0 CN = www.google.com
    verify return:1
    ---
    Certificate chain
    0 s:CN = www.google.com
    i:C = US, O = Google Trust Services, CN = WE2
    #Tipo de algoritmo e chave pública
    a:PKEY: id-ecPublicKey, 256 (bit); sigalg: ecdsa-with-SHA256
    #Validade do certificado
    v:NotBefore: Nov  3 08:29:37 2026 GMT; NotAfter: Jan 26 08:29:36 2027 GMT
    1 s:C = US, O = Google Trust Services, CN = WE2
    i:C = US, O = Google Trust Services LLC, CN = GTS Root R4
    a:PKEY: id-ecPublicKey, 256 (bit); sigalg: ecdsa-with-SHA384
    v:NotBefore: Dec 13 09:00:00 2023 GMT; NotAfter: Feb 20 14:00:00 2029 GMT
    2 s:C = US, O = Google Trust Services LLC, CN = GTS Root R4
    i:C = BE, O = GlobalSign nv-sa, OU = Root CA, CN = GlobalSign Root CA
    a:PKEY: id-ecPublicKey, 384 (bit); sigalg: RSA-SHA256
    v:NotBefore: Nov 15 03:43:21 2023 GMT; NotAfter: Jan 28 00:00:42 2028 GMT
    ---
    #Certificado
    Server certificate
    -----BEGIN CERTIFICATE-----
    MIIDezCCAyGg...
    -----END CERTIFICATE-----
    #Assunto do Certificado
    subject=CN = www.google.com
    #Emissor/Assintante do Certificado
    issuer=C = US, O = Google Trust Services, CN = WE2
    ---
    No client certificate CA names sent
    #Criptografia usada
    Peer signing digest: SHA256
    Peer signature type: ECDSA
    Server Temp Key: X25519, 253 bits
    ---
    SSL handshake has read 2778 bytes and written 396 bytes
    Verification: OK
    ---
    New, TLSv1.3, Cipher is TLS_AES_256_GCM_SHA384
    Server public key is 256 bit
    Secure Renegotiation IS NOT supported
    Compression: NONE
    Expansion: NONE
    No ALPN negotiated
    Early data was not sent
    Verify return code: 0 (ok)

```

- ***curl - v*** :
```bash
    curl -v https://www.google.com

    * Host www.google.com:443 was resolved.
    * IPv6: 2001:4860:482c:7700::, 2001:4860:482b:7700::, 2001:4860:4828:7700::, 2001:4860:4826:7700::, 2001:4860:482d:7700::, 2001:4860:4829:7700::, 2001:4860:482a:7700::, 2001:4860:4827:7700::
    * IPv4: 142.251.154.119, 142.251.153.119, 142.251.157.119, 142.251.151.119, 142.251.152.119, 142.251.150.119, 142.251.156.119, 142.251.155.119
    *   Trying 142.251.154.119:443...
    #Conexão do Ip e porta usada.
    * Connected to www.google.com (142.251.154.119) port 443
    * ALPN: curl offers h2,http/1.1
    #handshakes, entre TLS e Server, verificando disponibilidade de certificados etc...
    * TLSv1.3 (OUT), TLS handshake, Client hello (1):
    *  CAfile: /etc/ssl/certs/ca-certificates.crt
    *  CApath: /etc/ssl/certs
    * TLSv1.3 (IN), TLS handshake, Server hello (2):
    * TLSv1.3 (IN), TLS handshake, Encrypted Extensions (8):
    * TLSv1.3 (IN), TLS handshake, Certificate (11):
    * TLSv1.3 (IN), TLS handshake, CERT verify (15):
    * TLSv1.3 (IN), TLS handshake, Finished (20):
    * TLSv1.3 (OUT), TLS change cipher, Change cipher spec (1):
    * TLSv1.3 (OUT), TLS handshake, Finished (20):
    * SSL connection using TLSv1.3 / TLS_AES_256_GCM_SHA384 / X25519 / id-ecPublicKey
    * ALPN: server accepted h2
    * Server certificate:
    *  subject: CN=www.google.com
    *  start date: Nov  3 08:29:37 2026 GMT
    *  expire date: Jan 26 08:29:36 2027 GMT
    *  issuer: C=US; O=Google Trust Services; CN=WE2
    #Certificados e criptografia.
    *  SSL certificate verify ok.
    *   Certificate level 0: Public key type EC/prime256v1 (256/128 Bits/secBits), signed using ecdsa-with-SHA256
    *   Certificate level 1: Public key type EC/prime256v1 (256/128 Bits/secBits), signed using ecdsa-with-SHA384
    *   Certificate level 2: Public key type EC/secp384r1 (384/192 Bits/secBits), signed using ecdsa-with-SHA384
    * using HTTP/2
    * [HTTP/2] [1] OPENED stream for https://www.google.com/
    #informações sobre a requisição http, método, schema(http ou https), caminho (no caso /).
    * [HTTP/2] [1] [:method: GET]
    * [HTTP/2] [1] [:scheme: https]
    * [HTTP/2] [1] [:authority: www.google.com]
    * [HTTP/2] [1] [:path: /]
    * [HTTP/2] [1] [user-agent: curl/8.5.0]
    * [HTTP/2] [1] [accept: */*]
    > GET / HTTP/2
    > Host: www.google.com
    > User-Agent: curl/8.5.0
    > Accept: */*
```
