<template>
    <div>
        <div class="alert alert-info">
            <strong>Training</strong>
            <button type="button" class="btn btn-primary pull-right" @click="add()"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="row">
            <div class="col-sm-4" v-for="(training,t) in trainings">
                <div class="card">
                    <div class="card-header">
                        <h5> Training</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Training</label>
                            <input type="text" class="form-control" :name="'trainings['+t+'][name]'" v-model="training.name" placeholder="type something" required> 
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea type="text" class="form-control" :name="'trainings['+t+'][description]'" v-model="training.description" placeholder="type something" > </textarea>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" :name="'trainings['+t+'][date]'" v-model="training.date" placeholder="type something" required> 
                        </div>  
                        <button type="button" @click="remove(t)" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</template>

<script>
export default {
    props:['edit_trainings'],
    data(){
        return {
            trainings:[{}]
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    created(){
        this.edit_trainings ? this.trainings = this.edit_trainings : null;
        console.log('trainings oke', this.trainings);
    },
    methods:{
        add(){
            this.trainings.push({});
        },
        remove(index){
            this.trainings.splice(index,1);
        }
    }
}
</script>
