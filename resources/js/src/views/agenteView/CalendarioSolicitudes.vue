<template>
    <div id="app">
        <div v-if="valc">
            <div class="flex mb-4">
                <div class="w-1/3 bg-grid-color-secondary h-12"></div>
                <div class="w-1/3 bg-grid-color h-12">
                    <v-select
                        v-model="horaSeleccionada"
                        label="descripcionHora"
                        :options="horas"
                        @input="cambioCalendario(horaSeleccionada.hora)"
                    />
                </div>
                <div class="w-1/3 bg-grid-color-secondary h-12"></div>
            </div>

            <GSTC :config="config" @state="onState" />
        </div>
    </div>
</template>

<script>
import GSTC from "vue-gantt-schedule-timeline-calendar";
import axios from "axios";
import moment from "moment";
import CalendarScroll from "gantt-schedule-timeline-calendar/dist/CalendarScroll.plugin.js";
import Selection from "gantt-schedule-timeline-calendar/dist/Selection.plugin.js";
import vSelect from "vue-select";

let subs = [];

export default {
    name: "app",
    components: {
        "v-select": vSelect,
        GSTC
    },
    data() {
        return {
            value1: 50,
            valc: false,
            listadoTrabajadores: [],
            listadoHoraFecha: [],
            localVal: "http://127.0.0.1:8000",
            horaSeleccionada: {
                id: 3,
                hora: "month",
                descripcionHora: "Meses"
            },
            horas: [
                {
                    id: 1,
                    hora: "hour",
                    descripcionHora: "Horas"
                },
                {
                    id: 2,
                    hora: "day",
                    descripcionHora: "Dias"
                },
                {
                    id: 3,
                    hora: "week",
                    descripcionHora: "Semana"
                },
                {
                    id: 4,
                    hora: "month",
                    descripcionHora: "Meses"
                },
                {
                    id: 5,
                    hora: "year",
                    descripcionHora: "Año"
                }
            ],
            config: {
                height: 400,
                plugins: [
                    CalendarScroll({
                        speed: 0.1,
                        hideScroll: true,
                        onChange(time) {
                            console.log(time);
                        }
                    }),
                    Selection({
                        items: false,
                        rows: false,
                        grid: true, // select only grid cells
                        rectStyle: { opacity: "0.0" }, // hide selecting rectangle
                        // if there is an item in the current selected cell - do not select that cell
                        canSelect(type, currentlySelecting) {
                            if (type === "chart-timeline-grid-row-block") {
                                // check if there is any item that lives inside current cell
                                return currentlySelecting.filter(selected => {
                                    if (!selected.row.canSelect) return false;
                                    for (const item of selected.row._internal
                                        .items) {
                                        if (
                                            (item.time.start >=
                                                selected.time.leftGlobal &&
                                                item.time.start <=
                                                    selected.time
                                                        .rightGlobal) ||
                                            (item.time.end >=
                                                selected.time.leftGlobal &&
                                                item.time.end <=
                                                    selected.time
                                                        .rightGlobal) ||
                                            (item.time.start <=
                                                selected.time.leftGlobal &&
                                                item.time.end >=
                                                    selected.time.rightGlobal)
                                        ) {
                                            return false;
                                        }
                                    }
                                    return true;
                                });
                            }
                            return currentlySelecting;
                        },
                        canDeselect(type, currently, all) {
                            if (type === "chart-timeline-grid-row-blocks") {
                                // if we are selecting we can clear previous selection by returning [] else if
                                // we are not selecting but something is already selected let it be selected - currently
                                return all.selecting[
                                    "chart-timeline-grid-row-blocks"
                                ].length
                                    ? []
                                    : currently;
                            }
                            return [];
                        },
                        selecting(data, type) {
                            //console.log(`selecting ${type}`, data);
                        },
                        deselecting(data, type) {
                            //console.log(`deselecting ${type}`, data);
                        },
                        selected(data, type) {
                            //console.log(`selected ${type}`, data);
                        },
                        deselected(data, type) {
                            //console.log(`deselected ${type}`, data);
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
                    rowHeight: 40,
                    columns: {
                        percent: 100,
                        resizer: {
                            width: 10,
                            inRealTime: true,
                            dots: 6
                        },
                        minWidth: 50,
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
                    },
                    expander: {
                        padding: 18,
                        size: 20,
                        icon: {
                            width: 16,
                            height: 16
                        },
                        icons: {
                            child:
                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><ellipse ry="4" rx="4" id="svg_1" cy="12" cx="12" fill="#000000B0"/></svg>',
                            open:
                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/><path fill="none" d="M0 0h24v24H0V0z"/></svg>',
                            closed:
                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/><path fill="none" d="M0 0h24v24H0V0z"/></svg>'
                        }
                    },
                    toggle: {
                        display: true,
                        icons: {
                            open: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path stroke="null" d="m16.406954,16.012672l4.00393,-4.012673l-4.00393,-4.012673l1.232651,-1.232651l5.245324,5.245324l-5.245324,5.245324l-1.232651,-1.232651z"/><path stroke="null" d="m-0.343497,12.97734zm1.620144,0l11.341011,0l0,-1.954681l-11.341011,0l0,1.954681zm0,3.909362l11.341011,0l0,-1.954681l-11.341011,0l0,1.954681zm0,-9.773404l0,1.95468l11.341011,0l0,-1.95468l-11.341011,0z"/></svg>`,
                            close: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path transform="rotate(-180 4.392796516418457,12) " stroke="null" d="m1.153809,16.012672l4.00393,-4.012673l-4.00393,-4.012673l1.232651,-1.232651l5.245324,5.245324l-5.245324,5.245324l-1.232651,-1.232651z"/><path stroke="null" d="m9.773297,12.97734zm1.620144,0l11.341011,0l0,-1.954681l-11.341011,0l0,1.954681zm0,3.909362l11.341011,0l0,-1.954681l-11.341011,0l0,1.954681zm0,-9.773404l0,1.95468l11.341011,0l0,-1.95468l-11.341011,0z"/></svg>`
                        }
                    }
                },
                scroll: {
                    propagate: true,
                    smooth: false,
                    top: 0,
                    left: 0,
                    xMultiplier: 3,
                    yMultiplier: 3,
                    percent: {
                        top: 0,
                        left: 0
                    },
                    compensation: {
                        x: 0,
                        y: 0
                    }
                },
                chart: {
                    items: {},
                    time: {
                        period: "day",
                        additionalSpaces: {
                            hour: { before: 24, after: 24, period: "hour" },
                            day: { before: 1, after: 1, period: "month" },
                            week: { before: 1, after: 1, period: "year" },
                            month: { before: 6, after: 6, period: "year" },
                            year: { before: 12, after: 12, period: "year" }
                        }
                    },
                    calendar: {
                        expand: true,
                        levels: [
                            {
                                formats: [
                                    {
                                        zoomTo: 17,
                                        period: "day",
                                        className:
                                            "gstc-date-medium gstc-date-left",
                                        format({ timeStart }) {
                                            return timeStart.format(
                                                "DD MMMM YYYY (dddd)"
                                            );
                                        }
                                    },
                                    {
                                        zoomTo: 23,
                                        period: "month",
                                        format({ timeStart }) {
                                            return timeStart.format(
                                                "MMMM YYYY"
                                            );
                                        }
                                    },
                                    {
                                        zoomTo: 24,
                                        period: "month",
                                        format({ timeStart, className, vido }) {
                                            return timeStart.format("MMMM 'YY");
                                        }
                                    },
                                    {
                                        zoomTo: 25,
                                        period: "month",
                                        format({ timeStart }) {
                                            return timeStart.format("MMM YYYY");
                                        }
                                    },
                                    {
                                        zoomTo: 27,
                                        period: "year",
                                        format({ timeStart }) {
                                            return timeStart.format("YYYY");
                                        }
                                    },
                                    {
                                        zoomTo: 100,
                                        period: "year",
                                        default: true,
                                        format() {
                                            return null;
                                        }
                                    }
                                ]
                            },
                            {
                                main: true,
                                formats: [
                                    {
                                        zoomTo: 16,
                                        period: "hour",
                                        format({ timeStart }) {
                                            return timeStart.format("HH:mm");
                                        }
                                    },
                                    {
                                        zoomTo: 17,
                                        period: "hour",
                                        default: true,
                                        format({ timeStart }) {
                                            return timeStart.format("HH");
                                        }
                                    },
                                    {
                                        zoomTo: 19,
                                        period: "day",
                                        className: "gstc-date-medium",
                                        format({ timeStart, className, vido }) {
                                            return vido.html`<span class="${className}-content gstc-date-bold">${timeStart.format(
                                                "DD"
                                            )}</span> <span class="${className}-content gstc-date-thin">${timeStart.format(
                                                "dddd"
                                            )}</span>`;
                                        }
                                    },
                                    {
                                        zoomTo: 20,
                                        period: "day",
                                        default: true,
                                        format({ timeStart, vido, className }) {
                                            return vido.html`<div class="${className}-content gstc-date-top">${timeStart.format(
                                                "DD"
                                            )}</div><div class="${className}-content gstc-date-small">${timeStart.format(
                                                "dddd"
                                            )}</div>`;
                                        }
                                    },
                                    {
                                        zoomTo: 21,
                                        period: "day",
                                        format({ timeStart, vido, className }) {
                                            return vido.html`<div class="${className}-content gstc-date-top">${timeStart.format(
                                                "DD"
                                            )}</div><div class="${className}-content gstc-date-small">${timeStart.format(
                                                "ddd"
                                            )}</div>`;
                                        }
                                    },
                                    {
                                        zoomTo: 22,
                                        period: "day",
                                        className: "gstc-date-vertical",
                                        format({ timeStart, className, vido }) {
                                            return vido.html`<div class="${className}-content gstc-date-top">${timeStart.format(
                                                "DD"
                                            )}</div><div class="${className}-content gstc-date-extra-small">${timeStart.format(
                                                "ddd"
                                            )}</div>`;
                                        }
                                    },
                                    {
                                        zoomTo: 23,
                                        period: "week",
                                        default: true,
                                        format({
                                            timeStart,
                                            timeEnd,
                                            className,
                                            vido
                                        }) {
                                            return vido.html`<div class="${className}-content gstc-date-top">${timeStart.format(
                                                "DD"
                                            )} - ${timeEnd.format(
                                                "DD"
                                            )}</div><div class="${className}-content gstc-date-small gstc-date-thin">${timeStart.format(
                                                "ddd"
                                            )} - ${timeEnd.format("dd")}</div>`;
                                        }
                                    },
                                    {
                                        zoomTo: 25,
                                        period: "week",
                                        className: "gstc-date-vertical",
                                        format({
                                            timeStart,
                                            timeEnd,
                                            className,
                                            vido
                                        }) {
                                            return vido.html`<div class="${className}-content gstc-date-top gstc-date-small gstc-date-normal">${timeStart.format(
                                                "DD"
                                            )}</div><div class="gstc-dash gstc-date-small">-</div><div class="${className}-content gstc-date-small gstc-date-normal">${timeEnd.format(
                                                "DD"
                                            )}</div>`;
                                        }
                                    },
                                    {
                                        zoomTo: 26,
                                        period: "month",
                                        default: true,
                                        className: "gstc-date-month-level-1",
                                        format({ timeStart, vido, className }) {
                                            return vido.html`<div class="${className}-content gstc-date-top">${timeStart.format(
                                                "MMM"
                                            )}</div><div class="${className}-content gstc-date-small gstc-date-bottom">${timeStart.format(
                                                "MM"
                                            )}</div>`;
                                        }
                                    },
                                    {
                                        zoomTo: 27,
                                        period: "month",
                                        className: "gstc-date-vertical",
                                        format({ timeStart, className, vido }) {
                                            return vido.html`<div class="${className}-content gstc-date-top">${timeStart.format(
                                                "MM"
                                            )}</div><div class="${className}-content gstc-date-extra-small">${timeStart.format(
                                                "MMM"
                                            )}</div>`;
                                        }
                                    },
                                    {
                                        zoomTo: 28,
                                        period: "year",
                                        default: true,
                                        className: "gstc-date-big",
                                        format({ timeStart }) {
                                            return timeStart.format("YYYY");
                                        }
                                    },
                                    {
                                        zoomTo: 29,
                                        period: "year",
                                        className: "gstc-date-medium",
                                        format({ timeStart }) {
                                            return timeStart.format("YYYY");
                                        }
                                    },
                                    {
                                        zoomTo: 30,
                                        period: "year",
                                        className: "gstc-date-medium",
                                        format({ timeStart }) {
                                            return timeStart.format("YY");
                                        }
                                    }
                                ]
                            }
                        ]
                    },
                    grid: {
                        block: {
                            onCreate: []
                        }
                    },
                    items: {},
                    spacing: 1
                }
            }
        };
    },
    methods: {
        onState(state) {
            this.state = state;
            let GSTCState = GSTC;
            console.log(GSTCState);
        },
        cambioCalendario(tipoHora) {
            console.log(tipoHora);
            this.config.chart.time.period = tipoHora;
        },
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
                            end: new Date().getTime() + 24 * 60 * 60 * 1000
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
                                end: new Date().getTime() + 24 * 60 * 60 * 1000
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
