<template>
    <div>
        <h4>
            <vs-divider>Modificar Solicitud</vs-divider>
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
            <vs-divider>Reasignar Fecha y Hora de visita</vs-divider>
        </h4>
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full mt-5">
                <flat-pickr
                    :config="configFromdateTimePicker"
                    v-model="fromDate"
                    placeholder="Fecha Reasignacion"
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
                    v-model="diaCalculado"
                />
            </div>

            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-input
                    disabled="true"
                    label-placeholder="Horas Ejecucion"
                    v-model="horasCalculadas"
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
            this.horaCalculada = this.time1 - this.time2;
        },
        diasCalculados() {
            this.diaCalculado = this.fromDate - this.toDate;
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
