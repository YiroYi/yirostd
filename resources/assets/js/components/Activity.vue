<template>
  <div>
    <div class="page-content-wrapper">
      <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                  <div class=" pull-left">
                      <div class="page-title">Administración de clases</div>
                  </div>
                  <ol class="breadcrumb page-breadcrumb pull-right">
                      <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                      </li>
                      <li class="active">Clases</li>
                  </ol>
              </div>
          </div>
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Clases
            <button type="button" @click="openModal('activity','register')" class="btn btn-secondary">
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
                      <input type="text" v-model="buscar" @keyup.enter="listActivity(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                      <button type="submit" @click="listActivity(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                  </div>
              </div>
          </div>
          <div class="table-responsive tblHeightSet small-slimscroll-style">
            <table class="table display product-overview mb-30" id="support_table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Precio membresia</th>
                  <th>Precion individual</th>
                  <th>Status</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="activity in arrayActivity" :key="activity.id">
                  <td v-text="activity.name"></td>
                  <td v-text="activity.description"></td>
                  <td v-text="activity.price_membership + '.00' +' '+'MXN'"></td>
                  <td v-text="activity.price_individual + '.00' +' '+'MXN'"></td>
                  <td>
                    <div v-if="activity.status">
                      <span class="label label-sm label-success">Activo</span>
                    </div>
                    <div v-else>
                      <span class="label label-sm label-danger">Desactivado</span>
                    </div>
                  </td>
                  <td>
                      <button type="button" @click="openModal('activity','update',activity)" class="btn btn-warning btn-sm">
                        <i class="icon-pencil"></i>
                      </button> &nbsp;
                      <template v-if="activity.status">
                          <button type="button" class="btn btn-danger btn-sm" @click="desactivateActivity(activity.id)">
                              <i class="icon-trash"></i>
                          </button>
                      </template>
                      <template v-else>
                          <button type="button" class="btn btn-info btn-sm" @click="activateActivity(activity.id)">
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
                                              <input type="text" v-model="name"  class="form-control" placeholder="Introduce el nombre de la clase">

                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-3 form-control-label" for="email-input">Descripción<span class="required"> * </span></label>
                                          <div class="col-md-9">
                                              <input type="email" v-model="description"  class="form-control" placeholder="Introduce una breve descripcion">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-3 form-control-label" for="email-input">Precio en membresia<span class="required"> * </span></label>
                                          <div class="col-md-9">
                                              <input type="email" v-model="price_membership"  class="form-control" placeholder="Introduzca el precio de una visita en membresia">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-3 form-control-label" for="email-input">Precio en visita<span class="required"> * </span></label>
                                          <div class="col-md-9">
                                              <input type="email" v-model="price_individual"  class="form-control" placeholder="Introduzca el precio de una visita individual">
                                          </div>
                                      </div>
                                      <div v-show="errorActivity" class="form-group row div-error">
                                          <div class="text-center text-error">
                                              <div v-for="error in errorShowMsjActivity" :key="error" v-text="error">

                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" @click="closeModal()">Cerrar</button>
                                <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registerActivity()">Guardar</button>
                                <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="updateActivity()">Actualizar</button>
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
          activity_id: 0,
          name :'',
          description :'',
          price_membership :'',
          price_individual :'',
          modal : 0,
          tituloModal : '',
          tipoAccion : 0,
          arrayActivity :[],
          errorActivity:0,
          errorShowMsjActivity:[],
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
        listActivity(page,buscar,criterio){
            let me=this;
            var url='activity?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
            axios.get(url).then(function (response) {
                var respuesta= response.data;
                me.arrayActivity = respuesta.activities.data;
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
              me.listActivity(page,buscar,criterio);
          },
        registerActivity(){
          if (this.validateActivity()){
              return;
          }

          let me = this;

          axios.post('/activity/store',{
              'name': this.name,
              'description': this.description,
              'price_individual': this.price_individual,
              'price_membership': this.price_membership
          }).then(function (response) {
              me.closeModal();
              me.listActivity(1,'','name');
          }).catch(function (error) {
              console.log(error);
          });
        },
        updateActivity(){
          if (this.validateActivity()){
              return;
          }
          let me = this;
          axios.put('activity/update',{
              'id': this.activity_id,
              'name': this.name,
              'description': this.description,
              'price_individual': this.price_individual,
              'price_membership': this.price_membership
          }).then(function (response) {
              me.closeModal();
              me.listActivity(1,'','name');
          }).catch(function (error) {
              console.log(error);
          });
        },
        desactivateActivity(id){
           swal({
            title: 'Esta seguro de borrar esta clase?',
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

                axios.put('activity/desactivate',{
                    'id': id
                }).then(function (response) {
                    me.listActivity(1,'','name');
                    swal(
                    'Desactivado!',
                    'La clase se ha desactivado.',
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
        activateActivity(id){
           swal({
            title: 'Esta seguro de activar esta clase?',
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

                axios.put('activity/activate',{
                    'id': id
                }).then(function (response) {
                    me.listActivity(1,'','name');
                    swal(
                    'Activado!',
                    'La clase sido activada con éxito.',
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
        validateActivity(){
          this.errorActivity=0;
          this.errorShowMsjActivity=[];

          if (!this.name) this.errorShowMsjActivity.push ("El nombre de la actividad no puede ir vacio, por favor ingrese un valor");
          if (!this.description) this.errorShowMsjActivity.push ("La descripcion de la actividad no puede ir vacio, por favor ingrese un valor");
          if (!this.price_individual) this.errorShowMsjActivity.push ("El precio individual de la actividad no puede ir vacio, por favor ingrese un valor");
          if (!this.price_membership) this.errorShowMsjActivity.push ("El precio en membresia de la actividad no puede ir vacio, por favor ingrese un valor");

          if (this.errorShowMsjActivity.length) this.errorActivity = 1;

          return this.errorActivity;

        },
      closeModal(){
        this.modal=0;
        this.tituloModal='';
        this.name='';
        this.description='';
        this.price_membership='';
        this.price_individual='';
      },
      openModal(modelo, accion, data = []){

        this.errorActivity=0;
        this.errorShowMsjActivity=[];

        switch(modelo){
            case "activity":
            {
                switch(accion){
                    case 'register':
                    {
                        this.modal = 1;
                        this.tituloModal = 'Registrar nueva actividad';
                        this.name= '';
                        this.description = '';
                        this.price_membership = '';
                        this.price_individual = '';
                        this.tipoAccion = 1;
                        break;
                    }
                    case 'update':
                    {
                        //console.log(data);
                        this.modal=1;
                        this.tituloModal='Actualizar una nueva actividad';
                        this.tipoAccion=2;
                        this.activity_id=data['id'];
                        this.name = data['name'];
                        this.description= data['description'];
                        this.price_individual= data['price_individual'];
                        this.price_membership= data['price_membership'];
                        break;
                    }
                }
            }
        }
      }
      },
        mounted(){
            this.listActivity(1,this.buscar,this.criterio);
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
