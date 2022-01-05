<template>
   <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="pages/dashboards/dashboard.html">
                    <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="nav-link active" :to="'/inicio'">
                             <i class="ni ni-spaceship text-red"></i>
                            Inicio</router-link>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Usuarios</span>
                            </a>
                            <div class="collapse" id="navbar-dashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <router-link class="nav-link active" :to="'/usuarios'">Usuarios</router-link>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/dashboards/alternative.html" class="nav-link">Alternative</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                <i class="ni ni-ungroup text-orange"></i>
                                <span class="nav-link-text">Datos Asistentes</span>
                            </a>
                            <div class="collapse" id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                          <router-link class="nav-link active" :to="'/personas'">Asistentes</router-link>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/login.html" class="nav-link">Login</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-components">
                                <i class="ni ni-ui-04 text-info"></i>
                                <span class="nav-link-text">Components</span>
                            </a>
                            <div class="collapse show" id="navbar-components">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                    
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/components/cards.html" class="nav-link">Cards</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/components/grid.html" class="nav-link">Grid</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                  
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {

}
</script>

<style>

</style>