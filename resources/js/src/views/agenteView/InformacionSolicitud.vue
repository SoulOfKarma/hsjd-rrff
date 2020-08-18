<template>
    <div>
        <div :key="index" v-for="(i, index) in solicitudes">
            <h4>
                <vs-divider>Ticket N° {{ i.id }}</vs-divider>
            </h4>
            <vs-row vs-justify="center">
                <vs-col
                    type="flex"
                    vs-justify="center"
                    vs-align="center"
                    vs-w="6"
                >
                    <vs-card class="cardx" color="primary" type="border">
                        <div>
                            <vs-input
                                label-placeholder="Usuario Solicitante"
                                v-model="i.nombre"
                                disabled="true"
                                fixed-height
                            />
                            <br />
                            <vs-input
                                label-placeholder="Edificio"
                                v-model="i.descripcionEdificio"
                                disabled="true"
                                fixed-height
                            />
                        </div>
                    </vs-card>
                </vs-col>
                <vs-col
                    type="flex"
                    vs-justify="center"
                    vs-align="center"
                    vs-w="6"
                >
                    <vs-card class="cardx" color="dark" type="border">
                        <div>
                            <vs-input
                                label-placeholder="Servicio"
                                v-model="i.descripcionServicio"
                                disabled="true"
                                fixed-height
                            />
                            <br />
                            <vs-input
                                label-placeholder="Unidad Especifica"
                                v-model="i.descripcionUnidadEsp"
                                disabled="true"
                                fixed-height
                            />
                        </div>
                    </vs-card>
                </vs-col>
            </vs-row>
        </div>

        <vs-card>
            <vs-button color="success" type="filled" @click="asignarSolicitud"
                >Asignar Ticket</vs-button
            >
            <vs-button color="warning" type="filled" @click="modificarSolicitud"
                >Modificar Ticket</vs-button
            >
        </vs-card>
        <h4>
            <vs-divider>Actualizar Informacion de la solicitud</vs-divider>
        </h4>
        <vs-card fixedHeight>
            <br />
            <vs-textarea
                label="Actualizar seguimiento"
                v-model="seguimientos.descripcionSeguimiento"
            />
            <vs-button type="gradient" @click="guardarSeguimiento"
                >Actualizar</vs-button
            >
        </vs-card>

        <vs-card>
            <template>
                <vs-list :key="indextr" v-for="(tr, indextr) in seguimiento">
                    <vs-list-item
                        :title="tr.nombre"
                        :subtitle="tr.descripcionSeguimiento"
                    ></vs-list-item>
                </vs-list>
            </template>
        </vs-card>
    </div>
</template>

<script>
import axios from "axios";
import router from "../../router";
export default {
    data: () => ({
        textarea: "",
        value1: "Valor Existente Nulo",
        localVal: "http://127.0.0.1:8000",
        solicitudes: [],
        seguimiento: [],

        seguimientos: {
            descripcionSeguimiento: "",
            id: 0,
            nombre: "",
            id_user: 0
        }
    }),
    methods: {
        asignarSolicitud() {
            let id = this.$route.params.id;
            let uuid = this.$route.params.uuid;
            // router.push(`/agenteView/FormularioAsignar/${id}`);
            axios
                .get(this.localVal + `/api/Agente/GetTicketAsignado/${uuid}`)
                .then(res => {
                    if (res.data.length > 0) {
                        this.$vs.notify({
                            title: "Ticket ya asignado ",
                            text:
                                "Si necesita modificarlo vaya a Modificar Ticket ",
                            color: "danger",
                            position: "top-right",
                            fixed: true
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
        modificarSolicitud() {
            let id = this.$route.params.id;
            let uuid = this.$route.params.uuid;
            //router.push(`/agenteView/FormularioModificar/${id}`);
            this.$router.push({
                name: "ModificarSolicitudAgente",
                params: {
                    id: `${id}`,
                    uuid: `${uuid}`
                }
            });
        },
        cargaSolicitudEspecifica() {
            let id = this.$route.params.uuid;
            axios
                .get(this.localVal + `/api/Agente/TraerSolicitud/${id}`)
                .then(res => {
                    this.solicitudes = res.data;
                });
        },
        cargaSeguimiento() {
            let uuid = this.$route.params.uuid;
            axios
                .get(this.localVal + `/api/Agente/TraerSeguimiento/${uuid}`)
                .then(res => {
                    this.seguimiento = res.data;
                });
        },
        guardarSeguimiento() {
            let uuid = this.$route.params.uuid;

            if (
                this.seguimientos.descripcionSeguimiento.trim() === "" ||
                this.seguimientos.descripcionSeguimiento < 15
            ) {
                this.$vs.notify({
                    title: "Error en la descripcion",
                    text: "Esta vacio o no supera los 15 caracteres",
                    color: "danger",
                    position: "top-right",
                    fixed: true
                });
                return;
            }
            var aux = localStorage.getItem("nombre");
            this.seguimientos.nombre = aux;
            var id = this.solicitudes[0].id;
            this.seguimientos.id = id;
            var iduser = localStorage.getItem("id");
            this.seguimientos.id_user = iduser;
            const seguimientoNuevo = this.seguimientos;
            this.seguimientos = {
                descripcionSeguimiento: "",
                id: 0,
                nombre: "",
                id_user: 0
            };
            axios
                .post(
                    this.localVal + `/api/Agente/GuardarSeguimiento/${uuid}`,
                    seguimientoNuevo
                )
                .then(res => {
                    const seguimientoServer = res.data;
                    this.cargaSeguimiento();
                });
        }
    },
    beforeMount() {
        this.cargaSolicitudEspecifica();
        this.cargaSeguimiento();
    }
};
</script>

<style lang="stylus">
.cardx
  margin 15px
</style>
