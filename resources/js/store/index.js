import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state : {
        cafes        : [],
        hoteles      : [],
        restaurantes : []
      
    },
    mutations : {
        AGREGAR_CAFES(state, cafes) {
            state.cafes = cafes;
        },
        AGREGAR_HOTELES(state,hoteles)
        {
            state.hoteles = hoteles
        },
        AGREGAR_RESTAURANTE(state, restaurantes)
        {
            state.restaurantes = restaurantes
        }
      
    }
})
