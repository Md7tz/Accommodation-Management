export default class Cookie {
    static el(selector) { return document.querySelector(selector) }
    static els(selector) { return document.querySelectorAll(selector) }
    static on(selector, event, action) { Cookie.els(selector).forEach(e => e.addEventListener(event, action)) }
    static cookie(name) {
        let c = document.cookie.split('; ').find(cookie => cookie && cookie.startsWith(name + '='))
        return c ? c.split('=')[1] : false;
    }

    static _reset() {
        document.cookie = 'cookie-accepted=false'; 
        document.location.reload();
    }
    
    static _switchMode(cssClass) {
        el('.cookie-popup').classList.toggle(cssClass);
    }
}