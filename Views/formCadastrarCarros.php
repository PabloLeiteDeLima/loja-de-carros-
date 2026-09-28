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
            <h2>Cadastrar Novo Veículo</h2>
            <p>Preencha os dados abaixo para adicionar um veículo ao estoque.</p>
        </div>
        <a href="visualizarCarros.php" class="btn-visualizar">📋 Estoque</a>
    </div>

    <!-- ACTION FIXADO PARA INSERÇÃO -->
    <form id="formCarro" action="../controllers/RecFormInserirCarro.php" method="POST" novalidate>
        
        <div class="form-grid">
            
            <!-- Marca/Fabricante -->
            <div class="form-group">
                <label for="marca">Marca / Fabricante</label>
                <select id="marca" name="marca">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="chevrolet">Chevrolet</option>
                    <option value="fiat">Fiat</option>
                    <option value="ford">Ford</option>
                    <option value="honda">Honda</option>
                    <option value="hyundai">Hyundai</option>
                    <option value="toyota">Toyota</option>
                    <option value="volkswagen">Volkswagen</option>
                </select>
                <div class="error-message" id="error-marca">Selecione o fabricante.</div>
            </div>

            <!-- Modelo -->
            <div class="form-group">
                <label for="modelo">Modelo do Carro</label>
                <input type="text" id="modelo" name="modelo" placeholder="Ex: Onix 1.0 Turbo">
                <div class="error-message" id="error-modelo">O modelo é obrigatório.</div>
            </div>

            <!-- Ano de Fabricação -->
            <div class="form-group">
                <label for="ano">Ano Fabricação/Modelo</label>
                <input type="number" id="ano" name="ano" placeholder="Ex: 2023" min="1900" max="2030">
                <div class="error-message" id="error-ano">Insira um ano válido.</div>
            </div>

            <!-- Placa -->
            <div class="form-group">
                <label for="placa">Placa</label>
                <input type="text" id="placa" name="placa" placeholder="Ex: ABC1D23" maxlength="7" style="text-transform: uppercase;">
                <div class="error-message" id="error-placa">Placa inválida (7 caracteres).</div>
            </div>

            <!-- Preço -->
            <div class="form-group">
                <label for="preco">Preço de Venda (R$)</label>
                <input type="text" id="preco" name="preco" placeholder="0,00">
                <div class="error-message" id="error-preco">Insira um preço válido.</div>
            </div>

            <!-- Tipo de Câmbio -->
            <div class="form-group">
                <label for="cambio">Câmbio</label>
                <select id="cambio" name="cambio">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="manual">Manual</option>
                    <option value="automatico">Automático</option>
                    <option value="automatizado">Automatizado / Dualogic</option>
                </select>
                <div class="error-message" id="error-cambio">Selecione o tipo de câmbio.</div>
            </div>

            <!-- Observações -->
            <div class="form-group full-width">
                <label for="observacao">Observações / Opcionais</label>
                <input type="text" id="observacao" name="observacao" placeholder="Ex: Único dono, teto solar, todas as revisões na concessionária">
            </div>

        </div>

        <!-- Botão de Envio Fixo -->
        <button type="submit" class="btn-submit" style="background-color: #4f46e5;">
            Cadastrar Veículo
        </button>
    </form>
</div>

<script src="../public/js/script-carro.js" defer></script>
</body>
</html>
