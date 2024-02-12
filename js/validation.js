
function validacionPass(){
    var passwd = document.getElementById('passwd');
    var rep_passwd = document.getElementById('rep_passwd');

    if(passwd.value != rep_passwd.value){
        alert("Las contraseñas no coinciden");
        return false;
    }
}

function validacionPeli(){
    var cat = document.getElementById('categoria');

    if(cat.value != 'estrenos' && cat.value != 'mas_valoradas' && cat.value != 'proximas' && cat.value != 'cartelera'){
        alert("La categoria no es valida. Las categorias disponibles son: estrenos, mas_valoradas, proximas, cartelera");
        return false;
    }

    var patron = /^\d{4}-\d{2}-\d{2}$/;
    var fecha = document.getElementById('estreno').value;

    if (!patron.test(fecha)) {
        alert("Error en la fecha, debe ser formato YYYY-MM-DD");
        return false;
    }
}