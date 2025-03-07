function filtrarNoticias(categoria) {
    const noticias = document.querySelectorAll('.noticia-item');

    noticias.forEach(noticia => {
        if (categoria === 'todas' || noticia.classList.contains(categoria)) {
            noticia.style.display = 'block';
        } else {
            noticia.style.display = 'none';
        }
    });
}

function generarQR(){

}



