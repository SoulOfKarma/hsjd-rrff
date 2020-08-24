<template>
  <div id="app">
    <GSTC :config="config" @state="onState" />
  </div>
</template>

<script>
import GSTC from "vue-gantt-schedule-timeline-calendar";
import axios from "axios";
import moment from "moment";
let subs = [];

export default {
  name: "app",
  components: {
    GSTC,
  },
  data() {
    return {
      listadoTrabajadores: [],
      listadoHoraFecha: [],

      localVal: "http://127.0.0.1:8000",

      config: {
        height: 400,
        locale: {
          name: "es-Cl",
          Now: "Justo Ahora",
          weekdays: [
            "Lunes",
            "Martes",
            "Miercoles",
            "Jueves",
            "Viernes",
            "Sabado",
            "Domingo",
          ],
          months: [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre",
          ],
        },
        list: {
          rows: {
            id: {
              id: "1",
              label: "Row 1",
            },
          },
          columns: {
            data: {
              id: {
                id: "id",
                data: "id",
                width: 50,
                header: {
                  content: "ID",
                },
              },
              label: {
                id: "label",
                data: "tra_nombre_apellido",
                width: 200,
                header: {
                  content: "Label",
                },
              },
            },
          },
        },
        chart: {
          items: {
            id: {
              id: "",
              rowId: "",
              label: "",
              time: {
                start: new Date().getTime(),
                end: new Date().getTime() + 24 * 60 * 60 * 1000,
              },
            },
          },
        },
      },
    };
  },
  methods: {
    cargarTrabajadores() {
      axios.get(this.localVal + "/api/Agente/GetTrabajadores").then((res) => {
        this.listadoTrabajadores = res.data;

        let c = this.listadoTrabajadores;
        let b = [];
        let a = 6;

        c.forEach((value, index) => {
          if (a != value.id) {
            b.push(value);
          }
        });
        this.config.list.rows = b;
      });
    },
    cargarHoraFechaCalendario() {
      axios.get(this.localVal + "/api/Agente/getDatoCalendario").then((res) => {
        this.listadoHoraFecha = res.data;

        let c = this.listadoHoraFecha;
        let f = {
          id: "",
          rowId: "",
          label: "",
          time: {
            start: new Date().getTime(),
            end: new Date().getTime() + 24 * 60 * 60 * 1000,
          },
        };
        var fecha = {
          start: moment(),
          end: moment(),
        };
        let b = [];

        let a = 6;
        console.log(f);
        c.forEach((value, index) => {
          console.log(f);
          f.id = value.id;
          f.rowId = value.id_trabajador;
          f.label = value.id_trabajador;
          fecha.start = new Date(value.fechaInicio + " " + value.horaInicio);
          fecha.end = new Date(value.fechaTermino + " " + value.horaTermino);
          //fecha.start = moment(value.fechaInicio).format("DDMMYYYY");
          // fecha.end = moment(value.fechaTermino).format("DDMMYYYY");

          f.time = fecha;

          b.push(f);
          console.log(f + "No se que pasaaa");

          console.log(f.id + "Este es ID ");
        });
        console.log(b);
        this.config.chart.items = b;
        console.log(this.config);
      });
    },
    onState(state) {
      this.state = state;
      subs.push(
        state.subscribe("config.chart.items.1", (item) => {
          console.log("item 1 changed", item);
        })
      );
      subs.push(
        state.subscribe("config.list.rows.1", (row) => {
          console.log("row 1 changed", row);
        })
      );
    },
  },
  beforeMount() {
    this.cargarTrabajadores();
    this.cargarHoraFechaCalendario();
    //this.config.list.rows.
  },
  mounted() {
    /* setTimeout(() => {
            const item1 = this.config.chart.items["1"];
            item1.label = "label changed dynamically";
            item1.time.end += 2 * 24 * 60 * 60 * 1000;
        }, 2000); */
  },
  beforeDestroy() {
    subs.forEach((unsub) => unsub());
  },
};
</script>
