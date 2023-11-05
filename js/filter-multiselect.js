document.getElementById('enviarFormulario').addEventListener('click', function () {
    // Obtén las casillas de verificación seleccionadas
    var checkboxes = document.querySelectorAll('input[name="seleccionados[]"]:checked');
    
    // Obtén los valores de las casillas seleccionadas
    var valoresSeleccionados = Array.from(checkboxes).map(function (checkbox) {
        return checkbox.value;
    });

    var form = document.createElement('form');
    form.action = '../php/catch-data.php';
    form.method = 'post';

    valoresSeleccionados.forEach(function (valor) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'seleccionados[]';
        input.value = valor;
        form.appendChild(input);
    });

    document.body.appendChild(form);
    form.submit();
});

document.addEventListener('DOMContentLoaded', function () {
    // Obtén el checkbox principal y todos los checkboxes secundarios
    const checkboxPrincipal = document.getElementById('seleccionar-todos');
    const checkboxesSecundarios = document.querySelectorAll('[name="seleccionados[]"]');

    // Agrega un evento al checkbox principal
    checkboxPrincipal.addEventListener('change', function () {
      // Itera sobre los checkboxes secundarios y establece su estado según el checkbox principal
      checkboxesSecundarios.forEach(function (checkbox) {
        checkbox.checked = checkboxPrincipal.checked;
      });
    });
  });