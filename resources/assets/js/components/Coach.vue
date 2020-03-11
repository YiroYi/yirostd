<template>
  <div >
    <div class="page-content-wrapper">
      <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                  <div class=" pull-left">
                      <div class="page-title">Administración de instructores</div>
                  </div>
                  <ol class="breadcrumb page-breadcrumb pull-right">
                      <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                      </li>
                      <li class="active">Instructores</li>
                  </ol>
              </div>
          </div>
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Instructores
            <button type="button" @click="openModal('coach','register')" class="btn btn-secondary">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </button>
          </div>
          <div class="form-group row">
              <div class="col-md-6">
                  <div class="input-group">
                      <select class="form-control col-md-3" id="opcion" name="opcion">
                        <option value="name">Nombre</option>
                        <option value="email">E-mail</option>
                      </select>
                      <input type="text" v-model="buscar" @keyup.enter="listCoach(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                      <button type="submit" @click="listCoach(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                  </div>
              </div>
          </div>
          <div class="table-responsive tblHeightSet small-slimscroll-style">
            <table class="table display product-overview mb-30" id="support_table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Actividad Principal</th>
                  <th>Comentarios</th>
                  <th>Status</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="coach in arrayCoach" :key="coach.id">
                  <td v-text="coach.name"></td>
                  <td v-text="coach.last_name"></td>
                  <td v-text="coach.phone"></td>
                  <td v-text="coach.email"></td>
                  <td v-text="coach.activity_name"></td>
                  <td v-text="coach.comments"></td>
                  <td>
                    <div v-if="coach.status">
                      <span class="label label-sm label-success">Activo</span>
                    </div>
                    <div v-else>
                      <span class="label label-sm label-danger">Desactivado</span>
                    </div>
                  </td>
                  <td>
                      <button type="button" @click="openModal('coach','update',coach)" class="btn btn-warning btn-sm">
                        <i class="icon-pencil"></i>
                      </button> &nbsp;
                      <template v-if="coach.status">
                          <button type="button" class="btn btn-danger btn-sm" @click="desactivateCoach(coach.id)">
                              <i class="icon-trash"></i>
                          </button>
                      </template>
                      <template v-else>
                          <button type="button" class="btn btn-info btn-sm" @click="activateCoach(coach.id)">
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
                                          <label class="col-md-2 form-control-label" for="text-input">Nombre<span class="required"> * </span></label>
                                          <div class="col-md-4">
                                              <input type="text" v-model="name"  class="form-control" placeholder="Nombre del usuario">

                                          </div>
                                          <label class="col-md-2 form-control-label" for="text-input">Apellido<span class="required"> * </span></label>
                                          <div class="col-md-4">
                                              <input type="text" v-model="last_name"  class="form-control" placeholder="Apellido del usuario">

                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-2 form-control-label" for="text-input">Telefono<span class="required"> * </span></label>
                                          <div class="col-md-4">
                                              <input type="text" v-model="phone"  class="form-control" placeholder="Introduce el telefono del usuario">

                                          </div>
                                          <label class="col-md-2 form-control-label" for="text-input">E-mail<span class="required"> * </span></label>
                                          <div class="col-md-4">
                                              <input type="email" v-model="email"  class="form-control" placeholder="Introduce el mail del usuario">

                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-3 form-control-label" for="text-input">Actividad principal<span class="required"> * </span></label>
                                          <div class="col-md-5">
                                              <select class="form-control" v-model="idactivity">
                                                  <option value="0" disabled>Seleccione</option>
                                                  <option v-for="activity in arrayActivity" :key="activity.id" :value="activity.id" v-text="activity.name"></option>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label class="col-md-4 form-control-label" for="text-input">Comentarios especiales:</label>
                                      </div>
                                      <div class="form-group row">
                                        <div class="col-md-12">
                                            <textarea v-model="comments" class="form-control" rows="4" placeholder="Enter ..."></textarea>
                                        </div>
                                      </div>
                                      <div v-show="errorCoach" class="form-group row div-error">
                                          <div class="text-center text-error">
                                              <div v-for="error in errorShowMsjCoach" :key="error" v-text="error">

                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" @click="closeModal()">Cerrar</button>
                                <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registerCoach()">Guardar</button>
                                <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="updateCoach()">Actualizar</button>
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
          coach_id: 0,
          name :'',
          last_name:'',
          email:'',
          phone:'',
          comments:'',
          status:0,
          idactivity:0,
          modal : 0,
          tituloModal : '',
          tipoAccion : 0,
          arrayCoach :[],
          arrayActivity :[],
          errorCoach:0,
          errorShowMsjCoach:[],
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
        listCoach(page,buscar,criterio){
            let me=this;
            var url='coach?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
            axios.get(url).then(function (response) {
                var respuesta= response.data;
                me.arrayCoach = respuesta.couches.data;
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
              me.listCoach(page,buscar,criterio);
          },
        selectActivity(){
              let me=this;
              var url= 'activity/selectActivity';
              axios.get(url).then(function (response) {
                  //console.log(response);
                  var respuesta= response.data;
                  me.arrayActivity = respuesta.activities;
              })
              .catch(function (error) {
                  console.log(error);
              });
          },
        registerCoach(){
          if (this.validateCoach()){
              return;
          }

          let me = this;

          axios.post('coach/store',{
              'name': this.name,
              'last_name':this.last_name,
              'email':this.email,
              'phone':this.phone,
              'comments':this.comments,
              'idactivity':this.idactivity


          }).then(function (response) {
              me.closeModal();
              me.listCoach(1,'','name');
          }).catch(function (error) {
              console.log(error);
          });
        },
        updateCoach(){
          if (this.validateCoach()){
              return;
          }
          let me = this;
          axios.put('coach/update',{
              'id': this.coach_id,
              'name': this.name,
              'last_name':this.last_name,
              'email':this.email,
              'phone':this.phone,
              'comments':this.comments,
              'idactivity':this.idactivity
          }).then(function (response) {
              me.closeModal();
              me.listCoach(1,'','name');
          }).catch(function (error) {
              console.log(error);
          });
        },
        desactivateCoach(id){
           swal({
            title: 'Esta seguro de desactivar este instructor?',
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

                axios.put('coach/desactivate',{
                    'id': id
                }).then(function (response) {
                    me.listCoach(1,'','name');
                    swal(
                    'Desactivado!',
                    'El coach se ha desactivado.',
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
        activateCoach(id){
           swal({
            title: 'Esta seguro de activar este coach?',
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

                axios.put('coach/activate',{
                    'id': id
                }).then(function (response) {
                    me.listCoach(1,'','name');
                    swal(
                    'Activado!',
                    'El coach fue activado con éxito.',
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
        validateCoach(){
          this.errorCoach=0;
          this.errorShowMsjCoach=[];

          if (!this.name) this.errorShowMsjCoach.push ("El nombre no puede ir vacio, por favor ingrese un valor");
          if (!this.email) this.errorShowMsjCoach.push ("El email no puede ir vacio, por favor ingrese un valor");
          if (!this.last_name) this.errorShowMsjCoach.push ("Ingrese el apellido");
          if (!this.phone) this.errorShowMsjCoach.push ("Ingrese un numero telefonico");
          if (this.idactivity==0) this.errorShowMsjCoach.push("Seleccione una actividad principal.");




          if (this.errorShowMsjCoach.length) this.errorCoach = 1;

          return this.errorCoach;

        },
        closeModal(){
        this.modal=0;
        this.tituloModal='';
        this.name= '';
        this.email= '';
        this.last_name= '';
        this.phone= '';
        this.comments= '';
        this.status= '';
        this.idactivity= '';
        },
        openModal(modelo, accion, data = []){

        this.errorCoach=0;
        this.errorShowMsjCoach=[];

        switch(modelo){
            case "coach":
            {
                switch(accion){
                    case 'register':
                    {
                        this.modal = 1;
                        this.tituloModal = 'Registrar nuevo instructor';
                        this.name= '';
                        this.email= '';
                        this.last_name= '';
                        this.phone= '';
                        this.comments= '';
                        this.idactivity= '';
                        this.tipoAccion = 1;
                        break;
                    }
                    case 'update':
                    {
                        //console.log(data);
                        this.modal=1;
                        this.tituloModal='Actualizar informacion de instructor';
                        this.tipoAccion=2;
                        this.coach_id=data['id'];
                        this.name= data['name'];
                        this.email= data['email'];
                        this.last_name= data['last_name'];
                        this.phone= data['phone'];
                        this.comments= data['comments'];
                        this.idactivity= data['idactivity'];
                        break;
                    }
                }
            }
        }
        this.selectActivity();
      }
      },
        mounted(){
            this.listCoach(1,this.buscar,this.criterio);
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
