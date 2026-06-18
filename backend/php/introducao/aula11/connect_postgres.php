<?php

    // Endereço do servidor onde o banco de dados está rodando
    // Como o PostgreSQL está no próprio computador, usamos "localhost"
    $host = "localhost";

    // Nome do banco de dados que queremos acessar
    $dbname = "escola";

    // Usuário do PostgreSQL
    $user = "postgres";

    // Senha do usuário do PostgreSQL
    $pass = "postgres";

    // O try tenta executar o código de conexão
    // Se der certo, ele continua normalmente
    // Se der erro, ele pula para o catch
    try {

        // Criando a conexão com o banco usando PDO
        $conexao = new PDO(
            // Aqui informamos:
            // pgsql = tipo do banco, nesse caso PostgreSQL
            // host = servidor do banco
            // dbname = nome do banco de dados
            "pgsql:host=$host;dbname=$dbname",

            // Usuário do banco
            $user,

            // Senha do banco
            $pass
        );

        // Se a conexão der certo, essa mensagem aparece na tela
        echo "Conexão com o Postgres OK!<br>";

    } catch (PDOException $e) {

        // Se der erro na conexão, essa mensagem aparece
        // getMessage() mostra qual foi o erro
        echo "Erro: " . $e->getMessage();
    }

?>