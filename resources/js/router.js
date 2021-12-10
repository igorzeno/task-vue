import Vue from 'vue';
import VueRouter from "vue-router";

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/tasks', component: () => import('./components/Task/Index'),
            name: 'tasks.index',
        },
        {
            path: '/tasks/create', component: () => import('./components/Task/Create'),
            name: 'tasks.create',
        },
        {
            path: '/tasks/:id/edit', component: () => import('./components/Task/Edit'),
            name: 'tasks.edit',
        },
        {
            path: '/tasks/:id', component: () => import('./components/Task/Show'),
            name: 'tasks.show',
        }
    ]
})
