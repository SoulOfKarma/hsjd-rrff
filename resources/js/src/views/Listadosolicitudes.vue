<template>
    <div>
        <vx-card title="Listado de Tickets" code-toggler>
            <vs-alert active="true" color="success">
                Listado de tickets creados por: {{ nombre }} - {{ run }}
            </vs-alert>

            <vs-table search :data="solicitudes" max-items="5" pagination>
                <template slot="thead">
                    <vs-th>N° Solicitud</vs-th>
                    <vs-th>Persona Solicitante</vs-th>
                    <vs-th>Titulo</vs-th>
                    <vs-th>Descripcion</vs-th>
                    <vs-th>Estado</vs-th>
                    <vs-th>Opciones Ticket</vs-th>
                </template>

                <template slot-scope="{ data }">
                    <vs-tr :key="indextr" v-for="(tr, indextr) in data">
                        <vs-td :data="data[indextr].id">{{
                            data[indextr].nticket
                        }}</vs-td>

                        <vs-td :data="data[indextr].id_user">{{
                            data[indextr].nombre
                        }}</vs-td>

                        <vs-td :data="data[indextr].tituloP">{{
                            data[indextr].tituloP
                        }}</vs-td>

                        <vs-td :data="data[indextr].descripcionP">{{
                            data[indextr].descripcionP
                        }}</vs-td>
                        <vs-td :data="data[indextr].descripcionP">{{
                            data[indextr].descripcionEstado
                        }}</vs-td>
                        <vs-td :data="data[indextr].id">
                            <vs-button
                                size="small"
                                type="border"
                                color="success"
                                class="mb-2"
                                @click="
                                    detalleSolicitud(
                                        data[indextr].id,
                                        data[indextr].uuid
                                    )
                                "
                                >Ir</vs-button
                            >
                            <vs-button
                                size="small"
                                type="border"
                                color="warning"
                                class="mb-2"
                                >Modificar</vs-button
                            >
                            <vs-button
                                size="small"
                                type="border"
                                color="danger"
                                class="mb-2"
                                >Eliminar</vs-button
                            >
                        </vs-td>
                        <vs-td :data="data[indextr].id"> </vs-td>
                    </vs-tr>
                </template>
            </vs-table>
        </vx-card>
    </div>
</template>

<script>
import axios from "axios";
import router from "../router";

export default {
    data() {
        return {
            solicitudes: [],
            localVal: "http://127.0.0.1:8000",
            nombre: localStorage.getItem("nombre"),
            run: localStorage.getItem("run")
        };
    },
    methods: {
        cargarSolicitudes() {
            axios.get(this.localVal + "/api/Usuario/GetUsuarios").then(res => {
                this.solicitudes = res.data;
            });
        },
        detalleSolicitud(id, uuid) {
            this.$router.push({
                name: "InformacionSolicitud",
                params: {
                    id: `${id}`,
                    uuid: `${uuid}`
                }
            });
        }
    },
    beforeMount() {
        this.cargarSolicitudes();
    }
};
</script>
