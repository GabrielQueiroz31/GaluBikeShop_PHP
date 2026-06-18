<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
</head>
<body>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Salário</th>
        </tr>

        <?php 
        $funcionarios = [
            ["nome" => "Ana", "cargo" => "Analista", "salario" => 3500],
            ["nome" => "Carlos", "cargo" => "Desenvolvedor", "salario" => 4000],
            ["nome" => "Mariana", "cargo" => "Gerente", "salario" => 5000]
        ];

        foreach ($funcionarios as $f) {
            echo "<tr><td>{$f['nome']}</td><td>{$f['cargo']}</td><td>{$f['salario']}</td></tr>";
        }
        ?>

    </table>

</body>
</html>