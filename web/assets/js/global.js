$(document).ready(function () {



  // Añadir un evento para cerrar el popover cuando se haga clic fuera del área del popover
  $(document).on('click', function (e) {
    $('[data-bs-toggle="popover"]').each(function () {
      var popoverElement = $(this); // Elemento del popover

      // Verifica si el clic es fuera del popover
      if (!popoverElement.is(e.target) && popoverElement.has(e.target).length === 0) {
        var popoverInstance = bootstrap.Popover.getInstance(popoverElement[0]); // Obtiene la instancia del popover
        if (popoverInstance && popoverInstance._isShown) {
          popoverInstance.hide(); // Cierra el popover si está abierto
        }
      }
    });
  });

  const camposUsu = {
    'usuario_nombre_1': 'Primer nombre',
    'usuario_apellido_1': 'Primer apellido',
    'usuario_correo': 'Correo electrónico',
    'usuario_nombre_2': 'Segundo nombre',
    'usuario_apellido_2': 'Segundo apellido',
    'usuario_fecha_nacimiento': 'Fecha de nacimiento',
    'usuario_telefono': 'Teléfono',
    'tipo_documento_id': 'Tipo de documento',
    'usuario_num_identificacion': 'Número de documento',
    'tipo_via': 'Tipo de vía',
    'num_via': 'Número de vía',
    'orientacion': 'Orientación',
    'numero2': 'Número complemento 2',
    'numero3': 'Número complemento 3',
    'barrio': 'Barrio',
    'usuario_contrasenia': 'Contraseña',
    'usuario_nueva_contrasenia': 'Nueva contraseña',
    'usuario_confirmar_contrasenia': 'Confirmar contraseña',
    'rol': 'Rol'
  };
  const camposSenialM = {
    'categoria_senial_id': 'Categoria',
    'danio_id': 'Daño',
    'tipo_senial_id': 'Tipo de señal',
    'senial_id': 'Señal'
  };
  const camposSenialN = {
    'categoria_senial_id': 'Categoria',
    'tipo_senial_id': 'Tipo de señal',
    'senial_id': 'Señal'
  };
  const camposReductorM = {
    'categoria_reductor_id': 'Categoria',
    'danio_id': 'Daño',
    'reductor_id': 'Reductor'
  };
  const camposReductorN = {
    'categoria_reductor_id': 'Categoria',
    'reductor_id': 'Reductor'
  };

  const camposAccidente = {
    'tipo_choque': 'Tipo de choque'
    // 'detalle_choque': 'Detalle choque'
  }
  const camposVia = {
    'danio_id': 'Daño'
  }
  const campoCorreo = {
    'correo_usuario': 'Correo'
  }
  const camposPQRS = {
    'tipo_pqrs_id': 'tipo pqrs',
    'descripcion_pqrs': 'Descripcion'
  }

  // const camposlogin = {
  //     'user': 'email',
  //     'pass': 'contraseña'
  //   }

  function validarCampoLetras(input) {
    const patron = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u;
    return patron.test(input);
  }

  function validarNumeros(input) {
    const patron = /^[0-9]+$/;
    return patron.test(input);
  }

  function validarCorreo(input) {
    const patron = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return patron.test(input);
  }

  function validarCorreoExistente(input) {
    console.log("Entró a validar correo existente");
  
    const correo = input; // Valor del correo
    const url = $('#usuario_correo').attr('data-url'); // URL desde el atributo data-url
    let valido = true;
  
    $.ajax({
      url: url,
      type: 'POST',
      data: { correo: correo },
      async: false, 
      success: function (response) {
        console.log("Respuesta del servidor:", response);
        if (response.includes("correo existe")) {
          valido = false;
        }
      },
      error: function () {
        console.error("Error en la solicitud AJAX.");
        valido = false; 
      }
    });
  
    return valido;
  }
  

  function validarContrasenias(input, contrasenia_id) {
    const errores = [];
    const longitudMinima = 8;
    const tieneMinuscula = /[a-zñ]/.test(input);
    const tieneMayuscula = /[A-ZÑ]/.test(input);
    const tieneNumero = /[0-9]/.test(input);
    const tieneEspecial = /[!@#$%^&*()_+.\-]/.test(input);
    let valido = true;

    if (input.length < longitudMinima) {
      errores.push("al menos 8 caracteres");
      valido = false;

    }
    if (!tieneMinuscula) {
      errores.push("una letra minúscula");
      valido = false;

    }
    if (!tieneMayuscula) {
      errores.push("una letra mayúscula");
      valido = false;

    }
    if (!tieneNumero) {
      errores.push("un número");
      valido = false;

    }
    if (!tieneEspecial) {
      errores.push("un carácter especial");
      valido = false;

    }

    if (errores.length > 0) {
      document.getElementById(contrasenia_id).textContent = `*La contraseña debe contener al menos: ${errores.join(', ')}.*`;
      valido = false;

    }
    return valido;
  }
  function loadColor() {
    // Verifica el modo guardado en localStorage
    const mode = localStorage.getItem('modo');

    if (mode === 'oscuro') {
      const sidebar_color = document.querySelector('.sidebar');
      const header_logo_color = document.querySelector('.logo-header');
      const main_header_color = document.querySelector('.main-header');
      const footer_color = document.querySelector('.footer');
      const card_color = document.querySelector('.card');
      const userName = document.querySelector('.profile-username');
      const sidebarText = document.querySelector('.sub-item');
      const userBox = document.querySelector('.dropdown-user-scroll scrollbar-outer');

      document.body.classList.add('dark');
      sidebar_color.classList.add('dark');
      header_logo_color.classList.add('dark');
      main_header_color.classList.add('dark');
      footer_color.classList.add('dark');
      card_color.classList.add('dark');
      userName.classList.add('dark');
      userBox.classList.add('dark');
      sidebarText.classList.add('dark');
      document.getElementById('toggleButton').textContent = 'Cambiar a Modo Claro';
      document.querySelector("#dl-icon").setAttribute("class", "bi bi-sun-fill");
    } else {
      document.body.classList.remove('dark');
      document.getElementById('toggleButton').textContent = 'Cambiar a Modo Oscuro';
    }
  }

  $(document).ready(function () {
    $('#toggleButton').on('click', function () {
      // Alterna el modo oscuro
      const sidebar_color = document.querySelector('.sidebar');
      const header_logo_color = document.querySelector('.logo-header');
      const main_header_color = document.querySelector('.main-header');
      const footer_color = document.querySelector('.footer');
      const card_color = document.querySelector('.card');
      const userName = document.querySelector('.profile-username');
      const userBox = document.querySelector('.dropdown-user-scroll scrollbar-outer');
      document.body.classList.toggle('dark');
      sidebar_color.classList.toggle('dark');
      header_logo_color.classList.toggle('dark');
      main_header_color.classList.toggle('dark');
      footer_color.classList.toggle('dark');
      card_color.classList.toggle('dark');
      userName.classList.toggle('dark');
      userBox.classList.toggle('dark');

      // Actualiza el texto del botón
      if (document.body.classList.contains('dark') && header_logo_color.classList.contains('dark') && sidebar_color.classList.contains('dark') && main_header_color.classList.contains('dark')) {
        localStorage.setItem('modo', 'oscuro');
        this.textContent = 'Cambiar a Modo Claro';

      } else {
        localStorage.setItem('modo', 'claro');
        this.textContent = 'Cambiar a Modo Oscuro';
      }
    });
  });


  //   $('#formLogin').submit(function(e) {
  //     e.preventDefault(); 

  //     var correo = $('#user').val();
  //     var contrasenia = $('#pass').val();
  // console.log(correo);
  // console.log(contrasenia);

  //     // Limpiar los mensajes de error antes de la validación
  //     $('#errorCorreo').hide();
  //     $('#errorContrasenia').hide();
  //     var valid = true;

  //     // Validar el correo
  //     if (correo === '') {
  //         $('#errorCorreo').text('El correo es obligatorio').show();
  //         valid = false;
  //     } else if (!validarCorreo(correo)) {
  //         $('#errorCorreo').text('El correo no es válido').show();
  //         valid = false;
  //     }

  //     // Validar la contraseña
  //     if (contrasenia === '') {
  //         $('#errorContrasenia').text('La contraseña es obligatoria').show();
  //         valid = false;
  //     }

  //     if (valid) {
  //         // Si la validación es exitosa, puedes hacer el submit o realizar otras acciones
  //         // Por ejemplo:
  //         // this.submit();
  //         console.log('Formulario enviado');
  //     }
  // });







  $(document).on('input', '#formUsu input, #formUsu select', function () {
    const campoUsu = $(this).attr('name');

    const campoNombre = camposUsu[campoUsu];
    const error = `error_${campoUsu}`;
    const value = $(this).val().trim();
    let esValido = true;


    if (document.getElementById('usuario_nueva_contrasenia')) {
      var error_1 = "error_usuario_nueva_contrasenia";

      var contrasenia_1 = document.getElementById('usuario_nueva_contrasenia').value;
      document.getElementById(error_1).textContent = '';
      var contrasenia_2 = document.getElementById('usuario_confirmar_contrasenia').value;

      var error_2 = "error_usuario_confirmar_contrasenia";

      document.getElementById(error_2).textContent = '';


    } else if (document.getElementById('usuario_contrasenia')) {
      var error_1 = "error_usuario_contrasenia";

      var contrasenia_1 = document.getElementById('usuario_contrasenia').value;
      var contrasenia_2 = document.getElementById('usuario_confirmar_contrasenia').value;

      var error_2 = "error_usuario_confirmar_contrasenia";

      document.getElementById(error_2).textContent = '';
      if (contrasenia_2.trim() === '') {
        esValido = false;
      }


    }

    if (camposUsu[campoUsu]) {
      if (!value.trim() && campoNombre !== 'Segundo nombre') {

        document.getElementById(error).textContent = `*El campo ${campoNombre} es obligatorio.*`;
        esValido = false;
      } else {
        document.getElementById(error).textContent = "";


      }
    }



    if (value.trim() !== '') {
      switch (campoUsu) {

        case 'usuario_nombre_1':
        case 'usuario_nombre_2':
        case 'usuario_apellido_1':
        case 'usuario_apellido_2':
          if (value.length > 30) {
            document.getElementById(error).textContent = `*El campo ${campoNombre} no puede tener más de 50 caracteres.*`;
            esValido = false;
          } else if (!validarCampoLetras(value)) {
            document.getElementById(error).textContent = `*El campo ${campoNombre} solo debe contener letras.*`;
            esValido = false;
          }
          break;

        case 'usuario_correo':
          if (!validarCorreo(value)) {
            document.getElementById(error).textContent = `*Por favor, ingrese un correo electrónico válido (ejemplo: usuario@dominio.com).*`;
            esValido = false;
          } else if (value.length > 50) {
            document.getElementById(error).textContent = `*Correo muy largo*`;
            esValido = false;
          } else if (!validarCorreoExistente(value)) {
            document.getElementById(error).textContent = `*Correo ya registrado*`;
            esValido = false;

          }
          break;
        case 'usuario_telefono':
        case 'num_via':
        case 'numero2':
        case 'numero3':
        case 'usuario_num_identificacion':
          if (!validarNumeros(value)) {
            document.getElementById(error).textContent = `*El campo ${campoNombre} debe contener solo números.*`;
            esValido = false;
          } else if (campoUsu == 'usuario_telefono') {

            if (value.length < 10) { // Validar longitud específica (10 dígitos para teléfono)
              document.getElementById(error).textContent = `*El Teléfono tiene menos de 10 dígitos.*`;
              esValido = false;
            } else if (value.length > 10) {
              document.getElementById(error).textContent = `*El Teléfono tiene más de 10 dígitos.*`;
              esValido = false;

            }
          } else if (campoUsu == 'usuario_num_identificacion') { // Validar longitud específica (10 dígitos para teléfono)
            if (value.length < 6) {
              document.getElementById(error).textContent = `*El Número de identificación debe tener mínimo 5 dígitos*`;
              esValido = false;
            } else if (value.length > 10) {
              document.getElementById(error).textContent = `*El Número de identificacion debe tener máximo 10 digitos*`;
              esValido = false;

            }
          } else if (campoUsu == 'num_via' || campoUsu == 'numero2' || campoUsu == 'numero3') { // Validar longitud específica (10 dígitos para teléfono)
            if (value.length > 3) {
              document.getElementById(error).textContent = `*El Número debe tener máximo 3 dígitos*`;
              esValido = false;
            }
          }
          break;
        case 'usuario_contrasenia':
        case 'usuario_nueva_contrasenia':

          if (!validarContrasenias(value, error)) {
            esValido = false;
          }

          break;

        case 'usuario_confirmar_contrasenia':


          if (contrasenia_1.trim() === '') {
            document.getElementById(error_1).textContent = `*El campo es obligatorio*`;
            esValido = false;
          }
          // Validar la segunda contraseña

          // Validar que ambas contraseñas coincidan
          else if (contrasenia_1 !== contrasenia_2) {
            document.getElementById(error_2).textContent = `*Las contraseñas deben ser iguales*`;
            esValido = false;
          }
          break;

        case 'tipo_documento_id':
          if (value === '') {
            document.getElementById(error).textContent = `*Debe seleccionar un tipo de documento.*`;
            esValido = false;
          }
          break;



        case 'usuario_fecha_nacimiento':
          // Validar si la fecha de nacimiento no es futura y mayor de edad
          const fechaNacimiento = new Date(value);
          const hoy = new Date();
          const edadMinima = 18;
          const fechaLimite = new Date(hoy.setFullYear(hoy.getFullYear() - edadMinima));

          if (fechaNacimiento > new Date()) {
            document.getElementById(error).textContent = `*La fecha de nacimiento no puede estar en el futuro*`;
            esValido = false;
          } else if (fechaNacimiento > fechaLimite) {
            document.getElementById(error).textContent = `*Debe ser mayor de 18 años*`;
            esValido = false;
          }
          break;

      }
    }


  });



  // new perfil
  $('#formUsu').submit(function (event) {
    event.preventDefault();


    var formData = $('#formUsu').serializeArray();
    let esValido = true;



    if (document.getElementById('usuario_nueva_contrasenia')) {
      var error_1 = "error_usuario_nueva_contrasenia";

      var contrasenia_1 = document.getElementById('usuario_nueva_contrasenia').value;
      document.getElementById(error_1).textContent = '';
      var contrasenia_2 = document.getElementById('usuario_confirmar_contrasenia').value;

      var error_2 = "error_usuario_confirmar_contrasenia";

      document.getElementById(error_2).textContent = '';


    } else if (document.getElementById('usuario_contrasenia')) {
      var error_1 = "error_usuario_contrasenia";

      var contrasenia_1 = document.getElementById('usuario_contrasenia').value;
      var contrasenia_2 = document.getElementById('usuario_confirmar_contrasenia').value;

      var error_2 = "error_usuario_confirmar_contrasenia";

      document.getElementById(error_2).textContent = '';
      if (contrasenia_2.trim() === '') {
        esValido = false;
      }


    }


    // Limpiar los mensajes de error antes de comenzar la validación
    Object.keys(camposUsu).forEach(campoUsu => {
      const error = `error_${campoUsu}`;

      const errorElement = document.getElementById(error); // Obtén el elemento
      if (errorElement) { // Verifica si el elemento existe
        errorElement.textContent = ""; // Limpia los errores
      }
    });

    // Validación de los campos
    formData.forEach(function (campoData) {
      const { name, value } = campoData;
      const error = `error_${name}`;
      const valor = camposUsu[name];

      const campoElement = document.getElementsByName(name)[0];
      const errorElement = document.getElementById(error);

      if (!campoElement || !errorElement) {
        return;
      }

      // Validar campos vacíos
      if (valor && valor !== 'Segundo nombre' && value.trim() === '' && valor !== 'Nueva contraseña' && valor !== 'Confirmar contraseña' && valor !== 'Segundo apellido') {

        document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
        esValido = false;

      }


      if (value.trim() !== '') {
        switch (name) {
          case 'usuario_nombre_1':
          case 'usuario_nombre_2':
          case 'usuario_apellido_1':
          case 'usuario_apellido_2':
            if (value.length > 30) {
              document.getElementById(error).textContent = `*El campo ${valor} no puede tener más de 50 caracteres.*`;
              esValido = false;
            } else if (!validarCampoLetras(value)) {
              document.getElementById(error).textContent = `*El campo ${valor} solo debe contener letras.*`;
              esValido = false;
            }
            break;

          case 'usuario_correo':
            if (!validarCorreo(value)) {
              document.getElementById(error).textContent = `*Por favor, ingrese un correo electrónico válido (ejemplo: usuario@dominio.com).*`;
              esValido = false;
            } else if (value.length > 50) {
              document.getElementById(error).textContent = `*Correo muy largo*`;
              esValido = false;
            } else if (!validarCorreoExistente(value)) {
              document.getElementById(error).textContent = `*Correo ya registrado*`;
              esValido = false;
  
            }
            break;
          case 'usuario_telefono':
          case 'num_via':
          case 'numero2':
          case 'numero3':
          case 'usuario_num_identificacion':
            if (!validarNumeros(value)) {
              document.getElementById(error).textContent = `*El campo ${valor} debe contener solo números.*`;
              esValido = false;
            } else if (name == 'usuario_telefono') {

              if (value.length < 10) { // Validar longitud específica (10 dígitos para teléfono)
                document.getElementById(error).textContent = `*El Teléfono tiene menos de 10 dígitos.*`;
                esValido = false;
              } else if (value.length > 10) {
                document.getElementById(error).textContent = `*El Teléfono tiene más de 10 dígitos.*`;
                esValido = false;

              }
            } else if (name == 'usuario_num_identificacion') { // Validar longitud específica (10 dígitos para teléfono)
              if (value.length < 6) {
                document.getElementById(error).textContent = `*El Número de identificación debe tener mínimo 5 dígitos*`;
                esValido = false;
              } else if (value.length > 10) {
                document.getElementById(error).textContent = `*El Número de identificacion debe tener máximo 10 digitos*`;
                esValido = false;

              }
            } else if (name == 'num_via' || name == 'numero2' || name == 'numero3') { // Validar longitud específica (10 dígitos para teléfono)
              if (value.length > 3) {
                document.getElementById(error).textContent = `*El Número debe tener máximo 3 dígitos*`;
                esValido = false;
              }
            }
            break;
          case 'usuario_contrasenia':
          case 'usuario_nueva_contrasenia':

            if (!validarContrasenias(value, error)) {
              esValido = false;
            }

            break;

          case 'usuario_confirmar_contrasenia':


            if (contrasenia_1.trim() === '') {
              document.getElementById(error_1).textContent = `*El campo es obligatorio*`;
              esValido = false;
            }





            // Validar la segunda contraseña
            else if (!validarContrasenias(contrasenia_2, error_2)) {
              esValido = false;
            }
            // Validar que ambas contraseñas coincidan
            else if (contrasenia_1 !== contrasenia_2) {
              document.getElementById(error_2).textContent = `*Las contraseñas deben ser iguales*`;
              esValido = false;
            }
            break;
          case 'tipo_documento_id':
            if (value === '') {
              document.getElementById(error).textContent = `*Debe seleccionar un tipo de documento.*`;
              esValido = false;
            }
            break;



          case 'usuario_fecha_nacimiento':
            // Validar si la fecha de nacimiento no es futura y mayor de edad
            const fechaNacimiento = new Date(value);
            const hoy = new Date();
            const edadMinima = 18;
            const fechaLimite = new Date(hoy.setFullYear(hoy.getFullYear() - edadMinima));

            if (fechaNacimiento > new Date()) {
              document.getElementById(error).textContent = `*La fecha de nacimiento no puede estar en el futuro*`;
              esValido = false;
            } else if (fechaNacimiento > fechaLimite) {
              document.getElementById(error).textContent = `*Debe ser mayor de 18 años*`;
              esValido = false;
            }
            break;

        }

      }
    });


    if (esValido) {
      this.submit();

    }
  });
  $('#formLogin').submit(function (event) {
    event.preventDefault();
    let esValido = true;
    var contrasena = document.getElementById('pass').value;
    var errorContrasena = document.getElementById('error_usuario_contrasena');
    var correo = document.getElementById('user').value;
    var errorCorreo = document.getElementById('error_usuario_email');
    errorConta = 'error_usuario_contrasena';

    document.getElementById('error_usuario_email').textContent = " ";
    document.getElementById('error_usuario_contrasena').textContent = " ";
    // Validar campos vacíos correo
    if (correo.trim() === '') {
      document.getElementById('error_usuario_email').textContent = `*El campo correo es obligatorio*`;
      esValido = false;

    } else if (!validarCorreo(correo)) {
      document.getElementById('error_usuario_email').textContent = `*Por favor, ingrese un correo electrónico válido (ejemplo: usuario@dominio.com).*`;
      esValido = false;
    } else if (correo.length > 50) {
      document.getElementById('error_usuario_email').textContent = `*Correo muy largo*`;
      esValido = false;
    }




    // Validar campos vacíos contrasenia
    if (contrasena.trim() === '') {
      document.getElementById('error_usuario_contrasena').textContent = `*El campo contraseña es obligatorio*`;
      esValido = false;

    } else if (!validarContrasenias(contrasena, errorConta)) {
      esValido = false;
    }

    if (esValido) {
      this.submit();

    }
  });




  $(document).on('input', '#formMalaSenial input, #formMalaSenial select', function (event) {
    event.preventDefault();
    var formData = $('#formMalaSenial').serializeArray();

    const fileInput = document.querySelector('input[name="solicitud_senial_imagen"]');
    const file = fileInput.files[0]; // Accede al archivo seleccionado
    let esValido = true;

    if (!file) {
      console.log('El archivo no fue seleccionado');


    } else if (!['image/png', 'image/jpeg', 'image/jpg'].includes(file.type)) {
      document.getElementById("error_solicitud_senial_imagen").textContent = `*El formato de la imagen no es valido*`;
      esValido = false;

    } else if (file.size > 2 * 1024 * 1024) { // 2 MB
      document.getElementById("error_solicitud_senial_imagen").textContent = `*El archivo es demasiado grande*`;
      esValido = false;

    } else {
      console.log('archivo ingresado')
    }

    // Limpiar los mensajes de error antes de comenzar la validación
    Object.keys(camposSenialM).forEach(campoSenialM => {
      const error = `error_${campoSenialM}`;
      document.getElementById(error).textContent = ""; // Limpia los errores
    });

    // Validación de los campos
    formData.forEach(function (campoData) {
      const { name, value } = campoData;
      const error = `error_${name}`;
      const valor = camposSenialM[name];

      // Validar campos vacíos
      if (value.trim() === '') {
        if (camposSenialM[name]) {

          document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
          esValido = false;
        }
      }
    });

    const submitButton = document.getElementById('btnSenialM');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }
  });


  $(document).on('input', '#formNuevaSenial input, #formNuevaSenial select', function (event) {
    event.preventDefault();
    //console.log("funca esto yes");
    var formData = $('#formNuevaSenial').serializeArray();
    let esValido = true;

    // Limpiar los mensajes de error antes de comenzar la validación
    Object.keys(camposSenialN).forEach(campoSenialN => {
      const error = `error_${campoSenialN}`;
      document.getElementById(error).textContent = ""; // Limpia los errores
    });

    // Validación de los campos
    formData.forEach(function (campoData) {
      const { name, value } = campoData;
      const error = `error_${name}`;
      const valor = camposSenialN[name];

      // Validar campos vacíos
      if (value.trim() === '') {
        if (camposSenialN[name]) {

          document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
          esValido = false;
        }
      }
    });

    const submitButton = document.getElementById('btnSenialN');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }
  });

  //nuevo reductor
  $(document).on('input', '#formReductorN input, #formReductorN select', function (event) {
    event.preventDefault();
    //console.log("funca esto yes");
    var formData = $('#formReductorN').serializeArray();
    let esValido = true;


    // Limpiar los mensajes de error antes de comenzar la validación
    Object.keys(camposReductorN).forEach(campoReductorN => {
      const error = `error_${campoReductorN}`;
      document.getElementById(error).textContent = ""; // Limpia los errores
    });

    // Validación de los campos
    formData.forEach(function (campoData) {
      const { name, value } = campoData;
      const error = `error_${name}`;
      const valor = camposReductorN[name];

      // Validar campos vacíos
      if (value.trim() === '') {
        if (camposReductorN[name]) {

          document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
          esValido = false;
        }
      }
    });

    const submitButton = document.getElementById('btnReductorN');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }
  });

  //reductor en mal estado
  $(document).on('input', '#formReductorM input, #formReductorM select', function (event) {
    event.preventDefault();
    console.log("funca esto");
    var formData = $('#formReductorM').serializeArray();
    let esValido = true;

    const fileInput = document.querySelector('input[name="solicitud_reductor_imagen"]');
    const file = fileInput.files[0]; // Accede al archivo seleccionado

    if (!file) {
      console.log('El archivo no fue seleccionado');

    } else if (!['image/png', 'image/jpeg', 'image/jpg'].includes(file.type)) {
      document.getElementById("error_solicitud_reductor_imagen").textContent = `*El formato de la imagen no es valido*`;
      esValido = false;

    } else if (file.size > 2 * 1024 * 1024) { // 2 MB
      document.getElementById("error_solicitud_reductor_imagen").textContent = `*El archivo es demasiado grande*`;
      esValido = false;

    } else {
      console.log('archivo ingresado')
    }

    // Limpiar los mensajes de error antes de comenzar la validación
    Object.keys(camposReductorM).forEach(campoReductorM => {
      const error = `error_${campoReductorM}`;
      document.getElementById(error).textContent = ""; // Limpia los errores
    });

    // Validación de los campos
    formData.forEach(function (campoData) {
      const { name, value } = campoData;
      const error = `error_${name}`;
      const valor = camposReductorM[name];

      // Validar campos vacíos
      if (value.trim() === '') {
        if (camposReductorM[name]) {

          document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
          esValido = false;
        }
      }
    });

    const submitButton = document.getElementById('btnReductorM');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }
  });







  $(document).on('input', '#formAccidente input, #formAccidente select', function (event) {
    event.preventDefault();
    //console.log("si net");
    var formData = $('#formAccidente').serializeArray();

    const fileInput = document.querySelector('input[name="solicitud_accidente_imagen"]');
    const file = fileInput.files[0]; // Accede al archivo seleccionado
    let esValido = true;

    if (!file) {
      console.log('El archivo no fue seleccionado');


    } else if (!['image/png', 'image/jpeg', 'image/jpg'].includes(file.type)) {
      document.getElementById("error_solicitud_accidente_imagen").textContent = `*El formato de la imagen no es valido*`;
      esValido = false;

    } else if (file.size > 2 * 1024 * 1024) { // 2 MB
      document.getElementById("error_solicitud_accidente_imagen").textContent = `*El archivo es demasiado grande*`;
      esValido = false;

    } else {
      console.log('archivo ingresado')
    }


    Object.keys(camposAccidente).forEach(campoAccidente => {
      const error = `error_${campoAccidente}`;
      document.getElementById(error).textContent = ""; // Limpia los errores
    });

    formData.forEach(function (campoData) {
      const { name, value } = campoData;
      const error = `error_${name}`;
      const valor = camposAccidente[name];

      // Validar campos vacíos
      if (value.trim() === '') {
        if (camposAccidente[name]) {

          document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
          esValido = false;
        }
      }
    });


    const submitButton = document.getElementById('btnAccidente');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }

  });

  $(document).on('input', '#formVia input, #formVia select', function (event) {
    event.preventDefault();
    console.log("si funca");
    var formData = $('#formVia').serializeArray();
    let esValido = true;

    const fileInput = document.querySelector('input[name="solicitud_via_imagen"]');
    const file = fileInput.files[0]; // Accede al archivo seleccionado

    if (!file) {
      console.log('El archivo no fue seleccionado');

    } else if (!['image/png', 'image/jpeg', 'image/jpg'].includes(file.type)) {
      document.getElementById("error_solicitud_via_imagen").textContent = `*El formato de la imagen no es valido*`;
      esValido = false;

    } else if (file.size > 2 * 1024 * 1024) { // 2 MB
      document.getElementById("error_solicitud_via_imagen").textContent = `*El archivo es demasiado grande*`;
      esValido = false;

    } else {
      console.log('archivo ingresado')
    }

    Object.keys(camposVia).forEach(campoVia => {
      const error = `error_${campoVia}`;
      document.getElementById(error).textContent = ""; // Limpia los errores
    });

    formData.forEach(function (campoData) {
      const { name, value } = campoData;
      const error = `error_${name}`;
      const valor = camposVia[name];

      // Validar campos vacíos
      if (value.trim() === '') {
        if (camposVia[name]) {

          document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
          esValido = false;
        }
      }
    });


    const submitButton = document.getElementById('btnVia');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }


  });


  //filtracion
  $(document).on('keyup', "#buscar", function () {
    let buscar = $(this).val();
    let url = $(this).attr('data-url');

    $.ajax({
      url: url,
      type: 'POST',
      data: { 'buscar': buscar },
      success: function (data) {
        $('tbody').html(data);
      }
    });
  });


  $(document).on('keyup', "#id_data", function () {
    let id_data = $(this).val();
    let url = $(this).attr('data-url');


    $.ajax({
      url: url,
      type: 'POST',
      data: { 'id_data': id_data },
      success: function (data) {

        if (!data.includes("No se encuentra id asociado")) {
          $('#datos').html(data);

        } else {
          $('#datos').html("");
        }
      }
    });
  });

  //ajax cargar formulario de solicitudes
  $(document).on('change', "#id_solicitud", function () {
    let id_solicitud = $(this).val();
    let url = $(this).attr('data-url');
    console.log("gola");
    // console.log("Valor seleccionado: " + id_solicitud);
    $.ajax({
      url: url,
      type: 'POST',
      data: { 'id_solicitud': id_solicitud },
      success: function (data) {
        $('#formularios').html(data);
      }
    });
  });
  //cargar consulta de solicitudes 
  $(document).on('change', "#id_consult", function () {
    let id_consult_solicitud = $(this).val();
    let url = $(this).attr('data-url');
    console.log("gola");
    // alert("Valor seleccionado: " + id_consult_solicitud)
    $.ajax({
      url: url,
      type: 'POST',
      data: { 'id_solicitud': id_consult_solicitud },
      success: function (data) {
        $('#formularios').html(data);
      }
    });
  });
  //ajax cargar formulario de reportes
  $(document).on('change', "#id_reporte", function () {
    let id_reporte = $(this).val();
    let url = $(this).attr('data-url');
    console.log("Helou");
    console.log("Valor seleccionado: " + id_reporte);
    $.ajax({
      url: url,
      type: 'POST',
      data: { 'id_reporte': id_reporte },
      success: function (data) {
        $('#formulariosReport').html(data);
      }
    });
  });

  $(document).on('change', "#id_consult_mapa", function () {
    console.log("mapita");
    let id_consult_mapa = $(this).val();
    let url = $(this).attr('data-url');

    // console.log("Valor seleccionado: " + id_solicitud);
    $.ajax({
      url: url,
      type: 'POST',
      data: { 'id_consult_mapa': id_consult_mapa },
      success: function (data) {
        $('#mapita').html(data);
      }
    });
  });

  $('select, input').on('input change', function () {
    // Concatenar los valores de los campos de dirección
    var tipoVia = $('#tipo_via').val();
    var numVia = $('#num_via').val();
    var letra1 = $('#letra1').val();
    var bis = $('#bis').is(':checked') ? ' Bis' : '';
    var orientacion = $('#orientacion').val();
    var numero2 = $('#numero2').val();
    var letra2 = $('#letra2').val();
    var numero3 = $('#numero3').val();
    var barrio = $('#barrio').val();

    // Concatenar la dirección
    var direccion = (tipoVia + ' ' + numVia)
      + (letra1 ? ' ' + letra1 : '')
      + (bis ? ' Bis' : '')
      + (orientacion ? ' ' + orientacion : '')
      + (numero2 ? ' #' + numero2 : '')
      + (letra2 ? ' ' + letra2 : '')
      + (numero3 ? '-' + numero3 : '')
      + (barrio ? ', barrio ' + barrio : '');
    // Mostrar la dirección en el span
    $('#direccion').text('Dirección: ' + direccion);
  });


  $(document).on('click', '#cambiar_estado', function () {
    let id = $(this).attr('data-id');
    let url = $(this).attr('data-url');
    let user = $(this).attr('data-user');

    // alert("Funciona data: "+id+" user "+user+" url "+url);
    $.ajax({
      url: url,
      data: { id, user },
      type: 'POST',
      success: function (data) {
        $('tbody').html(data);
      }
    })
  });
  $(document).on('click', '#cambiar_estado_tar', function () {
    let id = $(this).attr('data-id');
    let url = $(this).attr('data-url');
    let tarea = $(this).attr('data-tarea');

    // alert("Funciona data: "+id+" user "+user+" url "+url);
    $.ajax({
      url: url,
      data: { id, tarea },
      type: 'POST',
      success: function (data) {
        $('tbody').html(data);
      }
    })
  });
  // $(document).on('click', '#copyList', function () {
  //   let listUser = $("#listUser").html();

  //   $("#responsables").append(
  //     "<div class='col md-4 form-group'>" +
  //     "<label>Responsable</label>" +
  //     "<div class='row'>" +
  //     "<div class='col-md-10'>" + listUser + "</div>" +
  //     "<div class='col-md-2'>" +
  //     "<button class='btn btn-danger' type='button' id='removeList'>x</button" +
  //     "</div>" +
  //     "</div>" +
  //     "</div>"
  //   )
  // });
  // $(document).on('click', '#removeList', function () {
  //   $(this).parent().parent().parent().remove();
  // });


  $('#tipo_choque').on('change', function () {

    var url = $(this).attr('data-url');
    var tipo_choque = $(this).val();

    $.ajax({
      url: url,
      type: 'POST',
      data: { 'tipo_choque': tipo_choque },
      success: function (data) {
        if (!data.includes("error")) {

          $("#detalle_choque").html(data);
          $('#dc').removeClass('d-none');
          console.log(data);

        } else {
          $('#dc').addClass('d-none');
        }



      },
      error: function () {
        alert('Error al cargar los detalles del choque.');
      }
    });

  });





  $('#tipo_senial_id, #categoria_senial_id').on('change', function () {
    var url = $(this).attr('data-url');
    var categoria_senial = $('#categoria_senial_id').val();
    var tipo_senial = $('#tipo_senial_id').val();
    console.log(categoria_senial)
    console.log(tipo_senial)

    $.ajax({

      url: url,
      type: 'POST',
      data: {
        'tipo_senial_id': tipo_senial,
        'categoria_senial_id': categoria_senial
      },
      success: function (data) {
        if (!data.includes("error")) {

          $("#senial").html(data);
          $('#senal').removeClass('d-none');
          console.log(data);

        } else {
          $('#senal').addClass('d-none');
        }



      },
      error: function () {
        alert('Error al cargar los detalles del choque.');
      }
    });

  });

  $('#categoria_reductor_id').on('change', function () {

    var url = $(this).attr('data-url');
    var categoria_reductor = $('#categoria_reductor_id').val();

    $.ajax({
      url: url,
      type: 'POST',
      data: {
        'categoria_reductor_id': categoria_reductor
      },
      success: function (data) {
        if (!data.includes("error")) {

          $("#reductor_id").html(data);
          $('#reduct').removeClass('d-none');
          console.log(data);

        } else {
          $('#reduct').addClass('d-none');
        }



      },
      error: function () {
        alert('Error al cargar los detalles del choque.');
      }
    });

  });

  $('#tipo_choque').on('change', function () {

    var url = $(this).attr('data-url');
    var tipo_choque = $('#tipo_choque').val();

    $.ajax({
      url: url,
      type: 'POST',
      data: {
        'tipo_choque': tipo_choque,
      },
      success: function (data) {
        if (!data.includes("error")) {

          $("#detalle_choque").html(data);
          $('#detalle').removeClass('d-none');
          console.log(data);

        } else {
          $('#detalle').addClass('d-none');
        }



      },
      error: function () {
        alert('Error al cargar los detalles del choque.');
      }
    });

  });

  $(document).on('input', '#formCorreoRecu input', function () {

    let esValido = true;
    var correo = document.getElementById('correo_usuario').value;

    // console.log(correo);

    document.getElementById('error_correo_usuario').textContent = '';

    if (correo === '') {
      document.getElementById('error_correo_usuario').textContent = `*El campo Correo es obligatorio*`;
      esValido = false;

    } else if (!validarCorreo(correo)) {
      document.getElementById('error_correo_usuario').textContent = `*Por favor ingrese un Correo válido*`;
      esValido = false;
    }

    const submitButton = document.getElementById('btnEnviarCorreo');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }
  });

  $(document).on('input', '#formContra input', function () {

    let esValido = true;
    var contrasenia_1 = document.getElementById('contrasenia_1').value;
    var contrasenia_2 = document.getElementById('contrasenia_2').value;
    // var contrasenias = array (

    // )
    console.log(contrasenia_1);

    document.getElementById('error_contrasenia_1').textContent = '';
    document.getElementById('error_contrasenia_2').textContent = '';

    error_1 = 'error_contrasenia_1';
    error_2 = 'error_contrasenia_2';

    if (contrasenia_1 === '') {
      document.getElementById('error_contrasenia_1').textContent = `*Este campo es obligatorio*`;
      esValido = false;

    } else if (!validarContrasenias(contrasenia_1, error_1)) {
      esValido = false;
    } else if (!validarContrasenias(contrasenia_2, error_2)) {
      esValido = false;
    } else if (contrasenia_1 !== contrasenia_2) {
      document.getElementById('error_contrasenia_2').textContent = `*Las contraseñas deben ser iguales*`;
      esValido = false;
    }

    const submitButton = document.getElementById('btnContrasenia');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }
  });

  $(document).on('input', '#formPqrs input, #formPqrs select', function () {

    var formData = $('#formPqrs').serializeArray();
    let esValido = true;
    const fileInput = document.querySelector('input[name="adjuncion_pqrs"]');
    const file = fileInput.files[0]; // Accede al archivo seleccionado


    if (!file) {
      console.log('El archivo no fue seleccionado');


    } else if (!['image/png', 'image/jpeg', 'image/jpg'].includes(file.type)) {
      document.getElementById("error_adjuncion_pqrs").textContent = `*El formato de la imagen no es valido*`;
      esValido = false;

    } else if (file.size > 2 * 1024 * 1024) { // 2 MB
      document.getElementById("error_adjuncion_pqrs").textContent = `*El archivo es demasiado grande*`;
      esValido = false;

    } else {
      console.log('archivo ingresado')
    }

    // Limpiar los mensajes de error antes de comenzar la validación
    Object.keys(camposPQRS).forEach(campoPQRS => {
      const error = `error_${campoPQRS}`;
      document.getElementById(error).textContent = ""; // Limpia los errores
    });

    // Validación de los campos
    formData.forEach(function (campoData) {
      const { name, value } = campoData;
      const error = `error_${name}`;
      const valor = camposPQRS[name];

      // Validar campos vacíos
      if (value.trim() === '') {
        if (camposPQRS[name]) {

          document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
          esValido = false;
        }
      }
    });


    const submitButton = document.getElementById('btnPQRS');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }
  });

  $(document).on('keyup', "#user", function () {

    let email = $(this).val();

    let url = $(this).attr('data-url');

    $.ajax({
      url: url,
      type: 'POST',
      data: { 'email': email },
      success: function (data) {
        $('tbody').html(data);
      }
    });
  });

  $(document).on('input', '#formLogin input, #formLogin select', function () {

    console.log("En la funcion");

    // var formData = $('#formLogin').serializeArray();
    let esValido = true;
    var contrasena = document.getElementById('pass').value;
    var errorContrasena = document.getElementById('error_usuario_contrasena');
    var correo = document.getElementById('user').value;
    var errorCorreo = document.getElementById('error_usuario_email');
    errorConta = 'error_usuario_contrasena';

    document.getElementById('error_usuario_email').textContent = " ";
    document.getElementById('error_usuario_contrasena').textContent = " ";
    // Validar campos vacíos correo
    if (correo.trim() === '') {
      document.getElementById('error_usuario_email').textContent = `*El campo correo es obligatorio*`;
      esValido = false;

    } else if (!validarCorreo(correo)) {
      document.getElementById('error_usuario_email').textContent = `*Por favor, ingrese un correo electrónico válido (ejemplo: usuario@dominio.com).*`;
      esValido = false;
    } else if (correo.length > 50) {
      document.getElementById('error_usuario_email').textContent = `*Correo muy largo*`;
      esValido = false;
    }




    // Validar campos vacíos contrasenia
    if (contrasena.trim() === '') {
      document.getElementById('error_usuario_contrasena').textContent = `*El campo contraseña es obligatorio*`;
      esValido = false;

    } else if (!validarContrasenias(contrasena, errorConta)) {
      esValido = false;
    }


    const submitButton = document.getElementById('btnLogin');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }
  });
});