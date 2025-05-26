# Paso a Passo para rodar o projeto

- Copiar arquivo .env.example e renomear para .env
- Alterar configurações de acesso ao banco de dados

Rodar seguintes comandos:
- composer install
- npm install
- php artisan migrate
- php artisan db:seed
- npm run dev
- php artisan serve

# Informações importantes:
- Nas seeders está configurado para criar um usuário admin com o e-mail admin@admin.com e senha 123456
- Este usuário pode criar tarefas e atribuir para outros usuários, e acessar a listagem dos mesmos
- Todos os usuários estão com a mesma senha 123456


# 🧠 Desafio Técnico - Desenvolvedor(a) Full Stack (Laravel + Blade)

Bem-vindo(a)! Este é o desafio técnico para a vaga de **Desenvolvedor(a) Full Stack Laravel**. O objetivo é avaliar suas habilidades práticas com as tecnologias utilizadas no dia a dia do time.

## 🎯 Objetivo

Criar uma aplicação completa de gerenciamento de tarefas com as seguintes funcionalidades:

- Cadastro, listagem, edição e exclusão de tarefas
- Autenticação de usuários (login e logout)
- Interface moderna e responsiva com Blade e TailwindCSS

---

## 🧱 Requisitos Técnicos

### Backend / Full Stack
- PHP 8.2+
- Laravel 11
- MySQL
- Autenticação (Laravel Breeze, Jetstream ou implementação própria)
- Migrations e Seeders
- Form Requests para validação
- Controllers e Eloquent bem organizados

### Frontend
- Blade
- TailwindCSS
- (Opcional) Alpine.js para pequenas interações

### DevOps
- Docker
- Hospedagem local via Docker

---

## 💡 Funcionalidades Esperadas

1. **Autenticação**
   - Registro, login e logout de usuários
   - Middleware para proteger rotas autenticadas

2. **CRUD de Tarefas**
   - Campos: título, descrição, status (pendente, em andamento, concluída)
   - Datas de criação e atualização

3. **Listagem e Filtros**
   - Listar tarefas
   - Filtro por status
   - Ordenação por data

4. **Feedback visual**
   - Mensagens de sucesso e erro
   - Estilo visual agradável (usando Tailwind)

5. **Seeders**
   - Popular o sistema com usuários e tarefas de exemplo

---

## 🧪 Avaliação

Critérios:

- Estrutura e organização do código (MVC)
- Boas práticas Laravel
- Uso correto de Eloquent e validação
- Interface responsiva e clara
- Qualidade do código Blade
- Utilização adequada de migrations e seeders
- Uso de Docker como diferencial

---

## 🚀 Como entregar

1. Faça um fork deste repositório
2. Implemente a solução
3. Inclua um README.md com:
   - Como rodar o projeto localmente
   - Como rodar as migrations e seeders
4. Envie o link do repositório

---

## ❓ Dúvidas?

Se tiver qualquer dúvida, pode nos contatar.

Boa sorte! Estamos animados para ver seu talento em ação 🚀
