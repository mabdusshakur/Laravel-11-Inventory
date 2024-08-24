function setLoggedIn() {
    Cookies.set('loggedIn', 'true');
}

function setLoggedOut() {
    Cookies.set('loggedIn', 'false');
}

function isLoggedIn() {
    return Cookies.get('loggedIn') === 'true';
}

function auth() {
    if (!isLoggedIn()) {
        window.location.href = "/login-page";
    }
}
