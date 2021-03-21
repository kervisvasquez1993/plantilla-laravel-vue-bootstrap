<template>
    <div class="container my-5">
        <h2>Cafes</h2>
        <div class="row">
            <div class="col-mb-3 mt-4" v-for=" cafe in this.cafes" v-bind:key="cafe.id">
                <div class="card">
                    <img class="card-img-top" :src="`storage/${cafe.imagen_principal}`" alt="card del restaurante">
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold">
                            {{cafe.name}}
                        </h3>
                        <p class="card-text">{{cafe.direccion}}</p>
                        <p class="card-text">
                            <span class="font-weight-bold">Horario:</span>
                            {{cafe.apertura}} -- {{cafe.cierre}}
                        </p>
                        <a class="btn btn-primary d-block" href="">Ver Lugar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
    data : function()
    {
        return {
            cafes : []
        }
    },
    mounted()
    {
        axios.get('/api/categorias/cafe')
                .then(respuesta => 
                      this.cafes= respuesta.data )
    }
}
</script>