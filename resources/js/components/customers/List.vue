<template>
    <div>
        <div class="btn-wrapper">
            <router-link :to="`/admin/customers/new`" class="btn btn-primary btn-sm">New</router-link>
        </div>
        <table class="table">
            <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            </thead>
            <tbody>
            <template v-if="!customers.length">
                <td colspan="3" class="text-center">No users</td>
            </template>
            <template v-else>
                <tr v-for="customer in customers" :key="customer.id">
                    <td>{{ customer.name }}</td>
                    <td>{{ customer.email }}</td>
                    <td>{{ customer.role.role }}</td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "customers-list",
        mounted() {
            this.$store.dispatch('getCustomers');
        },
        computed: {
            customers() {
                return this.$store.getters.customers;
            },
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
