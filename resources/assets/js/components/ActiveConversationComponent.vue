<template>
  <b-row>
    <b-col cols="8">
      <b-card
        footer-bg-variant="light"
        footer-border-variant="dark"
        title="Conversación activa"
        class="h-100"
      >
        <message-conversation-component>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
          sollicitudin.
        </message-conversation-component>

        <message-conversation-component written-by-me>Nulla vel metus scelerisque ante sollicitudin.</message-conversation-component>

        <div slot="footer">
          <b-form class="mb-0">
            <b-input-group>
              <b-form-input class="text-center" type="text" placeholder="Escribe un mensaje ..."></b-form-input>

              <b-input-group-append>
                <b-button variant="primary">Enviar</b-button>
              </b-input-group-append>
            </b-input-group>
          </b-form>
        </div>
      </b-card>
    </b-col>
    <b-col cols="4">
      <b-img
        rounded="circle"
        blank
        width="60"
        height="60"
        blank-color="#777"
        alt="img"
        class="m-1"
      />
      <p>Usuario seleccionado</p>
      <hr>
      <b-form-checkbox>Desactivar notificaciones</b-form-checkbox>
    </b-col>
  </b-row>
</template>

<script>
export default {
  data() {
    return {};
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
