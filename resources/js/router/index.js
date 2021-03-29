import Vue from 'vue';
import VueRouter from 'vue-router';
import InicioEstablecimiento from '../components/InicioEstablecimiento'
import MostrarEstablecimiento from '../components/MostrarEstablecimiento'
const routes = [
    {
        path      : '/',
        component : InicioEstablecimiento
    },
    {
        path      : '/establecimiento/:id',
        name      : 'establecimiento',
        component : MostrarEstablecimiento
    }

];
const router = new VueRouter({
    routes
});

Vue.use(VueRouter);

export default router;