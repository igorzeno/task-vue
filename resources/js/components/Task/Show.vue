<template>
    <div v-if="task">
        <div>Name: {{ this.task.name}}</div>
        <div>Email: {{ this.task.email}}</div>
        <div>Comment: {{ this.task.comment}}</div>
        <router-link :to="{name:'tasks.edit',params: {id:this.task.id}}">Edit</router-link>
    </div>
</template>

<script>
    export default {
        name: "Show",

        data() {
            return {
                task: null
            }
        },
        mounted() {
            this.getTask()
        },
        methods: {
            getTask(){
                axios.get(`/api/tasks/${this.$route.params.id}`)
                .then( res => {
                    this.task = res.data.data
                })
            },
        }
    }
</script>

<style scoped>

</style>
