import Vue from 'vue';
import VueRouter from 'vue-router';
import InicioEstablecimiento from '../components/InicioEstablecimiento'
const routes = [
    {
        path      : '/',
        component : InicioEstablecimiento
    },

];
const router = new VueRouter({
    routes
});

Vue.use(VueRouter);

export default router;