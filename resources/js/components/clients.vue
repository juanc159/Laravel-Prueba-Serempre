<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">CRUD Clientes</div>
                       

                    <div class="card-body">
                         <!-- Button trigger modal -->
                        <button  type="button" class="btn btn-primary mb-3" @click="update = false; open_modal()">
                        Agregar
                        </button>
                        <a href="clientes/exportExcel" class="btn btn-primary btn-sm float-right">Exportar a Excel</a>
                        

                        <!-- Modal -->
                        <div class="modal " :class="{show:form_modal}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{tilte_modal}}</h5>
                                    <button type="button" class="close" @click="close_modal()">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                        
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" v-model="cliente.name" class="form-control" id="name" placeholder="Cliente">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Ciudad</label>
                                            <select class="form-control mb-3"    v-model="cliente.id_city">
                                                <option  v-for="(item, index) in inputCiudades" :key="index"  :value="item.id">{{item.name}}</option>
                                            </select>
                                        </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="close_modal()">Cerrar</button>
                                    <button type="button" @click="save();" class="btn btn-success">Guardar Cambios</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        




                        <table id="tabla_clientes" class="table table-striped table-hover table-bordered text-center" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Ciudad</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cliente in clientes" :key="cliente.id">
                                    <th scope="row">{{cliente.id}}</th>
                                    <td>{{cliente.name}}</td>
                                    <td>{{cliente.name_city}}</td>
                                    <td>
                                        <button class="btn btn-warning"   @click="update = true; open_modal(cliente)">Editar</button>
                                        <button class="btn btn-danger" @click='eliminar(cliente.id)'>Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
//PARA REUQERIR LOS BOTONES ESPECIALES
require( 'datatables.net-buttons/js/dataTables.buttons' );
require( 'datatables.net-buttons/js/buttons.html5' );

//PARA IMPORTAR EL DATATABLE
import datatable from 'datatables.net-bs4'
//PARA IMPORTAR LOS BOTONES ESPECILES
import print from 'datatables.net-buttons/js/buttons.print'
import jszip from 'jszip/dist/jszip'
import pdfMake from 'pdfmake/build/pdfmake'
import pdfFonts from 'pdfmake/build/vfs_fonts'
pdfMake.vfs = pdfFonts.pdfMake.vfs; //esto es para que funcione el boton PDF
window.JSZip = jszip; //esta linea es para que muestre y fucione el boton EXCEL

    export default {
                data(){
            return{
                clientes: [],
                form_modal: false,
                tilte_modal:'',
                inputCiudades: [],
                update : true,
                id : 0,
                ciudad: {
                    id: '',
                    name: ''
                },
                cliente: {
                    name : '',
                    id_city: '',
                    name_city:''
                }
            }
        },
        mounted() {
            this.cargarCiudades();
            this.list();
            
        },
        methods: {
            cargarCiudades(){
                axios.get('api/cities').then(res=>{
                    this.inputCiudades = res.data;
                })
            },
            //METODO PARA LISTAR CON BOTONES
             mytable(){
                this.$nextTick(()=>{
                    $('#tabla_clientes').DataTable();
                })
            },
            list(){
                axios.get('api/clients').then(res=>{
                    this.clientes = res.data;
                    this.clientes.forEach(element => {
                        this.inputCiudades.forEach(element2 => {
                            if(element2.id===element.id_city){//SI EL ELEMENTO CONINCIDE GUARDA EL NOMBRE EN LA VAIRABLE EN VEZ DEL ID
                                element.name_city = element2.name;
                            }
                        });                        
                    });
                    //console.log(this.clientes);
                    this.mytable();
                });
            },
            open_modal(data){
                if(this.update){
                    this.tilte_modal='MODIFICAR CIUDAD ' +data.id;
                    this.id = data.id;
                    this.cliente.name = data.name; 
                    this.cliente.id_city = data.id_city; 
                }
                else{
                    this.tilte_modal='CREAR CIUDAD';
                    this.id = 0;
                    this.cliente.name = '';
                    this.cliente.id_city = '';
                }
                this.form_modal = true;
                
            },
            close_modal(){
                this.form_modal = false;
            },
            save(){
                if(this.update){
                    axios.put('/clientes/'+this.id,this.cliente).then(res=>{
                    });
                }else{
                    console.log(this.cliente.name);
                    axios.post('/clientes',this.cliente).then(res=>{
                    });
                }
                this.close_modal();
                this.list();
            },
            eliminar(id){
                axios.delete('clientes/'+id).then(res=>{
                    this.list();
                });
                
            },
        }
    }
</script>
<style>
.show{
    display: list-item;
    opacity:  1;
    background: rgba(44,38,75,0.5);
}
</style>