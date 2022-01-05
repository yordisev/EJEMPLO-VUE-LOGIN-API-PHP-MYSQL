<template>

  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
              <div class="text-muted text-center mt-2 mb-1"><h1 class="text-default">INPUT</h1></div>
              <div class="text-success text-center mt-2 mb-1"><h3 class="text-primary">Iniciar Session</h3></div>
      
            <div class="card-body px-lg-5 py-lg-5">
             
              <form role="form" v-on:submit.prevent="login">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Usuario" type="text" v-model="usuario">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Contraseña" type="password" v-model="password">
                  </div>
                </div>
               
                <div class="text-center">
                  <button type="submin" class="btn btn-primary my-4">Iniciar Sesion</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</template>

<script>
import axios from "axios"
export default {
data: function() {
    return {
    usuario: "andres@gmail.com",
    password: "prueba123",
    tokenautorizacion:"",
    nombre:"",
    usuariologueado:""
    }
  },

  methods:{
    login(){
      let loginacceso = {
        usuario: this.usuario,
        password: this.password,
      };
      axios
        .post("auth", loginacceso)
        .then((data) => {
          const {status,result} = data.data;
          console.log(result);
          if (status === "ok") {
            this.tokenautorizacion = result.token;
            this.nombre = result.nombre;
            this.usuariologueado = result.usuario;
            console.log(result);
            sessionStorage.setItem("tokenautorizacion", this.tokenautorizacion);
             localStorage.setItem("tokenautorizacion", this.tokenautorizacion);
             localStorage.setItem("nombre", this.nombre);
             localStorage.setItem("usuario", this.usuariologueado);
              this.$swal.fire({
              title:'Bienvenido',
              text:'Session Iniciada Correctamente',
              icon:'success',
              showConfirmButton: false,
              timer: 1500
            }).then(function(){
    location.reload();
});
                this.$router.push("inicio");
          } else if (status === "error"){
            this.$swal.fire(
              'Ups!!',
              'Usuario o Contraseña Incorrectos',
              'error'
            )
          }
        });
    }
  }
}
</script>

<style>

</style>