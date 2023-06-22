<?php
class User {
    private $mysqli;
    public $msgERRO = "";

    public function conn($DB, $host, $user, $password) {
        global $mysqli;
        global $msgERRO;

        $mysqli = new mysqli($host, $user, $password, $DB);

        if ($mysqli->connect_errno) {
            $msgERRO = "Falha na conexão: " . $mysqli->connect_error;
            return false;
        }

        return true;
    }

    public function cadastrar($primeiro_nome,$ultimo_nome, $telefone, $email, $senha) {
        global $mysqli;

        $stmt = $mysqli->prepare("SELECT cliente_id FROM clientes WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            return false;
        } else {
            $stmt = $mysqli->prepare("INSERT INTO clientes (primeiro_nome, ultimo_nome, telefone, email, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $primeiro_nome, $ultimo_nome, $telefone, $email, sha1($senha));
            $stmt->execute();
            return true;

        }
    }

    public function logar($email, $senha) {
        global $mysqli;

        $stmt = $mysqli->prepare("SELECT cliente_id  FROM clientes WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, sha1($senha));
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $dado = $stmt->fetch(); 
            $_SESSION['cliente_id'] = $dado['cliente_id'];
            return true; // Logado com sucesso
        } else {
            return false;
        }
    }
}

?>