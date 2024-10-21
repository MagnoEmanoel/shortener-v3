<?php
namespace Controllers;

// Corrige o caminho para garantir que o autoload seja corretamente incluído
require_once __DIR__ . '/../../vendor/autoload.php';

use Services\UrlBaeApi;

class AccountController {

    private $api;

    // Construtor da classe: Inicializa a instância da API 'UrlBaeApi'
    public function __construct() {
        $this->api = new UrlBaeApi();
    }

    // Obtém informações da conta usando o serviço da UrlBae
    public function getAccountInfo() {
        $response = $this->api->getAccountInfo();
        
        // Verifica se não houve erro na resposta da API
        if (isset($response['error']) && $response['error'] === 0) {
            return $response['data'];
        } else {
            return "Erro ao obter informações da conta: " . ($response['message'] ?? 'Erro desconhecido');
        }
    }

    // Atualiza informações da conta usando o serviço da UrlBae
    public function updateAccountInfo($email, $password) {
        $response = $this->api->updateAccountInfo($email, $password);
        
        // Verifica se não houve erro na resposta da API
        if (isset($response['error']) && $response['error'] === 0) {
            return "Conta atualizada com sucesso.";
        } else {
            return "Erro ao atualizar a conta: " . ($response['message'] ?? 'Erro desconhecido');
        }
    }

    // Encurta uma URL usando o serviço UrlBae
    public function shortenUrl($url) {
        return $this->api->shortenUrl($url);
    }
}
