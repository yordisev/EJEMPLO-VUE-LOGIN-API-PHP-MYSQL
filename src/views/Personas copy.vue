<template>
   <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class="col-lg-12 card-wrapper ct-example">
                    <!-- Styles -->
                   <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                      <span class="h2 font-weight-bold mb-0">350,897</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                      <span class="h2 font-weight-bold mb-0">2,356</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                      <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
                    <!-- Colors -->
                   <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0">Usuarios del Sistema</h3>
                        </div>
                        <div class="card-body">
                          <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                          <input class="form-control" v-model="nombre" @keyup.enter="buscarCedula(nombre)" placeholder="Buscar por nombre" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group input-group-merge">
                         <button @click="buscarCedula(nombre)" type="button" class="btn btn-primary">Buscar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                        </div>
                    </div>
    <!-- ------------------------------------------------------------ -->
        <template v-if="datoasistente.p_nombre != ''">
          
                  
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
                <tbody v-for="(item, index) in datoasistente" :key="index">
                  <tr>
                    <td>{{item.numero_doc}}</td>
                    <td>{{item.p_nombre}} {{item.p_apellido}}</td>
                    <td>{{item.edad}}</td>
                    <td>{{item.sexo}}</td>
                    <td>{{item.telefono}}</td>
                    <td>{{item.fecha_nacimiento}}</td>
                    <td><button type="button" data-toggle="modal" data-target="#modal-default" @click="actualizar(item)" class="btn btn-vimeo btn-icon-only">
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
                  <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
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
                                    <input class="form-control" v-model="selectedUser.numero_doc" placeholder="Email" type="text">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Password" v-model="selectedUser.p_nombre" type="text">
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
            </div>
        </div>
</template>

<script>
import axios from "axios"
export default {
data() {
    return {
      nombre: "",
      datoasistente: {
        numero_doc: "",
        p_nombre: "",
        p_apellido: "",
        edad: "",
        sexo: "",
        telefono: "",
        fecha_nacimiento: "",
      },
      peticiontoken: "",
      selectedUser:""
      // {
      //   numero_doc: "",
      //   p_nombre: "",
      //   p_apellido: "",
      //   edad: "",
      //   sexo: "",
      //   telefono: "",
      //   fecha_nacimiento: "",
      // },
    };
  },
   methods:{
      buscarCedula(nombre) {
          if(nombre == '' || nombre == undefined || nombre == null){
              this.$swal.fire(
              'Intentar de nuevo',
              'Por favor Especificar un nombre o una cedula',
              'info'
            )
          } else if (nombre != '' || nombre != undefined || nombre != null){
 this.peticiontoken = localStorage.getItem("tokenautorizacion");
//       const bodyParameters = {
//         p_nombre: nombre,
//       };
// console.log(bodyParameters);
      const tokenpeticion = {
        token: `${this.peticiontoken}`,
        p_nombre: nombre
      };
      axios
        .get("asistentes", {  headers: tokenpeticion })
        .then((respuesta) => {
          this.datoasistente = respuesta.data;
        })
        .catch(function (error) {
          console.log(error);
        });
          }
     
    },
    actualizar(numero_doc){
      // console.log(numero_doc);
           this.selectedUser = numero_doc;
      //    this.peticiontoken = localStorage.getItem("tokenautorizacion");
      // const tokenpeticion = {
      //   token: `${this.peticiontoken}`,
      //   numero_doc: numero_doc
      // };
      // axios
      //   .get("asistentes", {  headers: tokenpeticion })
      //   .then((respuesta) => {
      //       console.log(respuesta.data[0]);
      //     this.selectedUser = respuesta.data[0];
      //   })
      //   .catch(function (error) {
      //     console.log(error);
      //   });
    }
  }
}
</script>

<style>

</style>