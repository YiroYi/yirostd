<template>
  <div >
    <div class="page-content-wrapper">
      <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                  <div class=" pull-left">
                      <div class="page-title">Administración de roles</div>
                  </div>
                  <ol class="breadcrumb page-breadcrumb pull-right">
                      <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                      </li>
                      <li class="active">Roles</li>
                  </ol>
              </div>
          </div>
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Tipo de roles
            <button type="button" @click="openModal('rol','register')" class="btn btn-secondary">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </button>
          </div>
          <div class="form-group row">
              <div class="col-md-6">
                  <div class="input-group">
                      <select class="form-control col-md-3" id="opcion" name="opcion">
                        <option value="name">Nombre</option>
                        <option value="description">Descripción</option>
                      </select>
                      <input type="text" v-model="buscar" @keyup.enter="listRol(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                      <button type="submit" @click="listRol(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                  </div>
              </div>
          </div>
          <div class="table-responsive tblHeightSet small-slimscroll-style">
            <table class="table display product-overview mb-30" id="support_table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Status</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="rol in arrayRol" :key="rol.id">
                  <td v-text="rol.name"></td>
                  <td v-text="rol.description"></td>
                  <td>
                    <div v-if="rol.status">
                      <span class="label label-sm label-success">Activo</span>
                    </div>
                    <div v-else>
                      <span class="label label-sm label-danger">Desactivado</span>
                    </div>
                  </td>
                  <td>
                      <button type="button" @click="openModal('rol','update',rol)" class="btn btn-warning btn-sm">
                        <i class="icon-pencil"></i>
                      </button> &nbsp;
                      <template v-if="rol.status">
                          <button type="button" class="btn btn-danger btn-sm" @click="desactivateRol(rol.id)">
                              <i class="icon-trash"></i>
                          </button>
                      </template>
                      <template v-else>
                          <button type="button" class="btn btn-info btn-sm" @click="activateRol(rol.id)">
                              <i class="icon-check"></i>
                          </button>
                      </template>
                  </td>
                </tr>
              </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li class="page-item" v-if="pagination.current_page > 1">
                        <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                    </li>
                    <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                        <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                    </li>
                    <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                        <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                    </li>
                </ul>
            </nav>
          </div>
      </div>
    </div>

    <!-- end page container -->
    <!--Inicio del modal agregar/actualizar-->
                  <div class="modal fade" id="modalNuevo" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-primary modal-lg" role="document">
                          <div class="modal-content">
                              <div class="modal-header bg-b-orange">
                                  <h4 class="modal-title" v-text="tituloModal"></h4>
                                  <button type="button" class="close" @click="closeModal()" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                      <div class="form-group row">
                                          <label class="col-md-3 form-control-label" for="text-input">Nombre<span class="required"> * </span></label>
                                          <div class="col-md-9">
                                              <input type="text" v-model="name"  class="form-control" placeholder="Introduce el nombre del rol">

                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-3 form-control-label" for="email-input">Descripción<span class="required"> * </span></label>
                                          <div class="col-md-9">
                                              <input type="email" v-model="description"  class="form-control" placeholder="Introduce una breve descripcion del rol">
                                          </div>
                                      </div>
                                      <div v-show="errorRol" class="form-group row div-error">
                                          <div class="text-center text-error">
                                              <div v-for="error in errorShowMsjRol" :key="error" v-text="error">

                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" @click="closeModal()">Cerrar</button>
                                <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registerRol()">Guardar</button>
                                <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="updateRol()">Actualizar</button>
                              </div>
                          </div>
                          <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                  </div>
  <!--Fin del modal-->

            </div>

</template>


<script>
    export default {

      data(){
        return{
          rol_id: 0,
          name :'',
          description :'',
          modal : 0,
          tituloModal : '',
          tipoAccion : 0,
          arrayRol :[],
          errorRol:0,
          errorShowMsjRol:[],
          pagination : {
              'total' : 0,
              'current_page' : 0,
              'per_page' : 0,
              'last_page' : 0,
              'from' : 0,
              'to' : 0,
          },
          offset : 3,
          criterio : 'name',
          buscar : ''
        }
      },
      computed:{
          isActived: function(){
              return this.pagination.current_page;
          },
          //Calcula los elementos de la paginación
          pagesNumber: function() {
              if(!this.pagination.to) {
                  return [];
              }

              var from = this.pagination.current_page - this.offset;
              if(from < 1) {
                  from = 1;
              }

              var to = from + (this.offset * 2);
              if(to >= this.pagination.last_page){
                  to = this.pagination.last_page;
              }

              var pagesArray = [];
              while(from <= to) {
                  pagesArray.push(from);
                  from++;
              }
              return pagesArray;

          }
      },
      methods:{
        listRol(page,buscar,criterio){
            let me=this;
            var url='rol?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
            axios.get(url).then(function (response) {
                var respuesta= response.data;
                me.arrayRol = respuesta.rols.data;
                me.pagination= respuesta.pagination;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        cambiarPagina(page,buscar,criterio){
              let me = this;
              //Actualiza la página actual
              me.pagination.current_page = page;
              //Envia la petición para visualizar la data de esa página
              me.listRol(page,buscar,criterio);
          },
        registerRol(){
          if (this.validateRol()){
              return;
          }

          let me = this;

          axios.post('rol/store',{
              'name': this.name,
              'description': this.description
          }).then(function (response) {
              me.closeModal();
              me.listRol(1,'','name');
          }).catch(function (error) {
              console.log(error);
          });
        },
        updateRol(){
          if (this.validateRol()){
              return;
          }
          let me = this;
          axios.put('rol/update',{
              'id': this.rol_id,
              'name': this.name,
              'description': this.description
          }).then(function (response) {
              me.closeModal();
              me.listRol(1,'','name');
          }).catch(function (error) {
              console.log(error);
          });
        },
        desactivateRol(id){
           swal({
            title: 'Esta seguro de desactivar este rol?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar!',
            cancelButtonText: 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                let me = this;

                axios.put('rol/desactivate',{
                    'id': id
                }).then(function (response) {
                    me.listRol(1,'','name');
                    swal(
                    'Desactivado!',
                    'El rol se ha desactivado.',
                    'success'
                    )
                }).catch(function (error) {
                    console.log(error);
                });


            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {

            }
            })
        },
        activateRol(id){
           swal({
            title: 'Esta seguro de activar esta rol?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar!',
            cancelButtonText: 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                let me = this;

                axios.put('rol/activate',{
                    'id': id
                }).then(function (response) {
                    me.listRol(1,'','name');
                    swal(
                    'Activado!',
                    'El rol fue activado con éxito.',
                    'success'
                    )
                }).catch(function (error) {
                    console.log(error);
                });


            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {

            }
            })
        },
        validateRol(){
          this.errorRol=0;
          this.errorShowMsjRol=[];

          if (!this.name) this.errorShowMsjRol.push ("El rol no puede ir vacio, por favor ingrese un valor");
          if (!this.description) this.errorShowMsjRol.push ("El rol debe de llevar una descripcion");


          if (this.errorShowMsjRol.length) this.errorRol = 1;

          return this.errorRol;

        },
      closeModal(){
        this.modal=0;
        this.tituloModal='';
        this.name='';
        this.description='';

      },
      openModal(modelo, accion, data = []){

        this.errorRol=0;
        this.errorShowMsjRol=[];

        switch(modelo){
            case "rol":
            {
                switch(accion){
                    case 'register':
                    {
                        this.modal = 1;
                        this.tituloModal = 'Registrar nuevo rol';
                        this.name= '';
                        this.description = '';
                        this.tipoAccion = 1;
                        break;
                    }
                    case 'update':
                    {
                        //console.log(data);
                        this.modal=1;
                        this.tituloModal='Actualizar rol';
                        this.tipoAccion=2;
                        this.rol_id=data['id'];
                        this.name = data['name'];
                        this.description= data['description'];
                        break;
                    }
                }
            }
        }
      }
      },
        mounted(){
            this.listRol(1,this.buscar,this.criterio);
        }
    }
</script>
<style>
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style>
