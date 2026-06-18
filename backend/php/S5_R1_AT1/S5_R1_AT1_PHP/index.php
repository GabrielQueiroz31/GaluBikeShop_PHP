<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S5_R1_AT1</title>
</head>
<body>
    <h1>Empresa Ficticia</h1>
    <?php 
        $funcionarios = 200;

        if ($funcionarios < 200){
            echo "Empresa de Médio Porte";
        } elseif ($funcionarios < 100 ){
            echo "Empresa de Pequeno porte";
        } else {
            echo "Empresa de Grande porte";
        }

        $tempo = 10;

        if ($tempo < 6){
            echo "<br><br>Empresa nova no mercado";
        } else {
            echo "<br><br>Empresa consolidada";
        }

        $setor = "TI";

        switch ($setor) {
            case "TI":
                echo "<br><br>Setor de Tec";
                break;
            case "RH":
                echo "<br><br>Recursos Humanos";
            case "Financeiro":
                echo "<br><br>Setor Financeiro";
            default:
            echo "<br><br>Setor não identificado";
        }
    ?>
</body>
</html>