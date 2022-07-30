<template>
    <div>
        <nav>
            <ul>
                <li>
                    <router-link to="/dashboard">Dashboard</router-link>
                </li>
                <li>
                    <router-link to="/login">Logout</router-link>
                </li>
            </ul>
        </nav>
        <h1>Hello World</h1>
    </div>
</template>
<script>
// import Guest from "./navigation/guest.vue"
// import User from "./navigation/user.vue"
export default {
    data ()  {
        return {
            // authUser : window.userIsLoggedIn
        }
    },
    created () {
        // console.log(this.authUser);
    },
    mounted () {
        console.log("Example Mounted");
    }
}
</script>