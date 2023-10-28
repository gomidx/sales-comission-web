# Frontend do projeto de cadastro de vendas e cálculo de comissões

O frontend do projeto foi desenvolvido em PHP utilizando o framework Laravel. O projeto se trata de um dashboard que conta com as seguintes funcionalidades:

1. Cadastro, login e logout de usuários adiministradores
2. Listagem, cadastro, edição e exclusão de vendedores
3. Envio de um relatório por e-mail das vendas do dia e suas respectivas comissões ao vendedor
4. Listagem e cadastro de vendas
5. Envio de um relatório por e-mail para o administrador logado de todas as vendas do dia
6. Envio diário às 18h de um relatório por e-mail para os vendedores de todas suas vendas e respectivas comissões do dia
7. Autenticação para acessar o dashboard

## 🚀 Setup do projeto

### ⚠️ Atenção

Para que o projeto funcione corretamente, é NECESSÁRIO que a [API](https://github.com/gomidx/sales-comission-api) seja inicializada primeiro!

### 🔧 Instalação

Para instalar as dependências do projeto, rode o comando:

```
composer install
```

E para iniciar o projeto, rode o comando:

```
php artisan serve
```

Para o envio diário é necessário rodar o comando:

```
php artisan schedule:work
```

esse comando fará com que o schedule do Laravel rode localmente verificando as tarefas a serem executadas.

Pronto, o projeto estará rodando na rota http://127.0.0.1/8000!

## 🛠️ Construído com

* [PHP](https://www.php.net/)
* [Laravel](https://laravel.com/)

---
Desenvolvido com ❤️ e muito ☕ por [Lucas Gomide](https://github.com/gomidx)