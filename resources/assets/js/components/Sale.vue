<template>
  <div >
    <div class="page-content-wrapper">
        <!-- Ejemplo de tabla Listado -->
        <div class="page-content">

            <!-- Listado-->
            <template v-if="listado==1">
              <div class="card-header">
                  <i class="fa fa-align-justify"></i> Operacion diaria
                  <button type="button" @click="openModal()" class="btn btn-secondary">
                      <i class="icon-plus"></i>&nbsp;Nuevo
                  </button>
              </div>
              <div class="card-body">
                  <div class="form-group row">
                      <div class="col-md-6">
                          <div class="input-group">
                              <select class="form-control col-md-3" v-model="criterio">
                                <option value="sale_date">Fecha</option>
                                <option value="status">Estatus</option>
                              </select>
                              <input type="text" v-model="buscar" @keyup.enter="listClass(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                              <button type="submit" @click="listClass(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                          </div>
                      </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table display product-overview mb-30"  id="support_table">
                          <thead>
                              <tr class="salesTable">
                                  <th>Eliminar día</th>
                                  <th>Codigo</th>
                                  <th>Usuario</th>
                                  <th>Fecha</th>
                                  <th>Total</th>
                                  <th>Estado</th>
                                  <th>&nbsp;&nbsp;Agregar &nbsp;&nbsp;|&nbsp;&nbsp; Editar&nbsp;&nbsp; |&nbsp;&nbsp; Cerrar dia</th>

                              </tr>
                          </thead>
                          <tbody>
                              <tr v-for="sale in arraySale" :key="sale.id">
                                <td>
                                    <button type="button" @click="deleteDay(sale.id)" class="btn btn-danger btn-sm radiousButton">
                                    <i class="fa fa-times-circle"></i>
                                    </button>
                                </td>
                                  <td v-text="sale.id"></td>
                                  <td v-text="sale.name"></td>
                                  <td v-text="sale.sale_date"></td>
                                  <td v-text="sale.total"></td>
                                  <td >
                                    <div v-if="sale.status==1">
                                      <span class="label label-sm label-success">Abierto</span>
                                    </div>
                                    <div v-else>
                                      <span class="label label-sm label-danger">Cerrado</span>
                                    </div>
                                  </td>
                                  <td>
                                    <div v-if="sale.status==1">
                                      <button type="button" @click="showDetail(sale.id)" class="btn btn-primary btn-sm radiousButton">
                                      <i class="fa fa-plus"></i>
                                      </button> &nbsp;&nbsp;&nbsp;&nbsp;
                                      <button type="button" @click="openModalEditar(sale.id)" class="btn btn-warning btn-sm radiousButton">
                                      <i class="fa fa-edit"></i>
                                      </button> &nbsp;&nbsp;&nbsp;&nbsp;
                                      <button type="button" @click="closeDay(sale.id)" class="btn btn-danger btn-sm radiousButton">
                                      <i class="fa fa-stop"></i>
                                      </button>
                                    </div>
                                    <div v-else>
                                      <button type="button" @click="activateDay(sale.id)" class="btn btn-success btn-sm radiousButton">
                                      <i class="fa fa-power-off"></i>
                                      </button>
                                    </div>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
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
            </template>
            <!--Fin Listado-->
            <!-- Detalle-->
            <template v-else-if="listado==0">
                <div class="card-body">
                    <div class="form-group row border">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Busque la actividad a ingresar: (*)</label>
                                <v-select
                                    :on-search="selectActivityAjax"
                                    label="name"
                                    :options="arrayActivityAjax"
                                    placeholder="Buscar actividad..."
                                    :onChange="getActivityData"
                                >

                                </v-select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Instructor (*)</label>
                            <v-select
                                :on-search="selectCoachAjax"
                                label="name"
                                :options="arrayInstructorAjax"
                                placeholder="Buscar instructor..."
                                :onChange="getInstructorData"

                            >

                            </v-select>
                        </div>
                        <div class="col-md-4">
                          <label for="">Horario<span class="required"> * </span></label>
                          <div >
                              <select class="form-control" v-model="time">
                                  <option value="0" disabled>Seleccione</option>
                                  <option v-for="schedule in arraySchedule" :key="schedule.id" :value="schedule.id" v-text="schedule.time"></option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <label for="">Ingrese el gasto:</label>
                          <div >
                              <select class="form-control" v-model="idcost">
                                  <option value="0" disabled>Seleccione</option>
                                  <option v-for="cost in arrayCost" :key="cost.id" :value="cost.id" v-text="cost.name"></option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Costo<span class="required"> * </span></label>
                                <input type="number" value="0" min="0" max="30" class="form-control" v-model="cost_expense" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row border">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Clientas con tarjeta <span style="color:red;" v-show="qty_membership<0">(*Ingrese)</span></label>
                              <input type="number" value="0" min="0" max="30" class="form-control" v-model="qty_membership">
                          </div>
                      </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Clientas con visita <span style="color:red;" v-show="qty_individual<0">(*Ingrese)</span></label>
                                <input type="number" value="0" min="0" max="30" class="form-control" v-model="qty_individual">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <button @click="agregarDetalle()" class="btn btn-success form-control btnagregar"><i class="icon-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div v-show="errorSale" class="form-group row div-error">
                            <div class="text-center text-error">
                                <div v-for="error in errorShowMsjSale" :key="error" v-text="error">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row border">
                        <div class="table-responsive col-md-12">
                            <table class="table table-bordered table-striped table-sm" width="100%">
                                <thead>
                                    <tr class="salesTable">
                                        <th>Eliminar</th>
                                        <th>Actividad</th>
                                        <th>Horario</th>
                                        <th>Instructor</th>
                                        <th>#Tarjetas</th>
                                        <th>#Visitas</th>
                                        <th>$Tarjetas</th>
                                        <th>$Precio Visitas</th>
                                        <th>Concepto</th>
                                        <th>$Gasto</th>
                                        <th>TTL Personas</th>
                                        <th>Total Clase</th>
                                    </tr>
                                </thead>
                                <tbody v-if="arrayDetail.length">
                                    <tr v-for="detail in arrayDetail" :key="detail.id" class="salesTable">
                                          <td>
                                              <button @click="eliminarDetalle(index)" type="button" class="btn btn-danger btn-sm">
                                                  <i class="icon-close"></i>
                                              </button>
                                          </td>
                                          <td v-text="detail.activity_name"></td>
                                          <td v-text="detail.time"></td>
                                          <td v-text="detail.couch_name"></td>
                                          <td v-text="detail.qty_membership"></td>
                                          <td v-text="detail.qty_individual"></td>
                                          <td v-text="detail.membership_fee" ></td>
                                          <td v-text="detail.individual_fee" ></td>
                                          <td v-text="detail.cost_name"></td>
                                          <td v-text="detail.cost_expense"></td>
                                          <td v-text="detail.total_personas"></td>
                                          <td v-text="detail.total_efectivo"></td>

                                    </tr>
                                    <tr style="background-color: #CEECF5;">
                                        <td colspan="11" align="right"><strong>Venta del día:</strong></td>
                                        <td>$ {{total = totalDay}}</td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <tr>
                                        <td colspan="12">
                                            No se han agregado clases
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div v-show="errorStore" class="form-group row div-error">
                            <div class="text-center text-error">
                                <div v-for="error in errorShowMsjStoreSale" :key="error" v-text="error">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button type="button" @click="ocultarDetalle()" class="btn btn-secondary">Cerrar</button>
                            <button type="button" class="btn btn-primary" @click="saveActivity()">Registrar Actividad</button>
                        </div>
                    </div>
                </div>
              </template>
            <!-- Fin Detalle-->
            <template v-else="listado==2">
              <div class="card-body">
                  <div class="form-group row border">
                      <div class="col-md-4">
                        <label for="">Actividad<span class="required"> * </span></label>
                        <div >
                            <select class="form-control" v-model="idactivity">
                                <option value="0" disabled>Seleccione</option>
                                <option v-for="activityEdit in arrayActivityEdit" :key="activityEdit.id" :value="activityEdit.id" v-text="activityEdit.name"></option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="">Instructor<span class="required"> * </span></label>
                        <div >
                            <select class="form-control" v-model="idcouch">
                                <option value="0" disabled>Seleccione</option>
                                <option v-for="coachEdit in arrayCoachEdit" :key="coachEdit.id" :value="coachEdit.id" v-text="coachEdit.name"></option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="">Horario<span class="required"> * </span></label>
                        <div >
                            <select class="form-control" v-model="time">
                                <option value="0" disabled>Seleccione</option>
                                <option v-for="schedule in arraySchedule" :key="schedule.id" :value="schedule.id" v-text="schedule.time"></option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <label for="">Ingrese el gasto:</label>
                        <div >
                            <select class="form-control" v-model="idcost">
                                <option value="0" disabled>Seleccione</option>
                                <option v-for="cost in arrayCost" :key="cost.id" :value="cost.id" v-text="cost.name"></option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Costo $$<span class="required"> * </span></label>
                              <input type="number" value="0" min="0" max="30" class="form-control" v-model="cost_expense" placeholder="">
                          </div>
                      </div>
                  </div>
                  <div class="form-group row border">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Clientas con tarjeta <span style="color:red;" v-show="qty_membership<0">(*Ingrese)</span></label>
                            <input type="number" value="0" min="0" max="30" class="form-control" v-model="qty_membership">
                        </div>
                    </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Clientas con visita <span style="color:red;" v-show="qty_individual<0">(*Ingrese)</span></label>
                              <input type="number" value="0" min="0" max="30" class="form-control" v-model="qty_individual">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div v-show="errorSaleEdit" class="form-group row div-error">
                          <div class="text-center text-error">
                              <div v-for="error in errorShowMsjSaleEdit" :key="error" v-text="error">

                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-12">
                          <button type="button" @click="ocultarDetalle()" class="btn btn-secondary">Cerrar</button>
                          <button type="button" class="btn btn-primary" @click="saveEditDetail()">Salvar</button>
                      </div>
                  </div>
              </div>
            </template>
          </div>
        </div>
        <!--Inicio del modal crear dia-->
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

                                              <div class="col-md-3">
                                                <label for="text-input" >Fecha:</label>
                                                  <input type="text"  v-model="timeBegin" class="form-control" placeholder="Introduce el nombre de la clase" readonly>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" @click="closeModal()">Cerrar</button>
                                    <button type="button" class="btn btn-success" @click="createDay()">Iniciar</button>
                                  </div>
                              </div>
                              <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                      </div>
        <!--Fin del modal-->
        <!--Inicio del modal Editar-->
        <div class="modal fade" id="modalNuevo" tabindex="-1" :class="{'mostrar' : modalEditar}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog modal-primary modal-lg" role="document">
                              <div class="modal-content">
                                  <div class="modal-header bg-b-black">
                                      <h4 class="modal-title" v-text="tituloModal"></h4>
                                      <button type="button" class="close" @click="closeModalEdit()" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                          <div class="form-group row border">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-bordered table-striped table-sm" width="100%">
                                                    <thead>
                                                        <tr class="salesTable">
                                                            <th>&nbsp;&nbsp;Editar&nbsp;&nbsp; |&nbsp;&nbsp;Eliminar </th>
                                                            <th>Actividad</th>
                                                            <th>Horario</th>
                                                            <th>Instructor</th>
                                                            <th>#Tarjetas</th>
                                                            <th>#Visitas</th>
                                                            <th>$Tarjetas</th>
                                                            <th>$Precio Visitas</th>
                                                            <th>Concepto</th>
                                                            <th>$Gasto</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody v-if="arraySaleDetail.length">
                                                        <tr v-for="detailSale in arraySaleDetail" :key="detailSale.id" class="salesTable">
                                                              <td>
                                                                  <button @click="editDetail(detailSale)" type="button" class="btn btn-primary btn-sm">
                                                                      <i class="fa fa-edit"></i>
                                                                  </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                  <button @click="deleteDetail(detailSale.id,
                                                                                               detailSale.idsale,
                                                                                               detailSale.qty_membership,
                                                                                               detailSale.qty_individual,
                                                                                               detailSale.membership_fee,
                                                                                               detailSale.individual_fee,
                                                                                               detailSale.cost_expense)" type="button" class="btn btn-danger btn-sm">
                                                                      <i class="icon-close"></i>
                                                                  </button>
                                                              </td>
                                                              <td v-text="detailSale.name"></td>
                                                              <td v-text="detailSale.time"></td>
                                                              <td v-text="detailSale.couch_name"></td>
                                                              <td v-text="detailSale.qty_membership"></td>
                                                              <td v-text="detailSale.qty_individual"></td>
                                                              <td v-text="detailSale.membership_fee" ></td>
                                                              <td v-text="detailSale.individual_fee" ></td>
                                                              <td v-text="detailSale.cost_name"></td>
                                                              <td v-text="detailSale.cost_expense"></td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody v-else>
                                                        <tr>
                                                            <td colspan="12">
                                                                No se han agregado clases
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>


                                          </div>
                                      </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" @click="closeModalEdit()">Cerrar</button>
                                  </div>
                              </div>
                              <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                      </div>
        <!--Fin del modal Editar-->
      </div>
    </template>

<script>
    import vSelect from 'vue-select';
    export default {
        data (){
            return {
                listado:1,
                tipoAccion : 0,
                errorSale : 0,
                errorShowMsjSale : [],
                errorSaleEdit : 0,
                errorShowMsjSaleEdit : [],
                errorStore : 0,
                errorShowMsjStoreSale : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'sale_date',
                buscar : '',
                criterioA:'nombre',
                buscarA: '',
                arrayDetail: [],
                arrayActivityAjax: [],
                arraySale: [],
                arraySaleDetail:[],
                arrayCoachEdit: [],
                arrayActivityEdit: [],
                price_membership:0,
                membership_fee:0,
                qty_membership:0,
                price_individual:0,
                individual_fee:0,
                qty_individual:0,
                arrayInstructorAjax:[],
                arraySchedule:[],
                arrayCost:[],
                idactivity: 0,
                activity_name:'',
                idcouch: 0,
                couch_name: '',
                idcost: 0,
                idschedule: 0,
                time: 0,
                timeAdd:'',
                cost_expense:0 ,
                arrayGetCost:[],
                arrayGetTime:[],
                costName:'',
                dayTotal:'',
                totalDb: 0.0,
                total: 0.0,
                modal: 0,
                modalEditar: 0,
                tituloModal:'',
                timeBegin:'',
                iduser:1,
                idDay: 0,
                idDet: 0,
            }
        },
        components: {
            vSelect
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
            },
            totalDay: function() {
              var resultado = 0.0;
              for (var i = 0; i < this.arrayDetail.length; i++){
                resultado = resultado + (this.arrayDetail[i].total_efectivo);
              }
              this.totalDb = resultado;
              return resultado;
            }
        },
        methods : {
            listClass (page,buscar,criterio){
                let me=this;
                var url= '/sale?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arraySale = respuesta.sales.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            selectActivityAjax(search,loading){
                let me=this;
                loading(true);

                var url= '/activity/selectActivityAjax?filter='+search;
                axios.get(url).then(function (response) {
                    let respuesta = response.data;
                    q: search
                    me.arrayActivityAjax=respuesta.activities;
                    loading(false)

                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            getActivityData(val1){
                let me = this;
                me.loading = true;
                me.idactivity = val1.id;
                me.activity_name = val1.name;
                me.price_membership = val1.price_membership;
                me.price_individual = val1.price_individual;
            },
            selectCoachAjax(search,loading){
                let me=this;
                loading(true);

                var url= 'coach/selectCoachAjax?filter='+search;
                axios.get(url).then(function (response) {
                    let respuesta = response.data;
                    q: search
                    me.arrayInstructorAjax=respuesta.couches;


                    loading(false)
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            getInstructorData(val1){
                let me = this;
                me.loading = true;
                me.idcouch = val1.id;
                me.couch_name = val1.name;
            },
            selectSchedule(){
                  let me=this;
                  var url= 'scheduler/selectSchedule';
                  axios.get(url).then(function (response) {
                      //console.log(response);
                      var respuesta= response.data;
                      me.arraySchedule = respuesta.schedules;
                  })
                  .catch(function (error) {
                      console.log(error);
                  });
              },
            selectCoachEdit(){

              let me = this;
              var url = 'coach/selectCoachEdit';

              axios.get(url).then(function (response) {
                  //console.log(response);
                  var respuesta= response.data;
                  me.arrayCoachEdit = respuesta.coachesEdit;
              })
              .catch(function (error) {
                  console.log(error);
              });

            },
            selectActivityEdit(){
              let me=this;
              var url='activity/selectActivityEdit';

              axios.get(url).then(function (response) {
                  //console.log(response);
                  var respuesta= response.data;
                  me.arrayActivityEdit = respuesta.activitiesEdit;
              })
              .catch(function (error) {
                  console.log(error);
              });

            },
            selectCost(){
                    let me=this;
                    var url= 'cost/selectCost';
                    axios.get(url).then(function (response) {
                        var respuesta= response.data;
                        me.arrayCost = respuesta.costs;

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
                me.listClass(page,buscar,criterio);
            },
            eliminarDetalle(index){
                let me = this;
                me.arrayDetail.splice(index, 1);
            },
            agregarDetalle(){

                if (this.validateSale()){
                    return;
                }

                let me=this;
                var id = me.idcost
                var idtime =me.time
                me.getScheduleTime(idtime)
                me.getCostId(id);
            },
            getScheduleTime(id){
              let me=this;
              var url= 'scheduler/getTime?id=' + id;
              axios.get(url).then(function (response) {
                  var respuesta= response.data;
                  me.arrayGetTime = respuesta.scheduletime;
                }).catch(function (error) {
                    console.log(error);
                });
            },
            getCostId(id){
              let me=this;

              var url= 'cost/getCostId?id=' + id;
              var self=this;
              axios.get(url).then(function (response) {
                  var respuesta= response.data;
                  me.arrayGetCost = respuesta.costdetails;


              }).then(function (response) {
                self.costName=me.arrayGetCost[0]['name'];
                self.timeAdd =me.arrayGetTime[0]['time'];
                  me.arrayDetail.push({
                  idactivity: me.idactivity,
                  idsale: me.idDay,
                  activity_name: me.activity_name,
                  idcouch: me.idcouch,
                  couch_name: me.couch_name,
                  idcost: me.idcost,
                  idschedule: me.time,
                  time: self.timeAdd,
                  membership_fee: parseInt(me.price_membership)/10,
                  individual_fee: parseInt(me.price_individual),
                  total_efectivo: (((parseInt(me.price_membership)/10)*parseInt(me.qty_membership))+ (parseInt(me.price_individual)*parseInt(me.qty_individual)))-(parseInt(me.cost_expense)),
                  cost_expense: me.cost_expense,
                  total_personas: parseInt(me.qty_individual) + parseInt(me.qty_membership),
                  qty_individual: me.qty_individual,
                  qty_membership: me.qty_membership,
                  cost_name: self.costName,
                  cost_expense: me.cost_expense,

                });
              }).catch(function (error) {
                  console.log(error);
              });
            },
            showDetail(id){


                this.selectSchedule();
                this.selectCost()
                let me=this;
                this.idDay = id;
                me.listado=0;
                me.arrayDetail=[];
            },
            ocultarDetalle(){
                this.listado=1;
                this.errorShowMsjSaleEdit=[];
                this.errorShowMsjStoreSale=[];
                this.arrayDetail=[];
                this.time=0;
                this.idcost=0;
                this.cost_expense=0;
                this.qty_membership=0;
                this.qty_individual=0;
            },
            validateSale(){

              this.errorSale=0;
              this.errorShowMsjSale=[];

              if (!this.activity_name) this.errorShowMsjSale.push('Seleccione una actividad antes de continuar');
              if (!this.couch_name) this.errorShowMsjSale.push('Asigne un instructor a la clase antes de continuar');
              if (this.time==0) this.errorShowMsjSale.push('Seleccione un horario de clase');
              if (this.idcost==0) this.errorShowMsjSale.push('Introduzca un costo');
              if (this.cost_expense<0) this.errorShowMsjSale.push('El gasto debe ser mayor o igual a 0');
              if (this.qty_membership<0) this.errorShowMsjSale.push('El número de clientas con tarjeta debe ser mayor ó igual a cero');
              if (this.qty_individual<0) this.errorShowMsjSale.push('El número de visitas con tarjeta debe ser mayor ó igual a cero');
              if (this.errorShowMsjSale.length) this.errorSale = 1;
              return this.errorSale;

            },
            validateStoreSave(){

              this.errorStore=0;
              this.errorShowMsjStoreSale=[];

              if(this.arrayDetail.length==0) this.errorShowMsjStoreSale.push("Agregue una clase o costo al día");

              if (this.errorShowMsjStoreSale.length) this.errorStore = 1;
              return this.errorStore;
            },
            saveActivity(){

              if(this.validateStoreSave())
              {
                return;
              }

              swal({
               title: 'Quiere salvar la información de está actividad?',
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

                   axios.post('sale/storeDayActivity',{
                       'data': me.arrayDetail,
                       'idsale': me.idDay,
                       'total':me.totalDb,
                   }).then(function (response) {

                       swal(
                       'Salvado!',
                       'La actividad a sido registrada.',
                       'success'
                       )

                       me.ocultarDetalle();
                       me.listClass(1,'','name');
                       me.openModalEditar(me.idDay);


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
            createDay(){

              swal({
               title: 'Buenos días, desea crear un nuevo día?',
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
                   axios.post('sale/createDay',{
                      'iduser' : me.iduser
                   }).then(function (response) {
                       me.closeModal();
                       me.listClass(1,'','name');
                       swal(
                       'Salvado!',
                       'La actividad a sido registrada.',
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
            openModal(){
              var date = new Date();
              this.modal = 1;
              this.tituloModal = 'INICIA UN NUEVO DÍA';
              this.timeBegin = date.toLocaleDateString();
            },
            openModalEditar(id){


              this.modalEditar = 1;
              this.tituloModal = 'Prueba';
              this.idDay = id;

              let me=this;
              var url='/sale/editDetail?idSale=' + id;
              axios.get(url).then(function (response) {
                  var respuesta= response.data;
                  me.arraySaleDetail = respuesta.saleDetail;
              })
              .catch(function (error) {
                  console.log(error);
              });
            },
            closeModal(){
              this.modal = 0;
            },
            closeModalEdit(){
              this.modalEditar = 0;
            },
            deleteDetail(id,idsale,qty_membership,qty_individual,membership_fee,individual_fee,cost_expense){
              let detId = id;
              let saleId = idsale;
              let st_qty_membership = qty_membership;
              let st_qty_individual = qty_individual;
              let st_membership_fee = membership_fee;
              let st_individual_fee = individual_fee;
              let st_cost_expense = cost_expense;
              let deleteTotal = (((st_qty_membership*st_membership_fee)+(st_qty_individual*st_individual_fee)) - ((st_cost_expense)));


              swal({
               title: 'Está seguro que desea eliminar esté detalle?',
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

                   axios.put('sale/deleteDetail',{
                      'detId' : detId,
                      'saleId' : saleId,
                      'deleteTotal' : deleteTotal


                   }).then(function (response) {

                       swal(
                       'Eliminado!',
                       'Su detalle ha sido borrado.',
                       'success'
                       )
                       me.openModalEditar(saleId);
                       me.listClass(1,'','name');
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
            deleteDay(id){

              let idDay = id;

              swal({
               title: 'Está seguro que desea eliminar esté día y sus detalles?',
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

                   axios.put('sale/deleteDay',{
                      'id' : idDay
                   }).then(function (response) {

                       swal(
                       'Eliminado!',
                       'Esté día ha sido eliminado.',
                       'success'
                       )
                       me.listClass(1,'','name');
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
            editDetail(data){

              this.selectSchedule();
              this.selectCost();
              this.selectActivityEdit();
              this.selectCoachEdit();

              let me=this;
              let arrayDetailEdit = data;

              me.closeModalEdit()
              me.listado=2;

              this.idDet = arrayDetailEdit['id'];
              this.cost_expense = arrayDetailEdit['cost_expense'];
              this.qty_individual = arrayDetailEdit['qty_individual'];
              this.qty_membership = arrayDetailEdit['qty_membership'];
              this.idcost = arrayDetailEdit['idcost'];
              this.time = arrayDetailEdit['idschedule'];
              this.idcouch = arrayDetailEdit['idcouch'];
              this.idactivity = arrayDetailEdit['idactivity'];
              this.membership_fee = arrayDetailEdit['membership_fee'];
              this.individual_fee = arrayDetailEdit['individual_fee'];

            },
            closeEditDetail(){
              let me =this;
              me.listado=1;
            },
            validateSaleEdit(){

              this.errorSaleEdit=0;
              this.errorShowMsjSaleEdit=[];

              if (this.idactivity==0) this.errorShowMsjSaleEdit.push('Seleccione una actividad antes de continuar');
              if (this.idcouch==0) this.errorShowMsjSaleEdit.push('Asigne un instructor a la clase antes de continuar');
              if (this.time==0) this.errorShowMsjSaleEdit.push('Seleccione un horario de clase');
              if (this.idcost==0) this.errorShowMsjSaleEdit.push('Introduzca un costo');
              if (this.cost_expense<0) this.errorShowMsjSaleEdit.push('El gasto debe ser mayor o igual a 0');
              if (this.qty_membership<0) this.errorShowMsjSaleEdit.push('El número de clientas con tarjeta debe ser mayor ó igual a cero');
              if (this.qty_individual<0) this.errorShowMsjSaleEdit.push('El número de visitas con tarjeta debe ser mayor ó igual a cero');
              if (this.errorShowMsjSaleEdit.length) this.errorSaleEdit = 1;
              return this.errorSaleEdit;

            },
            saveEditDetail(){

              let me = this;
              if(this.validateSaleEdit())
              {
                return;
              }

                swal({
                 title: 'Está seguro que desea salvar sus cambios?',
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

                     axios.put('sale/saveEditDetail',{
                        'id':this.idDet,
                        'idsale':this.idDay,
                        'cost_expense':this.cost_expense,
                        'qty_individual':this.qty_individual,
                        'qty_membership':this.qty_membership,
                        'idcost':this.idcost,
                        'idschedule':this.time,
                        'idcouch':this.idcouch,
                        'idactivity':this.idactivity
                     }).then(function (response) {

                         swal(
                         'Salvado Correctamenta!',
                         'Sus cambios han sido guardados.',
                         'success'
                         )

                         me.closeEditDetail();
                         me.openModalEditar(me.idDay);
                         me.listClass(1,'','name');

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
            activateDay(id){

              let idsale = id;
              swal({
               title: 'Está seguro que desea activar nuevamente este día?',
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

                   axios.put('sale/activateDay',{
                      'idsale' : idsale
                   }).then(function (response) {

                       swal(
                       'Activado!',
                       'Ya puede hacer cambios.',
                       'success'
                       )
                       me.listClass(1,'','name');
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
            closeDay(id){

              let idsale = id;
              swal({
               title: 'Está seguro que desea cerrar este día?',
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

                   axios.put('sale/closeDay',{
                      'idsale' : idsale
                   }).then(function (response) {

                       swal(
                       'Cerrado!',
                       'A descansar!.',
                       'success'
                       )
                       me.listClass(1,'','name');
                   }).catch(function (error) {
                       console.log(error);
                   });


               } else if (
                   // Read more about handling dismissals
                   result.dismiss === swal.DismissReason.cancel
               ) {

               }
               })
            }
        },
        mounted() {
            this.listClass(1,this.buscar,this.criterio);
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
    @media (min-width: 600px) {
        .btnagregar {
            margin-top: 2rem;
        }
    }

</style>
