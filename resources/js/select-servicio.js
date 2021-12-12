let select_sucursal = document.getElementById('sucursal_id'),
    select_servicios = document.getElementById('servicio_id');

   
window.axios = require('axios');
axios.defaults.headers.common = {
    'X-CSRF-TOKEN': document.getElementsByName('csrf-token')[0].getAttribute('content'),
    'X-Requested-With' : 'XMLHttpRequest'
};

select_sucursal.addEventListener('change',function(){
    let sucursal = select_sucursal.value
    if (!isNaN(sucursal)) {
        axios.post(baseURL + '/servicios/sucursal/' + sucursal)
        .then((respuesta)=>{
            select_servicios.innerHTML = "";
            let servicios = respuesta.data;

            servicios.forEach(element => {
                select_servicios.innerHTML += `<option value="${element.id}">${element.nombre}</option>`;              
            });
        })
        .catch((error)=>{
            if (error.response) {
                console.log(error.response.data);
            }
        }) 
    }
})