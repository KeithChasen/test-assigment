import CustomersList from '../components/customers/List'
import NewCustomer from '../components/customers/New'
import ViewCustomer from '../components/customers/View'

export const customers = [
    {
        path: '/',
        component: CustomersList
    },
    {
        path: 'customers/new',
        component: NewCustomer
    },
    {
        path: 'customers/:id',
        component: ViewCustomer
    }
]
