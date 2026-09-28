document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("formCarro");
    const marca = document.getElementById("marca");
    const modelo = document.getElementById("modelo");
    const ano = document.getElementById("ano");
    const placa = document.getElementById("placa");
    const preco = document.getElementById("preco");
    const cambio = document.getElementById("cambio");

    // 1. MÁSCARA EM TEMPO REAL: Preço em Moeda Real (R$)
    preco.addEventListener("input", (e) => {
        let value = e.target.value.replace(/\D/g, ""); // Remove letras
        
        value = (value / 100).toFixed(2) + "";
        value = value.replace(".", ",");
        value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
        
        e.target.value = value === "0,00" ? "" : "R$ " + value;
    });

    // 2. TRATAMENTO DA PLACA: Força letras maiúsculas e remove caracteres especiais
    placa.addEventListener("input", (e) => {
        e.target.value = e.target.value.toUpperCase().replace(/[^A-Z0-9]/g, "");
    });

    // 3. Funções Auxiliares Visuais para Erros
    function showError(input, messageId) {
        if(input) input.classList.add("error-field");
        const msg = document.getElementById(messageId);
        if(msg) msg.style.display = "block";
    }

    function clearError(input, messageId) {
        if(input) input.classList.remove("error-field");
        const msg = document.getElementById(messageId);
        if(msg) msg.style.display = "none";
    }

    // 4. VALIDAÇÃO AO ENVIAR O FORMULÁRIO
    form.addEventListener("submit", (e) => {
        let isValid = true;

        if (!marca || marca.value === "") {
            showError(marca, "error-marca");
            isValid = false;
        } else {
            clearError(marca, "error-marca");
        }

        if (!modelo || modelo.value.trim().length < 2) {
            showError(modelo, "error-modelo");
            isValid = false;
        } else {
            clearError(modelo, "error-modelo");
        }

        const anoAtual = new Date().getFullYear();
        const anoInformado = parseInt(ano.value);
        if (isNaN(anoInformado) || anoInformado < 1900 || anoInformado > (anoAtual + 1)) {
            showError(ano, "error-ano");
            isValid = false;
        } else {
            clearError(ano, "error-ano");
        }

        if (!placa || placa.value.trim().length !== 7) {
            showError(placa, "error-placa");
            isValid = false;
        } else {
            clearError(placa, "error-placa");
        }

        if (!preco || preco.value.trim() === "" || preco.value === "R$ 0,00") {
            showError(preco, "error-preco");
            isValid = false;
        } else {
            clearError(preco, "error-preco");
        }

        if (!cambio || cambio.value === "") {
            showError(cambio, "error-cambio");
            isValid = false;
        } else {
            clearError(cambio, "error-cambio");
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
});