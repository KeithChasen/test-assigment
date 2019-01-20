export function bootstrap(store, router) {
    router.beforeEach((to, from, next) => {
        const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
        const customerRole = to.matched.some(record => record.meta.customerRole);
        const userRole = to.matched.some(record => record.meta.userRole);
        const currentUser = store.state.currentUser;

        if (requiresAuth && !currentUser) {
            next('/login');
        }

        else if(to.path === '/login' && currentUser) {
            next('/');
        }

        else if (to.path === '/admin' && userRole && currentUser.role.role !== 'user') {
            next('/')
        }

        else if (to.path === '/' && customerRole && currentUser.role.role !== 'customer') {
            next('/admin')
        }

        else {
            next()
        }


    });

    axios.interceptors.response.use(null, (error) => {
        if (error.response.status == 401 || error.response.status == 403) {
            store.commit('logout');
            router.push('/login');
        }

        if (error.response.status == 500) {
            router.push('/');
        }

        return Promise.reject(error);

    });

    if (store.getters.currentUser) {
        setAuthorization(store.getters.currentUser.token);
    }
}

export function setAuthorization(token) {
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`
}
