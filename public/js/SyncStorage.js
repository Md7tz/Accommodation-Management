class Local {
    static setItem(key, value) { window.localStorage.setItem(key, value); }
    static getItem(key) { return window.localStorage.getItem(key); }
    static removeItem(key) { window.localStorage.removeItem(key); }

    static multiGet(keys) {
        let values = [];
        for (let key of keys) {
            values.push([key, Local.getItem(key)]);
        }
        return values;
    }

    static multiSet(items) {
        for (let pair of items) {
            Local.setItem(pair[0], pair[1]);
        }
    }

    static multiRemove(keys) {
        for (let key of keys) {
            Local.removeItem(key);
        }
    }

    static clear() { window.localStorage.clear(); }
}

class Session {
    static setItem(key, value) { window.sessionStorage.setItem(key, value); }
    static getItem(key) { return window.sessionStorage.getItem(key); }
    static removeItem(key) { window.sessionStorage.removeItem(key); }

    static multiGet(keys) {
        let values = [];
        for (let key of keys) {
            values.push([key, Session.getItem(key)]);
        }
        return values;
    }

    static multiSet(items) {
        for (let pair of items) {
            Session.setItem(pair[0], pair[1]);
        }
    }

    static multiRemove(keys) {
        for (let key of keys) {
            Session.removeItem(key);
        }
    }

    static clear() { window.sessionStorage.clear(); }
}

class MockStorage {
    static setItem(key, value) {}
    static getItem(key) { return null }
    static removeItem(key) {}
    static multiGet(keys) { return [] }
    static multiSet(items) {}
    static multiRemove(keys) {}
    static clear() {}
}

const LocalStorage = (() => (typeof window !== `undefined`) ? Local : MockStorage)();
const SessionStorage = (() => (typeof window !== `undefined`) ? Session : MockStorage)(); 

export default LocalStorage;
export { SessionStorage };