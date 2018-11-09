<template>
    <div>
        <div class="alert alert-info">
            <strong>Tentukan Masalah</strong>
        </div>
        <div class="row">
            <div class="col-4" v-for="(problemlist,pl) in problemlists">
                <div class="card">
                    <div class="card-header">
                        <h5> Masalah {{ edit_umkm_problems ? problemlist.problem_list.name : problemlist.name }}</h5>
                    </div>
                    <div class="card-body">
                        <input type="hidden" :name="'problems['+pl+'][problem_list_id]'" :value="edit_umkm_problems ? problemlist.problem_list.id : problemlist.id">
                        <textarea class="form-control" :name="'problems['+pl+'][description]'" value="-" v-model="problemlist.description" placeholder="Tulis Deskripsi" required></textarea>
                    </div>
                </div>
            </div> 
        </div>    
    </div>
</template>

<script>
    export default {
        props:["edit_umkm_problems"],
        data(){
            return{
                problemlists:[]
            }
        },
        mounted() {
            console.log('Component mounted.');
            axios.get('/api/problemlists').then(res=>{
                this.edit_umkm_problems ? this.problemlists = this.edit_umkm_problems : this.problemlists = res.data;
            });
        }
    }
</script>
