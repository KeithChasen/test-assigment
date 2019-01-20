<template>
    <table class="table">
        <thead>
            <tr>
                <th v-for="column in columns"
                    :key="column.name" @click="$emit('sort', column.name)"
                    :class="sortKey === column.name ?
                        (sortOrders[column.name] > 0 ?
                            'sorting_asc' : 'sorting_desc') : 'sorting'"
                    :style="`width:${column.width};cursor:pointer`">
                        {{column.label}}
                </th>
            </tr>
        </thead>
        <slot></slot>
    </table>
</template>

<script>
    export default {
        name: "datatable",
        props: ['columns', 'sortKey', 'sortOrders']
    }
</script>

<style scoped>
    @media
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {

        /* Force table to not be like tables anymore */
        table, thead, tbody, th, td, tr {
            display: block;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
    }
</style>
