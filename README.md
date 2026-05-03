
# MyWallet - Sistema de Gestão Financeira 

## Descrição

Um sistema web simples e elegante para controle financeiro pessoal, desenvolvido em **PHP puro** e **Vanilla CSS**. O projeto foca em persistência de dados em sessão (sem banco de dados externo).

## 📄 Funcionalidades

**Autenticação de Usuário**: Sistema de login protegido utilizando `password_hash()` e `password_verify()`.
*   **Dashboard Financeiro**:
    *   Visualização em tempo real do **Saldo Total**.
    *   Cores dinâmicas (Verde para saldo positivo, Vermelho para negativo).
    *   Formulário intuitivo para registrar novas **Receitas** e **Despesas**.
*   **Histórico de Movimentações**:
    *   Tabela detalhada com todas as transações realizadas na sessão.
    *   **Feature Bônus**: Cálculo automático e barra de progresso mostrando a porcentagem (% de relevância) de cada despesa em relação ao total gasto.
*   **Gestão de Sessão**:
    *   Proteção de rotas (redireciona para o login se não autenticado).
    *   Função para **"Zerar Mês"** que apaga todos os registros da sessão de forma segura.

## 🛠️ Tecnologias Utilizadas

*   **Backend**: PHP (Sessões, Arrays Associativos, Estruturas de Repetição).
*   **Frontend**: HTML5 Semântico.
*   **Estilização**: Vanilla CSS (Variáveis CSS, Flexbox/Grid, Efeitos Glass, Animações suaves).
*   **Design System**: Tema escuro focado em alto contraste e paleta de cores moderna (Indigo, Emerald, Red).

## Uso

1. Copie a pasta `Mywallet` para dentro do diretório raiz do seu servidor web (`htdocs` para XAMPP, `www` para WAMP).
2. Inicie os serviços do Apache no seu painel de controle.
3. Acesse no navegador: `http://localhost/Mywallet/`

## 📁 Estrutura do Projeto

```text
Mywallet/
├── includes/
│   ├── functions.php    # Lógica de negócio, cálculos matemáticos e verificação de auth
│   ├── header.php       # Cabeçalho HTML, NavBar e tags <head>
│   └── footer.php       # Rodapé HTML e fechamento de tags
├── index.php            # Dashboard (Resumo do Saldo e Cadastro de Transações)
├── historico.php        # Tabela com listagem de movimentações e percentuais
├── login.php            # Tela de autenticação e boas-vindas
├── clean.php           # Rota para limpar os dados da sessão (Zerar Mês)
├── logout.php           # Rota para deslogar do sistema
├── style.css            # Folha de estilos principal do projeto
└── README.md            # Documentação do projeto (este arquivo)
```

## 🔍 Observações

- Como este é um projeto em PHP, você precisará de um servidor web local (como XAMPP, WampServer, Laragon ou PHP Server embutido).
- Para testar o sistema, utilize os seguintes dados de login (hardcoded no `functions.php`):

*   **Usuário**: `admin`
*   **Senha**: `admin123`

## Licença

Desenvolvido como projeto base de gestão financeira. Sinta-se à vontade para expandir e adicionar conexão com banco de dados (ex: MySQL com PDO) no futuro!

