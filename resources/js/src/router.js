/*=========================================================================================
  File Name: router.js
  Description: Routes for vue-router. Lazy loading is enabled.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const router = new Router({
    mode: 'history',
    base: '/',
    scrollBehavior() {
        return {
            x: 0,
            y: 0
        }
    },
    routes: [{
            path: '',
            redirect: '/pages/login'
        },
        {
            // =============================================================================
            // MAIN LAYOUT ROUTES
            // =============================================================================
            path: '',
            component: () =>
                import ('./layouts/main/MainUsuario.vue'),
            children: [
                // =============================================================================
                // Theme Routes
                // =============================================================================
                {
                    path: '/home',
                    name: 'home',
                    component: () =>
                        import ('./views/Home.vue')
                },
                {
                    path: '/Listadosolicitudes',
                    name: 'Listadosolicitudes',
                    component: () =>
                        import ('./views/Listadosolicitudes.vue')
                },
                {
                    path: '/GenerarSolicitud',
                    name: 'GenerarSolicitud',
                    component: () =>
                        import ('./views/GenerarSolicitud.vue')
                },
                {
                    path: '/HomeTrabajador',
                    name: 'Inicio',
                    component: () =>
                        import ('./views/trabajadorView/homeTrabajador.vue')
                },
                {
                    path: '/ListadoTicketsTrabajador',
                    name: 'ListadoTicketsTrabajador',
                    component: () =>
                        import ('./views/trabajadorView/ListadoTicketsTrabajador.vue')
                },
                {
                    path: '/InformacionSolicitud/:id,:uuid',
                    name: 'InformacionSolicitud',
                    component: () =>
                        import ('./views/InformacionSolicitud.vue')
                },
                {
                    path: '/ModificarTicketUsuario/:id,:uuid',
                    name: 'ModificarTicketUsuario',
                    component: () =>
                        import ('./views/ModificarTicketUsuario.vue')
                },


            ]
        },
        {
            // =============================================================================
            // MAIN LAYOUT ROUTES
            // =============================================================================
            path: '',
            component: () =>
                import ('./layouts/main/MainAgente.vue'),
            children: [
                // =============================================================================
                // Theme Routes
                // =============================================================================
                {
                    path: '/agenteView/HomeAgente',
                    name: 'Inicio',
                    component: () =>
                        import ('./views/agenteView/HomeAgente.vue')
                },
                {
                    path: '/agenteView/GenerarTicket',
                    name: 'GenerarTicket',
                    component: () =>
                        import ('./views/agenteView/GenerarTicket.vue')
                },
                {
                    path: '/agenteView/CalendarioSolicitudes',
                    name: 'Calendario Solicitudes',
                    component: () =>
                        import ('./views/agenteView/CalendarioSolicitudes.vue')
                },
                {
                    path: '/agenteView/ListadoSolicitudes',
                    name: 'ListadoSolicitudesAgente',
                    component: () =>
                        import ('./views/agenteView/ListadoSolicitudes.vue')
                },
                {
                    path: '/agenteView/InformacionSolicitud',
                    name: 'InformacionSolicitudAgente',
                    component: () =>
                        import ('./views/agenteView/InformacionSolicitud.vue')
                },
                {
                    path: '/agenteView/FormularioAsignar/:id,:uuid',
                    name: 'AsignarSolicitudAgente',
                    component: () =>
                        import ('./views/agenteView/FormularioAsignar.vue')
                },
                {
                    path: '/agenteView/FormularioModificar/:id,:uuid',
                    name: 'ModificarSolicitudAgente',
                    component: () =>
                        import ('./views/agenteView/FormularioModificar.vue')
                }


            ]
        },
        // =============================================================================
        // FULL PAGE LAYOUTS
        // =============================================================================
        {
            path: '',
            component: () =>
                import ('@/layouts/full-page/FullPage.vue'),
            children: [
                // =============================================================================
                // PAGES
                // =============================================================================
                {
                    path: '/pages/login',
                    name: 'page-login',
                    component: () =>
                        import ('@/views/pages/Login.vue')
                },
                {
                    path: '/pages/error-404',
                    name: 'page-error-404',
                    component: () =>
                        import ('@/views/pages/Error404.vue')
                }
            ]
        },
        // Redirect to 404 page, if no match found
        {
            path: '*',
            redirect: '/pages/error-404'
        }
    ]
})

router.afterEach(() => {
    // Remove initial loading
    const appLoading = document.getElementById('loading-bg')
    if (appLoading) {
        appLoading.style.display = 'none'
    }
})

export default router