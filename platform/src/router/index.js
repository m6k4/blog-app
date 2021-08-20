import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  {
    // path: "*",
    path: '/:catchAll(.*)',
    name: 'NotFound',
    redirect: '/',
  },
  {
    path: '/',
    name: 'Platform',
    component: () => import(/* webpackChunkName: "platform" */ '../views/Platform.vue'),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
