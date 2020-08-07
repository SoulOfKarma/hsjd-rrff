<template>
  <div>
    <h4>
      <vs-divider>Crear Solicitud</vs-divider>
    </h4>

    <vs-card fixedHeight>
      <div slot="header">
        <h3>Usuario Solicitante</h3>
      </div>
      <div>
        <span>???</span>
      </div>
    </vs-card>
    <h4>
      <vs-divider>Ubicacion</vs-divider>
    </h4>
    <vx-card alignment="center" vs-align="center">
      <vs-button class="btnx" type="filled">Edificio</vs-button>
      <vs-dropdown>
        <vs-button class="btn-drop" type="filled" icon="expand_more"></vs-button>
        <!-- <a href="#">Hola mundo</a> -->
        <vs-dropdown-menu>
          <vs-dropdown-item>option 1</vs-dropdown-item>
          <vs-dropdown-item>option 2</vs-dropdown-item>
          <vs-dropdown-group>
            <vs-dropdown-item>option 1</vs-dropdown-item>
            <vs-dropdown-item>option 2</vs-dropdown-item>
          </vs-dropdown-group>
          <vs-dropdown-item divider>option 3</vs-dropdown-item>
        </vs-dropdown-menu>
      </vs-dropdown>
      <span></span>
      <vs-button class="btnx" type="filled">Servicio</vs-button>
      <vs-dropdown>
        <vs-button class="btn-drop" type="filled" icon="expand_more"></vs-button>
        <!-- <a href="#">Hola mundo</a> -->

        <vs-dropdown-menu>
          <vs-dropdown-item>option 1</vs-dropdown-item>
          <vs-dropdown-item>option 2</vs-dropdown-item>
          <vs-dropdown-group>
            <vs-dropdown-item>option 1</vs-dropdown-item>
            <vs-dropdown-item>option 2</vs-dropdown-item>
          </vs-dropdown-group>
          <vs-dropdown-item divider>option 3</vs-dropdown-item>
        </vs-dropdown-menu>
      </vs-dropdown>
      <span></span>
      <vs-button class="btnx" type="filled">Unidad Especifica</vs-button>
      <vs-dropdown>
        <vs-button class="btn-drop" type="filled" icon="expand_more"></vs-button>
        <!-- <a href="#">Hola mundo</a> -->

        <vs-dropdown-menu>
          <vs-dropdown-item>option 1</vs-dropdown-item>
          <vs-dropdown-item>option 2</vs-dropdown-item>
          <vs-dropdown-group>
            <vs-dropdown-item>option 1</vs-dropdown-item>
            <vs-dropdown-item>option 2</vs-dropdown-item>
          </vs-dropdown-group>
          <vs-dropdown-item divider>option 3</vs-dropdown-item>
        </vs-dropdown-menu>
      </vs-dropdown>
      <span></span>
      <vs-button class="btnx" type="filled">Asignar Unidad de reparacion</vs-button>
      <vs-dropdown>
        <vs-button class="btn-drop" type="filled" icon="expand_more"></vs-button>
        <!-- <a href="#">Hola mundo</a> -->

        <vs-dropdown-menu>
          <vs-dropdown-item>option 1</vs-dropdown-item>
          <vs-dropdown-item>option 2</vs-dropdown-item>
          <vs-dropdown-group>
            <vs-dropdown-item>option 1</vs-dropdown-item>
            <vs-dropdown-item>option 2</vs-dropdown-item>
          </vs-dropdown-group>
          <vs-dropdown-item divider>option 3</vs-dropdown-item>
        </vs-dropdown-menu>
      </vs-dropdown>
    </vx-card>
    <vs-card></vs-card>
    <h4>
      <vs-divider>Estado Solicitud</vs-divider>
    </h4>
    <vs-card fixedHeight>
      <vs-input label="Titulo" placeholder="Ej. Falla enchufe sala cirugia" v-model="value1" />
      <vs-textarea label="Descripcion de la solicitud" v-model="textarea" />
      <vs-button type="gradient">Agregar</vs-button>
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

<style lang="stylus">
.examplex {
  display: flex;
  align-items: center;
  justify-content: center;

  button {
    margin: 0px !important;

    &.btnx {
      margin-left: 10px !important;
      border-radius: 5px 0px 0px 5px;
    }

    &.btn-drop {
      border-radius: 0px 5px 5px 0px;
      border-left: 1px solid rgba(255, 255, 255, 0.2);
    }
  }
}
</style>
<style lang="stylus">
.cardx {
  margin: 15px;
}
</style>