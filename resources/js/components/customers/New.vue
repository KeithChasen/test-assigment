<template>
    <div>
        <h2>Create Customer</h2>
        <form @submit.prevent="create">
            <div  class="input-field">
                <label for="name">Name</label>
                <input type="text" id="name" v-model="customer.name" value="">
            </div>
            <div class="input-field">
                <label for="street">Street</label>
                <input type="text" id="street" v-model="customer.street" value="">
            </div>
            <div  class="input-field">
                <label for="street2">Street 2</label>
                <input type="text" id="street2"v-model="customer.street2" value="">
            </div>
            <div class="input-field">
                <label for="city">City</label>
                <input type="text" id="city" v-model="customer.city" value="">
            </div>
            <div class="input-field">
                <label for="state">State</label>
                <input type="text" id="state" v-model="customer.state" value="">
            </div>
            <div class="input-field">
                <label for="zipcode">Zipcode</label>
                <input type="text" id="zipcode" v-model="customer.zipcode" value="">
            </div>
            <div class="input-field">
                <label for="country">Country</label>
                <input type="text" id="country" v-model="customer.country" value="">
            </div>
            <div class="input-field">
                <label for="business_id">Business Id</label>
                <input type="text" id="business_id" v-model="customer.business_id" value="">
            </div>
            <div class="input-field">
                <label for="service_team">Service Team</label>
                <input type="text" id="service_team" v-model="customer.service_team" value="">
            </div>
            <div class="input-field">
                <label for="type">Type</label>
                <input type="text" id="type" v-model="customer.type" value="">
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
                    name: null,
                    street: null,
                    street2: null,
                    city: null,
                    state: null,
                    zipcode: null,
                    country: null,
                    business_id: null,
                    service_team: null,
                    type: null,
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
                        this.$router.push('/admin');
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
                    }
                }
            }
        }
    }
</script>

<style scoped>
    h2 {
        font-size: 300%;
    }
    .input-field label {
        color: #000;
    }

    @media
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {

        h2 {
            font-size: 200%;
        }
    }
</style>
