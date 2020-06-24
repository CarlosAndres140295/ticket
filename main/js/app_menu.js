// var AgregarCliente=document.querySelector('#AgregarCliente');
// AgregarCliente.click(function(){
//     alert('click');
// });

function AgregarCliente() {
    const api=new XMLHttpRequest();
    api.open('POST','newuser.php',true);
    api.send();

    api.onreadystatechange=function() {
        if(this.status===200 && this.readyState===4){
            let datos=this.responseText;
            $('#respuestas').html(datos);
        }
        // else{
        //     alert('No');
        // }
    }
}


function ListarClientes() {
    const api=new XMLHttpRequest();
    api.open('POST','listclients.php',true);
    api.send();

    api.onreadystatechange=function() {
        if(this.status===200 && this.readyState===4){
            let datos=this.responseText;
            $('#respuestas').html(datos);
        }
        // else{
        //     alert('No');
        // }
    }
}
// alert('app_menu');