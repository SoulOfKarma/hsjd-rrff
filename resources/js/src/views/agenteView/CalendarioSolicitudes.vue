<template>
    <div id="app">
        <div v-if="valc">
            <GSTC :config="config" />
        </div>
    </div>
</template>

<script>
import GSTC from "vue-gantt-schedule-timeline-calendar";
import axios from "axios";
import moment from "moment";
import CalendarScroll from "gantt-schedule-timeline-calendar/dist/CalendarScroll.plugin.js";
let subs = [];

export default {
    name: "app",
    components: {
        GSTC
    },
    data() {
        return {
            valc: false,
            listadoTrabajadores: [],
            listadoHoraFecha: [],

            localVal: "http://127.0.0.1:8000",

            config: {
                height: 400,
                plugins: [
                    CalendarScroll({
                        speed: 0.1,
                        hideScroll: true,
                        onChange(time) {
                            console.log(time);
                        }
                    })
                ],
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
                        "Domingo"
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
                        "Diciembre"
                    ]
                },
                list: {
                    rows: {
                        id: {
                            id: "",
                            label: ""
                        }
                    },
                    columns: {
                        data: {
                            id: {
                                id: "id",
                                data: "id",
                                width: 50,
                                header: {
                                    content: "ID"
                                }
                            },
                            label: {
                                id: "label",
                                data: "tra_nombre_apellido",
                                width: 200,
                                header: {
                                    content: "Trabajador"
                                }
                            }
                        }
                    }
                },
                chart: {
                    items: {}
                }
            }
        };
    },
    methods: {
        cargarTrabajadores() {
            axios
                .get(this.localVal + "/api/Agente/GetTrabajadoresEX")
                .then(res => {
                    this.listadoTrabajadores = res.data;

                    let c = this.listadoTrabajadores;

                    let arregloTra = [];
                    var va = {};
                    arregloTra.push(va);
                    c.forEach((value, index) => {
                        arregloTra.push(value);
                    });

                    this.config.list.rows = arregloTra;
                });
        },
        cargarHoraFechaCalendario() {
            axios
                .get(this.localVal + "/api/Agente/getDatoCalendario")
                .then(res => {
                    this.listadoHoraFecha = res.data;

                    let c = this.listadoHoraFecha;
                    var f = {
                        id: "",
                        rowId: "",
                        label: "",
                        time: {
                            start: new Date().getTime(),
                            end: new Date().getTime() + 24 * 60 * 60 * 1000,
                            period: "Hour",
                            zoom: 22
                        },
                        style: {
                            background: "#30B2F6",
                            "border-radius": "1px"
                        }
                    };
                    var fecha = {
                        start: moment(),
                        end: moment()
                    };
                    let b = [];

                    let a = 0;
                    b.push(f);
                    c.forEach((value, index) => {
                        f = {
                            id: "",
                            rowId: "",
                            label: "",
                            time: {
                                start: new Date().getTime(),
                                end: new Date().getTime() + 24 * 60 * 60 * 1000,
                                period: "Hour",
                                zoom: 22
                            },
                            style: {
                                background:
                                    "#" +
                                    ((Math.random() * 0xffffff) << 0).toString(
                                        16
                                    )
                            }
                        };
                        fecha = {
                            start: moment(),
                            end: moment()
                        };

                        f.id = value.id;
                        f.rowId = value.id_trabajador;
                        f.label = value.tra_nombre_apellido;
                        fecha.start = new Date(
                            value.fechaInicio + " " + value.horaInicio
                        ).getTime();
                        fecha.end =
                            new Date(
                                value.fechaTermino + " " + value.horaTermino
                            ).getTime() +
                            24 * 60 * 60 * 1000;

                        f.time = fecha;

                        b.push(f);
                    });

                    this.config.chart.items = b;
                    console.log(this.config);
                    this.valc = true;
                });
        }
    },
    created() {
        this.cargarTrabajadores();
        this.cargarHoraFechaCalendario();
    },
    beforeMount() {},
    mounted() {
        setTimeout(() => {}, 2000);
    },
    beforeDestroy() {
        subs.forEach(unsub => unsub());
    }
};
</script>
