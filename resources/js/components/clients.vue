<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">CRUD Cities</div>
                       

                    <div class="card-body">
                         <!-- Button trigger modal -->
                        <button  type="button" class="btn btn-primary mb-3" @click="update = false; open_modal()">
                        Agregar
                        </button>
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
                                            <label for="first_name">Nombre</label>
                                            <input type="text" v-model="ciudad.name" class="form-control" id="name" placeholder="Ciudad">
                                            <small ></small>
                                        </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="close_modal()">Cerrar</button>
                                    <button type="button" @click="save();" class="btn btn-success">Guardar Cambios</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        




                        <table id="tabla_ciudades" class="table table-striped table-hover table-bordered text-center" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="ciudad in ciudades" :key="ciudad.id">
                                    <th scope="row">{{ciudad.id}}</th>
                                    <td>{{ciudad.name}}</td>
                                    <td>
                                        <button class="btn btn-warning"   @click="update = true; open_modal(ciudad)">Editar</button>
                                        <button class="btn btn-danger" @click='eliminar(ciudad.id)'>Eliminar</button>
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
                ciudades: [],
                form_modal: false,
                tilte_modal:'',
                update : true,
                id : 0,
                ciudad: {
                    name : ''
                }
            }
        },
        mounted() {
            this.list();
            
        },
        methods: {
            //METODO PARA LISTAR CON BOTONES
             mytable(){
                this.$nextTick(()=>{
                    $('#tabla_ciudades').DataTable();
                })
            },
            list(){
                axios.get('api/cities').then(res=>{
                    this.ciudades = res.data;
                    //console.log(this.ciudades);
                    this.mytable();
                });
            },
            open_modal(data){
                if(this.update){
                    this.tilte_modal='MODIFICAR CIUDAD ' +data.id;
                    this.id = data.id;
                    this.ciudad.name = data.name; 
                }
                else{
                    this.tilte_modal='CREAR CIUDAD';
                    this.id = 0;
                    this.ciudad.name = '';
                }
                this.form_modal = true;
                
            },
            close_modal(){
                this.form_modal = false;
            },
            save(){
                if(this.update){
                    axios.put('/ciudades/'+this.id,this.ciudad).then(res=>{
                    });
                }else{
                    //console.log(this.contact);
                    axios.post('/ciudades',this.ciudad).then(res=>{
                    });
                    
                }
                this.close_modal();
                this.list();
            },
            eliminar(id){
                axios.delete('ciudades/'+id).then(res=>{
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