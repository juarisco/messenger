/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import BootstrapVue from "bootstrap-vue";
import Vue from "vue";
import Vuex from "vuex";

Vue.use(BootstrapVue);
Vue.use(Vuex);

// window.eventBus = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component(
  "contact-form-component",
  require("./components/ContactFormComponent.vue")
);

Vue.component(
  "profile-form-component",
  require("./components/ProfileFormComponent.vue")
);

Vue.component("status-component", require("./components/StatusComponent.vue"));

Vue.component(
  "messenger-component",
  require("./components/MessengerComponent.vue")
);

Vue.component(
  "message-conversation-component",
  require("./components/MessageConversationComponent.vue")
);

Vue.component(
  "contact-component",
  require("./components/ContactComponent.vue")
);

Vue.component(
  "contact-list-component",
  require("./components/ContactListComponent.vue")
);

Vue.component(
  "active-conversation-component",
  require("./components/ActiveConversationComponent.vue")
);

const store = new Vuex.Store({
  state: {
    messages: [],
    selectedConversation: null,
    conversations: [],
    querySearch: "",
    user: null
  },
  mutations: {
    setUser(state, user) {
      state.user = user;
    },
    newMessagesList(state, messages) {
      state.messages = messages;
    },
    addMessage(state, message) {
      const conversation = state.conversations.find(conversation => {
        return (
          conversation.contact_id == message.from_id ||
          conversation.contact_id == message.to_id
        );
      });

      const author =
        state.user.id === message.from_id ? "Tú" : conversation.contact_name;

      conversation.last_message = `${author}: ${message.content}`;
      conversation.last_time = message.created_at;

      if (
        state.selectedConversation.contact_id == message.from_id ||
        state.selectedConversation.contact_id == message.to_id
      )
        // state.$store.commit("addMessage", message);
        state.messages.push(message);
    },
    selectConversation(state, conversation) {
      state.selectedConversation = conversation;
    },
    newQuerySearch(state, newValue) {
      state.querySearch = newValue;
    },
    newConversationsList(state, conversations) {
      state.conversations = conversations;
    }
  },
  actions: {
    getMessages(context, conversation) {
      axios
        .get(`/api/messages/?contact_id=${conversation.contact_id}`)
        .then(response => {
          context.commit("newMessagesList", response.data);
          context.commit("selectConversation", conversation);
        });
    },
    getConversations(context) {
      axios.get("/api/conversations").then(response => {
        context.commit("newConversationsList", response.data);
      });
    },
    postMessage(context, newMessage) {
      const params = {
        to_id: context.state.selectedConversation.contact_id,
        content: newMessage
      };
      axios.post("/api/messages", params).then(response => {
        if (response.data.success) {
          newMessage = "";
          const message = response.data.message;
          message.written_by_me = true;
          context.commit("addMessage", message);
        }
      });
    }
  },
  getters: {
    conversationsFiltered(state) {
      console.log("conversationFiltered fired");
      return state.conversations.filter(conversation =>
        conversation.contact_name
          .toLowerCase()
          .includes(state.querySearch.toLowerCase())
      );
    }
  }
});

const app = new Vue({
  el: "#app",
  store,
  methods: {
    logout() {
      document.getElementById("logout-form").submit();
    }
  }
});
