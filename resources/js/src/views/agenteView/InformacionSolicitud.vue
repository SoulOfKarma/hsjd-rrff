<template>
  <div>
    <h4>
      <vs-divider>Solicitud N° "???"</vs-divider>
    </h4>
    <vs-card fixedHeight>
      <br />
      <vs-textarea label="Actualizar seguimiento" v-model="textarea" />
      <vs-button type="gradient">Actualizar</vs-button>
    </vs-card>

    <vs-card>
      <vs-list>
        <vs-list-item title="Usuario X" subtitle="AAAA"></vs-list-item>
        <vs-list-item title="Usuario A" subtitle="BBBB"></vs-list-item>
        <vs-list-item title="Usuario C" subtitle="VVVVV"></vs-list-item>
        <vs-list-item title="Usuario X" subtitle="BBBBB"></vs-list-item>
      </vs-list>
    </vs-card>
  </div>
</template>

<script>
export default {
  data: () => ({
    textarea: "",
    value1: "",
  }),
};
</script>