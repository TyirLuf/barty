const cadCliente = document.getElementById("cad-cliente");
if(cadCliente) {
    cadCliente.addEventListener("submit", async(e) =>{
        e.preventDefault();
        
        const dadosForm = new FormData(cadCliente);

    })
}






function alert(){
    Swal.fire('Sucesso','Registro Realizado com Sucesso','success')
}
alert();