
    // Validação JS rápida direto na página de Login
    document.getElementById("formLogin").addEventListener("submit", function(e) {
        let isValid = true;
        const usuario = document.getElementById("usuario");
        const senha = document.getElementById("senha");

        // Valida Usuário
        if (usuario.value.trim() === "") {
            usuario.classList.add("error-field");
            document.getElementById("error-usuario").style.display = "block";
            isValid = false;
        } else {
            usuario.classList.remove("error-field");
            document.getElementById("error-usuario").style.display = "none";
        }

        // Valida Senha
        if (senha.value.trim().length < 4) {
            senha.classList.add("error-field");
            document.getElementById("error-senha").style.display = "block";
            isValid = false;
        } else {
            senha.classList.remove("error-field");
            document.getElementById("error-senha").style.display = "none";
        }

        // Se falhar, bloqueia o envio
        if (!isValid) {
            e.preventDefault();
        }
    });
