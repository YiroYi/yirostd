<template>
  <div >
    <div class="page-content-wrapper">
      <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                  <div class=" pull-left">
                      <div class="page-title">Administración de costos</div>
                  </div>
                  <ol class="breadcrumb page-breadcrumb pull-right">
                      <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                      </li>
                      <li class="active">Costos</li>
                  </ol>
              </div>
          </div>
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Tipo de costos
            <button type="button" @click="openModal('cost','register')" class="btn btn-secondary">
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
                      <input type="text" v-model="buscar" @keyup.enter="listCost(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                      <button type="submit" @click="listCost(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
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
                <tr v-for="cost in arrayCost" :key="cost.id">
                  <td v-text="cost.name"></td>
                  <td v-text="cost.description"></td>
                  <td>
                    <div v-if="cost.status">
                      <span class="label label-sm label-success">Activo</span>
                    </div>
                    <div v-else>
                      <span class="label label-sm label-danger">Desactivado</span>
                    </div>
                  </td>
                  <td>
                      <button type="button" @click="openModal('cost','update',cost)" class="btn btn-warning btn-sm">
                        <i class="icon-pencil"></i>
                      </button> &nbsp;
                      <template v-if="cost.status">
                          <button type="button" class="btn btn-danger btn-sm" @click="desactivateCost(cost.id)">
                              <i class="icon-trash"></i>
                          </button>
                      </template>
                      <template v-else>
                          <button type="button" class="btn btn-info btn-sm" @click="activateCost(cost.id)">
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
                                              <input type="text" v-model="name"  class="form-control" placeholder="Introduce el nombre del costo">

                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-3 form-control-label" for="email-input">Descripción<span class="required"> * </span></label>
                                          <div class="col-md-9">
                                              <input type="email" v-model="description"  class="form-control" placeholder="Introduce una breve descripcion">
                                          </div>
                                      </div>
                                      <div v-show="errorCost" class="form-group row div-error">
                                          <div class="text-center text-error">
                                              <div v-for="error in errorShowMsjCost" :key="error" v-text="error">

                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" @click="closeModal()">Cerrar</button>
                                <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registerCost()">Guardar</button>
                                <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="updateCost()">Actualizar</button>
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
          cost_id: 0,
          name :'',
          description :'',
          modal : 0,
          tituloModal : '',
          tipoAccion : 0,
          arrayCost :[],
          errorCost:0,
          errorShowMsjCost:[],
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
        listCost(page,buscar,criterio){
            let me=this;
            var url='cost?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
            axios.get(url).then(function (response) {
                var respuesta= response.data;
                me.arrayCost = respuesta.costs.data;
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
              me.listCost(page,buscar,criterio);
          },
        registerCost(){
          if (this.validateCost()){
              return;
          }

          let me = this;

          axios.post('cost/store',{
              'name': this.name,
              'description': this.description
          }).then(function (response) {
              me.closeModal();
              me.listCost(1,'','name');
          }).catch(function (error) {
              console.log(error);
          });
        },
        updateCost(){
          if (this.validateCost()){
              return;
          }
          let me = this;
          axios.put('cost/update',{
              'id': this.cost_id,
              'name': this.name,
              'description': this.description
          }).then(function (response) {
              me.closeModal();
              me.listCost(1,'','name');
          }).catch(function (error) {
              console.log(error);
          });
        },
        desactivateCost(id){
           swal({
            title: 'Esta seguro de desactivar este costo?',
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

                axios.put('cost/desactivate',{
                    'id': id
                }).then(function (response) {
                    me.listCost(1,'','name');
                    swal(
                    'Desactivado!',
                    'El costo se ha desactivado.',
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
        activateCost(id){
           swal({
            title: 'Esta seguro de activar esta costo?',
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

                axios.put('cost/activate',{
                    'id': id
                }).then(function (response) {
                    me.listCost(1,'','name');
                    swal(
                    'Activado!',
                    'El costo fue activado con éxito.',
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
        validateCost(){
          this.errorCost=0;
          this.errorShowMsjCost=[];

          if (!this.name) this.errorShowMsjCost.push ("El ncosto no puede ir vacio, por favor ingrese un valor");
          if (!this.description) this.errorShowMsjCost.push ("El costo debe de llevar una descripcion");


          if (this.errorShowMsjCost.length) this.errorCost = 1;

          return this.errorCost;

        },
      closeModal(){
        this.modal=0;
        this.tituloModal='';
        this.name='';
        this.description='';

      },
      openModal(modelo, accion, data = []){

        this.errorCost=0;
        this.errorShowMsjCost=[];

        switch(modelo){
            case "cost":
            {
                switch(accion){
                    case 'register':
                    {
                        this.modal = 1;
                        this.tituloModal = 'Registrar nuevo costo de operacion';
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
                        this.tituloModal='Actualizar costo de operacion';
                        this.tipoAccion=2;
                        this.cost_id=data['id'];
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
            this.listCost(1,this.buscar,this.criterio);
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
