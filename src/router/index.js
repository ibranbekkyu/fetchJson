// import { createRouter, createWebHistory } from 'vue-router'; 
// import Home from '@/views/HomePage.vue';
// import Posts from '@/components/Posts.vue';

// const routes = [
//     { path: '/', name: "home", component: Home },
//     { path: '/posts', name: "posts", component: Posts },
// ]

// const router = createRouter({
//     history: createWebHistory(import.meta.env.BASE_URL),
//     routes
// });

// export default router;

import { createRouter, createWebHistory } from 'vue-router'; 
import Home from '@/pages/Home.vue';
import Posts from '@/components/Posts.vue';
import PostsView from '@/components/PostsView.vue';
import PostsEdit from '@/components/PostsEdit.vue';
import PostsAdd from '@/components/PostsAdd.vue';
import Login from '@/components/PostsLogin.vue';
const routes = [
    { path: '/', name: "login", component: Login },
    { path: '/home', name: "home", component: Home },
    { path: '/posts', name: "posts", component: Posts },
    { path: '/posts/add', name: "postsAdd", component: PostsAdd },
    { path: '/posts/:id', name: "postsView", component: PostsView },
    { path: '/posts/edit/:id', name: "postsEdit", component: PostsEdit },
]

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});

export default router;