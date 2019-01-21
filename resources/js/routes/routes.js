import Home from '../components/Home';
import Login from '../components/auth/Login'

import CustomersMain from '../components/customers/Main'

import {customers} from './customers'

export const routes = [
    {
        path: '/',
        component: Home,
        meta: {
            requiresAuth: true,
            customerRole: true
        }
    },
    {
        path: '/login',
        component: Login,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/admin',
        component: CustomersMain,
        meta: {
            requiresAuth: true,
            userRole: true
        },
        children: customers
    }
];
