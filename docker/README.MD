# Template Laravel + Docker + Postgres

O Objetivo deste guia é direcionar a instalação do ambiente para inicio de novos projetos da empresa Tecnorisk.

Será aborado os seguintes tópicos:

  - Início de um novo projeto no GitLab
  - Instalação de ambiente em maquina do desenvolvedor
  - Acessando aplicação no navegador e linha de comandos

# Novo Projeto GitLab

1. Acesse o [GitLab Tecnorisk](http://192.168.0.73/) com seu usuário e senha.

1. No canto superior direito clique em **New Project**

1. Preencher o formulario da aba **Blank project** e clicar em **Create Project**

# Instalação do ambiente

1. Realizar o **Git Clone** via método HTTP em sua pasta local de projetos

```sh
$ git clone http://192.168.0.73/CAMINHO/NOME-DO-PROJETO.git
```
> Lembre-se de substituir no exemplo acima o **CAMINHO** e **NOME-DO-PROJETO**

1. Copie e cole todos os arquivos do diretório onde se encontra `este guia` e cole dentro do diretório criado pelo `Git Clone` 

1. Com uso do `Terminal`, entre no diretório onde copiou os arquivos e execute o comando para instalação

```sh
$ sh install.sh
```


