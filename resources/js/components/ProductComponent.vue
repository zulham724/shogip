<template>
    <div>
        <div class="alert alert-info">
            <strong>Tentukan Produk Anda</strong>
            <button type="button" class="btn btn-primary pull-right" @click="add()"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="row">
            <div class="col-4" v-for="(product,p) in products">
                <div class="card">
                    <div class="card-header">
                        <h5> Produk</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" :name="'products['+p+'][name]'" v-model="product.name" placeholder="type something" required> 
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea type="text" class="form-control" v-model="product.description" :name="'products['+p+'][description]'" placeholder="type something" > </textarea>
                        </div>
                        <button type="button" @click="remove(p)" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Hapus</button>   
                    </div>
                </div>
            </div> 
        </div>
    </div>
</template>

<script>
export default {
    props:['edit_products'],
    data(){
        return {
            products:[{}]
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    created(){
        this.edit_products ? this.products = this.edit_products : null;
        console.log("product nya ",this.products);
    },
    methods:{
        add(){
            this.products.push({});
        },
        remove(index){
            this.products.splice(index,1);
        }
    }
}
</script>
