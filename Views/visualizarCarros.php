<?php 

// requisições necessárias...
require_once("../Models/CarroDAO.php");
require_once("../Config/Conexao.php");

// pegando objeto do banco de dados via DAO.
$objCarroDAO = new CarroDAO(Conexao::getConexao());
$carro1 = $objCarroDAO->ListarCarros();

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
                    <th class="text-center" colspan="2">Ações</th>
                </tr>

                <?php
                    foreach($carro1 as $carro){ 
                ?>

                <tr>
                    <td><?php echo $carro['id_carro']  ?></td>
                    <td><?php echo $carro['marca'] ?></td>
                    <td><?php echo $carro['modelo'] ?></td>
                    <td><?php echo $carro['ano'] ?></td>
                    <td><?php echo $carro['placa'] ?></td>
                    <td><?php echo $carro['cambio'] ?></td>
                    <td><?php echo $carro['preco'] ?></td>
                    <td><?php echo $carro['observacoes'] ?></td>
                    <td>
                        <a href="formAtualizarCarro.php?id_carro=<?php echo $carro['id_carro'] ?>">
                            Atualizar
                        </a>
                    </td>
                    <td>
                        <a href="../Controllers/DeletarCarro.php?id_carro=<?php echo $carro['id_carro'] ?>" 
                            onclick="return confirm('Tem certeza que deseja deletar este carro?');">
                            Deletar
                        </a>
                    </td>
                </tr>

                <?php 
                    }
                ?>

            </thead>
            <tbody>
    

            </tbody>
        </table>
    </div>
</div>





<script src="../public/js/script-lista-carro.js" defer></script>
</body>
</html>
