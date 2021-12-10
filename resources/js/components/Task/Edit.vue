<template>
    <div class="w-25">
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" v-model="name" id="name" placeholder="Имя">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="text" class="form-control" v-model="email" id="email" placeholder="E-mail">
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <input type="text" class="form-control" v-model="comment" id="comment" placeholder="Comment">
        </div>
        <div class="mb-3">
            <input :disabled="!isDisabled" type="submit" @click.prevent="update" value="update" class="btn btn-primary">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Edit",
        data() {
            return {
                name: null,
                email: null,
                comment: null,
            }
        },
        mounted() {
            this.getTask()
        },

        methods: {
            getTask(){
                axios.get(`/api/tasks/${this.$route.params.id}`)
                .then( res => {
                    this.name = res.data.data.name,
                    this.email = res.data.data.email,
                    this.comment = res.data.data.comment
                })
            },
            update(){
                axios.patch(`/api/tasks/${this.$route.params.id}`, {
                    name: this.name, email: this.email, comment: this.comment
                })
                .then( res => {
                    this.$router.push({name: 'tasks.show', params: { id: this.$route.params.id}})
                })
            }
        },
        computed: {
            isDisabled(){
                return this.name && this.email && this.comment
            }
        }
    }
</script>

<style scoped>

</style>
