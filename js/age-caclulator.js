function calcularEdad() {
    const fechaNacimiento = new Date(document.getElementById('grid-fecha-nacimiento').value);
    const fechaActual = new Date();
    const diferencia = fechaActual - fechaNacimiento;

    // Convertir la diferencia a años
    const edad = Math.floor(diferencia / (365.25 * 24 * 60 * 60 * 1000));
    document.getElementById('grid-edad').value = edad;
}