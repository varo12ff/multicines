function confirmarAccion() {
    if (confirm("¿Estás seguro de ejecutar esta acción?")) {
        // Realizar la acción
        alert("Acción ejecutada");
        print('si');
        return true;
    } else {
        // Cancelar la acción
        alert("Acción cancelada");
        print('no');
        return false;
    }
}