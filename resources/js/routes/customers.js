import CustomersList from '../components/customers/List'
import NewCustomer from '../components/customers/New'

export const customers = [
    {
        path: '/',
        component: CustomersList
    },
    {
        path: 'new',
        component: NewCustomer
    }
]
