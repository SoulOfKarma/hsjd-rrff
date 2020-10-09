/*=========================================================================================
  File Name: sidebarItems.js
  Description: Sidebar Items list. Add / Remove menu items from here.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


export default [{
        url: '/home',
        name: 'Inicio',
        slug: 'home',
        icon: 'HomeIcon'
    }, {
        url: null,
        name: 'Menu',
        slug: 'home',
        icon: 'HomeIcon',
        submenu: [{
                url: '/Listadosolicitudes',
                name: 'Listado Tickets',
                slug: 'Listadosolicitudes',
                icon: 'FileIcon'
            },
            {
                url: '/GenerarSolicitud',
                name: 'Generar Ticket',
                slug: 'GenerarSolicitud',
                icon: 'FileIcon'
            }
        ]
    }

]