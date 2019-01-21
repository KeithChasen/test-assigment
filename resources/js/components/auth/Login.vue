<template>
    <div class="container">
        <div class="row">
            <form @submit.prevent="authenticate" class="col s12">
                <div class="input-field">
                    <input type="email" id="email" v-model="form.email">
                    <label for="email">Email</label>
                </div>
                <div class="input-field">
                    <input type="password" id="password"v-model="form.password">
                    <label for="password">Password</label>
                </div>
                <div class="input-field">
                    <input type="submit" value="Login" class="btn">
                </div>
                <div class="form-group" v-if="authError">
                    <p class="error">
                        {{ authError }}
                    </p>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
    import {login} from "../../auth";
    export default {
        name: "login",
        data() {
            return {
                form: {
                    email: '',
                    password:''
                },
                error: null
            }
        },
        methods: {
            authenticate() {
                this.$store.dispatch('login');
                login(this.$data.form)
                    .then((res) => {
                    this.$store.commit('loginSuccess', res);
                this.$router.push({path: '/'});
            })
            .catch((error) => {
                    this.$store.commit('loginFailed', {error});
            });
            }
        },
        computed: {
            authError() {
                return this.$store.getters.authError;
            }
        }
    }
</script>

<style scoped>
    .error {
        text-align: center;
        color: red;
    }

    .btn {
        background-color: antiquewhite;
        color: rgba(0, 0, 0, 0.7);
    }

    @media
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {

        .row {
            display: block;
        }
    }
</style>
