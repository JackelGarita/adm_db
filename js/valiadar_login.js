$.validator.setDefaults( {
    submitHandler: function () {
        var data={
            ID:$("#ID").val(),
            
            password:$("#pass").val()
           
        }
        console.log(data);
       $.ajax({
          url: 'http://localhost/adm_db/php/post_login.php', 
          type: 'POST',
         
          data: data,
          success: function (d) {
              var rol=d;
            console.log(rol)
            if(Boolean(d)==false){

                alert("usuario y/o contraseña incorrecta");
            }
                if(parseInt(d)==1){
               window.location.href=("../views/adminitrador.html")
                }

                if(parseInt(rol)===2){
                    window.location.href=("../views/principal_estudiante.php")
                }
                if(parseInt(rol)==3){
                    window.location.href=("../views/prfesor.html")

          }
            
              
          
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


    $('#form-login').validate({
        rules:{
          ID:{
              required:true
        },
       
        pass:{
            minlength : 5,
            required:true
        },
        
    },
    messages:{
        ID:{
            required: "*Por favor registre su identificacion*"
        },
        
        pass:{
            required:"Necesita ingresa una contraseña ",
            minlength : "Debe ser de al menos 5 caracteres"
        }
    }
    });
});
    
