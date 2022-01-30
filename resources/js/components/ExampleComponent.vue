<template>
    <div class="container">
        <div class="row justify-content-center" v-for="todo in Todos" >
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        {{todo.name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "invoice",
    props: {
        csrf_token: String,
        materials: Array,
        toners: Array,
    },
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return{
            Todos:[
                {
                    name:'amar'
                },
                {
                    name: 'amar'
                }
            ]
        }
    }
}
</script>
