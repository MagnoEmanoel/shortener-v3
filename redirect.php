<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Exemplo para buscar a URL original de um banco de dados ou arquivo
$id = $_GET['id'];

// Aqui você precisaria buscar a URL original a partir do ID, por exemplo, usando um banco de dados
$original_url = buscarUrlOriginal($id);

if ($original_url) {
    header("Location: " . $original_url);
    exit;
} else {
    echo "Link não encontrado ou expirado.";
}

function buscarUrlOriginal($id) {
    // Esta função precisa ser implementada para buscar o link original em um banco de dados, por exemplo.
    return null;
}
?>
