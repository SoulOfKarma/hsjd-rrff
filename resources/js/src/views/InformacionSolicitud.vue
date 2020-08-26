<template>
    <vs-row>
        <div class="vx-col md:w-1/1 w-full mb-base">
            <vx-card :title="titulo" code-toggler>
                <div class="vx-row mb-12">
                    <div class="vx-col w-full ">
                        <vs-list>
                            <vs-list-item
                                :title="solicitudes.tituloP"
                                :subtitle="solicitudes.descripcionP"
                            ></vs-list-item>
                        </vs-list>
                    </div>
                </div>
            </vx-card>
        </div>
        <div class="vx-col md:w-1/1 w-full mb-base">
            <vx-card title="Actualizar Seguimiento" code-toggler>
                <div class="vx-row mb-12">
                    <div class="vx-col w-full mt-5">
                        <vs-textarea
                            label="Actualizar seguimiento"
                            v-model="seguimientos.descripcionSeguimiento"
                        />
                        <vs-button type="gradient" @click="guardarSeguimiento"
                            >Actualizar</vs-button
                        >
                        <vs-button type="gradient" @click="probando"
                            >Probando</vs-button
                        >
                        <br />
                    </div>
                </div>
            </vx-card>
        </div>
        <div class="vx-col md:w-1/1 w-full mb-base">
            <vx-card title="Respuestas Seguimiento" code-toggler>
                <div class="vx-row">
                    <div class="vx-col sm:w-full w-full">
                        <vs-list
                            :key="indextr"
                            v-for="(tr, indextr) in seguimiento"
                        >
                            <vs-list-item
                                :title="tr.nombre"
                                :subtitle="tr.descripcionSeguimiento"
                            ></vs-list-item>
                        </vs-list>
                    </div>
                </div>
            </vx-card>
        </div>
    </vs-row>
</template>

<script>
import axios from "axios";
import router from "../router";

export default {
    data: () => ({
        solicitudes: [],
        seguimiento: [],
        localVal: "http://127.0.0.1:8000",
        titulo: "",
        seguimientos: {
            descripcionSeguimiento: "",
            id_solicitud: 0,
            uuid: "",
            nombre: localStorage.getItem("nombre"),
            id_user: localStorage.getItem("id")
        }
    }),
    methods: {
        cargaSolicitudEspecifica() {
            let id = this.$route.params.id;
            axios
                .get(this.localVal + `/api/Usuario/TraerSolicitud/${id}`)
                .then(res => {
                    this.solicitudes = res.data;
                    this.titulo = "Seguimiento Ticket N°" + this.solicitudes.id;
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
        probando() {
            console.log(this.seguimientos);
        },
        guardarSeguimiento() {
            let uuid = this.$route.params.uuid;
            console.log(uuid);
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
            } else {
                /* var aux = localStorage.getItem("nombre");
        this.seguimientos.nombre = aux; */
                var id = this.solicitudes.id;
                this.seguimientos.id = id;
                this.seguimientos.uuid = uuid;
                /* var iduser = localStorage.getItem("id");
        this.seguimientos.id_user = iduser; */
                const seguimientoNuevo = this.seguimientos;
                this.seguimientos = {
                    descripcionSeguimiento: "",
                    id_solicitud: this.$route.params.id,
                    uuid: this.$route.params.uuid,
                    nombre: localStorage.getItem("nombre"),
                    id_user: localStorage.getItem("id")
                };
                axios
                    .post(
                        this.localVal +
                            `/api/Usuario/GuardarSeguimiento/${uuid}`,
                        seguimientoNuevo
                    )
                    .then(res => {
                        const seguimientoServer = res.data;
                        this.cargaSeguimiento();
                    });
            }
        }
    },
    beforeMount() {
        this.cargaSolicitudEspecifica();
        this.cargaSeguimiento();
    }
};
</script>
