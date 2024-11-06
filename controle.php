<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Controle do LED e Porta</title>
</head>
<body>

<h1>Controle do LED e Status da Porta</h1>

<?php
// Definir o IP do ESP32
$ip_esp32 = "192.168.137.249";

// Função para obter o status do LED
function obterStatusLed() {
    global $ip_esp32;
    $url = "http://$ip_esp32/status_led"; 
    $response = file_get_contents($url);
    if ($response === FALSE) {
        return "Erro ao obter status do LED"; 
    }
    return trim($response); 
}

// Função para obter o status da porta
function obterStatusPorta() {
    global $ip_esp32;
    $url = "http://$ip_esp32/status_porta";
    $response = file_get_contents($url);
    if ($response === FALSE) {
        return "Erro ao obter status da porta"; 
    }
    return trim($response);
}

// Função para controlar o LED
function controlarLed($estado) {
    global $ip_esp32;
    $url = "http://$ip_esp32/" . ($estado ? 'H' : 'L');
    $response = file_get_contents($url);
    if ($response === FALSE) {
        echo "Erro ao controlar LED"; 
    }
}

// Obter status do LED e da porta
$status_led = obterStatusLed();
$status_porta = obterStatusPorta();

// Exibir status
echo "Estado do LED: ";
echo $status_led == 'Ligado' ? '<span style="color: green;">Ligado</span>' : '<span style="color: red;">Desligado</span>';
echo "<br>";

echo "Status da Porta: ";
echo $status_porta == 'ABERTA' ? '<span style="color: green;">Aberta</span>' : '<span style="color: red;">Fechada</span>';
echo "<br>";

// Botões interativos
echo '<form method="POST" action="">';
echo '<button type="submit" name="ligar">Ligar LED</button>';
echo '<button type="submit" name="desligar">Desligar LED</button>';
echo '<button type="submit" name="verificar">Verificar Status da Porta</button>';
echo '</form>';

// Tratar requisições
if (isset($_POST['ligar'])) {
    controlarLed(true);
    $status_led = obterStatusLed();
    $status_porta = obterStatusPorta();
} elseif (isset($_POST['desligar'])) {
    controlarLed(false);
    $status_led = obterStatusLed();
    $status_porta = obterStatusPorta();
} elseif (isset($_POST['verificar'])) {
    $status_porta = obterStatusPorta();
}

?>

</body>
</html>