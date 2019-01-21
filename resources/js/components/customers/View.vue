<template>
    <div class="container" v-if="customer">

        <router-link to="/admin" class="btn">Back</router-link>

        <section class="inner-wrapper-3" id="info">
            <div class="customer-area">
                <h3>{{ customer.name }}</h3>
                <table class="table">
                    <tr>
                        <th>Street</th>
                        <td>{{ customer.street }}</td>
                    </tr>
                    <tr>
                        <th>Street 2</th>
                        <td>{{ customer.street2 }}</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>{{ customer.city }}</td>
                    </tr>
                    <tr>
                        <th>State</th>
                        <td>{{ customer.state }}</td>
                    </tr>
                    <tr>
                        <th>Zipcode</th>
                        <td>{{ customer.zipcode }}</td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td>{{ customer.country }}</td>
                    </tr>
                    <tr>
                        <th>Business Id</th>
                        <td>{{ customer.business_id }}</td>
                    </tr>
                    <tr>
                        <th>Service Team</th>
                        <td>{{ customer.service_team }}</td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>{{ customer.type }}</td>
                    </tr>
                </table>
            </div>
            <div class="wall-group-area">
                <h3>Wall Groups</h3>

                <div class="wall-group-area-grid">

                    <div class="wga-item" v-for="(item,index) in 10" :key="index" :id="index">

                        <v-expansion-panel :class="{displayMantainList:mantainList}">
                            <v-expansion-panel-content v-for="(item,i) in 5" :key="i" expand-icon="mdi-menu-down">
                                <div slot="header">{{ customer.name }}</div>
                                <v-card>
                                    <v-card-text class="grey lighten-3">
                                        <table class="table">
                                            <tr>
                                                <th>Title</th>
                                                <td>Mantainance Contact Title</td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td>555-666-45</td>
                                            </tr>
                                            <tr>
                                                <th>Mobile</th>
                                                <td>099-86-432-65</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ customer.email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Contact Type</th>
                                                <td>Water filler</td>
                                            </tr>
                                            <tr>
                                                <th>Priority Contact Method</th>
                                                <td>SMS</td>
                                            </tr>
                                            <tr>
                                                <th>Secondary Contact Method</th>
                                                <td>Phone</td>
                                            </tr>
                                            <tr>
                                                <th>Spoken Language</th>
                                                <td>English</td>
                                            </tr>
                                        </table>
                                    </v-card-text>
                                </v-card>
                            </v-expansion-panel-content>
                            <button class="btn" @click='hideMantainance(index)'>Hide</button>
                        </v-expansion-panel>

                        <article>
                            <table class="table wall-table">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ customer.name }}</td>
                                </tr>
                                <tr>
                                    <th>Street</th>
                                    <td>{{ customer.street }}</td>
                                </tr>
                                <tr>
                                    <th>Street 2</th>
                                    <td>{{ customer.street2 }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ customer.city }}</td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>{{ customer.state }}</td>
                                </tr>
                                <tr>
                                    <th>Zipcode</th>
                                    <td>{{ customer.zipcode }}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{ customer.country }}</td>
                                </tr>
                            </table>
                            <button class="btn" @click='showMantainance(index)'>Show Mantainance</button>
                        </article>


                    </div>
                </div>
            </div>
        </section>

    </div>
</template>

<script>

    export default {
        name: "view",
        mounted() {
        },
        created() {
            axios.get(`/api/customers/${this.$route.params.id}`)
                .then((response) => {
                    console.log(response.data)
                    this.customer = response.data.customer
                });
        },
        data() {
            return {
                customer: null,
                mantainList: true
            }
        },
        methods: {
            showMantainance: function (i) {
                    document.getElementById(i).getElementsByTagName('ul')[0].style.display = 'block'
                    document.getElementById(i).getElementsByTagName('article')[0].style.display = 'none'
            },
            hideMantainance: function (i) {
                document.getElementById(i).getElementsByTagName('ul')[0].style.display = 'none'
                document.getElementById(i).getElementsByTagName('article')[0].style.display = 'block'
            },
        }
    }
</script>

<style scoped>

    .btn {
        margin: 1%;
        background-color: antiquewhite;
        color: rgba(0, 0, 0, 0.7);
    }

    .inner-wrapper-3 {
        float: left;
        width: 100%;
    }

    .customer-area {
        width: 30%;
        float: left;
        text-align: center;
    }

    .wall-group-area {
        width: 70%;
        float: left;
        text-align: center;
    }

    .wall-group-area-grid {
        margin-left: 5%;
        display: grid;
        grid-template-columns: 30% 30% 30%;
        grid-gap: 10px;
    }

    .wga-item {
        background-color: #444;
        color: #fff;
        border-radius: 5px;
        padding: 20px;
        /*font-size: 150%;*/
    }

    .displayMantainList {
        display: none;
        position: absolute;
    }

    @media screen and (max-width: 1024px) {
        .customer-area, .wall-group-area {
            width: 100%;
        }

        .wall-group-area-grid {
            margin: 0;
            grid-template-columns: 100%;
        }
    }
</style>
