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
                <v-select
                    v-model="seleccionEdificio"
                    placeholder="Seleccione Edificio"
                    class="w-full select-large"
                    label="descripcionEdificio"
                    :options="listadoEdificios"
                >
                </v-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <v-select
                    v-model="seleccionServicio"
                    placeholder="Seleccione Servicio"
                    class="w-full select-large"
                    label="descripcionServicio"
                    :options="listadoServicios"
                    @input="cargaSegunServicio"
                >
                </v-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <v-select
                    v-model="seleccionUnidadEsp"
                    placeholder="Seleccione Unidad Especifica"
                    class="w-full select-large"
                    label="descripcionUnidadEsp"
                    :options="listadoUnidadEsp"
                    @input="cargaSegunUnidadEsp"
                >
                </v-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <v-select
                    v-model="seleccionReparacion"
                    placeholder="Seleccione Tipo de Reparacion"
                    class="w-full select-large"
                    label="descripcionTipoReparacion"
                    :options="listadoTipoRep"
                >
                </v-select>
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
                <vs-button color="warning" class="mb-2" @click="probando"
                    >Limpiar</vs-button
                >
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
import vSelect from "vue-select";

export default {
    data: () => ({
        listadoEdificios: [],
        listadoServicios: [],
        listadoUnidadEsp: [],
        listadoTipoRep: [],
        listadoCorreo: [],
        localVal: "http://127.0.0.1:8000",
        uuidC: "",
        name: localStorage.getItem("nombre"),
        solicitud: {
            areaT: "",
            valorTitulo: "",
            idEdificio: 0,
            idServicio: 0,
            idUnidadEsp: 0,
            idTipoRep: 0
        },
        datosCorreo: {
            nombre: "",
            descripcionP: "",
            id: 0
        },
        seleccionEdificio: {
            id: 0,
            descripcionEdificio: "Seleccione Edificio"
        },
        seleccionServicio: {
            id: 0,
            descripcionServicio: "Seleccione Servicio"
        },
        seleccionUnidadEsp: {
            id: 0,
            descripcionUnidadEsp: "Seleccione Unidad Especifica"
        },
        seleccionReparacion: {
            id: 0,
            descripcionTipoReparacion: "Seleccione Tipo de Reparacion"
        }
    }),
    computed: {
        csrf_token() {
            let token = document.head.querySelector('meta[name="csrf-token"]');
            return token.content;
        }
    },
    methods: {
        cargaSegunUnidadEsp() {
            var idGeneral = this.seleccionUnidadEsp.id;

            let c = this.listadoUnidadEsp;
            let b = [];
            var a = 0;

            c.forEach((value, index) => {
                a = value.id;
                if (a == idGeneral) {
                    b.push(value);
                }
            });
            this.seleccionUnidadEsp = b;
            idGeneral = 0;
            idGeneral = this.seleccionUnidadEsp[0].id_servicio;
            b = [];

            c = this.listadoServicios;

            c.forEach((value, index) => {
                a = value.id;
                if (a == idGeneral) {
                    b.push(value);
                }
            });

            this.seleccionServicio = b;
            idGeneral = 0;
            idGeneral = this.seleccionServicio[0].id_edificio;
            b = [];
            c = this.listadoEdificios;

            c.forEach((value, index) => {
                a = value.id;
                if (a == idGeneral) {
                    b.push(value);
                }
            });

            this.seleccionEdificio = b;
        },
        cargaSegunServicio() {
            var idGeneral = this.seleccionServicio.id;

            let c = this.listadoServicios;
            let b = [];
            var a = 0;

            c.forEach((value, index) => {
                a = value.id;
                if (a == idGeneral) {
                    b.push(value);
                }
            });
            this.seleccionServicio = b;
            idGeneral = 0;
            idGeneral = this.seleccionServicio[0].id_edificio;
            b = [];

            c = this.listadoEdificios;

            c.forEach((value, index) => {
                a = value.id;
                if (a == idGeneral) {
                    b.push(value);
                }
            });

            this.seleccionEdificio = b;
        },
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
        errorDrop(mensajeError) {
            this.$vs.notify({
                title: "Falto seleccionar " + mensajeError,
                text: "Seleccione " + mensajeError,
                color: "danger",
                position: "top-right",
                fixed: true
            });
        },
        errorTitulo(mensajeError) {
            this.$vs.notify({
                title: mensajeError,
                text: "Debe escribir un titulo superior a 10 caracteres",
                color: "danger",
                position: "top-right",
                fixed: true
            });
        },
        errorDescripcion(mensajeError) {
            this.$vs.notify({
                title: mensajeError,
                text: "Debe escribir una descripcion superior a 15 caracteres",
                color: "danger",
                position: "top-right",
                fixed: true
            });
        },
        guardarSolicitud() {
            if (
                this.solicitud.areaT.trim() === "" ||
                this.solicitud.areaT.length < 15
            ) {
                this.mensajeError =
                    "La descripcion no supera los 15 caracteres";
                this.errorDescripcion(this.mensajeError);
            } else if (
                this.solicitud.valorTitulo.trim() === "" ||
                this.solicitud.valorTitulo.length < 10
            ) {
                this.mensajeError = "el titulo no supera los 10 caracteres";
                this.errorTitulo(this.mensajeError);
            } else if (this.seleccionEdificio.id == 0) {
                this.mensajeError = "el Edificio";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionServicio.id == 0) {
                this.mensajeError = "el servicio";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionUnidadEsp.id == 0) {
                this.mensajeError = "la Unidad especifica";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionReparacion.id == 0) {
                this.mensajeError = "el tipo de reparacion";
                this.errorDrop(this.mensajeError);
            } else {
                this.solicitud.idEdificio = this.seleccionEdificio[0].id;
                this.solicitud.idServicio = this.seleccionServicio[0].id;
                this.solicitud.idUnidadEsp = this.seleccionUnidadEsp[0].id;
                this.solicitud.idTipoRep = this.seleccionReparacion.id;
                const solicitudNueva = this.solicitud;
                this.solicitud = {
                    areaT: "",
                    valorTitulo: "",
                    idEdificio: 0,
                    idServicio: 0,
                    idUnidadEsp: 0,
                    idTipoRep: 0
                };
                axios
                    .post(
                        this.localVal + "/api/Usuario/PostSolicitud",
                        solicitudNueva
                    )
                    .then(res => {
                        const solicitudServer = res.data;
                        //console.log(res.data);
                        this.enviarCorreos(solicitudServer);
                    });
            }
        },
        probando() {
            this.solicitud.idEdificio = this.seleccionEdificio[0].id;
            this.solicitud.idServicio = this.seleccionServicio[0].id;
            this.solicitud.idUnidadEsp = this.seleccionUnidadEsp[0].id;
            this.solicitud.idTipoRep = this.seleccionReparacion.id;
            console.log(this.solicitud);
        },
        enviarCorreos(id) {
            axios
                .get(this.localVal + `/api/Usuario/GetDataCorreo/${id}`)
                .then(res2 => {
                    if (res2.data.length > 0) {
                        this.listadoCorreo = res2.data;
                        this.datosCorreo.nombre = this.listadoCorreo[0].nombre;
                        this.datosCorreo.descripcionP = this.listadoCorreo[0].descripcionP;
                        this.datosCorreo.id = this.listadoCorreo[0].id;
                        const dataCorreo = this.datosCorreo;
                        this.datosCorreo = {
                            nombre: "",
                            descripcionP: "",
                            id: 0
                        };
                        axios
                            .post(
                                this.localVal + "/api/Usuario/enviarCorreo",
                                dataCorreo
                            )
                            .then(res3 => {
                                if (res3.data.length > 0) {
                                    console.log("Funciono");
                                } else {
                                    console.log("Rip");
                                }
                            });
                    }
                });
        }
    },
    beforeMount() {
        this.cargarEdificios();
        this.cargarServicios();
        this.cargarUnidadEsp();
        this.cargarTipoRep();
    },
    components: {
        "v-select": vSelect
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
