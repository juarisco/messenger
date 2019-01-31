<template>
  <b-container fluid style="height: calc(100vh - 56px);">
    <b-row no-gutters>
      <b-col cols="4">
        <contact-form-component/>

        <contact-list-component/>
      </b-col>
      <b-col cols="8">
        <active-conversation-component
          v-if="selectedConversation"
          :contact-id="selectedConversation.contact_id"
          :contact-name="selectedConversation.contact_name"
          :contact-image="selectedConversation.contact_image"
          :my-image="myImageUrl"
          @messageCreated="addMessage($event)"
        />
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  props: {
    user: Object
  },
  data() {
    return {};
  },
  mounted() {
    this.$store.dispatch("getConversations");

    Echo.private(`users.${this.user.id}`).listen("MessageSent", data => {
      // console.log(message);
      const message = data.message;
      message.written_by_me = false;

      this.addMessage(message);
    });

    Echo.join("messenger")
      .here(users => {
        users.forEach(user => this.changeStatus(user, true));
      })
      .joining(user => {
        this.changeStatus(user, true);
      })
      .leaving(user => {
        this.changeStatus(user, false);
      });
  },
  methods: {
    addMessage(message) {
      const conversation = this.conversations.find(conversation => {
        return (
          conversation.contact_id == message.from_id ||
          conversation.contact_id == message.to_id
        );
      });

      const author =
        this.user.id === message.from_id ? "Tú" : conversation.contact_name;

      conversation.last_message = `${author}: ${message.content}`;
      conversation.last_time = message.created_at;

      if (
        this.selectedConversation.contact_id == message.from_id ||
        this.selectedConversation.contact_id == message.to_id
      )
        this.$store.commit("addMessage", message);
    },
    changeStatus(user, status) {
      const index = this.$store.state.conversations.findIndex(conversation => {
        return conversation.contact_id == user.id;
      });
      if (index >= 0)
        this.$set(this.$store.state.conversations[index], "online", status);
    }
  },
  computed: {
    selectedConversation() {
      return this.$store.state.selectedConversation;
    },
    myImageUrl() {
      return `/users/${this.user.image}`;
    }
  }
};
</script>

<style>
</style>
