import {getLocalUser} from "./auth";

const user = getLocalUser();

export default {
    state: {
        currentUser: user,
        isLoggedIn: !!user,
        auth_error: null,
        customers: [],
    },
    getters: {
        isLoggedIn: state => state.isLoggedIn,
        currentUser: state => state.currentUser,
        authError: state => state.auth_error,
        customers: state => state.customers,
        isAdmin: state => state.isAdmin
    },
    mutations: {
        login: state => state.auth_error = null,

        loginSuccess: (state, payload) => {
            state.auth_error = null;
            state.isLoggedIn = true;
            let token = payload.access_token
            state.currentUser = ({...payload.user, token})
            localStorage.setItem('user', JSON.stringify(state.currentUser));
        },

        loginFailed: (state, payload) => state.auth_error = payload.error,

        logout: state => {
            localStorage.removeItem('user');
            state.isLoggedIn = false;
            state.currentUser = null;
        },

        // updateCustomers: (state, payload) => state.customers = payload,
    },
    actions: {
        login: context => context.commit('login'),

        logout: context => axios.post('/api/auth/logout')
            .then((response) => {
                if (response.status === 200) {
                    context.commit('logout')
                }
            })
            .catch((error) => {  }),

        // getCustomers: context => axios.get('/api/customers')
        //     .then((response) => {
        //         if (response.status === 200) {
        //             context.commit('updateCustomers', response.data.customers)
        //         }
        //     })
        //     .catch((error) => {  }),
    }
}
