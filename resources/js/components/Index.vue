<template>
    <div class="container">
        <router-link :to="{ name: 'tasks.index'}">Tasks</router-link>
        <router-link :to="{ name: 'tasks.create'}">Create</router-link>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "Index"
    }
</script>

<style scoped>

</style>
