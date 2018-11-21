<template>
     <div>
        <div class="alert alert-info">
            <strong>Gambar Produk</strong>
            <button type="button" class="btn btn-primary pull-right" @click="add()"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="row">
            <div class="col-sm-4" v-for="(productimage,r) in productimages">
                <div class="card">
                    <div class="card-header">
                        <h5> Gambar Produk</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                                    <select class="form-control"   :name="'productimages['+r+'][product_id]'">
                                        <option value="">--Pilih Produk--</option>
                                        <option  v-for="(product,p) in products" :value="product.id">{{ product.name }}
                                        </option>  
                                    </select>
                                </div>
                        <!-- <div class="form-group">
                            <label>Nama Product</label>
                            <input type="text" class="form-control" :name="'products['+p+'][name]'" v-model="product.name" placeholder="type something" required> 
                        </div> -->

                        <!-- <div class="form-group">
                                    <h4><span class="label label-default" v-model="item.image">Gambar: </span></h4>
                                    <input type="file" :name="'items['+a+'][image]'" id="upload">
                                </div> -->

                        <div class="form-group">
                            <span v-model="productimage.image">Gambar: </span>
                            <input type="file" :name="'productimages['+r+'][image]'" > 
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea type="text" class="form-control" v-model="productimage.description" :name="'productimages['+r+'][description]'" placeholder="type something" > </textarea>
                        </div>
                        <button type="button" @click="remove(r)" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Hapus</button>   
                    </div>
                </div>
            </div> 
        </div>
    </div>
</template>

<script>
export default {
    props:['edit_productimages'],
    data(){
        return {
            productimages:[{}],
            products:[{}],
            product_selected:null
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    created(){
        this.read();
        console.log("product nya ",this.productimages);
    },
    methods:{
        add(){
            this.productimages.push({});
        },
        remove(index){
            this.productimages.splice(index,1);
        },
        read(){
                    // console.log('read');
                    axios.get('/api/products/').then(result=>{
                        console.log(result);
                        this.products = result.data;
                    },err=>{
                        console.log(err);
                    });
                }
            }
        }
        </script>
