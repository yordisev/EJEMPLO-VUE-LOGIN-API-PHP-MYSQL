<template>
<div>
  <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class="col-lg-9 card-wrapper ct-example">
                  
                    <!-- Colors -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0">Usuarios del Sistema</h3>
                        </div>
                        <div class="card-body">
                          <div class="row">
                    <div class="col-md-9">
                      <div class="form-group">
                        <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                          <input class="form-control" v-model="numerocedula" placeholder="Buscar por nombre" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group input-group-merge">
                         <button @click="buscarCedula(numerocedula)" type="button" class="btn btn-primary">Buscar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <!-- ------------------------------------------------------------ -->
        <template v-if="datousuario.identificacion != ''">
          
                  
                    <!-- Colors -->
                    <div class="card">
                        <div class="card-body">
                         <table class="table table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Seccional</th>
                    <th>Municipio</th>
                    <th>estado</th>
                    <th>editar</th>
                  </tr>
                </thead>
                <tbody v-for="(item, index) in datousuario" :key="index">
                  <tr>
                    <td>{{item.identificacion}}</td>
                    <td>{{item.nombres}} {{item.apellidos}}</td>
                    <td>{{item.usuario}}</td>
                    <td>{{item.seccional}}</td>
                    <td>{{item.municipio}}</td>
                    <td>{{item.estado}}</td>
                    <td><button type="button" data-toggle="modal" data-target="#modal-usuarios" @click="actualizar(item)" class="btn btn-vimeo btn-icon-only">
                <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
              </button>
              <button type="button" class="btn btn-slack btn-icon-only">
                <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
              </button>
              <button type="button" class="btn btn-dribbble btn-icon-only">
                <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
              </button>
                    </td>
                  </tr>
                  </tbody>
                  </table>
                        </div>
                    </div>
                
        </template>
         <!-- Modals -->
          <div class="card">
            <div class="card-header">
              <h3 class="mb-0">Modals</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <button type="button" class="btn btn-block btn-primary mb-3">Default</button>
                  <div class="modal fade" id="modal-usuarios" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-default">Type your modal title</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <form role="form">
                                <div class="form-group mb-3">
                                  <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" v-model="seleccionarusuario.nombres" placeholder="Email" type="text">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Password" v-model="seleccionarusuario.usuario" type="text">
                                  </div>
                                </div>
                              
                                <div class="text-center">
                                  <button type="button" class="btn btn-primary my-4">Sign in</button>
                                </div>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary">Save changes</button>
                          <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
           
              </div>
            </div>
          </div>
<!-- ---------------------------------------------------- -->
        </div>
</template>

<script>
import axios from "axios"
export default {
data() {
    return {
      numerocedula: "",
      datousuario: {
        identificacion: "",
        nombres: "",
        apellidos: "",
        usuario: "",
        seccional: "",
        municipio: "",
        estado: "",
      },
      peticiontoken: "",
      seleccionarusuario:""
    };
  },
  methods:{
      buscarCedula(numerocedula) {
        if(numerocedula == '' || numerocedula == undefined || numerocedula == null){
              this.$swal.fire(
              'Intentar de nuevo',
              'Por favor Especificar un nombre o una cedula',
              'info'
            )
          } else if (numerocedula != '' || numerocedula != undefined || numerocedula != null){
this.peticiontoken = localStorage.getItem("tokenautorizacion");
      
      const tokenpeticion = {
        token: `${this.peticiontoken}`,
        cedulaonombre:numerocedula
      };
      axios
        .get("auth", {headers: tokenpeticion })
        .then((respuesta) => {
            console.log(respuesta.data);
          this.datousuario = respuesta.data;
        })
        .catch(function (error) {
          console.log(error);
        });
          }
      
    },
     actualizar(item){
           this.seleccionarusuario = item;
    
    }
  }
}
</script>

<style>

</style>