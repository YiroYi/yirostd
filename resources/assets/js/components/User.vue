<template>
  <div >
    <div class="page-content-wrapper">
      <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                  <div class=" pull-left">
                      <div class="page-title">Administración de usuarios</div>
                  </div>
                  <ol class="breadcrumb page-breadcrumb pull-right">
                      <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                      </li>
                      <li class="active">Usuarios</li>
                  </ol>
              </div>
          </div>
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Usuarios
            <button type="button" @click="openModal('user','register')" class="btn btn-secondary">
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
                      <input type="text" v-model="buscar" @keyup.enter="listUser(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                      <button type="submit" @click="listUser(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                  </div>
              </div>
          </div>
          <div class="table-responsive tblHeightSet small-slimscroll-style">
            <table class="table display product-overview mb-30" id="support_table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Usuario</th>
                  <th>Email</th>
                  <th>Telefono</th>
                  <th>Genero</th>
                  <th>Rol</th>
                  <th>Status</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="user in arrayUser" :key="user.id">
                  <td v-text="user.name"></td>
                  <td v-text="user.last_name"></td>
                  <td v-text="user.access_user"></td>
                  <td v-text="user.email"></td>
                  <td v-text="user.phone"></td>
                  <td>
                    <div v-if="user.sex">
                      <span class="label label-sm label-success">Masculino</span>
                    </div>
                    <div v-else>
                      <span class="label label-sm label-danger">Femenino</span>
                    </div>
                  </td>
                  <td v-text="user.rol_name"></td>
                  <td>
                    <div v-if="user.status">
                      <span class="label label-sm label-success">Activo</span>
                    </div>
                    <div v-else>
                      <span class="label label-sm label-danger">Desactivado</span>
                    </div>
                  </td>
                  <td>
                      <button type="button" @click="openModal('user','update',user)" class="btn btn-warning btn-sm">
                        <i class="icon-pencil"></i>
                      </button> &nbsp;
                      <template v-if="user.status">
                          <button type="button" class="btn btn-danger btn-sm" @click="desactivateUser(user.id)">
                              <i class="icon-trash"></i>
                          </button>
                      </template>
                      <template v-else>
                          <button type="button" class="btn btn-info btn-sm" @click="activateUser(user.id)">
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
                                          <label class="col-md-2 form-control-label" for="text-input">Sexo<span class="required"> * </span></label>
                                          <div class="col-md-4">
                                            <select class="form-control" v-model="sex">
                                                <option value="2" disabled>Seleccione</option>
                                                <option value="0" >Femenino</option>
                                                <option value="1" >Masculino</option>
                                            </select>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-2 form-control-label" for="text-input">Usuario<span class="required"> * </span></label>
                                          <div class="col-md-4">
                                              <input type="text" v-model="access_user"  class="form-control" placeholder="Introduce un nuevo usuario">
                                          </div>
                                          <label class="col-md-2 form-control-label" for="text-input">Password<span class="required"> * </span></label>
                                          <div class="col-md-4">
                                              <input type="password" v-model="password"  class="form-control" placeholder="Introduce un nuevo password">

                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-2 form-control-label" for="text-input">Rol<span class="required"> * </span></label>
                                          <div class="col-md-4">
                                              <select class="form-control" v-model="idrol">
                                                  <option value="0" disabled>Seleccione</option>
                                                  <option v-for="rol in arrayRol" :key="rol.id" :value="rol.id" v-text="rol.name"></option>
                                              </select>
                                          </div>
                                      </div>
                                      <div v-show="errorUser" class="form-group row div-error">
                                          <div class="text-center text-error">
                                              <div v-for="error in errorShowMsjUser" :key="error" v-text="error">

                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" @click="closeModal()">Cerrar</button>
                                <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registerUser()">Guardar</button>
                                <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="updateUser()">Actualizar</button>
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
          user_id: 0,
          name :'',
          email:'',
          password:'',
          access_user:'',
          last_name:'',
          phone:'',
          status:0,
          sex:0,
          idrol:0,
          description :'',
          modal : 0,
          tituloModal : '',
          tipoAccion : 0,
          arrayUser :[],
          arrayRol :[],
          errorUser:0,
          errorShowMsjUser:[],
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
        listUser(page,buscar,criterio){
            let me=this;
            var url='user?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
            axios.get(url).then(function (response) {
                var respuesta= response.data;
                me.arrayUser = respuesta.users.data;
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
              me.listUser(page,buscar,criterio);
          },
        selectRol(){
              let me=this;
              var url= 'rol/selectRol';
              axios.get(url).then(function (response) {
                  //console.log(response);
                  var respuesta= response.data;
                  me.arrayRol = respuesta.rols;
              })
              .catch(function (error) {
                  console.log(error);
              });
          },
        registerUser(){
          if (this.validateUser()){
              return;
          }

          let me = this;

          axios.post('user/store',{
              'name': this.name,
              'email':this.email,
              'password':this.password,
              'access_user':this.access_user,
              'last_name':this.last_name,
              'phone':this.phone,
              'sex':this.sex,
              'idrol':this.idrol


          }).then(function (response) {
              me.closeModal();
              me.listUser(1,'','name');
          }).catch(function (error) {
              console.log(error);
          });
        },
        updateUser(){
          if (this.validateUser()){
              return;
          }
          let me = this;
          axios.put('user/update',{
              'id': this.user_id,
              'name': this.name,
              'email':this.email,
              'password':this.password,
              'access_user':this.access_user,
              'last_name':this.last_name,
              'phone':this.phone,
              'sex':this.sex,
              'idrol':this.idrol
          }).then(function (response) {
              me.closeModal();
              me.listUser(1,'','name');
          }).catch(function (error) {
              console.log(error);
          });
        },
        desactivateUser(id){
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

                axios.put('user/desactivate',{
                    'id': id
                }).then(function (response) {
                    me.listUser(1,'','name');
                    swal(
                    'Desactivado!',
                    'El user se ha desactivado.',
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
        activateUser(id){
           swal({
            title: 'Esta seguro de activar esta user?',
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

                axios.put('user/activate',{
                    'id': id
                }).then(function (response) {
                    me.listUser(1,'','name');
                    swal(
                    'Activado!',
                    'El user fue activado con éxito.',
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
        validateUser(){
          this.errorUser=0;
          this.errorShowMsjUser=[];

          if (!this.name) this.errorShowMsjUser.push ("El nombre no puede ir vacio, por favor ingrese un valor");
          if (!this.email) this.errorShowMsjUser.push ("El email no puede ir vacio, por favor ingrese un valor");
          if (!this.password) this.errorShowMsjUser.push ("El password no puede ir vacio, por favor ingrese un valor");
          if (!this.access_user) this.errorShowMsjUser.push ("Debe crear un usuario para esta cuenta no puede ir vacio");
          if (!this.last_name) this.errorShowMsjUser.push ("Ingrese el apellido");
          if (!this.phone) this.errorShowMsjUser.push ("Ingrese un numero telefonico");
          if (this.idrol==0) this.errorShowMsjUser.push("Seleccione un rol.");
          if (this.sex==2) this.errorShowMsjUser.push("Seleccione sexo del usuario.");



          if (this.errorShowMsjUser.length) this.errorUser = 1;

          return this.errorUser;

        },
        closeModal(){
        this.modal=0;
        this.tituloModal='';
        this.name= '';
        this.email= '';
        this.password= '';
        this.access_user= '';
        this.last_name= '';
        this.phone= '';
        this.status= '';
        this.sex= '';
        this.idrol= '';
        },
        openModal(modelo, accion, data = []){

        this.errorUser=0;
        this.errorShowMsjUser=[];

        switch(modelo){
            case "user":
            {
                switch(accion){
                    case 'register':
                    {
                        this.modal = 1;
                        this.tituloModal = 'Registrar nuevo usuario';
                        this.name= '';
                        this.email= '';
                        this.password= '';
                        this.access_user= '';
                        this.last_name= '';
                        this.phone= '';
                        this.sex= '';
                        this.idrol= '';
                        this.tipoAccion = 1;
                        break;
                    }
                    case 'update':
                    {
                        //console.log(data);
                        this.modal=1;
                        this.tituloModal='Actualizar usuario';
                        this.tipoAccion=2;
                        this.user_id=data['id'];
                        this.name= data['name'];
                        this.email= data['email'];
                        this.password= data['password'];
                        this.access_user= data['access_user'];
                        this.last_name= data['last_name'];
                        this.phone= data['phone'];
                        this.sex= data['sex'];
                        this.idrol= data['idrol'];
                        break;
                    }
                }
            }
        }
        this.selectRol();
      }
      },
        mounted(){
            this.listUser(1,this.buscar,this.criterio);
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
