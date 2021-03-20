import Axios from "axios";

document.addEventListener('DOMContentLoaded', () => 
{


    if(document.querySelector('#dropzone')) 
    {
        Dropzone.autoDiscover = false;
        const dropzone = new Dropzone('div#dropzone',
        {
            url: '/imagenes/store',
            dictDefaultMessage : 'Sube Hasta 10 Imagenes',
            maxFiles: 10,
            requied: true,
            acceptedFiles: ".png, .jpg,  .git, .bmp",
            headers : {
                "X-CSRF-TOKEN : " : document.querySelector('meta[name=csrf-token]').content
            }
        })
    }
}
)
