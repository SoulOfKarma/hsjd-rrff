<template>
    <div>
        <h4>
            <vs-divider>Crear Solicitud</vs-divider>
        </h4>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <h3>Usuario Solicitante : {{ name }}</h3>
            </div>
        </div>
        <h4>
            <vs-divider>Lugar del problema</vs-divider>
        </h4>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    class="w-full select-large"
                    label="Edificio"
                    v-model="solicitud.idEdificio"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.descripcionEdificio"
                        v-for="(item, index) in listadoEdificios"
                        class="w-full"
                    />
                </vs-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    class="w-full select-large"
                    label="Servicio"
                    v-model="solicitud.idServicio"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.descripcionServicio"
                        v-for="(item, index) in listadoServicios"
                        class="w-full"
                    />
                </vs-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    class="w-full select-large"
                    label="Unidad Especifica"
                    v-model="solicitud.idUnidadEsp"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.descripcionUnidadEsp"
                        v-for="(item, index) in listadoUnidadEsp"
                        class="w-full"
                    />
                </vs-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    class="w-full select-large"
                    label="Tipo de Reparacion"
                    v-model="solicitud.idTipoRep"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.descripcionTipoReparacion"
                        v-for="(item, index) in listadoTipoRep"
                        class="w-full"
                    />
                </vs-select>
            </div>
        </div>

        <h4>
            <vs-divider>Informacion del Problema</vs-divider>
        </h4>
        <div class="vx-row">
            <div class="vx-col w-full mt-5">
                <vs-input
                    label="Titulo problema"
                    placeholder="Ej. Falla de red en equipo x"
                    v-model="solicitud.valorTitulo"
                />

                <br />
                <vs-textarea
                    label="Descripcion de la problematica"
                    v-model="solicitud.areaT"
                />
            </div>
        </div>

        <br />

        <div class="vx-row">
            <div class="vx-col w-full">
                <vs-button class="mr-3 mb-2" @click="guardarSolicitud"
                    >Enviar</vs-button
                >
                <vs-button color="warning" class="mb-2">Limpiar</vs-button>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import flatPickr from "vue-flatpickr-component";
import "flatpickr/dist/flatpickr.css";
import { FormWizard, TabContent } from "vue-form-wizard";
import "vue-form-wizard/dist/vue-form-wizard.min.css";
import axios from "axios";

export default {
    data: () => ({
        listadoEdificios: [],
        listadoServicios: [],
        listadoUnidadEsp: [],
        listadoTipoRep: [],
        localVal: "http://127.0.0.1:8000",
        name: "Rick S.",
        solicitud: {
            areaT: "",
            valorTitulo: "",
            idEdificio: 0,
            idServicio: 0,
            idUnidadEsp: 0,
            idTipoRep: 0
        },
        city: "Seleccione Edificio"
    }),
    computed: {
        csrf_token() {
            let token = document.head.querySelector('meta[name="csrf-token"]');
            return token.content;
        }
    },
    methods: {
        cargarEdificios() {
            this.csrf_token;

            axios.get(this.localVal + "/api/Usuario/GetEdificios").then(res => {
                this.listadoEdificios = res.data;
            });
        },
        cargarServicios() {
            this.csrf_token;

            axios.get(this.localVal + "/api/Usuario/GetServicios").then(res => {
                this.listadoServicios = res.data;
            });
        },
        cargarUnidadEsp() {
            this.csrf_token;

            axios.get(this.localVal + "/api/Usuario/GetUnidadEsp").then(res => {
                this.listadoUnidadEsp = res.data;
            });
        },
        cargarTipoRep() {
            this.csrf_token;

            axios.get(this.localVal + "/api/Usuario/GetTipoRep").then(res => {
                this.listadoTipoRep = res.data;
            });
        },
        guardarSolicitud() {
            if (
                this.solicitud.areaT.trim() === "" ||
                this.solicitud.valorTitulo.trim() === ""
            ) {
                alert("Debes completar todos los campos antes de guardar");
                return;
            }
            const solicitudNueva = this.solicitud;
            this.solicitud = {
                areaT: "",
                valorTitulo: "",
                idEdificio: 0,
                idServicio: 0,
                idUnidadEsp: 0,
                idTipoRep: 0
            };
            console.log(solicitudNueva);
            axios
                .post(
                    this.localVal + "/api/Usuario/PostSolicitud",
                    solicitudNueva
                )
                .then(res => {
                    const solicitudServer = res.data;
                    console.log("Data Enviada y guardada");
                });
        }
    },
    beforeMount() {
        this.cargarEdificios();
        this.cargarServicios();
        this.cargarUnidadEsp();
        this.cargarTipoRep();
    }
};
</script>

<style lang="stylus">
.examplex
  display: flex;
  align-items: center;
  justify-content: center;
  button
    margin: 0px !important;
    &.btnx
      margin-left: 10px !important;
      border-radius: 5px 0px 0px 5px;
    &.btn-drop
      border-radius: 0px 5px 5px 0px;
      border-left: 1px solid rgba(255, 255, 255,.2);
      .cardx {
  margin: 15px;
}
</style>
