<?php
$conf = parse_ini_file("config.ini");

$string_connection = $conf["driver"] .
        ":dbname=" . $conf["database"] .
          ";host=" . $conf["server"] .
          ";port=" . $conf["port"];

try {
    $conn = new PDO(
        $string_connection,
        $conf["user"],
        $conf["password"]
    );
    if ($conf["debug"] == "true") {
        echo "<h2>Sucesso!</h2>";
        echo "<p>Conectado ao banco <b>" . $conf["database"] . "</b></p>";
    }
} catch (Exception $e) {
    // A linha abaixo irá parar o script e exibir uma mensagem clara.
    die("Falha fatal: Não foi possível conectar ao banco de dados. Erro: " . $e->getMessage());
}
