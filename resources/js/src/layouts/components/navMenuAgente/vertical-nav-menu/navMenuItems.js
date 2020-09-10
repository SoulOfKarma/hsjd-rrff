/*=========================================================================================
  File Name: sidebarItems.js
  Description: Sidebar Items list. Add / Remove menu items from here.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


export default [{
        url: '/agenteView/HomeAgente',
        name: 'Inicio',
        slug: 'homeAgente',
        icon: 'HomeIcon'
    }, {
        url: null,
        name: 'Infraestructura',
        slug: 'home',
        icon: 'PlusCircleIcon',
        submenu: [{
                url: '/agenteView/CalendarioSolicitudes',
                name: 'Calendario',
                slug: 'CalendarioSolicitudes',
                icon: 'FileIcon'
            },
            {
                url: '/agenteView/ListadoSolicitudes',
                name: 'Listado Tickets',
                slug: 'ListadoSolicitudes',
                icon: 'FileIcon'
            },
            {
                url: '/agenteView/GenerarTicket',
                name: 'Generar Ticket',
                slug: 'GenerarTicket',
                icon: 'FileIcon'
            },
            {
                url: null,
                name: 'Reportes',
                slug: 'home',
                icon: 'PlusCircleIcon',
                submenu: [{
                        url: '/agenteView/ReporteExDiaInfra',
                        name: 'Reporte Por Dia',
                        slug: 'ReporteExDiaInfra',
                        icon: 'FileIcon'
                    },
                    {
                        url: '/agenteView/ReporteExMesInfra',
                        name: 'Reporte Por Mes',
                        slug: 'ReporteExMesInfra',
                        icon: 'FileIcon'
                    }
                ]
            }
        ]
    }, {
        url: null,
        name: 'Equipos Medicos',
        slug: 'home',
        icon: 'PlusCircleIcon',
        submenu: [{
                url: '/agenteView/CalendarioSolicitudesEM',
                name: 'Calendario',
                slug: 'CalendarioSolicitudesEM',
                icon: 'FileIcon'
            },
            {
                url: '/agenteView/ListadoTicketsEM',
                name: 'Listado Tickets ',
                slug: 'ListadoTicketsEM',
                icon: 'FileIcon'
            },
            {
                url: '/agenteView/GenerarTicketEM',
                name: 'Generar Ticket ',
                slug: 'GenerarTicketEM',
                icon: 'FileIcon'
            },
            {
                url: null,
                name: 'Reportes',
                slug: 'home',
                icon: 'PlusCircleIcon',
                submenu: [{
                        url: '/agenteView/ReporteExDiaEM',
                        name: 'Reporte Por Dia',
                        slug: 'ReporteExDiaEM',
                        icon: 'FileIcon'
                    },
                    {
                        url: '/agenteView/ReporteExMesEM',
                        name: 'Reporte Por Mes',
                        slug: 'ReporteExMesEM',
                        icon: 'FileIcon'
                    }
                ]
            }
        ]
    },
    {
        url: null,
        name: 'Industrial',
        slug: 'home',
        icon: 'PlusCircleIcon',
        submenu: [{
                url: '/agenteView/CalendarioSolicitudesIND',
                name: 'Calendario',
                slug: 'CalendarioSolicitudesIND',
                icon: 'FileIcon'
            },
            {
                url: '/agenteView/ListadoTicketsIND',
                name: 'Listado Tickets',
                slug: 'ListadoTicketsIND',
                icon: 'FileIcon'
            },
            {
                url: '/agenteView/GenerarTicketIND',
                name: 'Generar Ticket',
                slug: 'GenerarTicketIND',
                icon: 'FileIcon'
            },
            {
                url: null,
                name: 'Reportes',
                slug: 'home',
                icon: 'PlusCircleIcon',
                submenu: [{
                        url: '/agenteView/ReporteExDiaIND',
                        name: 'Reporte Por Dia',
                        slug: 'ReporteExDiaIND',
                        icon: 'FileIcon'
                    },
                    {
                        url: '/agenteView/ReporteExMesIND',
                        name: 'Reporte Por Mes',
                        slug: 'ReporteExMesIND',
                        icon: 'FileIcon'
                    }
                ]
            }
        ]
    },
    {
        url: null,
        name: 'Cambiar Despues',
        slug: 'home',
        icon: 'PlusCircleIcon',
        submenu: [{
                url: '/agenteView/CalendarioSolicitudesCA',
                name: 'Calendario',
                slug: 'CalendarioSolicitudesCA',
                icon: 'FileIcon'
            },
            {
                url: '/agenteView/ListadoTicketsCA',
                name: 'Listado Tickets',
                slug: 'ListadoSolicitudesCA',
                icon: 'FileIcon'
            },
            {
                url: '/agenteView/GenerarTicketCA',
                name: 'Generar Ticket',
                slug: 'GenerarTicketCA',
                icon: 'FileIcon'
            },
            {
                url: null,
                name: 'Reportes',
                slug: 'home',
                icon: 'PlusCircleIcon',
                submenu: [{
                        url: '/agenteView/ReporteExDiaCA',
                        name: 'Reporte Por Dia',
                        slug: 'ReporteExDiaCA',
                        icon: 'FileIcon'
                    },
                    {
                        url: '/agenteView/ReporteExMesCA',
                        name: 'Reporte Por Mes',
                        slug: 'ReporteExMesCA',
                        icon: 'FileIcon'
                    }
                ]
            }
        ]
    }

]