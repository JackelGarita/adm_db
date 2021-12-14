$.validator.setDefaults( {
    submitHandler: function () {
        var data={
            ID:$("#DNI").val(),
            nombre:$("#nombre").val(),
            apellido:$("#apellido").val(),
            cumpleaños:$("#cumple").val(),
            telefono:$("#telefono").val(),
            email:$("#email").val(),
            password:$("#pass").val()
           
        }
        console.log(data);
       $.ajax({
          url: 'http://localhost/adm_db/php/post_registro.php', 
          type: 'POST',
         
          data: data,
          success: function (d) {
            console.log(d);
            window.location.href="../views/index.htm"
          
          },
          error: function (d) {
           console.log(d);
          }
       });
    }
 });


$(document).ready(function(){

    $('#DNI').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
      });


 
    

//con esto establesco las reglas para registra el formulario 


    $('#register-form').validate({
        rules:{
          DNI:{
              required:true
        },
        nombre:{
            required:true
        },
        apellido:{
            required:true
        },
        cumple:{
            required:true
        },
        email:{
            required:true,
            email: true
        },
        telefono:{
            required:true
        },
        pass:{
            minlength : 5,
            required:true
        },
        passconfirmar:{
            required: true,
            equalTo:'#pass',
           
        }
    },
    messages:{
        DNI:{
            required: "*Por favor registre su identificacion*"
        },
        nombre:{
            required:"*ingrese su nombre*"

        },
        apellido:{
            required:"*ingrese su apelldio*"
        },
        cumple:{
            required:"*campo requerido*"
        },
        email:{

            required:"debe ingresar un correo",
            email: "debe tener formato email: abc@dominio.cr"
        },
        telefono:{
required:"Campo requerido"
        },
        pass:{
            required:"Necesita ingresa una contraseña ",
            minlength : "Debe ser de al menos 5 caracteres"
        },
        passconfirmar:{
            required: "Por favor confirme la contraseña vuelva ingresar de nuevo",
            equalTo:"Contraseña incorrecta intente de nuevo ",
          
        }
    }
    })
});



 