<template>
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <h3>Gestión de Productos</h3>
                            </div>
                            <div class="col-12 col-md-6 text-right">
                                <router-link class="btn btn-primary" to="/crear">Crear Nuevo Producto</router-link>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card no-padding no-border">
                                    <div class="card-body">
                                        <b-table hover :items="products" :fields="fields">
                                            <template v-slot:cell(id)="row">
                                                <b-button @click="editProd(row.item.id)" size="sm" class="btn btn-success right">
                                                    Editar
                                                </b-button>
                                            </template>
                                        </b-table>
                                    </div>
                                </div>    
                            </div> 
                        </div>
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
                fields: ['Nombre del producto', 'Código', 'Existencia', 'Bodega', 'Descripción', 'Estado', {key:'id', label: 'Acciones'}],
                products: []
            }
        },
        methods: {
            editProd (id) {
                console.log(id)
            },
        },
        mounted() {
            axios.get('http://localhost/pruebaAvances/public/api/productos')
                .then((res)=>{
                    console.log(res.data);
                    this.products = res.data.map(function(prod) {
                        return {
                            'Nombre del producto': prod.name,
                            'Código': prod.code,
                            'Existencia': prod.stock,
                            'Bodega': prod.warehouse,
                            'Descripción': prod.description,
                            'Estado': prod.state ? 'Activo' : 'Inactivo',
                            'id': prod.id
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