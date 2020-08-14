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
                <vs-select
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
                </vs-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
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
                </vs-select>
            </div>
        </div>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
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
                </vs-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
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
                </vs-select>
            </div>
        </div>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    v-model="datosSolicitud.id_estado"
                    :options="listadoEstado"
                    class="w-full select-large"
                    label="Estado"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.id"
                        :text="item.descripcionEstado"
                        v-for="(item, index) in listadoEstado"
                        class="w-full"
                    />
                </vs-select>
            </div>
        </div>
        <h4>
            <vs-divider>Asignar Supervisor y Tecnico</vs-divider>
        </h4>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
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
                </vs-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
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
                </vs-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
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
                </vs-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
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
                </vs-select>
            </div>
        </div>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
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
                </vs-select>
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
        variablePrueba: 0,

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
            return this.gestionTicket.diaCalculado;
            // this.diaCalculado = this.fromDate - this.toDate;
        }
    },
    methods: {
        cambioEdificio() {
            var datoidServicio = this.datosSolicitud.id_servicio;
            var datoidEdificio = this.datosSolicitud.id_edificio;
            var datoidUbicacion = this.datosSolicitud.id_ubicacionEx;
            let c = this.listadoTemporalServicios;
            let b = [];
            var a = 0;

            c.forEach((value, index) => {
                a = value.id_edificio;
                if (a == datoidEdificio) {
                    b.push(value);
                }
            });
            this.listadoServicios = b;
            this.listadoUnidadEsp = [];
        },
        cambioServicio() {
            var datoidServicio = this.datosSolicitud.id_servicio;
            var datoidEdificio = this.datosSolicitud.id_edificio;
            var datoidUbicacion = this.datosSolicitud.id_ubicacionEx;
            let c = this.listadoTemporalUnidadEsp;
            let b = [];
            var a = 0;

            c.forEach((value, index) => {
                a = value.id_servicio;
                if (a == datoidServicio) {
                    b.push(value);
                }
            });

            this.listadoUnidadEsp = b;
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
                });
        },
        cargarApoyo1() {
            axios
                .get(this.localVal + "/api/Agente/GetTrabajadores")
                .then(res => {
                    this.listadoApoyo1 = res.data;
                });
        },
        cargarApoyo2() {
            axios
                .get(this.localVal + "/api/Agente/GetTrabajadores")
                .then(res => {
                    this.listadoApoyo2 = res.data;
                });
        },
        cargarApoyo3() {
            axios
                .get(this.localVal + "/api/Agente/GetTrabajadores")
                .then(res => {
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
                });
        },
        guardarFormulario() {
            //this.variablePrueba = this.gestionTicket.idEdificio;
            console.log(this.gestionTicket);
            let uuid = this.$route.params.uuid;
            this.gestionTicket.uuid = uuid;
            let id = this.$route.params.id;
            this.gestionTicket.idSolicitud = id;
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
                    console.log("Data Enviada y guardada");
                });
        }
    },
    beforeMount() {
        this.cargarEdificios();
        this.cargarServicios();
        this.cargarUnidadEsp();
        this.cargarTipoRep();
        this.cargarSupervisores();
        this.cargarTrabajadores();
        this.cargarEstado();
        this.cargarApoyo1();
        this.cargarApoyo2();
        this.cargarApoyo3();
        this.cargaSolicitudEspecifica();
    },
    components: {
        flatPickr
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
