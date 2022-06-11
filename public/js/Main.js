import LocalStorage, { SessionStorage } from './SyncStorage.js';
import Navigate from './Navigate.js'
import Toast  from './Toast.js';
import Cookie from './Cookie.js';

let timeout = null;
let _search = "";

/* Cookies */
/* popup button handler */
Cookie.on('.cookie-popup button', 'click', () => {
    Cookie.el('.cookie-popup').classList.add('cookie-popup--accepted');
    document.cookie = `cookie-accepted=true`
});

/* popup init handler */
if (Cookie.cookie('cookie-accepted') !== "true") {
    Cookie.el('.cookie-popup').classList.add('cookie-popup--not-accepted');
}

// Dom elements
const empty = document.createElement("div");
const searchInput = document.getElementById("searchbar") || empty;
const home = document.getElementById('brand-link') || empty;
const loginBtn = document.getElementById('login-btn') || empty;
const registerBtn = document.getElementById('register-btn') || empty;
const formBtn = document.getElementById('form-btn') || empty;
const dashboardBtn = document.getElementById('dashboard-btn') || empty;

// Event Listeners
home.addEventListener('click', ()=>Navigate.push('views/'))
searchInput.addEventListener('keyup', searchHandler);
loginBtn.addEventListener('click', ()=>Navigate.push('views/auth/login.html'))
registerBtn.addEventListener('click', ()=>Navigate.push('views/index.html#register-form'))
formBtn.addEventListener('click', ()=>Navigate.push('views/form.html'))
dashboardBtn.addEventListener('click', ()=>Navigate.push('views/dashboard.html'))

/** @param {*} ms - milliseconds */
function wait(ms) { return new Promise(resolve => setTimeout(resolve, ms)) };

function setSearch(value) {
    _search = value;

    if (_search) {
        // Remove certain special characters !&():<
        _search = _search.replace(/[!&():<]/g, "");

        // Replaces multiple spaces/tabs/newlines in middle of search term with one space
        _search = _search.replace(/\s\s+/g, " ");
    }
    // Toast.info("No results found!");
}

function searchHandler(event) {
    clearTimeout(timeout);

    timeout = wait(200)
        .then(() => setSearch(searchInput.value))
        .then(Toast.info("No results found!", 2000));
}
