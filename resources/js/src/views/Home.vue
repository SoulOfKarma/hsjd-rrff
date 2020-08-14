<template>
    <div>
        <div class="vx-row">
            <div
                class="router-header flex flex-wrap items-center mb-6"
                style="margin-left:10px;"
            >
                <div
                    class="content-area__heading pr-4 border-0 md:border-r border-solid border-grey-light"
                >
                    <h2 class="mb-1">Página de Inicio</h2>
                </div>
            </div>
        </div>
        <div class="vx-row">
            <div class="vx-col w-full lg:w-1/4 mb-base"></div>
            <div class="vx-col w-full lg:w-1/2 mb-base">
                <vx-card
                    slot="no-body"
                    class="text-center bg-primary-gradient greet-user"
                >
                    <feather-icon
                        icon="SunIcon"
                        class="p-6 mb-8 bg-primary inline-flex rounded-full text-white shadow"
                        svgClasses="h-8 w-8"
                    ></feather-icon>
                    <h1 class="mb-6 text-white">Bienvenido!</h1>
                    <p
                        class="xl:w-3/4 lg:w-4/5 md:w-2/3 w-4/5 mx-auto text-white"
                    >
                        Sistema de notificación Tecnovigilancia -
                        <strong>Hospital San Juan de Dios</strong>.
                    </p>
                </vx-card>
            </div>
            <div class="vx-col w-full lg:w-1/4 mb-base"></div>
        </div>
        <div class="vx-row">
            <div class="vx-col w-full lg:w-1/4 mb-base"></div>
            <div class="vx-col w-full lg:w-1/2 mb-base">
                <vx-card title="Manual Rápido">
                    <ul class="activity-timeline">
                        <li>
                            <div class="timeline-icon bg-primary">
                                <feather-icon
                                    icon="LayoutIcon"
                                    svgClasses="text-white stroke-current w-5 h-5"
                                ></feather-icon>
                            </div>
                            <div class="timeline-info">
                                <p class="font-semibold">Menú</p>
                                <span class="activity-desc"
                                    >Encontrarás el acceso a la pantalla de
                                    Inicio, al formulario de Registro y
                                    visualización de datos</span
                                >
                            </div>
                            <small class="text-grey activity-e-time"></small>
                        </li>
                        <li>
                            <div class="timeline-icon bg-warning">
                                <feather-icon
                                    icon="PlusSquareIcon"
                                    svgClasses="text-white stroke-current w-5 h-5"
                                ></feather-icon>
                            </div>
                            <div class="timeline-info">
                                <p class="font-semibold">Nuevo Registro</p>
                                <span class="activity-desc"
                                    >Te dará acceso al formulario de nuevo
                                    registro, en el tendrás que detallar la
                                    información del Dispositivo Medico y de su
                                    Fabricante, Importador y/o Distribuidor,
                                    entre otros.</span
                                >
                            </div>
                            <small class="text-grey activity-e-time"></small>
                        </li>
                        <li>
                            <div class="timeline-icon bg-danger">
                                <feather-icon
                                    icon="LoaderIcon"
                                    svgClasses="text-white stroke-current w-5 h-5"
                                ></feather-icon>
                            </div>
                            <div class="timeline-info">
                                <p class="font-semibold">Visualizar Datos</p>
                                <span class="activity-desc"
                                    >En esta sección podrás visulizar toda la
                                    infromación ya ingresada anteriormente.
                                    Ademas de porder cambiar el estado de esta,
                                    pudiendo habilitar, deshabilitar, modificar
                                    o eliminar</span
                                >
                            </div>
                            <small class="text-grey activity-e-time"></small>
                        </li>
                    </ul>
                </vx-card>
            </div>
            <div class="vx-col w-full lg:w-1/4 mb-base"></div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import router from "../router";
export default {
    data() {
        return {
            solicitudes: [],
            localVal: "http://127.0.0.1:8000"
        };
    },
    methods: {
        traerData() {
            axios.get(this.localVal + "/api/Usuario/GetUsuarios").then(res => {
                this.solicitudes = res.data;
                console.log(this.solicitudes);
            });
        }
    }
};
</script>
