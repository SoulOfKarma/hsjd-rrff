<template>
    <div>
        <h4>
            <vs-divider>Solicitud N° {{ solicitudes.id }}</vs-divider>
        </h4>
        <vs-card fixedHeight>
            <vs-list>
                <vs-list-item
                    :title="solicitudes.tituloP"
                    :subtitle="solicitudes.descripcionP"
                ></vs-list-item>
            </vs-list>
        </vs-card>
        <br />
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
import router from "../router";

export default {
    data: () => ({
        solicitudes: [],
        seguimiento: [],
        localVal: "http://127.0.0.1:8000",
        seguimientos: {
            descripcionSeguimiento: "",
            id_user: 2
        }
    }),
    methods: {
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
        },
        guardarSeguimiento() {
            let uuid = this.$route.params.uuid;
            console.log(uuid);
            if (this.seguimientos.descripcionSeguimiento.trim() === "") {
                alert("Debes completar todos los campos antes de guardar");
                return;
            }
            const seguimientoNuevo = this.seguimientos;
            this.seguimientos = {
                descripcionSeguimiento: "",
                id_user: 2
            };
            axios
                .post(
                    this.localVal + `/api/Usuario/GuardarSeguimiento/${uuid}`,
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
