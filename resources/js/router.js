import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import About from "./pages/About";
import CheckPost from "./pages/CheckPost";
import Page404 from "./pages/Page404";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path:"/about",
            name: "about",
            component: About
        },
        {
            path: "/posts/:slug",
            name: "check-post",
            component: CheckPost
        },
        {
            path: "/*",
            name: "page404",
            component: Page404
        }
    ]
});

export default router