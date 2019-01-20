import Home from '../components/Home';
import Login from '../components/auth/Login'
import AdminMain from '../components/AdminMain'
import {admin} from './admin'

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
        component: AdminMain,
        meta: {
            requiresAuth: true,
            userRole: true
        },
        children: admin
    }
];
