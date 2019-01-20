<template>
    <div>
        <form @submit.prevent="create">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" v-model="customer.name" value="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" v-model="customer.email" value="">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        <div class="errors" v-if="errors">
            <ul>
                <li v-for="(fieldsError, fieldName) in errors" :key="fieldName">
                    <strong>{{ fieldName }}</strong> {{ fieldsError.join('\n')}}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import validate from 'validate.js';
    export default {
        name: "user-new",
        data() {
            return {
                customer: {
                    name: '',
                    email: ''
                },
                errors: null
            }
        },
        methods: {
            create() {
                this.errors = null;
                const constraints = this.getConstraints();
                const errors = validate(this.$data.customer, constraints);
                if (errors) {
                    this.errors = errors;
                    return;
                }
                axios.post('/api/customers', this.$data.customer)
                    .then((response) => {
                        this.$router.push('/admin/customers');
                    });
            },
            getConstraints() {
                return {
                    name: {
                        presence: true,
                        length: {
                            minimum: 3,
                            message: 'Must be at least 3 characters long'
                        }
                    },
                    email: {
                        presence: true,
                        email: true
                    }
                }
            }
        }
    }
</script>

<style scoped>
</style>
