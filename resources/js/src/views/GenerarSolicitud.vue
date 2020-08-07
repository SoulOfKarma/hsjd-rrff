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
            <div class="vx-col md:w-1/2 w-full mt-5">
                <vs-select
                    v-model="city"
                    class="w-full select-large"
                    label="Unidad Especifica"
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
                    label="Tipo de Reparacion"
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
            <vs-divider>Informacion del Problema</vs-divider>
        </h4>
        <div class="vx-row">
            <div class="vx-col w-full mt-5">
                <vs-input
                    label="Titulo problema"
                    placeholder="Ej. Falla de red en equipo x"
                    v-model="valorTitulo"
                />

                <br />
                <vs-textarea
                    label="Descripcion de la problematica"
                    v-model="areaT"
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
        cityOptions: [
            { text: "New York", value: "new-york" },
            { text: "Chicago", value: "chicago" },
            { text: "San Francisco", value: "san-francisco" },
            { text: "Boston", value: "boston" }
        ],
        name: "Rick S.",
        areaT: "",
        valorTitulo: "",
        city: "new-york"
    }),
    methods: {}
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
