require("./bootstrap");
require("admin-lte");
window.Vue = require("vue").default;

import VueRouter from "vue-router";

Vue.use(VueRouter);

const router = new VueRouter({
  mode: "history",

  routes: [
    {
      path: "/home",
      component: require("./components/Home.vue").default,
    },
    {
      path: "/products",
      component: require("./components/Products.vue").default,
    },
  ],
});
const app = new Vue({
  el: "#app",
  router,
});
