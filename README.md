# 📚 Projeto Laravel Livro

Sistema de gerenciamento de livros desenvolvido em **Laravel**. Permite cadastrar, listar, editar e excluir livros, com validações (como impedir ISBN duplicado) e um campo booleano para indicar se o livro está ativo.

## 🚀 Tecnologias Utilizadas
- Laravel 10
- PHP 8.2
- MySQL (MariaDB via XAMPP)
- Composer
- NPM (Vite para front-end)
- Git/GitHub

## ⚙️ Instalação e Execução
1. Instalar dependências:  
   composer install  
   npm install  

2. Configurar variáveis de ambiente copiando o `.env.example` para `.env` e ajustando os dados do banco de dados:  
   cp .env.example .env  

3. Gerar chave da aplicação:  
   php artisan key:generate  

4. Rodar as migrations:  
   php artisan migrate  

5. Subir o servidor:  
   php artisan serve  

6. (Opcional) Rodar o Vite:  
   npm run dev  

## 🔑 Acesso ao Sistema
Acesse http://127.0.0.1:8000/register para criar seu usuário. Depois faça login em http://127.0.0.1:8000/login. Após logar, você será redirecionado para a página de Livros.

## Usuario ja existente
email: pedrolaravel@gmail.com
senha: 12345678

## 📋 Funcionalidades
- Criar novo livro (/livros/novo)  
- Listar todos os livros (/livros)  
- Editar dados do livro  
- Excluir livro  
- Validação para não permitir ISBN duplicado  
- Campo booleano **Ativo** (indica se o livro está disponível)

## 👤 Autor
Pedro Barros Agostini  
Curso: Engenharia de Software – UniFil  
Ano: 2025
