<?php

namespace Services;

require_once __DIR__ . '/../../vendor/autoload.php'; 

use Config\Config;

class UrlBaeApi {

    private $api_key;
    private $base_url;

    public function __construct() {
        // Carrega a chave de API do arquivo .env
        $this->api_key = Config::get('API_KEY');
        if (!$this->api_key) {
            throw new \Exception("A chave de API não foi carregada corretamente.");
        }

        $this->base_url = 'https://urlbae.com/api/url/add';
    }

    // Método para encurtar uma URL usando a API UrlBae
    public function shortenUrl($url) {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->base_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "POST", // Certifique-se de que seja uma requisição POST
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer " . $this->api_key,
                "Content-Type: application/json",
            ],
            CURLOPT_POSTFIELDS => json_encode([
                "url" => $url
            ]),
        ]);

        $response = curl_exec($curl);
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Obtém o status HTTP

        // Verificar se houve erro no cURL
        if (curl_errno($curl)) {
            echo 'Erro cURL: ' . curl_error($curl);
        }

        curl_close($curl);

        // Verificação do status HTTP para determinar a ação a ser tomada
        if ($http_status == 200) {
            if ($response) {
                $decoded_response = json_decode($response, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    echo 'Erro ao decodificar JSON: ' . json_last_error_msg();
                    return null;
                }
                return $decoded_response;
            }
        } elseif ($http_status == 404) {
            // Redirecionando o erro de 404 para um tratamento específico
            echo "Erro: O endpoint da API não foi encontrado. Verifique se o endpoint está correto.";
        } else {
            // Exibindo mensagem de erro para outros códigos de status
            echo "Erro: A API retornou o código de status HTTP $http_status. Verifique se a chave de API está correta.";
        }

        return null;
    }

    // Método para obter informações da conta
    public function getAccountInfo() {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://urlbae.com/api/account",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer " . $this->api_key,
                "Content-Type: application/json",
            ],
        ]);

        $response = curl_exec($curl);
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Obtém o status HTTP

        // Verificar se houve erro no cURL
        if (curl_errno($curl)) {
            echo 'Erro cURL: ' . curl_error($curl);
        }

        curl_close($curl);

        // Verificação do status HTTP para determinar a ação a ser tomada
        if ($http_status == 200) {
            if ($response) {
                $decoded_response = json_decode($response, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    echo 'Erro ao decodificar JSON: ' . json_last_error_msg();
                    return null;
                }
                return $decoded_response;
            }
        } elseif ($http_status == 404) {
            // Redirecionando o erro de 404 para um tratamento específico
            echo "Erro: O endpoint da API não foi encontrado. Verifique se o endpoint está correto.";
        } else {
            // Exibindo mensagem de erro para outros códigos de status
            echo "Erro: A API retornou o código de status HTTP $http_status. Verifique se a chave de API está correta.";
        }

        return null;
    }

    // Método para atualizar informações da conta
    public function updateAccountInfo($email, $password) {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://urlbae.com/api/account/update",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer " . $this->api_key,
                "Content-Type: application/json",
            ],
            CURLOPT_POSTFIELDS => json_encode([
                "email" => $email,
                "password" => $password,
            ]),
        ]);

        $response = curl_exec($curl);
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Obtém o status HTTP

        // Verificar se houve erro no cURL
        if (curl_errno($curl)) {
            echo 'Erro cURL: ' . curl_error($curl);
        }

        curl_close($curl);

        // Verificação do status HTTP para determinar a ação a ser tomada
        if ($http_status == 200) {
            if ($response) {
                $decoded_response = json_decode($response, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    echo 'Erro ao decodificar JSON: ' . json_last_error_msg();
                    return null;
                }
                return $decoded_response;
            }
        } elseif ($http_status == 404) {
            // Redirecionando o erro de 404 para um tratamento específico
            echo "Erro: O endpoint da API não foi encontrado. Verifique se o endpoint está correto.";
        } else {
            // Exibindo mensagem de erro para outros códigos de status
            echo "Erro: A API retornou o código de status HTTP $http_status. Verifique se a chave de API está correta.";
        }

        return null;
    }
}
