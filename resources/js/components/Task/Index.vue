<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Comment</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="task of tasks">
                <td>
                    <router-link :to="{name:'tasks.show', params:{id:task.id}}">{{ task.name }}</router-link>
                </td>
                <td>{{ task.email }}</td>
                <td>{{ task.comment }}</td>
                <td><router-link :to="{name:'tasks.edit',params: {id:task.id}}">Edit</router-link></td>
                <td>
                    <a @click.prevent="deleteTask(task.id)" href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "Index",
        data() {
            return {
                tasks: null
            }
        },
        mounted() {
            this.getTasks()
        },
        methods: {
            getTasks(){
                axios.get('/api/tasks')
                .then( res => {
                    this.tasks = res.data.data
                })
            },
            deleteTask(id){
                axios.delete(`/api/tasks/${id}`)
                .then( res => {
                    this.getTasks()
                })
            }
        }
    }
</script>

<style scoped>

</style>
