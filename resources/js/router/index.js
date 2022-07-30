import { createRouter, createWebHistory } from "vue-router";
import ExampleComponent from '../components/ExampleComponent.vue';
// import Login from '../components/guest/Login.vue';
// import Recover from '../components/guest/Recover.vue';
// import Register from '../components/guest/Register.vue';
// import NewCourse from "../components/course/NewCourse.vue";
// import Lession from "../components/course/Lession.vue";

const routes = [
    // {
    //     path : '/recover',
    //     name : 'recover.index',
    //     component : Recover
    // },
    // // {
    // //     path : '/verify-email',
    // //     name : 'register.verify',
    // //     // component  
    // // }
    // {
    //     path : "/login",
    //     name : "login.index",
    //     component : Login
    // },
    // {
    //     path : "/register",
    //     name : "register.index",
    //     component : Register
    // },
    // {
    //     path : "/ss_admin/course/create",
    //     name : "course.create",
    //     component : NewCourse
    // },
    // {
    //     path: "/course/:id/watch",
    //     name: "course.watch",
    //     component : Lession
    // }
];

export default createRouter ({
    history : createWebHistory(),
    routes
});