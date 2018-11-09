<template>
    <div>
        <div class="form-group">
            <label>Provinsi <i style="color:red">*</i></label>
            <select class="form-control" v-model="umkm.state_id" name="umkm[state_id]" @change="load_cities()" required>
                <option value="">Pilih Provinsi</option>
                <option :value="state.id" v-for="(state,s) in states">{{ state.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label>Kota <i style="color:red">*</i></label>
            <select class="form-control" v-model="umkm.city_id" name="umkm[city_id]" @change="load_districts()" required>
                <option value="">Pilih Kota</option>
                <option :value="city.id" v-for="(city,c) in cities">{{ city.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label>Kecamatan/Daerah <i style="color:red">*</i></label>
            <select class="form-control" v-model="umkm.district_id" name="umkm[district_id]" required>
                <option value="">Pilih Kecamatan</option>
                <option :value="district.id" v-for="(district,d) in districts">{{ district.name }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        props:["edit_umkm"],
        data(){
            return{
                states:[],
                cities:[],
                districts:[],
                umkm:{
                    state_id:"",
                    city_id:"",
                    district_id:""
                }
            }
        },
        mounted() {
            console.log('Component mounted.');
            if(this.edit_umkm){
                this.umkm = this.edit_umkm;
                this.load_cities();
                this.load_districts();
            }

            axios.get('/api/states').then(res=>{
                this.states = res.data;
            });
        },
        methods:{
            load_cities(){
                axios.get('/api/states/'+this.umkm.state_id).then(res=>{
                    this.cities = res.data.cities;
                });
            },
            load_districts(){
                axios.get('/api/cities/'+this.umkm.city_id).then(res=>{
                    this.districts = res.data.districts;
                });
            }
        }
    }
</script>
