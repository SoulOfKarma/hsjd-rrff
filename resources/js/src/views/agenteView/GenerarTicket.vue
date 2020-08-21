<template>
  <div>
    <h4>
      <vs-divider>Generar Nuevo Ticket</vs-divider>
    </h4>
    <h4>
      <vs-divider>Seleccionar Usuario Solicitante</vs-divider>
    </h4>
    <vs-row>
      <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="12">
        <v-select
          v-model="seleccionUsuario"
          placeholder="Seleccione al Usuario"
          class="w-full select-large"
          label="nombre"
          :options="listadoUsuarios"
        ></v-select>
      </vs-col>
    </vs-row>
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
        </vs-select>-->
        <v-select
          v-model="seleccionEdificio"
          placeholder="Seleccione Edificio"
          class="w-full select-large"
          label="descripcionEdificio"
          :options="listadoEdificios"
        ></v-select>
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
        </vs-select>-->
        <v-select
          v-model="seleccionServicio"
          placeholder="Seleccione Servicio"
          class="w-full select-large"
          label="descripcionServicio"
          :options="listadoServicios"
          @input="cargaSegunServicio"
        ></v-select>
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
        </vs-select>-->
        <v-select
          v-model="seleccionUnidadEsp"
          placeholder="Seleccione Unidad Especifica"
          class="w-full select-large"
          label="descripcionUnidadEsp"
          :options="listadoUnidadEsp"
          @input="cargaSegunUnidadEsp"
        ></v-select>
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
        </vs-select>-->
        <v-select
          v-model="seleccionReparacion"
          placeholder="Seleccione Tipo de Reparacion"
          class="w-full select-large"
          label="descripcionTipoReparacion"
          :options="listadoTipoRep"
          @input="arrayTipoReparacion(seleccionReparacion.id)"
        ></v-select>
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
          @input="arrayEstado(seleccionEstado.id)"
        ></v-select>
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
        </vs-select>-->
        <v-select
          v-model="seleccionSupervisor"
          placeholder="Seleccione al Supervisor"
          class="w-full select-large"
          label="sup_nombre_apellido"
          :options="listadoSupervisores"
          @input="arraySupervisores(seleccionSupervisor.id)"
        ></v-select>
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
        </vs-select>-->
        <v-select
          v-model="seleccionTrabajador"
          placeholder="Seleccione al Trabajador"
          class="w-full select-large"
          label="tra_nombre_apellido"
          :options="listadoTrabajadores"
          @input="arrayTrabajadores(seleccionTrabajador.id)"
        ></v-select>
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
        </vs-select>-->
        <v-select
          v-model="seleccionApoyo1"
          placeholder="Seleccione al Apoyo"
          class="w-full select-large"
          label="tra_nombre_apellido"
          :options="listadoApoyo1"
          @input="arrayApoyo1(seleccionApoyo1.id)"
        ></v-select>
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
        </vs-select>-->
        <v-select
          v-model="seleccionApoyo2"
          placeholder="Seleccione al Apoyo"
          class="w-full select-large"
          label="tra_nombre_apellido"
          :options="listadoApoyo2"
          @input="arrayApoyo2(seleccionApoyo2.id)"
        ></v-select>
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
        </vs-select>-->
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
    <h4>
      <vs-divider>Asignar Fecha y Hora de visita</vs-divider>
    </h4>
    <div class="vx-row">
      <div class="vx-col md:w-1/2 w-full mt-5">
        <flat-pickr
          :config="configFromdateTimePicker"
          v-model="gestionTicket.fechaInicio"
          placeholder="Fecha Inicio"
          @on-change="onFromChange"
        />
        <flat-pickr
          :config="configdateTimePicker"
          v-model="gestionTicket.horaInicio"
          placeholder="Seleccione Hora"
        />
      </div>
      <div class="vx-col md:w-1/2 w-full mt-5">
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
    </div>
    <div class="vx-row">
      <div class="vx-col md:w-1/2 w-full mt-5">
        <vs-input disabled="true" label-placeholder="Dias Ejecucion" v-model="diasCalculados" />
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

    <h4>
      <vs-divider>Informacion del Problema</vs-divider>
    </h4>
    <div class="vx-row">
      <div class="vx-col w-full mt-5">
        <vs-input
          label="Titulo problema"
          placeholder="Ej. Falla de red en equipo x"
          v-model="gestionTicket.tituloP"
        />

        <br />
        <vs-textarea label="Descripcion de la problematica" v-model="gestionTicket.descripcionP" />
      </div>
    </div>

    <div class="vx-row">
      <div class="vx-col w-full">
        <vs-button class="mr-3 mb-2" color="success" @click="guardarFormulario">Enviar</vs-button>
        <vs-button color="warning" class="mb-2" @click="probando">Limpiar</vs-button>
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

    fecha1: moment().startOf("day").fromNow(),
    fecha2: moment().endOf("day").fromNow(),
    hora1: moment("8:32", "HH:mm"),
    hora2: moment("12:32", "HH:mm"),
    configFromdateTimePicker: {
      minDate: new Date(),
      maxDate: null,
    },
    configTodateTimePicker: {
      minDate: null,
    },

    configdateTimePicker: {
      enableTime: true,
      enableSeconds: true,
      noCalendar: true,
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
    listadoCorreo: [],
    listadoUsuarios: [],
    gestionTicket: {
      id_user: 0,
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
      fechaInicio: null,
      fechaTermino: null,
      horaInicio: null,
      horaTermino: null,
      horasEjecucion: 0,
      diasEjecucion: 0,
      tituloP: "",
      descripcionP: "",
    },
    seleccionEdificio: {
      id: 0,
      descripcionEdificio: "Seleccione Edificio",
    },
    seleccionUsuario: {
      id: 0,
      nombre: "Seleccione Usuario",
    },
    seleccionServicio: {
      id: 0,
      descripcionServicio: "Seleccione Servicio",
    },
    seleccionUnidadEsp: {
      id: 0,
      descripcionUnidadEsp: "Seleccione Unidad Especifica",
    },
    seleccionReparacion: {
      id: 0,
      descripcionTipoReparacion: "Seleccione Tipo de Reparacion",
    },
    seleccionEstado: {
      id: 0,
      descripcionEstado: "Seleccione Estado",
    },
    seleccionSupervisor: {
      id: 0,
      sup_nombre_apellido: "Seleccione al Supervisor",
    },
    seleccionTrabajador: {
      id: 0,
      tra_nombre_apellido: "Seleccione al Trabajador",
    },
    seleccionApoyo1: {
      id: 4,
      tra_nombre_apellido: "Sin Asignar",
    },
    seleccionApoyo2: {
      id: 4,
      tra_nombre_apellido: "Sin Asignar",
    },
    seleccionApoyo3: {
      id: 4,
      tra_nombre_apellido: "Sin Asignar",
    },
    variablePrueba: 0,
    mensajeError: "",

    localVal: "http://127.0.0.1:8000",
  }),
  computed: {
    calcularHorasTrabajo() {
      this.hora1 = moment(this.gestionTicket.horaInicio, "HH:mm");
      this.hora2 = moment(this.gestionTicket.horaTermino, "HH:mm");
      this.gestionTicket.horasEjecucion = moment
        .duration(this.hora2 - this.hora1)
        .asHours();
      return this.gestionTicket.horasEjecucion;
    },
    diasCalculados() {
      this.fecha1 = moment(this.gestionTicket.fechaInicio);
      this.fecha2 = moment(this.gestionTicket.fechaTermino);
      this.gestionTicket.diaCalculado = this.fecha2.diff(this.fecha1, "days");

      if (this.fecha1.isSame(this.fecha2)) {
        this.gestionTicket.diasEjecucion = 1;
      }
      return this.gestionTicket.diasEjecucion;
      // this.diaCalculado = this.fromDate - this.toDate;
    },
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
      axios.get(this.localVal + "/api/Usuario/GetEdificios").then((res) => {
        this.listadoEdificios = res.data;
      });
    },
    cargarUsuarios() {
      axios.get(this.localVal + "/api/Agente/getUsuarios").then((res) => {
        this.listadoUsuarios = res.data;
      });
    },
    cargarServicios() {
      axios.get(this.localVal + "/api/Usuario/GetServicios").then((res) => {
        this.listadoServicios = res.data;
        this.listadoTemporalServicios = res.data;
      });
    },
    cargarUnidadEsp() {
      axios.get(this.localVal + "/api/Usuario/GetUnidadEsp").then((res) => {
        this.listadoUnidadEsp = res.data;
        this.listadoTemporalUnidadEsp = res.data;
      });
    },
    cargarTipoRep() {
      axios.get(this.localVal + "/api/Usuario/GetTipoRep").then((res) => {
        this.listadoTipoRep = res.data;
      });
    },
    cargarSupervisores() {
      axios.get(this.localVal + "/api/Agente/GetSupervisores").then((res) => {
        this.listadoSupervisores = res.data;
      });
    },
    cargarTrabajadores() {
      axios.get(this.localVal + "/api/Agente/GetTrabajadores").then((res) => {
        this.listadoTrabajadores = res.data;
        this.listadoApoyo1 = res.data;
        this.listadoApoyo2 = res.data;
        this.listadoApoyo3 = res.data;
      });
    },
    cargarEstado() {
      axios.get(this.localVal + "/api/Agente/GetEstado").then((res) => {
        this.listadoEstado = res.data;
      });
    },
    errorDrop(mensajeError) {
      this.$vs.notify({
        title: "Falto seleccionar " + mensajeError,
        text: "Seleccione " + mensajeError,
        color: "danger",
        position: "top-right",
        fixed: true,
      });
    },
    errorTitulo(mensajeError) {
      this.$vs.notify({
        title: mensajeError,
        text: "Debe escribir un titulo superior a 10 caracteres",
        color: "danger",
        position: "top-right",
        fixed: true,
      });
    },
    errorDescripcion(mensajeError) {
      this.$vs.notify({
        title: mensajeError,
        text: "Debe escribir una descripcion superior a 15 caracteres",
        color: "danger",
        position: "top-right",
        fixed: true,
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
      } else if (this.seleccionUsuario.id == 0) {
        this.mensajeError = "el usuario";
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
        this.gestionTicket.fechaInicio == null ||
        this.gestionTicket.fechaInicio < hoy.getDate()
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
      } else if (
        this.gestionTicket.tituloP.trim() === "" ||
        this.gestionTicket.tituloP.length < 10
      ) {
        this.mensajeError = "El titulo no puede ser menor a 10 caracteres";
        this.errorTitulo(this.mensajeError);
      } else if (
        this.gestionTicket.descripcionP.trim() === "" ||
        this.gestionTicket.descripcionP.length < 15
      ) {
        this.mensajeError = "La descripcion no puede ser menor a 15 caracteres";
        this.errorDescripcion(this.mensajeError);
      } else {
        this.gestionTicket.id_user = this.seleccionUsuario.id;
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

        axios
          .post(this.localVal + "/api/Agente/PostNuevoTicket", ticket)
          .then((res) => {
            const ticketServer = res.data;
          });
      }
    },
    probando() {
      console.log(this.seleccionUsuario);
    },
  },
  created() {
    this.cargarEdificios();
    this.cargarServicios();
    this.cargarUnidadEsp();
    this.cargarTipoRep();
    this.cargarSupervisores();
    this.cargarTrabajadores();
    this.cargarEstado();
    this.cargarUsuarios();
  },
  async beforeMount() {},
  components: {
    flatPickr,
    "v-select": vSelect,
  },
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
