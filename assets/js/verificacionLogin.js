$("#frmLogin").on('submit',function(e)

{

    e.preventDefault();

    username=$("#username").val();

    password=$("#password").val();



if ($("#username").val()=="" || $("#password").val()=="") {

    bootbox.alert("Asegúrate de llenar todo los campos");

}else{

        $.post("../ajax/usuario.php?op=verificar",

        {"logina":logina,"clavea":clavea},

        function(data)

    {
        console.log(data);

        if (data!="null")

        {

            $(location).attr("href","escritorio.php");            

        }

        else

        {

            bootbox.alert("Usuario y/o Password incorrectos");

        }

    });

}



})