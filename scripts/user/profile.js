document.addEventListener('DOMContentLoaded', function() {
    const userData = JSON.parse(localStorage.getItem('userData'));

    if (userData) {
        document.getElementById('S1').textContent = `Nombre: ${userData.nombre}`;
        document.getElementById('S2').textContent = `Fecha de nacimiento: ${userData.fecha_nacimiento}`;
        document.getElementById('S3').textContent = `Nacionalidad: ${userData.nacionalidad}`;
        document.getElementById('S4').textContent = `Género: ${userData.genero}`;
        document.getElementById('S5').textContent = `Fecha de registro: ${userData.fecha_registro}`;
        document.getElementById('S6').textContent = `Correo: ${userData.correo}`;
        document.getElementById('S7').textContent = `Teléfono: ${userData.celular}`;
    }

    const fecha_nacimiento = document.getElementById('fecha_nacimiento');
    const nacionalidad = document.getElementById('nacionalidad');
    const genero = document.getElementById('genero');
    const holders = [
        'Nombre: ', 'Fecha de nacimiento: ', 'Nacionalidad: ', 'Género: ', 'Fecha de registro: ', 'Correo: ', 'Teléfono: '
    ];

    fecha_nacimiento.hidden = true;
    nacionalidad.hidden = true;
    genero.hidden = true;

    fecha_nacimiento.addEventListener("change", function() {
        document.getElementById('S2').textContent = holders[1] + fecha_nacimiento.value;
        fecha_nacimiento.hidden = true;
        userData.fecha_nacimiento = fecha_nacimiento.value;
        actualizarDatos(userData);
    });

    nacionalidad.addEventListener("change", function() {
        document.getElementById('S3').textContent = holders[2] + nacionalidad.value;
        nacionalidad.hidden = true;
        userData.nacionalidad = nacionalidad.value;
        actualizarDatos(userData);
    });

    genero.addEventListener("change", function() {
        document.getElementById('S4').textContent = holders[3] + genero.value;
        genero.hidden = true;
        userData.genero = genero.value;
        actualizarDatos(userData);
    });

    document.querySelectorAll('#cambiar').forEach(function(element, index) {
        element.addEventListener("click", function() {
            switch (index) {
                case 1:
                    document.getElementById('fecha_nacimiento').hidden = false;
                    break;
                case 2:
                    document.getElementById('nacionalidad').hidden = false;
                    break;
                case 3:
                    document.getElementById('genero').hidden = false;
                    break;
                default:
                    nuevo = prompt(holders[index]);
                    if (nuevo) {
                        document.getElementById('S' + (index + 1)).textContent = holders[index] + nuevo;
                        switch (index){
                         case 0: userData.nombre = nuevo; actualizarDatos(userData); break;
                         case 5: userData.correo = nuevo; actualizarDatos(userData); break;
                         case 6: userData.celular = nuevo; actualizarDatos(userData); break;
                        }
                    }
                    break;
            }
        });
    });

    function actualizarDatos(data) {
        // Actualiza los datos en localStorage
        localStorage.setItem('userData', JSON.stringify(data));

        // Envía los datos actualizados al servidor
        fetch('PHP/actualizarPerfil.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                console.log('Datos actualizados correctamente');
            } else {
                console.error('Error al actualizar los datos: ' + result.message);
            }
        })
        .catch(error => {
            console.error('Error en la petición: ', error);
        });
    }
});


if (document.getElementById('exch')){
    document.getElementById('exch').addEventListener('click', function() {
      document.getElementById('file-input').click();
    });
    }
    
    if(document.getElementById('file-input')){
    document.getElementById('file-input').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
              document.getElementById('pfp').style.backgroundImage = "url("+e.target.result+")";
          }
          reader.readAsDataURL(file);
      }
    });
    }

    document.getElementById('cerrarSesion').addEventListener("click", function(){
 // Eliminar datos del usuario de localStorage y sessionStorage
 localStorage.removeItem('userData');
 localStorage.removeItem('userVentas');
 
 // Hacer una llamada al servidor para cerrar la sesión
 fetch('PHP/cerrarSesion.php')
   .then(response => {
     if (response.ok) {
       // Redirigir al usuario a la página de inicio de sesión
       window.location.href = 'ecoSesion.html';
     } else {
       console.error('Error al cerrar sesión.');
     }
   })
   .catch(error => {
     console.error('Error en la petición: ', error);
   });
});
