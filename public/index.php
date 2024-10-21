<?php

// Ativar exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Carrega o autoload do Composer no ponto de entrada principal do projeto
require_once __DIR__ . '/../vendor/autoload.php';

use Controllers\AccountController;

$account = new AccountController();

$shortened_url = null;
$error_message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['url'])) {
    $url_to_shorten = filter_var($_POST['url'], FILTER_SANITIZE_URL);

    if (filter_var($url_to_shorten, FILTER_VALIDATE_URL)) {
        // Utiliza o AccountController para encurtar a URL
        $response = $account->shortenUrl($url_to_shorten);

        if ($response && isset($response['error']) && $response['error'] === 0 && isset($response['shorturl'])) {
            $shortened_url = $response['shorturl'];
        } else {
            $error_message = "Não foi possível encurtar a URL. Por favor, tente novamente.";
        }
    } else {
        $error_message = "A URL fornecida é inválida. Por favor, tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encurtador de Link</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Vídeo de Fundo -->
    <video autoplay muted loop id="background-video">
        <source src="../assets/images/video3.mp4" type="video/mp4">
        Seu navegador não suporta a reprodução de vídeos.
    </video>

    <!-- Barra de Navegação -->
    <header class="navbar">
        <div class="logo">
            <img src="../assets/images/chain.png" alt="Cadeado, representando segurança" class="logo-img">
            <h1>Encurtador de Links</h1>
        </div>
        <nav class="nav-links">
            <a href="index.html">Home</a>
            <a href="sobre.html">Sobre</a>
            <a href="contato.html">Contato</a>
        </nav>
        <div class="menu-toggle" id="menu-toggle">
            &#9776; <!-- Ícone do menu hamburguer -->
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main>
        <section class="form-section">
            <h2>Insira o URL que deseja encurtar:</h2>
            <form method="POST" action="">
                <div class="input-container">
                    <label for="url-input">URL:</label>
                    <input type="text" id="url-input" name="url" placeholder="https://exemplo.com" required>
                    <button type="submit" id="encurtar-btn">Encurtar</button>
                </div>
            </form>
            
            <h2>Resultado:</h2>
            <div id="resultado" class="result-container">
                <?php if ($shortened_url): ?>
                    <input type="text" id="url-output" value="<?php echo htmlspecialchars($shortened_url); ?>" readonly>
                    <button id="copiar-btn" onclick="navigator.clipboard.writeText('<?php echo htmlspecialchars($shortened_url); ?>')">Copiar</button>
                <?php elseif ($error_message): ?>
                    <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <!-- Rodapé -->
    <footer class="footer">
        <p>&copy; 2024 Encurtador de Links. Todos os direitos reservados.</p>
        <p>Deseja criar uma landing page ou projeto personalizado para o seu negócio? Entre em contato pelo e-mail: <a href="mailto:email@outlook.com">email@outlook.com</a></p>
    </footer>

    <!-- Scripts JavaScript Inline -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Lógica para o menu hamburguer
            const menuToggle = document.getElementById("menu-toggle");
            const navLinks = document.querySelector(".nav-links");

            menuToggle.addEventListener("click", function() {
                navLinks.classList.toggle("menu-open");
            });
        });
    </script>
</body>
</html>
