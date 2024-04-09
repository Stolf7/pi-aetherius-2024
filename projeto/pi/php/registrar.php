<?php
// Inclua o arquivo de conexão
include '../php/conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $email = $_POST['email'];
    $aniversario = $_POST['aniversario'];
    $senha = $_POST['senha'];
    
    // Verifica se todos os campos foram preenchidos
    if (!empty($email) && !empty($aniversario) && !empty($senha)) {
        // Hash da senha para armazenamento seguro
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        
        try {
            // Conecta ao banco de dados
            $conexao = conectarBanco();
            
            // Prepara a declaração SQL para inserção
            $stmt = $conexao->prepare("INSERT INTO usuario (email, aniversario, senha) VALUES (?, ?, ?)");
            $stmt->execute([$email, $aniversario, $senha_hash]);
            
            echo "Usuário registrado com sucesso!";
        } catch(PDOException $e) {
            // Em caso de erro, exibe o erro
            echo 'Erro ao registrar o usuário: ' . $e->getMessage();
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>
