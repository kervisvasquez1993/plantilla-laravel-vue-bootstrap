document.addEventListener('DOMContentLoaded', () => 
{
    if(document.querySelector('#dropzone')) 
    {
        Dropzone.autoDiscover = false;
        let token = document.querySelector('meta[name=csrf-token]').content
        const dropzone = new Dropzone('div#dropzone',
        {
            url: '/imagenes/store',
            dictDefaultMessage : 'Sube Hasta 10 Imagenes',
            maxFiles: 10,
            requied: true,
            acceptedFiles: ".png, .jpg,  .gif, .bmp, .jpeg",
            headers: {
                'X-CSRF-TOKEN': token
            }, 
            success: function(file, respuesta)
            {
                /* console.log(file) */
                
                console.log(respuesta)

            },
            sending: function(file, xhr, formData)
            {
                formData.append('uuid', document.querySelector('#uuid').value)
                /* console.log('enviendo') */

            }
        });
    }
}
)
