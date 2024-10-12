# Migrador de emails
Este projeto é uma **API RESTful** desenvolvida com Laravel. Ele oferece funcionalidades para migrar emails de um servidor imap para outro, utilizando o pacote Laravel Sanctum para autenticação e segue as melhores práticas de desenvolvimento para APIs RESTful.

## Requisitos
- PHP >= 8.x
- Composer
- Laravel >= 9.x
- MySQL
- Docker (para ambiente de desenvolvimento)
## Instalação
Clone o repositório:
```
git clone https://github.com/usuario/nome-do-projeto.git
cd migrador
```
## Instale as dependências com o composer:

```
composer install
```
Crie o arquivo .env e configure suas variáveis de ambiente:
```
cp .env.example .env
```
Atualize as seguintes configurações no arquivo .env conforme necessário:
- DB_CONNECTION, 
- DB_HOST, 
- DB_PORT, 
- DB_DATABASE, 
- DB_USERNAME, 
- DB_PASSWORD

## Gere a chave da aplicação:
```
php artisan key:generate
```
## Execute as migrações do banco de dados:
```
php artisan migrate
```
Agora, use o Artisan para servir a aplicação:
```
php artisan serve
```

Faça um fork do projeto.
Crie uma branch para sua feature (git checkout -b feature/nova-feature).
Commit suas mudanças (git commit -m 'Adiciona nova feature').
Faça o push para a branch (git push origin feature/nova-feature).
Abra um Pull Request.
Licença
Este projeto está licenciado sob a Licença MIT.

