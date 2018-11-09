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
                        <!-- <div v-for="(productimage,pi) in product.productimages">
                            <div class="form-group">
                                <input type="file" class="form-control" name="" required><a href="#" class="badge badge-danger" @click="image_remove(p,pi)"><i class="fa fa-close"></i> Hapus</a>
                            </div>
                        </div> -->
                        <div class="form-group">    
                            <!-- <button type="button" class="btn btn-info pull-left" @click="image_add(p)"><i class="fa fa-plus"></i> Tambah Gambar</button> -->
                            <button type="button" @click="remove(p)" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Hapus</button>   
                        </div>
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
            products:[{
                productimages:[{}]
            }],
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
            this.products.push({
                productimages:[{}]
            });
        },
        remove(index){
            this.products.splice(index,1);
        },
        image_add(index){
            event.preventDefault();
            this.products[index].productimages.push({});
        },
        image_remove(index,image){
            event.preventDefault();
            this.products[index].productimages.splice(image,1);
        }
    }
}
</script>
