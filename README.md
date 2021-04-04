As instruções são dadas baseadas em um computador executando Ubuntu 20.04.

## Pré-requisitos
Como o projeto utiliza o Laravel v8 é necessário atender aos pré-requisitos do framework.

Sao eles: 
- PHP >= 7.3
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- [composer PHP](https://getcomposer.org/download/)

Adicionalmente instale o **sqlite3** e **php-sqlite3** porque o banco de dados é um arquivo SQLite.
Para utilizar outro SGBD é necessário configurar adequadamente o arquivo .env.

## Deploy

### Alias
Em ~/.bashrc acrescente
```bash
alias composer='php /path/to/composer.phar'
alias artisan='php artisan'
```

Em seguida execute
```bash
source ~/.bashrc
```
para recarregar suas configurações

### Clone e configuração
```bash
git clone https://github.com/vrrafael/lian.git
cd lian
composer install
touch database/database.sqlite
touch .env
```

Copie o texto abaixo para o arquivo .env

```conf
APP_NAME=lian
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=sqlite

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1
```
Execute _artisan key:generate_ para gerar uma chave para APP_KEY em .env.
As demais instruções criam _as tabelas utlizadas no projeto_, _preenchem as tabelas com alguns registros_ e _ligam o servidor do PHP_.
```bash
artisan key:generate
artisan migrate
artisan db:seed
artisan serve
```
No terminal o resultado deverá ser _Starting Laravel development server: http://127.0.0.1:8000_.
Ao digitar _127.0.0.1:8000_ no navegador deverá aparecer uma tela de login. As credenciais são: e-mail: policarpo@loremipsum.com; senha: password;

**Obs:** 
- Alguns usuários foram cadastrados para serem utilizados no campo _participantes_ nos formulários para cadastrar e editar um projeto. Seus e-mails serão exibidos quando alguma letra for digitada no campo.
