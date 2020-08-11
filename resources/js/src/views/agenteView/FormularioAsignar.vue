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
                    v-model="city"
                    class="w-full select-large"
                    label="Edificio"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.value"
                        :text="item.text"
                        v-for="(item, index) in cityOptions"
                        class="w-full"
                    />
                </vs-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    v-model="city"
                    class="w-full select-large"
                    label="Servicio"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.value"
                        :text="item.text"
                        v-for="(item, index) in cityOptions"
                        class="w-full"
                    />
                </vs-select>
            </div>
        </div>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    v-model="city"
                    class="w-full select-large"
                    label="Ubicacion Especifica"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.value"
                        :text="item.text"
                        v-for="(item, index) in cityOptions"
                        class="w-full"
                    />
                </vs-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    v-model="city"
                    class="w-full select-large"
                    label="Especialidad"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.value"
                        :text="item.text"
                        v-for="(item, index) in cityOptions"
                        class="w-full"
                    />
                </vs-select>
            </div>
        </div>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    v-model="city"
                    class="w-full select-large"
                    label="Estado"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.value"
                        :text="item.text"
                        v-for="(item, index) in cityOptions"
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
                    v-model="city"
                    class="w-full select-large"
                    label="Supervisor"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.value"
                        :text="item.text"
                        v-for="(item, index) in cityOptions"
                        class="w-full"
                    />
                </vs-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    v-model="city"
                    class="w-full select-large"
                    label="Tecnico a Asignar"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.value"
                        :text="item.text"
                        v-for="(item, index) in cityOptions"
                        class="w-full"
                    />
                </vs-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    v-model="city"
                    class="w-full select-large"
                    label="Apoyo 1"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.value"
                        :text="item.text"
                        v-for="(item, index) in cityOptions"
                        class="w-full"
                    />
                </vs-select>
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    v-model="city"
                    class="w-full select-large"
                    label="Apoyo 2"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.value"
                        :text="item.text"
                        v-for="(item, index) in cityOptions"
                        class="w-full"
                    />
                </vs-select>
            </div>
        </div>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    v-model="city"
                    class="w-full select-large"
                    label="Apoyo 3"
                >
                    <vs-select-item
                        :key="index"
                        :value="item.value"
                        :text="item.text"
                        v-for="(item, index) in cityOptions"
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
                    v-model="fromDate"
                    placeholder="Fecha Inicio"
                    @on-change="onFromChange"
                />
                <flat-pickr
                    :config="configdateTimePicker"
                    v-model="time1"
                    placeholder="Seleccione Hora"
                />
            </div>
            <div class="vx-col md:w-1/2 w-full mt-5">
                <flat-pickr
                    :config="configTodateTimePicker"
                    v-model="toDate"
                    placeholder="Fecha Termino"
                    @on-change="onToChange"
                />
                <flat-pickr
                    :config="configdateTimePicker"
                    v-model="time2"
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
                <vs-button class="mr-3 mb-2">Enviar</vs-button>
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

export default {
    data: () => ({
        textarea: "",
        value1: "",
        horasCalculadas: 0,
        diaCalculado: 0,
        format: "d MMMM yyyy",
        city: "new-york",
        fromDate: null,
        toDate: null,
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
        cityOptions: [
            { text: "New York", value: "new-york" },
            { text: "Chicago", value: "chicago" },
            { text: "San Francisco", value: "san-francisco" },
            { text: "Boston", value: "boston" }
        ],
        time1: null,
        time2: null,
        configdateTimePicker: {
            enableTime: true,
            enableSeconds: true,
            noCalendar: true
        }
    }),
    computed: {
        calcularHorasTrabajo() {
            this.hora1 = moment(this.time1, "HH:mm");
            this.hora2 = moment(this.time2, "HH:mm");
            this.horaCalculada = moment
                .duration(this.hora2 - this.hora1)
                .humanize();
            return this.horaCalculada;
        },
        diasCalculados() {
            this.fecha1 = moment(this.fromDate);
            this.fecha2 = moment(this.toDate);
            this.diaCalculado = this.fecha2.diff(this.fecha1, "days");
            return this.diaCalculado;
            // this.diaCalculado = this.fromDate - this.toDate;
        }
    },
    methods: {
        onFromChange(selectedDates, dateStr, instance) {
            this.$set(this.configTodateTimePicker, "minDate", dateStr);
        },
        onToChange(selectedDates, dateStr, instance) {
            this.$set(this.configFromdateTimePicker, "maxDate", dateStr);
        }
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
