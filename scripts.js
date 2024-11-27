function mostrarLogin() {
    document.getElementById('login-popup').style.display = 'flex';
}

function fecharLogin() {
    document.getElementById('login-popup').style.display = 'none';
}

function verificarLogin(estaLogado) {
    if (!estaLogado) {
        mostrarLogin();
        return false;
    }
    return true;
}
