<template>
    <div>
        <h4>
            <vs-divider>Listado de Solicitudes</vs-divider>
        </h4>
        <vs-table :data="solicitudes">
            <template slot="thead">
                <vs-th>N° Solicitud</vs-th>
                <vs-th>Persona Solicitante</vs-th>
                <vs-th>Titulo</vs-th>
                <vs-th>Descripcion</vs-th>
                <vs-th>Ver mas detalles</vs-th>
            </template>

            <template slot-scope="{ data }">
                <vs-tr :key="indextr" v-for="(tr, indextr) in data">
                    <vs-td :data="data[indextr].id">
                        {{ data[indextr].id }}
                    </vs-td>

                    <vs-td :data="data[indextr].id_user">
                        {{ data[indextr].id_user }}
                    </vs-td>

                    <vs-td :data="data[indextr].tituloP">
                        {{ data[indextr].tituloP }}
                    </vs-td>

                    <vs-td :data="data[indextr].descripcionP">
                        {{ data[indextr].descripcionP }}
                    </vs-td>
                    <vs-td :data="data[indextr].id">
                        <vs-button
                            color="warning"
                            class="mb-2"
                            @click="
                                detalleSolicitud(
                                    data[indextr].id,
                                    data[indextr].uuid
                                )
                            "
                            >Ir</vs-button
                        >
                    </vs-td>
                </vs-tr>
            </template>
        </vs-table>
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
        cargarSolicitudes() {
            axios.get(this.localVal + "/api/Usuario/GetSolicitud").then(res => {
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
