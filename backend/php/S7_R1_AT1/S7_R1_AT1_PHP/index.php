<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S7_R1_AT1</title>
    <style>
        /* CSS basico */
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr{
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <table border="1">
        <tr>
            <th>Produtos</th>
            <th>Preço</th>
            <th>Estoque</th>
        </tr>

        <?php 
        //Criação do array
        $produtos = [
            ["produto" => "Caneta", "preco" => "2,00", "estoque" => 200],
            ["produto" => "Caderno", "preco" => "15,00", "estoque" => 50],
            ["produto" => "Lápis", "preco" => "1,00", "estoque" => 300],
            ["produto" => "Borracha", "preco" => "2,00", "estoque" => 500]
        ];

        foreach ($produtos as $p) {
            echo "<tr>";
            echo "<td>" . $p["produto"] . "</td>";
            echo "<td>" . $p["preco"] . "</td>";
            echo "<td>" . $p["estoque"] . "</td>";
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>