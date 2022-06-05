export default class Navigate {
    static basepath(url) { return `${window.location.origin}/${Navigate.subdir}/${url}`}
    static get subdir () { return window.location.pathname.split('/', 2)[1]; }

    static push(url){
        window.location.assign(Navigate.basepath(url))
    }

    static replace(url){
        window.location.replace(Navigate.basepath(url))
    }

    static back(){
        window.history.back();
    }
}

