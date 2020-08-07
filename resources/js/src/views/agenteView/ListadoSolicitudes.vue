<template>
    <div>
        <h4>
            <vs-divider>Listado de Solicitudes</vs-divider>

            <vs-card>
                <vs-table>
                    <template slot="header">
                        <vs-divider><h3>Solicitudes</h3></vs-divider>

                        <br />
                    </template>
                    <template slot="thead">
                        <vs-th>Nro° Solicitud</vs-th>
                        <vs-th>Titulo</vs-th>
                    </template>
                </vs-table>
            </vs-card>
        </h4>
        <router-link to="/agenteView/InformacionSolicitud">
            <vs-button type="gradient">Ir</vs-button>
        </router-link>
    </div>
</template>

<script>
export default {};
</script>
