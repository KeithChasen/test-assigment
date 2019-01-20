<template>
    <footer class="teal darken-4">
        <span>
            {{pagination.from}} - {{pagination.to}} of {{pagination.total}}
        </span>
        <button v-if="pagination.prevPageUrl" class="btn btn-small" @click="$emit('prev')">
            Prev
        </button>
        <button class="btn btn-small" v-else :disabled="true">
            Prev
        </button>

        <button v-if="pagination.nextPageUrl" class="btn btn-small" @click="$emit('next')">
            Next
        </button>
        <button class="btn btn-small" v-else :disabled="true">
            Next
        </button>
    </footer>
</template>

<script>
    export default {
        name: "pagination",
        props: ['pagination']
    }
</script>

<style scoped lang="scss">

    .btn-small {
        height: 24px;
        line-height: 24px;
        padding: 0 0.5rem;
        background-color: antiquewhite;
        margin-left: 10px;
        color: rgba(0, 0, 0, 0.7);
    }

    footer {
        color: white;

        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
</style>
