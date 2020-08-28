<template>
    <div>
        <vx-card title="1. Listado de Tickets" code-toggler>
            <vs-alert active="true" color="success">
                Agente:
                {{ nombre }} - {{ run }}
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

                        <vs-td
                            :data="data[indextr].descripcionP"
                            v-html="data[indextr].descripcionP"
                            >{{ data[indextr].descripcionP }}</vs-td
                        >
                        <vs-td :data="data[indextr].descripcionP">{{
                            data[indextr].descripcionEstado
                        }}</vs-td>
                        <vs-td :data="data[indextr].id">
                            <info-icon
                                size="1.5x"
                                class="custom-class"
                                @click="
                                    detalleSolicitud(
                                        data[indextr].id,
                                        data[indextr].uuid
                                    )
                                "
                            ></info-icon>
                            <plus-circle-icon
                                size="1.5x"
                                class="custom-class"
                                @click="
                                    asignarSolicitud(
                                        data[indextr].id,
                                        data[indextr].uuid
                                    )
                                "
                            ></plus-circle-icon>
                            <upload-icon
                                size="1.5x"
                                class="custom-class"
                                @click="
                                    modificarSolicitud(
                                        data[indextr].id,
                                        data[indextr].uuid
                                    )
                                "
                            ></upload-icon>

                            <trash-2-icon
                                size="1.5x"
                                class="custom-class"
                                @click="
                                    abrirPop(
                                        data[indextr].id,
                                        data[indextr].uuid
                                    )
                                "
                            ></trash-2-icon>
                        </vs-td>
                    </vs-tr>
                </template>
            </vs-table>
        </vx-card>
        <vs-popup
            classContent="popup-example"
            title="Realmente desea eliminar el ticket?"
            :active.sync="popupActive2"
        >
            <vs-input
                class="inputx mb-3"
                placeholder="Placeholder"
                v-model="value1"
                hidden
            />
            <vs-input
                disabled
                class="inputx mb-3"
                placeholder="Disabled"
                v-model="value2"
                hidden
            />
            <div class="vx-col md:w-1/1 w-full mb-base">
                <div class="vx-row">
                    <div class="vx-col sm:w-1/2 w-full ">
                        <vs-button
                            @click="
                                eliminarSolicitud(
                                    value1,
                                    value2,
                                    validaEliminar
                                )
                            "
                            color="danger"
                            type="filled"
                            >Eliminar</vs-button
                        >
                    </div>
                    <div class="vx-col sm:w-1/2 w-full ">
                        <vs-button
                            @click="popupActive2 = false"
                            color="primary"
                            type="filled"
                            >Volver</vs-button
                        >
                    </div>
                </div>
            </div>
        </vs-popup>
    </div>
</template>

<script>
import axios from "axios";
import router from "@/router";
import { InfoIcon } from "vue-feather-icons";
import { PlusCircleIcon } from "vue-feather-icons";
import { Trash2Icon } from "vue-feather-icons";
import { UploadIcon } from "vue-feather-icons";

export default {
    components: {
        InfoIcon,
        PlusCircleIcon,
        Trash2Icon,
        UploadIcon
    },
    data() {
        return {
            value1: "",
            value2: "",
            validaEliminar: false,
            popupActive2: false,
            solicitudes: [],
            localVal: "http://127.0.0.1:8000",
            nombre: localStorage.getItem("nombre"),
            run: localStorage.getItem("run")
        };
    },
    methods: {
        abrirPop(id, uuid) {
            this.validaEliminar = true;
            this.value1 = id;
            this.value2 = uuid;
            this.popupActive2 = true;
        },

        cargarSolicitudes() {
            axios
                .get(this.localVal + "/api/Agente/GetSolicitudTickets")
                .then(res => {
                    this.solicitudes = res.data;
                });
        },
        detalleSolicitud(id, uuid) {
            this.$router.push({
                name: "InformacionSolicitudAgente",
                params: {
                    id: `${id}`,
                    uuid: `${uuid}`
                }
            });
        },
        asignarSolicitud(id, uuid) {
            // router.push(`/agenteView/FormularioAsignar/${id}`);
            axios
                .get(this.localVal + `/api/Agente/ValidarTicketAsignado/${id}`)
                .then(res => {
                    if (res.data) {
                        this.$vs.notify({
                            title: "Ticket ya asignado ",
                            text:
                                "Si necesita modificarlo vaya a Modificar Ticket ",
                            color: "danger",
                            position: "top-right"
                        });
                    } else {
                        this.$router.push({
                            name: "AsignarSolicitudAgente",
                            params: {
                                id: `${id}`,
                                uuid: `${uuid}`
                            }
                        });
                    }
                });
        },
        modificarSolicitud(id, uuid) {
            //router.push(`/agenteView/FormularioModificar/${id}`);
            axios
                .get(
                    this.localVal + `/api/Agente/ValidarTicketAsignadoMod/${id}`
                )
                .then(res => {
                    if (res.data) {
                        this.$vs.notify({
                            title: "Ticket no ha sido asignado ",
                            text:
                                "Ticket necesita ya estar asignado primero para modificarlo ",
                            color: "danger",
                            position: "top-right"
                        });
                    } else {
                        this.$router.push({
                            name: "ModificarSolicitudAgente",
                            params: {
                                id: `${id}`,
                                uuid: `${uuid}`
                            }
                        });
                    }
                });
        },
        eliminarSolicitud(id, uuid, eliminar) {
            console.log("llega?");
            console.log(eliminar);
            if (eliminar) {
                axios
                    .get(this.localVal + `/api/Agente/destroyTicket/${id}`)
                    .then(res => {
                        var eliminado = res.data;
                        this.popupActive2 = false;
                        if (eliminado) {
                            this.$vs.notify({
                                title: "Ticket Eliminado ",
                                text: "Se recargara el listado ",
                                color: "danger",
                                position: "top-right"
                            });
                            this.cargarSolicitudes();
                        }
                    });
            }
        }
    },
    beforeMount() {
        this.cargarSolicitudes();
    }
};
</script>
