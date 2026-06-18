<?php
function classificarEmpresa($funcionarios) {
	if ($funcionarios < 50) {
    	return "Pequeno porte";
	} else {
    	return "Médio ou grande porte";
	}
}

echo classificarEmpresa(30) . "<br>";
echo classificarEmpresa(120). "<br>";
?>
