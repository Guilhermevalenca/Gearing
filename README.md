# Gearing

## Passo 1 (instalar os pacotes necessarios para executa o projeto):
### npm
```
sudo apt install npm
sudo npm install -g npm@latest
```
### nodemon
```
sudo npm install -g nodemon
```
### php (caso o seu SO seja windows, precisará ter ativado os drivers do PDO no seu php)
### mysql
```
sudo apt install lamp-server^
```
#### O comando mostrado a cima irá instalar o php, mysql e o apache na sua maquina

## Passo 2 (instalando dependencias):

## Primeiro comando que deve ser executado dentro da pasta do projeto
```
npm install
```

### Entre no diretorio ws e execute novamente o comando
```
npm install
```
## Passo 3 (realizando a conexão com o banco de dados):

### Aparti da raiz do projeto va ate /api/conf/establishingConnection.php
### Ao abrir o arquivo terá terá algo mais ou menos assim:
<!-- imagem de exemplo -->
### Apenas altere a porta o usuario e a senha, (por padrão o mysql utiliza a porta 3306)

## Passo 4 (executarndo o projeto):

### Dentro do diretorio raiz do projeto, execute esses comandos:
```
npm run serve
npm run ws
npm run api
```
## Pronto agora so ir no seu browser e acessar a url http://localhost:8080 e ja poderá acessar o Gearing
