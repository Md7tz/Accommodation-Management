export default class Toast {
    static #visible = false;

    static async #show (options) {
        if (options.text.length == 0) return
        Toast.#visible = true;
        Toastify({
            // destination: "",
            // newWindow: true,
            // close: true,
            // onClick: function(){}, // Callback after click
            gravity: "top", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            ...options,
            callback: ()=>{Toast.#visible = false; options.callback();}
          }).showToast();
    }
    static info(text, duration=1000, callback = ()=> {}) { !Toast.#visible && Toast.#show({text, duration, callback, style: {background: "linear-gradient(to bottom, #00a300, #00aced)"}}); }
    static warning(text, duration=1000, callback = ()=> {}) { !Toast.#visible && Toast.#show({text, duration, callback, style: {background: "linear-gradient(to bottom, rgba(226, 224, 80), #ffc40d)"}}) }
    static error(text, duration=1000, callback = ()=> {}) { !Toast.#visible && Toast.#show({text, duration, callback, style: {background: "linear-gradient(to bottom, #cb2027, #ffc40d)"}}) }
}