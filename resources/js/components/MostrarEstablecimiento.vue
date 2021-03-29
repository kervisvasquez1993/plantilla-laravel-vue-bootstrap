<template>
    <h2>
       desde establecimiento 
    </h2>
</template>

<script>
export default {
      mounted()
    {
        const { id } = this.$route.params
        axios.get('/api/establecimientos/'+id)
            .then( respuesta => console.log(respuesta.data))
                
                      
    },
    computed: {
        
    }
}
</script>