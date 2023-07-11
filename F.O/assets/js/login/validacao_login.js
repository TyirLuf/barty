(function validacao_login(){
    // VALIDAÇÃO
    // Form
    const formLogin = document.querySelector("#form_login");
    // Campos
    const email = document.getElementById("login_email");
    const senha = document.getElementById("login_senha");

    /* DEFININDO CONSTANTES REGEX */
    const regexEmail = /^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/;

    const addMsgAlert = (titulo, mensagem_error) => {
        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title: `${titulo}`,
            text: `${mensagem_error}`,
        })

        return false;
    }

    // FAZ A VALIDAÇÃO DO LOGIN
    /* TESTA SE O EMAIL É VÁLIDO CHAMANDO O MÉTODO EXEC DA EXPRESSÃO REGULAR */
    const validacaoLogin = () => {
        const emailValido = regexEmail.exec(email.value);
        if (!emailValido) return addMsgAlert("E-mail inválido", "Verique o campo email e tente novamente");

        if(senha.value.length == 0 || senha.value.length < 8) return addMsgAlert("Palavra-Passe incorreta", "O sua senha está vazio ou não detém o mínimo de 8 caracteres");
    }

    // BARRA O ENVIO CASO AINDA TIVERMOS CAMPOS INVÁLIDOS
    formLogin.addEventListener("submit", event => {
        if(validacaoLogin() == false) event.preventDefault();
    })

    // Verifica se há um parâmetro "success" na URL
    const urlParams = new URLSearchParams(window.location.search);
    const successParam = urlParams.get('success');
    
    // Verifica se o login foi feito com sucesso
    if (successParam === '1') {
        // Exibe a mensagem de sucesso
        Swal.fire({
            icon: 'success',
            title: 'Login feito com sucesso',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            // Redireciona para a página inicial
            window.location.href = "/";
        });
    }


})();