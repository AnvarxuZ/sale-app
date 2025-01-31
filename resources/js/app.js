import App from "./components/App.vue";
import PrimeVue from "primevue/config";
import "primeflex/primeflex.css";
import Aura from "@primevue/themes/aura";
import ToastService from 'primevue/toastservice';


import { createApp } from "vue";

const app = createApp(App);

app.use(PrimeVue, { theme: { preset: Aura } });
app.use(ToastService);
// app.component('app', App);

app.mount("#app");
