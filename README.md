## Sistema_Reunioes
;
#Estágio do curso de Ciência da Computação (1 Sem 2020)
;
## Introdução
;
Sistema de reuniões para empresas.;
;

## Ações disponiveis

Cadastro;
;
;

## Instalação

Em uma pasta do seu computador, digitar no cmd =  git clone https://github.com/alisonsassi95/Sistema_Reunioes.git ("Irá fazer dowload do projeto");
; 
DENTRO DA PASTA "Sistema_Reunioes" digitar = composer install (OBS: "Irá criar as pastas necessárias") ;
;
;
Caso não tiver o banco de dados, Criar no mysql ;
;
Abrir o arquivo .env.example e substituir as linhas :;
DB_DATABASE=SUA_BASE_DE_DADOS ;
DB_USERNAME=SEU_NOME_DE_USUARIO ;
DB_PASSWORD=SUA_SENHA ;
;
Logo após colocar os dados: ;
Rodar o comando = php -r "copy('.env.example', '.env');" ;
Rodar o comando = php artisan key:generate ;
Rodar o comando = php artisan migrate --seed ;
Rodar o comando = php artisan serve ;
;
;
Para logar-se como ADMIN, acesse a url http://SEU_LOCAL_HOST/home ;
; 
Login e senha padrão: ;
*login:* admin ;
*senha:*admin ;

Att
Alison Sassi



# Help Developer ;


php artisan make:model Name -m

php artisan make:controller NameController

php artisan migrate:refresh