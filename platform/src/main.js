import { createApp } from 'vue';
import ElementPlus from 'element-plus';
import App from './App.vue';
import CustomButton from './components/Common/CustomButton/index.vue';
import router from './router';
import store from './store';
import 'tailwindcss/tailwind.css';
import './assets/tailwind.css';

const app = createApp(App);
app.use(store);
app.use(router);
app.use(ElementPlus);
app.component('CustomButton', CustomButton);
app.mount('#app');
