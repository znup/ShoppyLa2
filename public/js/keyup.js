document.querySelector('#showView').addEventListener('click', getData);
let showView = document.querySelector('#showView');

function getData(){
    fetch('categories')
        .then(res => res.json() )
        .then(data => {
            console.log("estas en la funcion");
        })
}