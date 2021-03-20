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
            addRemoveLinks: true,
            dictRemoveFile: 'eliminar Imagen',
            headers: {
                'X-CSRF-TOKEN': token
            }, 
            success: function(file, respuesta)
            {
                /* console.log(file) */
                
                console.log(respuesta)
                file.nombreServidor = respuesta.archivo

            },
            sending: function(file, xhr, formData)
            {
                formData.append('uuid', document.querySelector('#uuid').value)
                /* console.log('enviendo') */

            },
            removedfile: function(file,respuesta)
            {
                console.log(file)
                const params = 
                {
                    imagen: file.nombreServidor
                }
                axios.post('/imagenes/destroy', params)
                .then(respuesta => {
                    console.log(respuesta)

                    //eliminar del DOM

                    file.previewElement.parentNode.removeChild(file.previewElement)
                })
            }
        });
    }
}
)
