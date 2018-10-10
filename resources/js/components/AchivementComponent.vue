<template>
    <div>
        <div class="alert alert-info">
            <strong>Achivement</strong>
            <button type="button" class="btn btn-primary pull-right" @click="add()"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="row">
            <div class="col-4" v-for="(achivement,a) in achivements">
                <div class="card">
                    <div class="card-header">
                        <h5> Achievement</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Achievement</label>
                            <input type="text" class="form-control" :name="'achivements['+a+'][name]'" v-model="achivement.name" placeholder="type something" required> 
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea type="text" class="form-control" :name="'achivements['+a+'][description]'"  v-model="achivement.description" placeholder="type something" > </textarea>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" :name="'achivements['+a+'][date]'" v-model="achivement.date" placeholder="type something" required> 
                        </div>  
                        <button type="button" @click="remove(a)" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                </div>
            </div> 
        </div>    
    </div>
</template>

<script>
export default {
    props:['edit_achivements'],
    data(){
        return {
            achivements:[{}]
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    created(){
        this.edit_achivements ? this.achivements = this.edit_achivements : null;
        console.log("achivements nya ",this.achivements);
    },
    methods:{
        add(){
            this.achivements.push({});
        },
        remove(index){
            this.achivements.splice(index,1);
        }
    }
}
</script>
