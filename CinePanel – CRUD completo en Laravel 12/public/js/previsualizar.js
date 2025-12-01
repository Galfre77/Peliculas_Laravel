function previsualizar(e){
    const imagen = e.target.files[0];
    const cajaImagen = document.getElementById('previsualizar');
    cajaImagen.src = URL.createObjectURL(imagen);
}
