<template>
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Crear Producto</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="col mb-3">
                                    <label for="name">Nombre</label>
                                    <input v-model="name" type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="col mb-3">
                                    <label for="code">Código</label>
                                    <input v-model="code" type="text" class="form-control" name="code" id="code">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col mb-3">
                                    <label for="stock">Stock Inicial</label>
                                    <input v-model="stock" type="number" class="form-control" name="stock" id="stock">
                                </div>
                                <div class="col mb-3">
                                    <label for="warehouse_id">Bodega</label>
                                    <b-form-select v-model="warehouse_id" :options="warehouses" class="form-control" name="warehouse_id" id="warehouse_id"></b-form-select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col mb-3">
                                    <label for="description">Descripción</label>
                                    <textarea v-model="description" class="form-control" name="description" id="description" rows="3"></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mb-2" v-on:click="submitProd">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    
    export default {
        data() {
            return {
                name: '',
                code: '',
                stock: null,
                warehouse_id: null,
                description: '',
                warehouses: []
            }
        },
        methods: {
            submitProd: function() {
                console.log(this.name)
                var params = {
                    name: this.name,
                    code: this.code,
                    stock: this.stock,
                    warehouse_id: this.warehouse_id,
                    description: this.description,
                    state: true
                }
                var headers = {
                    'X-CSRF-Token': $('meta[name=_token]').attr('content')
                }
                axios.post('http://localhost/pruebaAvances/public/api/productos/crear', params, headers)
                    .then((res)=>{
                        console.log(res.data)
                        this.$router.push('/')
                    }, 200)
                    .catch((err)=>{
                        console.log(err.config);
                        if (err.response) {
                            console.log(err.response.data);
                            console.log(err.response.status);
                            console.log(err.response.headers);
                        } else if (err.request) {
                            console.log(err.request);
                        } else {
                            console.log('Error', err.message);
                        }
                    })
            }
        },
        mounted() {
            axios.get('http://localhost/pruebaAvances/public/api/bodegas')
                .then((res)=>{
                    console.log(res.data)
                    this.warehouses = res.data.map(function(warehouse) {
                        return {
                            'value': warehouse.id,
                            'text': warehouse.name
                        }
                    })
                }, 200)
                .catch((err)=>{
                    console.log(err.config);
                    if (err.response) {
                        console.log(err.response.data);
                        console.log(err.response.status);
                        console.log(err.response.headers);
                    } else if (err.request) {
                        console.log(err.request);
                    } else {
                        console.log('Error', err.message);
                    }
                })
        }
    }
</script>