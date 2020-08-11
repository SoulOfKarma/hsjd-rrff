<template>
    <div>
        <h4>
            <vs-divider>Solicitud N° "???"</vs-divider>
        </h4>
        <vs-card fixedHeight>
            <vs-list>
                <vs-list-item title="A" subtitle="A little text"></vs-list-item>
            </vs-list>
        </vs-card>
        <br />
        <vs-card fixedHeight>
            <br />
            <vs-textarea label="Actualizar seguimiento" v-model="textarea" />
            <vs-button type="gradient">Actualizar</vs-button>
        </vs-card>

        <vs-card>
            <vs-list>
                <vs-list-item title="Usuario X" subtitle="AAAA"></vs-list-item>
                <vs-list-item title="Usuario A" subtitle="BBBB"></vs-list-item>
                <vs-list-item title="Usuario C" subtitle="VVVVV"></vs-list-item>
                <vs-list-item title="Usuario X" subtitle="BBBBB"></vs-list-item>
            </vs-list>
        </vs-card>
    </div>
</template>

<script>
import axios from "axios";
import router from "../router";

export default {
    data: () => ({
        textarea: "",
        value2: "Titulo Imaginario",
        solicitudes: [],
        localVal: "http://127.0.0.1:8000"
    }),
    methods: {
        cargaSolicitudEspecifica() {
            let id = this.$route.params.id;
            axios
                .get(this.localVal + `/api/Usuario/TraerSolicitud/${id}`)
                .then(res => {
                    this.solicitudes = res.data;
                    console.log(this.solicitudes);
                });
        }
    },
    beforeMount() {
        this.cargaSolicitudEspecifica();
    }
};
</script>
