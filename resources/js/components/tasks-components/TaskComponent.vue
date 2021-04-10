<template>
    <div class="container m-5">
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <section class="list">
                    <header>TASK LIST</header>
                    <draggable class="drag-area" :list="tasksNew" :options="{animation:200, group:'status'}" :element="'article'" @change="update">
                    <article class="card" v-for="(task, index) in tasksNew" :key="task.id" :data-id="task.id">
                        <header>
                            Priority - {{task.priority}}
                        </header>
                        <body>
                            {{task.name}}
                        </body>
                    </article>
                    </draggable>
                </section>
            </div>
        </div>

    </div>
</template>



<script>
    import draggable from 'vuedraggable'
    export default {
        props: ['tasks'],
        data(){
            return {
                tasksNew: this.tasks
            }
        },
        methods: {
            update(){
               this.tasksNew.map((task, index) => {
                   task.priority = index+1;
               })

                axios.put('/api/projects/' + this.tasksNew[0].project_id + '/tasks/update-priorities', {
                    tasks: this.tasksNew
                }).then((response) => {
                    //Success message
                })
            }
        }

    }
</script>

<style>
    .list {
        background-color: #26004d;
        border-radius: 3px;
        margin: 5px 5px;
        padding: 10px;
        width: 100%;
    }
    .list>header {
        font-weight: bold;
        color: white;
        text-align: center;
        font-size: 20px;
        line-height: 28px;
        cursor: grab;
    }
    .list article {
        border-radius: 3px;
        margin-top: 10px;
    }

    .list .card {
        background-color: #FFF;
        border-bottom: 1px solid #CCC;
        padding: 15px 10px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bolder;
    }
    .list .card:hover {
        background-color: #F0F0F0;
    }
    .drag-area{
        min-height: 10px;
    }
</style>