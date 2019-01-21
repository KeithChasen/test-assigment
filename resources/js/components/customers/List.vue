<template>
    <div class="container">
        <div class="filter-container">
            <div class="filter-block">
                <input type="text" v-model="tableData.search" placeholder="search..." @input="getCustomers()">
            </div>
            <div class="filter-block">
                <select v-model="tableData.length" @change="getCustomers()">
                    <option value="5" selected="selected">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>
            </div>
            <div class="filter-block">
                <router-link :to="`/admin/customers/new`" class="btn">New</router-link>
            </div>
        </div>

        <datatable :columns="columns" :sortKey="sortKey" :sortOrders="sortOrders" @sort="sortBy">
            <tbody>
                <router-link
                    v-for="customer in customers"
                    :key="customer.id"
                    :to="`/admin/customers/{customer.id}`"
                    tag="tr"
                >
                    <td>{{customer.name}}</td>
                    <td>{{customer.street}}</td>
                    <td>{{customer.street2}}</td>
                    <td>{{customer.city}}</td>
                    <td>{{customer.state}}</td>
                    <td>{{customer.zipcode}}</td>
                    <td>{{customer.country}}</td>
                </router-link>
            </tbody>
        </datatable>
        <pagination class="pagination" :pagination="pagination"
                    @prev="getCustomers(pagination.prevPageUrl)"
                    @next="getCustomers(pagination.nextPageUrl)">

        </pagination>
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
                {width: '10%', label: 'Name', name: 'name'},
                {width: '10%', label: 'Street', name: 'street'},
                {width: '10%', label: 'Street 2', name: 'street2'},
                {width: '10%', label: 'City', name: 'city'},
                {width: '10%', label: 'State', name: 'state'},
                {width: '10%', label: 'Zipcode', name: 'zipcode'},
                {width: '10%', label: 'Country', name: 'country'},
                {width: '10%', label: 'Business Id', name: 'business_id'},
                {width: '10%', label: 'Service Team', name: 'service_team'},
                {width: '10%', label: 'Customer Type', name: 'customer_type_id'},

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
                    length: 5,
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
            getCustomers(url = '/api/customers') {
                this.tableData.draw++
                axios.get(url, {params: this.tableData})
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
            },
            sortBy(key) {
                this.sortKey = key
                this.sortOrders[key] = this.sortOrders[key] * -1
                this.tableData.column = this.getIndex(this.columns, 'name', key)
                this.tableData.dir = this.sortOrders[key] === 1 ? 'asc' : 'desc'
                this.getCustomers()
            },
            getIndex(columns, key, value) {
                return columns.findIndex(i => i[key] == value)
            }
        },
        mounted() {
            // this.$store.dispatch('getCustomers');
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
    .filter-container {
        width: 100%;
    }

    .btn {
        background-color: antiquewhite;
        color: rgba(0, 0, 0, 0.7);
    }

    tbody tr:hover {
        cursor: pointer;
    }

    .container {
        height: auto;
        display: flex;
        flex-direction: column;
    }

    .pagination {
        height: 40px;
        width: 100%;
        margin-top: auto;
        margin-bottom: 20px;
    }

    select {
        display: block;
    }

    .filter-block {
        margin-top: 1%;
        margin-left: 2%;
        width: 25%;
        display: inline-block;
    }

    @media screen and (max-width: 768px) {
        .filter-block {
            width: 100%;
            margin: auto 1% 1% auto;
        }

        .btn {
            width: 100%;
        }
    }

    @media
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {

        /* Force table to not be like tables anymore */
        table, thead, tbody, th, td, tr {
            display: block;
        }

        tr { border: 1px solid #ccc; }

        td {
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            word-wrap: break-word;
        }

        td:before {
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
        }

        /*
        Label the data
        */
        td:nth-of-type(1):before { content: "Name"; }
        td:nth-of-type(2):before { content: "Street"; }
        td:nth-of-type(3):before { content: "Street 2"; }
        td:nth-of-type(4):before { content: "City"; }
        td:nth-of-type(5):before { content: "State"; }
        td:nth-of-type(6):before { content: "Zipcode"; }
        td:nth-of-type(7):before { content: "Country"; }
        td:nth-of-type(8):before { content: "Business Id"; }
        td:nth-of-type(9):before { content: "Service Team"; }
        td:nth-of-type(10):before { content: "Customer Type"; }
    }
</style>
