import CustomersMain from '../components/customers/Main'
import {customers} from './customers'

export const admin = [
    {
        path: '/',
        component: CustomersMain,
        meta: {
            requiresAuth: true,
            userRole: true
        },
        children: customers
    },
];
