<template>
    <div>
        <!--<div class="btn-wrapper">-->
            <!--<router-link :to="`/admin/customers/new`" class="btn btn-primary btn-sm">New</router-link>-->
        <!--</div>-->

        LIST

        <datatable :columns="columns" :sortKey="sortKey" :sortOrders="sortOrders">
            <tbody>
                <tr v-for="customer in customers" :key="customer.id">
                    <td>{{customer.name}}</td>
                    <td>{{customer.email}}</td>
                    <td>{{customer.street}}</td>
                </tr>
            </tbody>
        </datatable>
    </div>
</template>

<script>

    import Datatable from './components/Datatable'

    import Pagination from './components/Pagination'

    export default {
        name: "customers-list",
        components: {Datatable, Pagination},
        created() {
          this.getCustomers()
        },
        data() {
            let sortOrders = {}

            let columns = [
                {width: '33%', label: 'Name', name: 'name'},
                {width: '33%', label: 'Email', name: 'email'},
                {width: '33%', label: 'Street', name: 'street'},
            ]

            columns.forEach(column => {
                sortOrders[column.name] = -1
            })

            return {
                customers: [],
                columns: columns,
                sortKey: 'name',
                sortOrders: sortOrders,
                tableData: {
                    draw: 0,
                    length: 10,
                    search: '',
                    column: 0,
                    dir: 'desc'
                },
                pagination: {
                    lastPage: '',
                    currentPage: '',
                    total: '',
                    lastPageUrl: '',
                    nextPageUrl: '',
                    prevPageUrl: '',
                    from: '',
                    to: ''
                }
            }
        },
        methods: {
            getCustomers() {
                this.tableData.draw++
                axios.get('/api/customers', {params: this.tableData})
                    .then((response) => {
                        if (response.status === 200) {
                            let data = response.data

                            if (this.tableData.draw == data.draw) {
                                this.customers = data.data.data
                                this.configPagination(data.data)
                            }

                            // context.commit('updateCustomers', response.data.customers)
                        }
                    })
                    .catch((error) => { console.log(error) })
            },
            configPagination(data) {
                this.pagination.lastPage = data.last_page
                this.pagination.currentPage = data.current_age
                this.pagination.total = data.total
                this.pagination.lastPageUrl = data.last_page_url
                this.pagination.nextPageUrl = data.next_page_url
                this.pagination.prevPageUrl = data.prev_page_url
                this.pagination.from = data.from
                this.pagination.to = data.to
            }
        },
        mounted() {
            this.$store.dispatch('getCustomers');
        },
        computed: {
            // customers() {
            //     return this.$store.getters.customers;
            // },
            isAdmin() {
                return this.$store.getters.isAdmin
            }
        }
    }
</script>

<style scoped>
    .btn-wrapper {
        text-align: right;
        margin-bottom: 20px;
    }
    .crud-button {
        margin-top: 5px;
        margin-right: 5px;
    }
</style>
