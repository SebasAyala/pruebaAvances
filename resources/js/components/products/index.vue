<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <span class="navbar-brand">Gestión de Productos</span>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary my-2 my-sm-0" href="#" tabindex="-1" aria-disabled="true">Crear Nuevo Producto</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid"> 
            <h1>Index</h1>
            <b-table hover :items="items"></b-table>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    
    export default {
        data() {
            return {
                items: [
                    { age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
                    { age: 21, first_name: 'Larsen', last_name: 'Shaw' },
                    { age: 89, first_name: 'Geneva', last_name: 'Wilson' },
                    { age: 38, first_name: 'Jami', last_name: 'Carney' }
                ]
            }
        },
        mounted() {

        }
    }
</script>