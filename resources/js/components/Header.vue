<template>
    <nav class="teal darken-4">
        <div class="container">
            <router-link to="/" class="logo-link">
                Test App
            </router-link>
            <ul>
                <template v-if="!currentUser">
                    <li>
                        <router-link to="/login" class="nav-link">Login</router-link>
                    </li>
                </template>
                <template v-else>
                    <li>
                        <!-- Dropdown Trigger -->
                        <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>{{ currentUser.name }} </a>

                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a href="#!">{{ currentUser.name }} </a></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="#!" @click.prevent="logout">Logout</a></li>
                        </ul>
                    </li>
                </template>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'app-header',
        methods: {
            logout() {
                this.$store.commit('logout');
                this.$router.push('/login');
            }
        },
        computed: {
            currentUser() {
                return this.$store.getters.currentUser
            },
            isAdmin() {
                return this.$store.getters.isAdmin
            }
        }
    }
</script>

<style scoped>

    .logo-link {
        text-decoration: none;

        /*margin: 10px;*/
        /*float: left;*/
        /*width: 200px;*/
        /*height: 60px;*/
        /*background: url("img/logo.png") no-repeat center;*/
    }

    nav ul li {
        float: left;
    }

    .dropdown-trigger {
        position: absolute;
        top: 20px;
        right: 0;
    }

    .btn {
        height: 24px;
        line-height: 24px;
        padding: 0 0.5rem;
        background-color: antiquewhite;
        margin-left: 10px;
        color: rgba(0, 0, 0, 0.7);
    }

</style>
