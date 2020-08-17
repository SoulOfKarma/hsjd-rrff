<template>
    <div>
        <h4>
            <vs-divider>Asignar Solicitud</vs-divider>
        </h4>
        <h4>
            <vs-divider>Lugar del problema</vs-divider>
        </h4>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <!-- <vs-select
                    class="w-full select-large"
                    label="Edificio"
                    v-model="datosSolicitud.id_edificio"
                    @change="cambioEdificio"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.descripcionEdificio"
                        v-for="(item, index) in listadoEdificios"
                        class="w-full"
                    />
                </vs-select> -->
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
                <!-- <vs-select
                    class="w-full select-large"
                    label="Servicio"
                    v-model="datosSolicitud.id_servicio"
                    @change="cambioServicio"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.descripcionServicio"
                        v-for="(item, index) in listadoServicios"
                        class="w-full"
                    />
                </vs-select> -->
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
        </div>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <!-- <vs-select
                    class="w-full select-large"
                    label="Unidad Especifica"
                    v-model="datosSolicitud.id_ubicacionEx"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.descripcionUnidadEsp"
                        v-for="(item, index) in listadoUnidadEsp"
                        class="w-full"
                    />
                </vs-select> -->
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
                <!-- <vs-select
                    class="w-full select-large"
                    label="Especialidad"
                    v-model="datosSolicitud.id_tipoReparacion"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.descripcionTipoReparacion"
                        v-for="(item, index) in listadoTipoRep"
                        class="w-full"
                    /> 
                    </vs-select> -->
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
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <v-select
                    v-model="seleccionEstado"
                    placeholder="Seleccione el Estado"
                    class="w-full select-large"
                    label="descripcionEstado"
                    :options="listadoEstado"
                >
                </v-select>
            </div>
        </div>
        <h4>
            <vs-divider>Asignar Supervisor y Tecnico</vs-divider>
        </h4>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <!-- <vs-select
                    v-model="gestionTicket.idSupervisor"
                    class="w-full select-large"
                    label="Supervisor"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.sup_nombre_apellido"
                        v-for="(item, index) in listadoSupervisores"
                        class="w-full"
                    />
                </vs-select> -->
                <v-select
                    v-model="seleccionSupervisor"
                    placeholder="Seleccione al Supervisor"
                    class="w-full select-large"
                    label="sup_nombre_apellido"
                    :options="listadoSupervisores"
                >
                </v-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <!-- <vs-select
                    v-model="gestionTicket.idTrabajador"
                    class="w-full select-large"
                    label="Tecnico a Asignar"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.tra_nombre_apellido"
                        v-for="(item, index) in listadoTrabajadores"
                        class="w-full"
                    />
                </vs-select> -->
                <v-select
                    v-model="seleccionTrabajador"
                    placeholder="Seleccione al Trabajador"
                    class="w-full select-large"
                    label="tra_nombre_apellido"
                    :options="listadoTrabajadores"
                >
                </v-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <!-- <vs-select
                    v-model="gestionTicket.idApoyo1"
                    class="w-full select-large"
                    label="Apoyo 1"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.tra_nombre_apellido"
                        v-for="(item, index) in listadoApoyo1"
                        class="w-full"
                    />
                </vs-select> -->
                <v-select
                    v-model="seleccionApoyo1"
                    placeholder="Seleccione al Apoyo"
                    class="w-full select-large"
                    label="tra_nombre_apellido"
                    :options="listadoApoyo1"
                >
                </v-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <!--  <vs-select
                    v-model="gestionTicket.idApoyo2"
                    class="w-full select-large"
                    label="Apoyo 2"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.tra_nombre_apellido"
                        v-for="(item, index) in listadoApoyo2"
                        class="w-full"
                    />
                </vs-select> -->
                <v-select
                    v-model="seleccionApoyo2"
                    placeholder="Seleccione al Apoyo"
                    class="w-full select-large"
                    label="tra_nombre_apellido"
                    :options="listadoApoyo2"
                >
                </v-select>
            </div>
        </div>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <!-- <vs-select
                    v-model="gestionTicket.idApoyo3"
                    class="w-full select-large"
                    label="Apoyo 3"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.tra_nombre_apellido"
                        v-for="(item, index) in listadoApoyo3"
                        class="w-full"
                    />
                </vs-select> -->
                <v-select
                    v-model="seleccionApoyo3"
                    placeholder="Seleccione al Apoyo"
                    class="w-full select-large"
                    label="tra_nombre_apellido"
                    :options="listadoApoyo3"
                >
                </v-select>
            </div>
        </div>
        <h4>
            <vs-divider>Asignar Fecha y Hora de visita</vs-divider>
        </h4>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <flat-pickr
                    :config="configFromdateTimePicker"
                    v-model="gestionTicket.fromDate"
                    placeholder="Fecha Inicio"
                    @on-change="onFromChange"
                />
                <flat-pickr
                    :config="configdateTimePicker"
                    v-model="gestionTicket.time1"
                    placeholder="Seleccione Hora"
                />
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <flat-pickr
                    :config="configTodateTimePicker"
                    v-model="gestionTicket.toDate"
                    placeholder="Fecha Termino"
                    @on-change="onToChange"
                />
                <flat-pickr
                    :config="configdateTimePicker"
                    v-model="gestionTicket.time2"
                    placeholder="Seleccione Hora"
                />
            </div>
        </div>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-input
                    disabled="true"
                    label-placeholder="Dias Ejecucion"
                    v-model="diasCalculados"
                />
            </div>

            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-input
                    disabled="true"
                    label-placeholder="Horas Ejecucion"
                    v-model="calcularHorasTrabajo"
                />
            </div>
        </div>

        <br />

        <div class="vx-row">
            <div class="vx-col w-full">
                <vs-button class="mr-3 mb-2" @click="guardarFormulario"
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
import moment from "moment";
import axios from "axios";
import vSelect from "vue-select";

export default {
    data: () => ({
        horasCalculadas: 0,
        diaCalculado: 0,
        format: "d MMMM yyyy",

        fecha1: moment()
            .startOf("day")
            .fromNow(),
        fecha2: moment()
            .endOf("day")
            .fromNow(),
        hora1: moment("8:32", "HH:mm"),
        hora2: moment("12:32", "HH:mm"),
        configFromdateTimePicker: {
            minDate: new Date(),
            maxDate: null
        },
        configTodateTimePicker: {
            minDate: null
        },

        configdateTimePicker: {
            enableTime: true,
            enableSeconds: true,
            noCalendar: true
        },
        listadoEdificios: [],
        datosSolicitud: [],
        listadoServicios: [],
        listadoUnidadEsp: [],
        listadoTemporalServicios: [],
        listadoTemporalUnidadEsp: [],
        listadoTipoRep: [],
        listadoSupervisores: [],
        listadoTrabajadores: [],
        listadoApoyo1: [],
        listadoApoyo2: [],
        listadoApoyo3: [],
        listadoEstado: [],
        gestionTicket: {
            uuid: "",
            idSolicitud: 0,
            idEdificio: 2,
            idServicio: 2,
            idUnidadEsp: 3,
            idTipoRep: 3,
            idEstado: 1,
            idSupervisor: 4,
            idTrabajador: 5,
            idApoyo1: 5,
            idApoyo2: 5,
            idApoyo3: 5,
            fromDate: null,
            toDate: null,
            time1: null,
            time2: null,
            horasCalculadas: 0,
            diaCalculado: 0
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
        },
        seleccionEstado: {
            id: 0,
            descripcionEstado: "Seleccione Estado"
        },
        seleccionSupervisor: {
            id: 0,
            sup_nombre_apellido: "Seleccione al Supervisor"
        },
        seleccionTrabajador: {
            id: 0,
            tra_nombre_apellido: "Seleccione al Trabajador"
        },
        seleccionApoyo1: {
            id: 0,
            tra_nombre_apellido: "Seleccione al Apoyo"
        },
        seleccionApoyo2: {
            id: 0,
            tra_nombre_apellido: "Seleccione al Apoyo"
        },
        seleccionApoyo3: {
            id: 0,
            tra_nombre_apellido: "Seleccione al Apoyo"
        },
        variablePrueba: 0,
        mensajeError: "",

        localVal: "http://127.0.0.1:8000"
    }),
    computed: {
        calcularHorasTrabajo() {
            this.hora1 = moment(this.gestionTicket.time1, "HH:mm");
            this.hora2 = moment(this.gestionTicket.time2, "HH:mm");
            this.gestionTicket.horasCalculadas = moment
                .duration(this.hora2 - this.hora1)
                .asHours();
            return this.gestionTicket.horasCalculadas;
        },
        diasCalculados() {
            this.fecha1 = moment(this.gestionTicket.fromDate);
            this.fecha2 = moment(this.gestionTicket.toDate);
            this.gestionTicket.diaCalculado = this.fecha2.diff(
                this.fecha1,
                "days"
            );

            if (this.fecha1.isSame(this.fecha2)) {
                this.gestionTicket.diaCalculado = 1;
            }
            return this.gestionTicket.diaCalculado;
            // this.diaCalculado = this.fromDate - this.toDate;
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
        onFromChange(selectedDates, dateStr, instance) {
            this.$set(this.configTodateTimePicker, "minDate", dateStr);
        },
        onToChange(selectedDates, dateStr, instance) {
            this.$set(this.configFromdateTimePicker, "maxDate", dateStr);
        },
        cargarEdificios() {
            axios.get(this.localVal + "/api/Usuario/GetEdificios").then(res => {
                this.listadoEdificios = res.data;
            });
        },
        cargarServicios() {
            axios.get(this.localVal + "/api/Usuario/GetServicios").then(res => {
                this.listadoServicios = res.data;
                this.listadoTemporalServicios = res.data;
            });
        },
        cargarUnidadEsp() {
            axios.get(this.localVal + "/api/Usuario/GetUnidadEsp").then(res => {
                this.listadoUnidadEsp = res.data;
                this.listadoTemporalUnidadEsp = res.data;
            });
        },
        cargarTipoRep() {
            axios.get(this.localVal + "/api/Usuario/GetTipoRep").then(res => {
                this.listadoTipoRep = res.data;
            });
        },
        cargarSupervisores() {
            axios
                .get(this.localVal + "/api/Agente/GetSupervisores")
                .then(res => {
                    this.listadoSupervisores = res.data;
                });
        },
        cargarTrabajadores() {
            axios
                .get(this.localVal + "/api/Agente/GetTrabajadores")
                .then(res => {
                    this.listadoTrabajadores = res.data;
                    this.listadoApoyo1 = res.data;
                    this.listadoApoyo2 = res.data;
                    this.listadoApoyo3 = res.data;
                });
        },
        cargarEstado() {
            axios.get(this.localVal + "/api/Agente/GetEstado").then(res => {
                this.listadoEstado = res.data;
            });
        },
        cargaSolicitudEspecifica() {
            let id = this.$route.params.id;
            axios
                .get(this.localVal + `/api/Usuario/TraerSolicitud/${id}`)
                .then(res => {
                    this.datosSolicitud = res.data;
                    /* this.cargaEstado();
                    this.cargaTipoReparacion();
                    this.cargarUSE(); */
                    this.cargarInicial();
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
        guardarFormulario() {
            var hoy = new Date();

            if (this.seleccionEdificio[0].id == 0) {
                this.mensajeError = "el Edificio";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionServicio[0].id == 0) {
                this.mensajeError = "el servicio";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionUnidadEsp[0].id == 0) {
                this.mensajeError = "la Unidad especifica";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionReparacion[0].id == 0) {
                this.mensajeError = "el tipo de reparacion";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionEstado[0].id == 0) {
                this.mensajeError = "el estado";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionSupervisor.id == 0) {
                this.mensajeError = "el supervisor";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionTrabajador.id == 0) {
                this.mensajeError = "el trabajador";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionApoyo1.id == 0) {
                this.mensajeError = "el apoyo 1";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionApoyo2.id == 0) {
                this.mensajeError = "el apoyo 2";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionApoyo3.id == 0) {
                this.mensajeError = "el apoyo 3";
                this.errorDrop(this.mensajeError);
            } else if (
                this.gestionTicket.fromDate == null ||
                this.gestionTicket.fromDate < hoy.getDate()
            ) {
                this.mensajeError = "la fecha de inicio ";
                this.errorDrop(this.mensajeError);
            } else if (
                this.gestionTicket.toDate == null ||
                this.gestionTicket.toDate < hoy.getDate()
            ) {
                this.mensajeError = "la fecha de termino";
                this.errorDrop(this.mensajeError);
            } else if (this.gestionTicket.horasCalculadas == 0) {
                this.mensajeError = "Las horas calculadas no pueden ser 0";
                this.errorDrop(this.mensajeError);
            } else if (this.gestionTicket.diaCalculado == 0) {
                this.mensajeError = "Los dias calculados no pueden ser 0";
                this.errorDrop(this.mensajeError);
            } else {
                let uuid = this.$route.params.uuid;
                this.gestionTicket.uuid = uuid;
                let id = this.$route.params.id;
                this.gestionTicket.idSolicitud = id;
                this.gestionTicket.idEdificio = this.seleccionEdificio[0].id;
                this.gestionTicket.idServicio = this.seleccionServicio[0].id;
                this.gestionTicket.idUnidadEsp = this.seleccionUnidadEsp[0].id;
                this.gestionTicket.idTipoRep = this.seleccionReparacion[0].id;
                this.gestionTicket.idEstado = this.seleccionEstado[0].id;
                this.gestionTicket.idSupervisor = this.seleccionSupervisor.id;
                this.gestionTicket.idTrabajador = this.seleccionTrabajador.id;
                this.gestionTicket.idApoyo1 = this.seleccionApoyo1.id;
                this.gestionTicket.idApoyo2 = this.seleccionApoyo2.id;
                this.gestionTicket.idApoyo3 = this.seleccionApoyo3.id;

                const ticket = this.gestionTicket;
                console.log(ticket);
                /*   this.gestionTicket = {
                uuid: "",
                idSolicitud: 0,
                idEdificio: 2,
                idServicio: 2,
                idUnidadEsp: 3,
                idTipoRep: 3,
                idEstado: 1,
                idSupervisor: 4,
                idTrabajador: 5,
                idApoyo1: 5,
                idApoyo2: 5,
                idApoyo3: 5,
                fromDate: null,
                toDate: null,
                time1: null,
                time2: null,
                horasCalculadas: 0,
                diaCalculado: 0
            }; */
                axios
                    .post(this.localVal + "/api/Agente/PostTicket", ticket)
                    .then(res => {
                        const ticketServer = res.data;
                        console.log("baia baia");
                    });
            }
        },
        cargaEstado() {
            var datoidEstado = this.datosSolicitud.id_estado;
            let c = this.listadoEstado;
            let b = [];
            var a = 0;
            c.forEach((value, index) => {
                a = value.id;
                if (a == datoidEstado) {
                    b.push(value);
                }
            });
            this.seleccionEstado = b;
        },

        cargaTipoReparacion() {
            var datoidRep = this.datosSolicitud.id_tipoReparacion;
            let c = this.listadoTipoRep;
            let b = [];
            var a = 0;
            c.forEach((value, index) => {
                a = value.id;
                if (a == datoidRep) {
                    b.push(value);
                }
            });
            this.seleccionReparacion = b;
        },
        cargarUSE() {
            var datoidServicio = this.datosSolicitud.id_servicio;
            var datoidEdificio = this.datosSolicitud.id_edificio;
            var datoidUbicacion = this.datosSolicitud.id_ubicacionEx;
            let c = this.listadoUnidadEsp;
            let b = [];
            var a = 0;
            c.forEach((value, index) => {
                a = value.id;

                if (a == datoidUbicacion) {
                    b.push(value);
                }
            });

            this.seleccionUnidadEsp = b;

            b = [];
            c = this.listadoServicios;

            c.forEach((value, index) => {
                a = value.id;
                if (a == datoidServicio) {
                    b.push(value);
                }
            });

            this.seleccionServicio = b;

            c = this.listadoEdificios;
            b = [];
            c.forEach((value, index) => {
                a = value.id;
                if (a == datoidEdificio) {
                    b.push(value);
                }
            });

            this.seleccionEdificio = b;
        },
        cargarInicial() {
            this.cargaEstado();
            this.cargaTipoReparacion();
            this.cargarUSE();
        }
    },
    created() {
        this.cargarEdificios();
        this.cargarServicios();
        this.cargarUnidadEsp();
        this.cargarTipoRep();
        this.cargarSupervisores();
        this.cargarTrabajadores();
        this.cargarEstado();
        this.cargaSolicitudEspecifica();
    },
    async beforeMount() {},
    components: {
        flatPickr,
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
