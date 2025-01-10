# 🚀 Sistema de Login para Site de Vendas Online

Este projeto implementa um sistema de login seguro para um site de vendas online. O objetivo é autenticar usuários e administradores, garantindo que apenas pessoas autorizadas possam acessar as áreas restritas do sistema. 🔒

## Funcionalidades ⚙️

- **🔑 Login de Usuários**: Autenticação por email e senha.
- **➡️ Redirecionamento Baseado no Tipo de Usuário**: 
  - Usuários comuns são direcionados para o painel padrão.
  - Administradores acessam o painel administrativo.
- **🔐 Proteção de Senhas**: Uso de `password_hash` e `password_verify` para manipulação segura de senhas.
- **⚠️ Mensagens de Erro**: Feedback amigável em caso de credenciais inválidas.

## Tecnologias Utilizadas 🛠️

- **Back-end**: PHP (com PDO para interações seguras com o banco de dados).
- **Banco de Dados**: MySQL.
- **Front-end**: HTML5 e CSS3.
- **Segurança**:
  - Sanitização de entradas do usuário.
  - Hashing de senhas com `password_hash`.

## Estrutura do Projeto 📂

- **`Includ/`**: Contém arquivos reutilizáveis, como o cabeçalho e o rodapé.
- **`Pasta_corpo/`**: Inclui os painéis de controle dos usuários e administradores.
- **`conexao/`**: Arquivo de configuração para conexão com o banco de dados.
- **`logins/`**: Scripts responsáveis pela autenticação.

## Próximos Passos 🚧

- Implementar bloqueio temporário após várias tentativas de login falhas.
- Melhorar o design da interface do usuário.
- Adicionar logs para auditoria de acessos.
