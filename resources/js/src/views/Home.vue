<template>
    <div>
        <div class="vx-row">
            <div class="vx-col w-full">
                <vs-button class="mr-3 mb-2" @click="traerData"
                    >Submit</vs-button
                >
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import router from "../router";
export default {
    data() {
        return {
            solicitudes: [],
            localVal: "http://127.0.0.1:8000"
        };
    },
    methods: {
        traerData() {
            axios.get(this.localVal + "/api/Usuario/GetUsuarios").then(res => {
                this.solicitudes = res.data;
                console.log(this.solicitudes);
            });
        }
    }
};
</script>
