<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## About this Project - pweb2_laravel_2023_2
Código-Fonte do Projeto desenvolvido durante as aulas de  desenvolvido durante as aulas de programação web 2 com PHP e Laravel no curso técnico integrado do IFSC 2023.2

## Quando baixar o projeto, o que fazer? 
**1. Instalar as dependências do projeto**  
`composer install`  

**2. Criar as tabelas do banco de dados do projeto**  
`php artisan migrate` 

----
## Diretorios mais usados do projeto
**Controller**
`App/Http/Controllers`

**Model**
`App/Http/Models`

**View**
`resources/views/nome_arquivo.blade.php`

**Rotas**
`routes/web.php`

**Arquivos de migração(geram as tabelas do banco de dados)**
`database/migrations`

----
## Banco de dados

**Criar arquivo para gerar tabela no banco de dados**  
`php artisan make:migration create_nome_tabela`

**Gerar as tabelas no banco de dados**  
`php artisan migrate`

**Salvar .SQL do banco de dados**  
`database/sql/db_aula.sql`

**Criar um arquivo para inserir registros no banco de dados**  
`php artisan make:seeder NomeSeeder`

**Inserir registros no banco de dados a partir de um arquivo**  
`php artisan db::seed NomeSeeder`

----
## Comandos básicos do Laravel  
**Listar todos os comandos do Laravel**  
`php artisan list`

**Criar um arquivo Model**  
`php artisan make:model NomeModel`

**Criar um arquivo Model e um arquivo de migração ao mesmo tempo**  
`php artisan make:model NomeModel -m`

**Criar um arquivo Controller**  
`php artisan make:controller NomeModel`

**Criar um Controller e o --model associa com o Model da tabela**  
`php artisan make:controller NomeController --resource --model=NomeModel`

**Habilitar o envio de arquivo para o Storage**  
`php artisan storage:link`

**Iniciar o sistema**  
`php artisan serve`

**Acessar o sistema**  
`http://localhost:8000/`

## Comandos básicos Git

**Clonar o projeto**  
`git clone URL_PROJETO`

**Adicionar todos arquivos para serem versionados**  
`git add .`

**Commitar o arquivo para ser versionado**  
`git commit -m "Sua mensagem"`

**Enviar as alterações para o repositorio remoto do Git**  
`git push`

**Atualizar arquivos do projeto local de acordo com o repositorio do Git remoto**  
`git pull`

### Links Úteis
- [Documentação oficial do Laravel](https://laravel.com/docs).
- [Correção do Erro de instalação do login Breeze](https://stackoverflow.com/questions/72798465/vite-manifest-not-found-at-c-users-hp-example-app-public-build-manifest-json)
- [Curso completo Laravel versão 10 em português](https://academy.especializati.com.br/curso/laravel-10-gratuito).
