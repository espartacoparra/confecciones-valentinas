<div class="navbar-default sidebar" role="navigation" id="negro" >
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <br>
                         <li>
                            <a id="negro" target="_blank" href="{{ action("PrincipalController@stock") }}"><i class="mdi mdi-home"></i> Pagina Principal</a>
                        </li>
                        <li>
                            <a id="negro" href="{{ action("UserController@index") }}"><i class="mdi mdi-account"></i> Usuarios</a>
                        </li>
                        <li>
                            
                                <li>
                                    <a id="negro" href="{{ action("SaleController@index") }}">Pedidos sin Recibos de Pago</a>
                                </li>
                                <li>
                                    <a id="negro" href="{{ action("SaleController@orderspay") }}">Pedidos con Recibos de Pago</a>
                                </li>
                                 <li>
                                    <a id="negro" href="{{ action("SaleController@productspay") }}">Pedidos con Pago Verificado
                                    (Listos para Enviar)</a>
                                </li>
                                 <li>
                                    <a id="negro" href="{{ action("SaleController@productssend") }}">Productos estregados</a>
                                </li>
                           
                            <!-- /.nav-second-level -->
                        </li>
                    
                        <li>
                            
                                <li>
                                    <a id="negro" href="#">Registrar elementos del bralette<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a id="negro" href="{{ action("PartController@index") }}">Listado</a>
                                        </li>
                                        <li>
                                            <a id="negro" href="{{ action("PartController@create") }}"><i class="mdi mdi-rename-box"></i> Registrar</a>
                                        </li>
                                        
                                    </ul>
                                  
                                </li>
                                <li>
                                    <a id="negro" href="#">Registrar partes individuales del bralette<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a id="negro" href="{{ action("ProductController@index") }}">Listado</a>
                                        </li>
                                        <li>
                                            <a id="negro" href="{{ action("ProductController@create") }}">Registrar</a>
                                        </li>
                                        
                                    </ul>
                                  
                                </li>
                                <li>
                                    <a id="negro" href="#"> Registrar Existencias <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a id="negro" href="{{ action("StockController@index") }}">Listado</a>
                                        </li>
                                        <li>
                                            <a id="negro" href="{{ action("StockController@create") }}">Registrar</a>
                                        </li>
                                        
                                    </ul>
                                  
                                </li>
                               
                            
                            <!-- /.nav-second-level -->
                        </li>
                        
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>