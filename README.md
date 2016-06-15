# Cache
Armazena algumas variáveis em cache de forma simples

## Salvando em cache

Para salvar usar o método "setVar(variavel, dados, minutos)". 
o método possui como parametro:
- **variavel** -> Nome que será salvo a variavel
- **dados** -> Os valores que serão salvos (Valores primitivos ou array)
- **minutos** *(opcional)* -> Depois de quantos minutos a variável vai expirar. Se não informar, o valor padrão será 5 minutos.

**Exemplo**
```php
<?php
require("cache.class.php");

//Diretório onde os dados vão ser salvos
$diretorio = dirname(__FILE__).'/cache/';

$cache = new Cache($diretorio);

//Forma 1 
$dados = "teste";
$cache->setVar("nomeVariavel", $dados, 10);

//Forma 2
$dados = array(1, 2, 3, 'teste');
$cache->setVar("nomeVariavel2", $dados);
```
---
## Buscando
Para recuperar uma variável salva em cache usar o método "getVar(variavel)". 
o método possui como parametro:
- **variavel** -> Nome da variavel salva

**Exemplo**
```php
<?php
require("cache.class.php");

//Diretório onde os dados vão ser salvos
$diretorio = dirname(__FILE__).'/cache/';

$cache = new Cache($diretorio);
$dados = $cache->getVar("nomeVariavel");
print_r($dados);
```
---
**Autor** Carlos W. Gama

Livre para usar, modificar como desejar e destribuir como quiser