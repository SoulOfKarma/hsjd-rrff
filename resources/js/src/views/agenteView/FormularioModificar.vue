<template>
    <div>
        <vs-row>
            <div
                class="router-header flex flex-wrap items-center mb-8"
                style="margin-left:10px;"
            >
                <div
                    class="content-area__heading pr-4 border-0 md:border-r border-solid border-grey-light"
                >
                    <h2 class="mb-1">Modificar Ticket</h2>
                </div>
                <div class="vx-breadcrumb ml-4 md:block hidden">
                    <div
                        class="content-area__heading pr-4 border-0 md:border-r border-solid border-grey-light"
                    >
                        <h3 class="mb-1">
                            Agente:
                            <p>{{ nombre }} - {{ run }}</p>
                        </h3>
                    </div>
                </div>
            </div>
            <vs-alert
                color="primary"
                icon="new_releases"
                active="true"
                style="margin-bottom: 10px;"
            >
                <p>Recuerda que todos los campos son obligatorios!</p>
            </vs-alert>
            <!-- Ubicacion -->
            <div class="vx-col md:w-1/1 w-full mb-base">
                <vx-card title="1. Lugar del problema" code-toggler>
                    <div class="vx-row mb-12">
                        <div class="vx-col w-1/3 mt-5">
                            <v-select
                                v-model="seleccionEdificio"
                                placeholder="Edificio"
                                class="w-full select-large"
                                label="descripcionEdificio"
                                :options="listadoEdificios"
                            ></v-select>
                        </div>
                        <div class="vx-col w-1/3 mt-5">
                            <v-select
                                v-model="seleccionServicio"
                                placeholder="Servicio"
                                class="w-full select-large"
                                label="descripcionServicio"
                                :options="listadoServicios"
                                @input="cargaSegunServicio"
                            ></v-select>
                        </div>
                        <div class="vx-col w-1/3 mt-5">
                            <v-select
                                v-model="seleccionUnidadEsp"
                                placeholder="Unidad Especifica"
                                class="w-full select-large"
                                label="descripcionUnidadEsp"
                                :options="listadoUnidadEsp"
                                @input="cargaSegunUnidadEsp"
                            ></v-select>
                        </div>
                    </div>
                </vx-card>
            </div>
            <!-- Personal -->
            <div class="vx-col md:w-1/1 w-full mb-base">
                <vx-card title="2. Asignar Supervisor y Tecnico" code-toggler>
                    <div class="vx-row mb-12">
                        <div class="vx-col w-1/2 mt-5">
                            <v-select
                                v-model="seleccionSupervisor"
                                placeholder="Seleccione al Supervisor"
                                class="w-full select-large"
                                label="sup_nombre_apellido"
                                :options="listadoSupervisores"
                                @input="
                                    arraySupervisores(seleccionSupervisor.id)
                                "
                            ></v-select>
                        </div>
                        <div class="vx-col w-1/2 mt-5">
                            <v-select
                                v-model="seleccionTrabajador"
                                placeholder="Seleccione al Trabajador"
                                class="w-full select-large"
                                label="tra_nombre_apellido"
                                :options="listadoTrabajadores"
                                @input="
                                    arrayTrabajadores(seleccionTrabajador.id)
                                "
                            ></v-select>
                        </div>
                        <div class="vx-col w-full mt-5">
                            <v-select
                                v-model="seleccionApoyo1"
                                placeholder="Seleccione al Apoyo"
                                class="w-full select-large"
                                label="tra_nombre_apellido"
                                :options="listadoApoyo1"
                                @input="arrayApoyo1(seleccionApoyo1.id)"
                            ></v-select>
                        </div>
                        <div class="vx-col w-full mt-5">
                            <v-select
                                v-model="seleccionApoyo2"
                                placeholder="Seleccione al Apoyo"
                                class="w-full select-large"
                                label="tra_nombre_apellido"
                                :options="listadoApoyo2"
                                @input="arrayApoyo2(seleccionApoyo2.id)"
                            ></v-select>
                        </div>
                        <div class="vx-col w-full mt-5">
                            <v-select
                                v-model="seleccionApoyo3"
                                placeholder="Seleccione al Apoyo"
                                class="w-full select-large"
                                label="tra_nombre_apellido"
                                :options="listadoApoyo3"
                                @input="arrayApoyo3(seleccionApoyo3.id)"
                            ></v-select>
                        </div>
                    </div>
                </vx-card>
            </div>
            <!-- Reasignar Hora y Fecha -->
            <div class="vx-col md:w-1/1 w-full mb-base">
                <vx-card title="3. Re-asignar  Hora y Fecha" code-toggler>
                    <div class="vx-row mb-12">
                        <div class="vx-col w-1/2 mt-5">
                            <flat-pickr
                                :config="configFromdateTimePicker"
                                v-model="gestionTicket.fechaCambiada"
                                placeholder="Fecha A Cambiar"
                                @on-change="onFromChange"
                            />
                            <flat-pickr
                                :config="configdateTimePicker"
                                v-model="gestionTicket.horaCambiada"
                                placeholder="Seleccione Hora a Cambiar"
                            />
                        </div>
                        <div class="vx-col w-1/2 mt-5">
                            <flat-pickr
                                :config="configTodateTimePicker"
                                v-model="gestionTicket.fechaTermino"
                                placeholder="Fecha Termino"
                                @on-change="onToChange"
                            />
                            <flat-pickr
                                :config="configdateTimePicker"
                                v-model="gestionTicket.horaTermino"
                                placeholder="Seleccione Hora"
                            />
                        </div>
                        <div class="vx-col w-1/2 mt-5">
                            <vs-input
                                disabled="true"
                                label-placeholder="Dias Ejecucion"
                                v-model="diasCalculados"
                            />
                        </div>
                        <div class="vx-col w-1/2 mt-5">
                            <vs-input
                                disabled="true"
                                label-placeholder="Horas Ejecucion"
                                v-model="calcularHorasTrabajo"
                            />
                        </div>
                    </div>
                </vx-card>
            </div>
            <!-- Informacion del problema -->
            <div class="vx-col md:w-1/1 w-full mb-base">
                <vx-card title="4. Problema a Resolver" code-toggler>
                    <div class="vx-row mb-12">
                        <div class="vx-col w-full mt-5">
                            <v-select
                                v-model="seleccionReparacion"
                                placeholder="Seleccione Tipo de Reparacion"
                                class="w-full select-large"
                                label="descripcionTipoReparacion"
                                :options="listadoTipoRep"
                                @input="
                                    arrayTipoReparacion(seleccionReparacion.id)
                                "
                            ></v-select>
                            <br />
                            <v-select
                                v-model="seleccionEstado"
                                placeholder="Seleccione el Estado"
                                class="w-full select-large"
                                label="descripcionEstado"
                                :options="listadoEstado"
                                @input="arrayEstado(seleccionEstado.id)"
                            ></v-select>
                        </div>
                    </div>
                </vx-card>
            </div>
            <!-- Enviar o Limpiar Formulario -->
            <div class="vx-col md:w-1/1 w-full mb-base">
                <div class="vx-row">
                    <div class="vx-col sm:w-2/3 w-full ml-auto">
                        <vs-button
                            color="primary"
                            class="mb-2"
                            @click="probando"
                            >Limpiar</vs-button
                        >
                        <vs-button
                            class="mr-3 mb-2"
                            color="warning"
                            @click="ModificarFormulario"
                            >Modificar</vs-button
                        >
                    </div>
                </div>
            </div>
        </vs-row>
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
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";
import "quill/dist/quill.bubble.css";
import { quillEditor } from "vue-quill-editor";

export default {
    data: () => ({
        horasCalculadas: 0,
        diaCalculado: 0,
        format: "d MMMM yyyy",
        nombre: localStorage.getItem("nombre"),
        run: localStorage.getItem("run"),
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
        datosTicketAsignado: [],
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
        listadoCorreo: [],
        gestionTicket: {
            uuid: "",
            id_solicitud: 0,
            id_edificio: 2,
            id_servicio: 2,
            id_ubicacionEx: 3,
            id_tipoReparacion: 3,
            id_estado: 1,
            id_supervisor: 4,
            id_trabajador: 5,
            idApoyo1: 5,
            idApoyo2: 5,
            idApoyo3: 5,
            fechaCambiada: null,
            fechaTermino: null,
            horaCambiada: null,
            horaTermino: null,
            horasEjecucion: 0,
            diasEjecucion: 0
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
            id: 5,
            tra_nombre_apellido: "Sin Asignar"
        },
        seleccionApoyo2: {
            id: 5,
            tra_nombre_apellido: "Sin Asignar"
        },
        seleccionApoyo3: {
            id: 5,
            tra_nombre_apellido: "Sin Asignar"
        },
        variablePrueba: 0,
        mensajeError: "",

        localVal: "http://127.0.0.1:8000"
    }),
    computed: {
        calcularHorasTrabajo() {
            this.hora1 = moment(this.gestionTicket.horaCambiada, "HH:mm");
            this.hora2 = moment(this.gestionTicket.horaTermino, "HH:mm");
            this.gestionTicket.horasEjecucion = moment
                .duration(this.hora2 - this.hora1)
                .asHours();
            return this.gestionTicket.horasEjecucion;
        },
        diasCalculados() {
            this.fecha1 = moment(this.gestionTicket.fechaCambiada);
            this.fecha2 = moment(this.gestionTicket.fechaTermino);
            this.gestionTicket.diasEjecucion = this.fecha2.diff(
                this.fecha1,
                "days"
            );

            if (this.fecha1.isSame(this.fecha2)) {
                this.gestionTicket.diasEjecucion = 1;
            }
            return this.gestionTicket.diasEjecucion;
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
        arrayEstado(id) {
            let c = this.listadoEstado;
            let b = [];
            var a = 0;

            c.forEach((value, index) => {
                a = value.id;
                if (a == id) {
                    b.push(value);
                }
            });
            this.seleccionEstado = b;
        },
        arrayTipoReparacion(id) {
            let c = this.listadoTipoRep;
            let b = [];
            var a = 0;

            c.forEach((value, index) => {
                a = value.id;
                if (a == id) {
                    b.push(value);
                }
            });
            this.seleccionReparacion = b;
        },
        arraySupervisores(id) {
            let c = this.listadoSupervisores;
            let b = [];
            var a = 0;

            c.forEach((value, index) => {
                a = value.id;
                if (a == id) {
                    b.push(value);
                }
            });
            this.seleccionSupervisor = b;
        },
        arrayTrabajadores(id) {
            let c = this.listadoTrabajadores;
            let b = [];
            var a = 0;

            c.forEach((value, index) => {
                a = value.id;
                if (a == id) {
                    b.push(value);
                }
            });
            this.seleccionTrabajador = b;
        },
        arrayApoyo1(id) {
            let c = this.listadoApoyo1;
            let b = [];
            var a = 0;

            c.forEach((value, index) => {
                a = value.id;
                if (a == id) {
                    b.push(value);
                }
            });
            this.seleccionApoyo1 = b;
        },
        arrayApoyo2(id) {
            let c = this.listadoApoyo2;
            let b = [];
            var a = 0;

            c.forEach((value, index) => {
                a = value.id;
                if (a == id) {
                    b.push(value);
                }
            });
            this.seleccionApoyo2 = b;
        },
        arrayApoyo3(id) {
            let c = this.listadoApoyo3;
            let b = [];
            var a = 0;

            c.forEach((value, index) => {
                a = value.id;
                if (a == id) {
                    b.push(value);
                }
            });
            this.seleccionApoyo3 = b;
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
        ModificarFormulario() {
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
            } else if (this.seleccionSupervisor[0].id == 0) {
                this.mensajeError = "el supervisor";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionTrabajador[0].id == 0) {
                this.mensajeError = "el trabajador";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionApoyo1[0].id == 0) {
                this.mensajeError = "el apoyo 1";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionApoyo2[0].id == 0) {
                this.mensajeError = "el apoyo 2";
                this.errorDrop(this.mensajeError);
            } else if (this.seleccionApoyo3[0].id == 0) {
                this.mensajeError = "el apoyo 3";
                this.errorDrop(this.mensajeError);
            } else if (
                this.gestionTicket.fechaCambiada == null ||
                this.gestionTicket.fechaCambiada < hoy.getDate()
            ) {
                this.mensajeError = "la fecha de inicio ";
                this.errorDrop(this.mensajeError);
            } else if (
                this.gestionTicket.fechaTermino == null ||
                this.gestionTicket.fechaTermino < hoy.getDate()
            ) {
                this.mensajeError = "la fecha de termino";
                this.errorDrop(this.mensajeError);
            } else if (this.gestionTicket.horasEjecucion == 0) {
                this.mensajeError = "Las horas calculadas no pueden ser 0";
                this.errorDrop(this.mensajeError);
            } else if (this.gestionTicket.diasEjecucion == 0) {
                this.mensajeError = "Los dias calculados no pueden ser 0";
                this.errorDrop(this.mensajeError);
            } else {
                let uuid = this.$route.params.uuid;
                this.gestionTicket.uuid = uuid;
                let id = this.$route.params.id;
                this.gestionTicket.id_solicitud = id;
                this.gestionTicket.id_edificio = this.seleccionEdificio[0].id;
                this.gestionTicket.id_servicio = this.seleccionServicio[0].id;
                this.gestionTicket.id_ubicacionEx = this.seleccionUnidadEsp[0].id;
                this.gestionTicket.id_tipoReparacion = this.seleccionReparacion[0].id;
                this.gestionTicket.id_estado = this.seleccionEstado[0].id;
                this.gestionTicket.id_supervisor = this.seleccionSupervisor[0].id;
                this.gestionTicket.id_trabajador = this.seleccionTrabajador[0].id;
                this.gestionTicket.idApoyo1 = this.seleccionApoyo1[0].id;
                this.gestionTicket.idApoyo2 = this.seleccionApoyo2[0].id;
                this.gestionTicket.idApoyo3 = this.seleccionApoyo3[0].id;

                const ticket = this.gestionTicket;
                console.log(ticket);
                (this.gestionTicket = {
                    uuid: "",
                    id_solicitud: 0,
                    id_edificio: 2,
                    id_servicio: 2,
                    id_ubicacionEx: 3,
                    id_tipoReparacion: 3,
                    id_estado: 1,
                    id_supervisor: 4,
                    id_trabajador: 5,
                    idApoyo1: 5,
                    idApoyo2: 5,
                    idApoyo3: 5,
                    fechaCambiada: null,
                    fechaTermino: null,
                    horaCambiada: null,
                    horaTermino: null,
                    horasEjecucion: 0,
                    diasEjecucion: 0
                }),
                    axios
                        .post(this.localVal + "/api/Agente/PutTicket", ticket)
                        .then(res => {
                            const ticketServer = res.data;
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
        cargaTicketAsignado() {
            let id = this.$route.params.id;
            axios
                .get(this.localVal + `/api/Agente/GetTicketAsignado/${id}`)
                .then(res => {
                    this.datosTicketAsignado = res.data;
                    console.log(this.datosTicketAsignado);
                    var datoidSupervisor = this.datosTicketAsignado
                        .id_supervisor;
                    var datoidTrabajador = this.datosTicketAsignado
                        .id_trabajador;
                    var datoidApoyo1 = this.datosTicketAsignado.idApoyo1;
                    var datoidApoyo2 = this.datosTicketAsignado.idApoyo2;
                    var datoidApoyo3 = this.datosTicketAsignado.idApoyo3;
                    this.cargarSTA(
                        datoidSupervisor,
                        datoidTrabajador,
                        datoidApoyo1,
                        datoidApoyo2,
                        datoidApoyo3
                    );
                });
        },
        cargarSTA(
            datoidSupervisor,
            datoidTrabajador,
            datoidApoyo1,
            datoidApoyo2,
            datoidApoyo3
        ) {
            let c = this.listadoSupervisores;
            let b = [];
            var a = 0;
            c.forEach((value, index) => {
                a = value.id;

                if (a == datoidSupervisor) {
                    b.push(value);
                }
            });

            this.seleccionSupervisor = b;

            b = [];
            c = this.listadoTrabajadores;

            c.forEach((value, index) => {
                a = value.id;
                if (a == datoidTrabajador) {
                    b.push(value);
                }
            });

            this.seleccionTrabajador = b;

            c = this.listadoApoyo1;
            b = [];

            c.forEach((value, index) => {
                a = value.id;
                if (a == datoidApoyo1) {
                    b.push(value);
                }
            });
            if (b.length <= 0) {
            } else {
                this.seleccionApoyo1 = b;
            }

            c = this.listadoApoyo2;
            b = [];
            console.log(datoidApoyo2);
            c.forEach((value, index) => {
                a = value.id;
                if (a == datoidApoyo2) {
                    b.push(value);
                }
            });

            if (b.length <= 0) {
            } else {
                this.seleccionApoyo2 = b;
            }

            this.seleccionApoyo2 = b;

            c = this.listadoApoyo3;
            b = [];
            c.forEach((value, index) => {
                a = value.id;
                if (a == datoidApoyo3) {
                    b.push(value);
                }
            });

            if (b.length <= 0) {
            } else {
                this.seleccionApoyo3 = b;
            }
        },
        cargarInicial() {
            this.cargaEstado();
            this.cargaTipoReparacion();
            this.cargarUSE();
        },
        probando() {
            console.log(this.seleccionEstado);
            console.log(this.seleccionApoyo1);
            console.log(this.seleccionApoyo2);
            console.log(this.seleccionApoyo3);
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
        this.cargaTicketAsignado();
    },
    async beforeMount() {},
    components: {
        flatPickr,
        "v-select": vSelect,
        quillEditor
    }
};
</script>

<style lang="stylus">
.examplex {
  display: flex;
  align-items: center;
  justify-content: center;

  button {
    margin: 0px !important;

    &.btnx {
      margin-left: 10px !important;
      border-radius: 5px 0px 0px 5px;
    }

    &.btn-drop {
      border-radius: 0px 5px 5px 0px;
      border-left: 1px solid rgba(255, 255, 255, 0.2);

      .cardx {
        margin: 15px;
      }
    }
  }
}
</style>
