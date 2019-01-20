<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "admin-main",
        computed: {
            currentUser() {
                return this.$store.getters.currentUser
            }
        }
    }
</script>

<style scoped>
</style>
