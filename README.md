# Encurtador de Links - Projeto por Magno Emanoel

Bem-vindo ao **Encurtador de Links**, uma aplicação simples e eficiente desenvolvida para transformar URLs longas em versões curtas e fáceis de compartilhar. Este projeto foi criado por **Magno Emanoel** com o objetivo de fornecer uma solução prática e confiável para encurtamento de links.

## 📋 Descrição do Projeto

Este projeto é um encurtador de URLs que utiliza uma API externa para gerar versões mais curtas de links longos. Com uma interface amigável e de fácil navegação, o objetivo é proporcionar uma ferramenta intuitiva tanto para desenvolvedores quanto para usuários comuns. O encurtador de links é útil para tornar URLs mais práticas para compartilhamento em redes sociais, email, entre outras plataformas.

## 🚀 Tecnologias Utilizadas

- **PHP**: Linguagem principal para desenvolvimento do backend.
- **cURL**: Utilizado para realizar as requisições à API de encurtamento.
- **Composer**: Gerenciador de dependências do PHP, utilizado para autoload das classes e pacotes necessários.
- **HTML/CSS/JavaScript**: Para o desenvolvimento da interface de usuário.

## 📦 Estrutura do Projeto

### 📂 Descrição das Pastas

- **assets/**: Contém os recursos de mídia do projeto, como imagens e fontes.
- **public/**: Diretório público do projeto que contém os arquivos principais acessíveis pelo navegador, como `index.php` e o arquivo de estilo CSS.
- **src/**: Contém os arquivos do servidor, incluindo classes responsáveis pela lógica do sistema, como controladores e serviços.
- **vendor/**: Diretório gerado pelo Composer, contendo as dependências instaladas.

## 🛠️ Funcionalidades

- **Encurtar URLs**: Insira uma URL longa e o sistema irá gerar uma versão curta para você compartilhar de forma prática.
- **Copiar Link Curto**: Após gerar uma URL curta, você pode facilmente copiá-la com apenas um clique.
- **Interface Limpa e Intuitiva**: A interface foi projetada para ser simples e fácil de usar, com suporte a vídeo de fundo e layout responsivo.

## 📖 Instruções de Instalação

Para rodar o projeto localmente, siga os seguintes passos:

1. **Clone o repositório**:

2. **Instale as dependências do Composer**:

3. **Configuração do arquivo ****`.env`**:

   - Crie um arquivo `.env` na raiz do projeto e adicione sua chave da API:

4. **Servidor Web**:

   - Certifique-se de que o servidor web está apontando para o diretório `public/` como o root do projeto.

5. **Acessar o projeto**:

   - Inicie o servidor web localmente (pode ser Apache ou outro de sua escolha).
   - Acesse `http://localhost/shortener-v3/public/` no navegador.

## 🔄 Como Utilizar

1. Abra o navegador e acesse o endereço do encurtador.
2. Insira a URL que deseja encurtar no campo apropriado.
3. Clique no botão **Encurtar**.
4. O link encurtado será exibido na tela e você poderá copiá-lo diretamente.

## 🛡️ Segurança e Boas Práticas

- **Chaves de API**: A chave da API está armazenada no arquivo `.env` que não é versionado (ver `.gitignore`), garantindo que informações sensíveis não sejam compartilhadas.
- **Controle de Acesso**: Apenas arquivos no diretório `public/` são acessíveis pelo navegador, mantendo os arquivos de configuração e classes de lógica protegidos.

## 📄 Arquivo `.gitignore`

Certifique-se de que o seu arquivo `.gitignore` está corretamente configurado para excluir itens como:

- **Dependências**: `/vendor`
- **Arquivos de Ambiente**: `.env`
- **Cache e Logs**: `/cache`, `/tmp`, `*.log`
- **Arquivos de IDE**: `.idea`, `.vscode`

## 🤝 Contribuições

Sinta-se à vontade para contribuir com melhorias neste projeto! Faça um fork, crie uma branch, adicione suas melhorias e envie um pull request.

1. **Fork o repositório**
2. **Crie uma branch de feature**: `git checkout -b feature/nova-feature`
3. **Commit suas alterações**: `git commit -m 'Adiciona nova feature'`
4. **Envie para o branch**: `git push origin feature/nova-feature`
5. **Abra um pull request**

## 📧 Contato

Criado por **Magno Emanoel** - [Entre em contato](mailto\:magno_emanoel@outlook.com.com)

## 📝 Licença

Este projeto é de código aberto e está disponível sob a licença [MIT](https://opensource.org/license/mit).

---

Obrigado por conferir este projeto! Se você tiver alguma dúvida ou sugestão, sinta-se à vontade para entrar em contato. 😊

Criado por Magno Emanoel - Entre em contato: magno\_emanoel\@outlook.com

