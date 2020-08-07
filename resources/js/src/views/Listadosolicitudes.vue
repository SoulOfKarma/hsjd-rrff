<template>
    <div>
        <h4>
            <vs-divider>Listado de Solicitudes</vs-divider>
        </h4>
        <vs-table :data="users">
            <template slot="thead">
                <vs-th>Email</vs-th>
                <vs-th>Name</vs-th>
                <vs-th>Website</vs-th>
                <vs-th>Nro</vs-th>
            </template>

            <template slot-scope="{ data }">
                <vs-tr :key="indextr" v-for="(tr, indextr) in data">
                    <vs-td :data="data[indextr].email">
                        {{ data[indextr].email }}
                    </vs-td>

                    <vs-td :data="data[indextr].username">
                        {{ data[indextr].name }}
                    </vs-td>

                    <vs-td :data="data[indextr].id">
                        {{ data[indextr].website }}
                    </vs-td>

                    <vs-td :data="data[indextr].id">
                        {{ data[indextr].id }}
                    </vs-td>
                </vs-tr>
            </template>
        </vs-table>
        <router-link to="/InformacionSolicitud">
            <vs-button type="gradient">Ir</vs-button>
        </router-link>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: [
                {
                    id: 1,
                    name: "Leanne Graham",
                    username: "Bret",
                    email: "Sincere@april.biz",
                    website: "hildegard.org"
                },
                {
                    id: 2,
                    name: "Ervin Howell",
                    username: "Antonette",
                    email: "Shanna@melissa.tv",
                    website: "anastasia.net"
                }
            ]
        };
    }
};
</script>
