# Projeto-pedidos
## Pré-Requisitos
> Instalação do servidor Mysql,com o seguinte comando.
```
# apt-get install mysql-server
```
Instale o (make) digitando o comado abaixo, para executar as configurações do projeto.
```
# apt-get install make
```
Instale o  gerenciador de pacotes (composer)
```
# apt-get install composer
```
> Instalação do Laravel obrigatória para a execução do projeto, veja mais em :
* [Laravel-Installation](https://laravel.com/docs/6.0/installation) - Instalação completa na documentação do framework -
## Instalação
- Para Clonar o repositório do projeto no seu computador digite : git clone ```https://github.com/Alessandro018/Projeto-pedidos.git ```
### Configuração
> Em seguida entre na pasta raiz do projeto e utilize o comando abaixo.
```
$ make conf
```
## Execução
> Após a configuração do make conf,coloque no navegador : ```localhost:8000 ``` ou  ``` http://127.0.0.1:8000 ``` e você terá acesso ao nosso projeto.

## Observações
> - Na página "Produtos" exibi todos os produtos cadastrados EXCETO os seus. Se quiser ver seus produtos cadastrados, navegue até a aba "Meus produtos".
> - A cada solicitação realizada a quantidade disponível do produto diminui, portanto, se a mesma for zero não será possível realizar uma solicitação do mesmo.

## Ferramentas
- [Laravel](https://laravel.com) - PHP Framework
- [Bootstrap](https://getbootstrap.com/) - CSS && HTML Framework
- [Visual Studio Code](https://code.visualstudio.com/) - Editor de texto
- [MYSQL](https://www.mysql.com/) - Sistema de gerenciamento de banco de dados
- [Vue.js](https://vuejs.org/) - JavaScript Framework
- [PHP](https://php.net/) - Linguagem de programação
