// JavaScript kód a bejelentkezés kezeléséhez

// Felhasználói állapot változó
let isLoggedIn = false;

// Gombok referenciái
const loginBtn = document.getElementById('loginBtn');
const logoutBtn = document.getElementById('logoutBtn');

// Bejelentkezés függvény
function login() {
    isLoggedIn = true;
    updateButtonVisibility();
}

// Kijelentkezés függvény
function logout() {
    isLoggedIn = false;
    updateButtonVisibility();
}

// Gombok láthatóságának frissítése
function updateButtonVisibility() {
    if (isLoggedIn) {
        loginBtn.style.display = 'none';
        logoutBtn.style.display = 'block';
    } else {
        loginBtn.style.display = 'block';
        logoutBtn.style.display = 'none';
    }
}

// Kezdeti gombok láthatóság beállítása
updateButtonVisibility();
