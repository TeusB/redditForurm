//imports for app
import './bootstrap';
import 'bootstrap/dist/css/bootstrap.css';
import { createApp } from 'vue';
import { router } from './router';
import appMain from './app.vue';

const app = createApp(appMain);
app.use(router);
app.mount("#app");