<template>
    <div>
        <h4>
            <vs-divider>Solicitud N° {{ solicitudes.id }}</vs-divider>
        </h4>
        <vs-row vs-justify="center">
            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6">
                <vs-card class="cardx" color="primary" type="border">
                    <div>
                        <vs-input
                            label-placeholder="Usuario Solicitante"
                            v-model="solicitudes.id_user"
                            disabled="true"
                            fixed-height
                        />
                        <br />
                        <vs-input
                            label-placeholder="Edificio"
                            v-model="solicitudes.id_edificio"
                            disabled="true"
                            fixed-height
                        />
                    </div>
                </vs-card>
            </vs-col>
            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6">
                <vs-card class="cardx" color="dark" type="border">
                    <div>
                        <vs-input
                            label-placeholder="Servicio"
                            v-model="solicitudes.id_servicio"
                            disabled="true"
                            fixed-height
                        />
                        <br />
                        <vs-input
                            label-placeholder="Unidad Especifica"
                            v-model="solicitudes.id_ubicacionEx"
                            disabled="true"
                            fixed-height
                        />
                    </div>
                </vs-card>
            </vs-col>
        </vs-row>
        <vs-card>
            <vs-button color="success" type="filled" @click="asignarSolicitud"
                >Asignar Solicitud</vs-button
            >
            <vs-button color="warning" type="filled" @click="modificarSolicitud"
                >Modificar Solicitud</vs-button
            >
        </vs-card>
        <h4>
            <vs-divider>Actualizar Informacion de la solicitud</vs-divider>
        </h4>
        <vs-card fixedHeight>
            <br />
            <vs-textarea label="Actualizar seguimiento" v-model="textarea" />
            <vs-button type="gradient">Actualizar</vs-button>
        </vs-card>

        <vs-card>
            <template>
                <vs-list :key="indextr" v-for="(tr, indextr) in seguimiento">
                    <vs-list-item
                        :title="tr.id_user.toString()"
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
            id_user: 1
        }
    }),
    methods: {
        asignarSolicitud() {
            router.push("/agenteView/FormularioAsignar");
        },
        modificarSolicitud() {
            router.push("/agenteView/FormularioModificar");
        },
        cargaSolicitudEspecifica() {
            let id = this.$route.params.id;
            axios
                .get(this.localVal + `/api/Usuario/TraerSolicitud/${id}`)
                .then(res => {
                    this.solicitudes = res.data;
                });
        },
        cargaSeguimiento() {
            let uuid = this.$route.params.uuid;
            axios
                .get(this.localVal + `/api/Usuario/TraerSeguimiento/${uuid}`)
                .then(res => {
                    this.seguimiento = res.data;
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
