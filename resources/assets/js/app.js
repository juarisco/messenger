/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import BootstrapVue from "bootstrap-vue";
import VueRouter from "vue-router";
import ExampleComponent from "./components/ExampleComponent.vue";
import MessengerComponent from "./components/MessengerComponent.vue";
import store from "./store";

Vue.use(VueRouter);
Vue.use(BootstrapVue);

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

/*Vue.component(
  "messenger-component",
  require("./components/MessengerComponent.vue")
);*/

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

const routes = [
  { path: "/chat", component: MessengerComponent },
  { path: "/chat/:conversationId", component: MessengerComponent },
  { path: "/example", component: ExampleComponent }
];

const router = new VueRouter({
  routes,
  mode: "history"
});

const app = new Vue({
  el: "#app",
  store,
  router,
  methods: {
    logout() {
      document.getElementById("logout-form").submit();
    }
  }
});
