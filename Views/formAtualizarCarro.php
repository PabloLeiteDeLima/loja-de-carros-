<?php 

// requisições necessárias...
require_once("../Models/CarroDAO.php");
require_once("../Config/Conexao.php");

// Capitura e já valida se o id_carro é um número inteiro válido.
$id_carro = filter_input(INPUT_GET, 'id_carro', FILTER_VALIDATE_INT);
// echo 'id_carro: ' . $id_carro; //testando se o id_carro chegou aqui.OK.

// Tratamento de erro caso o ID seja inválido ou não enviado.
if($id_carro === false || $id_carro === null){
    die("ID do carro inválido ou não fornecido!");
}

// criando objCarroDAO para manipulação com o Banco de Dados.
$objCarroDAO = new CarroDAO(Conexao::getConexao());
$carro = $objCarroDAO->RetornaUmCarro($id_carro);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessionária - Cadastrar Veículo</title>
    <!-- arquivo .css -->
    <link rel="stylesheet" href="../public/css/style-formularioCadastrarVeiculos.css">
</head>
<body>

<div class="container">
    <!-- Cabeçalho fixo para Cadastro -->
    <div class="header-container">
        <div class="header-form">
            <h2>Atualizar Veículo</h2>
            <p>Preencha os dados abaixo para adicionar um veículo ao estoque.</p>
        </div>
        <a href="formCadastrarCarros.php" class="btn-visualizar">📋 Cadastrar</a>
        <a href="visualizarCarros.php" class="btn-visualizar">📋 Estoque</a>
    </div>

    <!-- ACTION FIXADO PARA INSERÇÃO -->
    <form id="formCarro" action="../controllers/RecFormAtualizar.php" method="POST" novalidate>
        
        <input type="hidden" name="id_carro" value="<?php echo $carro['id_carro'] ?>">

        <div class="form-grid">
            
            <!-- Marca/Fabricante -->
            <div class="form-group">
                <label for="marca">Marca / Fabricante</label>
                <select id="marca" name="marca">
        <option value="" disabled <?php echo empty($carro['marca']) ? 'selected' : ''; ?>>Selecione...</option>
                    <option value="chevrolet"  <?php echo (isset($carro['marca']) && $carro['marca'] === 'chevrolet') ? 'selected' : ''; ?>>Chevrolet</option>
                    <option value="fiat"       <?php echo (isset($carro['marca']) && $carro['marca'] === 'fiat') ? 'selected' : ''; ?>>Fiat</option>
                    <option value="ford"       <?php echo (isset($carro['marca']) && $carro['marca'] === 'ford') ? 'selected' : ''; ?>>Ford</option>
                    <option value="honda"      <?php echo (isset($carro['marca']) && $carro['marca'] === 'honda') ? 'selected' : ''; ?>>Honda</option>
                    <option value="hyundai"    <?php echo (isset($carro['marca']) && $carro['marca'] === 'hyundai') ? 'selected' : ''; ?>>Hyundai</option>
                    <option value="toyota"     <?php echo (isset($carro['marca']) && $carro['marca'] === 'toyota') ? 'selected' : ''; ?>>Toyota</option>
                    <option value="volkswagen" <?php echo (isset($carro['marca']) && $carro['marca'] === 'volkswagen') ? 'selected' : ''; ?>>Volkswagen</option>
                </select>
                <div class="error-message" id="error-marca">Selecione o fabricante.</div>
            </div>

            <!-- Modelo -->
            <div class="form-group">
                <label for="modelo">Modelo do Carro</label>
                <input type="text" id="modelo" name="modelo" value="<?php echo $carro['modelo']  ?>">
                <div class="error-message" id="error-modelo">O modelo é obrigatório.</div>
            </div>

            <!-- Ano de Fabricação -->
            <div class="form-group">
                <label for="ano">Ano Fabricação/Modelo</label>
                <input type="number" id="ano" name="ano" value="<?php echo $carro['ano'] ?>" min="1900" max="2030">
                <div class="error-message" id="error-ano">Insira um ano válido.</div>
            </div>

            <!-- Placa -->
            <div class="form-group">
                <label for="placa">Placa</label>
                <input type="text" id="placa" name="placa" value="<?php echo $carro['placa']  ?>" maxlength="7" style="text-transform: uppercase;">
                <div class="error-message" id="error-placa">Placa inválida (7 caracteres).</div>
            </div>

            <!-- Preço -->
            <div class="form-group">
                <label for="preco">Preço de Venda (R$)</label>
                <input type="text" id="preco" name="preco" value="<?php echo $carro['preco'] ?>">
                <div class="error-message" id="error-preco">Insira um preço válido.</div>
            </div>

            <!-- Tipo de Câmbio -->
            <div class="form-group">
                <label for="cambio">Câmbio</label>
                <select id="cambio" name="cambio">
                    
                    <option value="manual"      <?php echo (($carro['cambio'] ?? '') === 'manual') ? 'selected' : ''; ?>>Manual</option>
                    <option value="automatico"  <?php echo (($carro['cambio'] ?? '') === 'automatico') ? 'selected' : ''; ?>>Automático</option>
                    <option value="automatizado"<?php echo (($carro['cambio'] ?? '') === 'automatizado') ? 'selected' : ''; ?>>Automatizado / Dualogic</option>
                </select>
                <div class="error-message" id="error-cambio">Selecione o tipo de câmbio.</div>
            </div>

            <!-- Observações -->
            <div class="form-group full-width">
                <label for="observacao">Observações / Opcionais</label>
                <input type="text" id="observacao" name="observacao" value="<?php echo $carro['observacoes'] ?>">
            </div>

        </div>

        <!-- Botão de Envio Fixo -->
        <button type="submit" class="btn-submit" style="background-color: #4f46e5;">
            Atualizar Veículo
        </button>
    </form>
</div>

<script src="../public/js/script-carro.js" defer></script>
</body>
</html>
