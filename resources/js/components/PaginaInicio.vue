<template>
 <div>
   <categoria-cafe></categoria-cafe>
   <categoria-restaurante></categoria-restaurante>
   <categoria-hotel></categoria-hotel>
 </div>
</template>


<script>
import CategoriaCafe from './CategoriaCafe'
import CategoriaRestaurante from './CategoriaRestaurante'
import CategoriaHotel from './CategoriaHotel'
import store from '../store/index'


export default {
   store,
   components : {
         CategoriaCafe,
         CategoriaRestaurante,
         CategoriaHotel
      
   }
}
</script>