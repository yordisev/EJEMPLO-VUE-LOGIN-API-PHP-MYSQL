<template>
<div v-if="validaciontoken == null || validaciontoken == '' || validaciontoken == undefined">
    <div id="app">
    <div id="nav">
    </div>
    <Login/>
       <!-- <router-view/> -->
    </div>
    
  </div>
  <div v-else-if="$route.path!='/'">
 <div id="app">
    <div id="nav">
    </div>
    
    <Nav/>
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>

                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="assets/img/theme/team-4.jpg">
                  </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{datos.nombre}}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" @click="cerrarsession()" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
<div class="row align-items-center py-4">
           
          </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
       <router-view/>
    </div>
    
  </div>
  </div>

 
</template>
<script>
import Nav from "./components/includes/Nav.vue"
import Login from "./views/Login.vue"
export default {
  components:{
    Nav,
    Login
  },
   data: function() {
    return {
       validaciontoken:'',
       datos:{
           nombre:"",
           usuario:""
       }
    }
  },
  methods:{
cerrarsession(){
    localStorage.removeItem('tokenautorizacion');
    sessionStorage.removeItem('tokenautorizacion');
    this.$router.push("/");
     this.$swal.fire({
              icon: 'success',
              title: 'Session Cerrada',
              text:'Session Cerrarda Correctamente',
              allowOutsideClick: false,
              showConfirmButton: false,
              timer: 1500
            }).then(function(){
    location.reload();
});
}
  },
  created(){
      this.validaciontoken = localStorage.getItem("tokenautorizacion");
      this.datos.nombre = localStorage.getItem("nombre");
       this.datos.usuario = localStorage.getItem("usuario");
},
}
</script>
<style>

</style>
