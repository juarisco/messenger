<template>
  <b-row>
    <b-col cols="8">
      <b-card
        no-body
        footer-bg-variant="light"
        footer-border-variant="dark"
        title="Conversación activa"
        class="h-100"
      >
        <b-card-body class="card-body-scroll">
          <message-conversation-component
            v-for="message in messages"
            :key="message.id"
            :written-by-me="message.written_by_me"
            :image="message.written_by_me ? myImage : contactImage"
          >{{ message.content }}</message-conversation-component>
        </b-card-body>

        <div id="messages-container"></div>

        <div slot="footer">
          <b-form class="mb-0" @submit.prevent="postMessage" autocomplete="off">
            <b-input-group>
              <b-form-input
                class="text-center"
                type="text"
                v-model="newMessage"
                placeholder="Escribe un mensaje ..."
              ></b-form-input>

              <b-input-group-append>
                <b-button type="submit" variant="primary">Enviar</b-button>
              </b-input-group-append>
            </b-input-group>
          </b-form>
        </div>
      </b-card>
    </b-col>
    <b-col cols="4">
      <b-img :src="contactImage" rounded="circle" width="60" height="60" class="m-1"/>
      <p>{{ contactName }}</p>
      <hr>
      <b-form-checkbox>Desactivar notificaciones</b-form-checkbox>
    </b-col>
  </b-row>
</template>

<script>
export default {
  props: {
    contactId: Number,
    contactName: String,
    contactImage: String,
    myImage: String
  },
  data() {
    return {
      newMessage: ""
    };
  },
  mounted() {
    // eventBus.$on("example", function(data) {
    //   console.log("Ocurrió el evento example", data);
    // });
  },
  methods: {
    postMessage() {
      const params = {
        to_id: this.contactId,
        content: this.newMessage
      };
      axios.post("/api/messages", params).then(response => {
        if (response.data.success) {
          // console.log(response.data);
          this.newMessage = "";
          const message = response.data.message;
          message.written_by_me = true;
          this.$emit("messageCreated", message);
        }
      });
    },
    scrollToBottom() {
      const el = document.querySelector(".card-body-scroll");
      el.scrollTop = el.scrollHeight;
    }
  },
  computed: {
    messages() {
      return this.$store.state.messages;
    }
  },
  updated() {
    this.scrollToBottom();
    console.log("messages ha cambiado");
  }
};
</script>
<style>
.card-body-scroll {
  max-height: calc(100vh - 63px);
  overflow-y: auto;
}
</style>
