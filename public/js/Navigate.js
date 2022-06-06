export default class Navigate {
    static basepath(url) { return `${window.location.origin}/${url}`}

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

