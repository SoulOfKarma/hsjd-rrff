<template>
    <div>
        <h4>
            <vs-divider>Solicitud N° "???"</vs-divider>
        </h4>
        <vs-row vs-justify="center">
            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6">
                <vs-card class="cardx" color="primary" type="border">
                    <div>
                        <vs-input
                            icon-no-border
                            icon="account_circle"
                            size="normal"
                            label-placeholder="Usuario Solicitante"
                            v-model="value1"
                            disabled="true"
                            fixed-height
                        />
                        <br />
                        <vs-input
                            label-placeholder="Anexo"
                            icon-no-border
                            icon="account_circle"
                            size="normal"
                            v-model="value1"
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
                            label-placeholder="Edificio"
                            icon-no-border
                            icon="account_circle"
                            size="normal"
                            v-model="value1"
                            disabled="true"
                            fixed-height
                        />
                        <br />
                        <vs-input
                            label-placeholder="Servicio"
                            icon-no-border
                            icon="account_circle"
                            size="normal"
                            v-model="value1"
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
import router from "../../router";
export default {
    data: () => ({
        textarea: "",
        value1: "Valor Existente Nulo"
    }),
    methods: {
        asignarSolicitud() {
            router.push("/agenteView/FormularioAsignar");
        },
        modificarSolicitud() {
            router.push("/agenteView/FormularioModificar");
        }
    }
};
</script>

<style lang="stylus">
.cardx
  margin 15px
</style>
