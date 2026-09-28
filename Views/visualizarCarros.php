<?php 

// requisições necessárias...

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessionária - Estoque de Veículos</title>
    <link rel="stylesheet" href="../public/css/style-visualizarVeiculos.css" />
</head>
<body>

<div class="container">
    <div class="header-container">
        <div class="header-form">
            <h2>Estoque de Veículos</h2>
            <p>Consulte, edite ou remova os carros cadastrados no sistema.</p>
        </div>
    </div>

    <!-- Filtro e Link de cadastro rápido -->
    <div class="table-actions">
        <input type="text" id="searchBar" placeholder="🔍 Buscar modelo...">
        <a href="formCadastrarCarros.php" class="btn-add">+ Cadastrar Novo</a>
    </div>

    <div class="table-responsive">
        <table class="dados-tabela">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Placa</th>
                    <th>Câmbio</th>
                    <th>Preço</th>
                    <th>Observações</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
    

            </tbody>
        </table>
    </div>
</div>

<script src="../public/js/script-lista-carro.js" defer></script>
</body>
</html>
