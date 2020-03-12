<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
          <div id="remove-scroll">
              <ul class="sidemenu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                  <li class="sidebar-toggler-wrapper hide">
                      <div class="sidebar-toggler">
                          <span></span>
                      </div>
                  </li>

                  <li class="nav-item start active">
                      <a href="#" class="nav-link nav-toggle">
                          <i class="material-icons">desktop_mac</i>
                          <span class="title">Administrador</span>
                          <span class="selected"></span>
                          <span class="arrow open"></span>
                      </a>
                      <ul class="sub-menu">
                          <li @click="menu=0"class="nav-item active">
                              <a href="#" class="nav-link ">
                                  <span class="title">Clases</span>
                                  <span class="selected"></span>
                              </a>
                          </li>
                          <!--<li @click="menu=1" class="nav-item">
                              <a href="#" class="nav-link ">
                                  <span class="title">Clientes</span>
                              </a>
                          </li>-->
                          <li @click="menu=2" class="nav-item">
                              <a href="#" class="nav-link ">
                                  <span class="title">Gastos</span>
                              </a>
                          </li>
                          <li @click="menu=3" class="nav-item">
                              <a href="#" class="nav-link ">
                                  <span class="title">Horarios</span>
                              </a>
                          </li>
                          <li @click="menu=4" class="nav-item ">
                              <a href="#" class="nav-link ">
                                  <span class="title">Instructores</span>
                              </a>
                          </li>
                          <li @click="menu=7" class="nav-item">
                              <a href="#" class="nav-link ">
                                  <span class="title">Roles</span>
                              </a>
                          </li>
                          <li @click="menu=5" class="nav-item">
                              <a href="#" class="nav-link ">
                                  <span class="title">Usuarios</span>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item start active">
                     <a href="#" class="nav-link nav-toggle">
                         <i class="material-icons">slideshow</i>
                         <span class="title">Operación</span>
                         <span class="selected"></span>
                         <span class="arrow open"></span>
                     </a>
                     <ul class="sub-menu">
                         <li @click="menu=6" class="nav-item active">
                             <a href="#" class="nav-link ">
                                 <span class="title">Clases diarias</span>
                                 <span class="selected"></span>
                             </a>
                         </li>
                     </ul>
                 </li>

              </ul>
          </div>
        </div>
</div>
