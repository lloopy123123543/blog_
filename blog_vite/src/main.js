import { createApp } from 'vue'
import './style.css'
import {createRouter, createWebHistory} from "vue-router"
import HelloWorld from './components/HelloWorld.vue'
import Login from './components/Login.vue'
import App from './App.vue'
import Blogs from './components/Blogs.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HelloWorld
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/blogs',
            name: 'blogs',
            component: Blogs
        }
    ]
})

const app = createApp(App);
app.use(router);
app.mount('#app');
