<template>
    <footer class="teal darken-4">
        <span>
            {{pagination.from}} - {{pagination.to}} of {{pagination.total}}
        </span>
        <a v-if="pagination.prevPageUrl" class="button is-small pagination-previous" @click="$emit('prev')">
            Prev
        </a>
        <a class="button is-small pagination-previous" v-else :disabled="true">
            Prev
        </a>

        <a v-if="pagination.nextPageUrl" class="button is-small pagination-next" @click="$emit('next')">
            Next
        </a>
        <a class="button is-small pagination-next" v-else :disabled="true">
            Next
        </a>
    </footer>
</template>

<script>
    export default {
        name: "pagination",
        props: ['pagination']
    }
</script>

<style scoped lang="scss">
    .pagination {
        justify-content: flex-end !important;

        .page-stats {
            align-items: center;
            margin-right: 5px;
        }

        i {
            color: #3273dc !important;
        }
    }
</style>
