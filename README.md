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

Para que o projeto funcione corretamente, é NECESSÁRIO que a [API](https://github.com/gomidx/sales-comission-api) seja inicializada primeiro.

### 🔧 Iniciar

Para iniciar o projeto, execute o comando na raíz do projeto:

```
sudo make run-app-with-setup
```

Pronto! O projeto estará rodando na rota http://localhost:8001

Para derrubar o projeto, execute o comando:

```
sudo make kill-app
```

Atenção: todos os comandos devem ser executados na raíz do projeto.

Obs.: me deparei com um problema ao tentar acessar a rota do projeto utilzando o navegador Chrome, caso se depare com esse problema, basta utilizar outro navegador.

Obs.: caso apresente algum erro na primeira inicialização, derrube a aplicação e a inicie novamente.

## 🛠️ Construído com

* [PHP](https://www.php.net/)
* [Laravel](https://laravel.com/)
* [Docker](https://www.docker.com/)

---
Desenvolvido com ❤️ e muito ☕ por [Lucas Gomide](https://github.com/gomidx)