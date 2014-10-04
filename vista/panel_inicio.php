            <!-- ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM -->
            <h2>Bienvenidos al modelo de seguridad, repotenciado con bootstrap!</h2>
                <div class="col-lg-5 span5 pull-left">
                        <h3>Roles</h3>
                        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable">
                            <thead>
                                <th>Codigo</th><th>Nombre</th>
                            </thead>
                            <tbody>
                            <?php
                                $laRol=$lobjRol->consultar_roles();
                                for($i=0;$i<count($laRol);$i++)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$laRol[$i][0].'</td>';
                                    echo '<td>'.$laRol[$i][1].'</td>';
                                    echo '</tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-5 span5 pull-left">
                        <h3>Modulos</h3>
                        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable">
                            <thead>
                                <th>Codigo</th><th>Nombre</th>
                            </thead>
                            <tbody>
                            <?php
                                require_once('../clases/clase_modulo.php');
                                $lobjModulo=new clsModulo;
                                $laModulos=$lobjModulo->consultar_modulos();
                                for($i=0;$i<count($laModulos);$i++)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$laModulos[$i][0].'</td>';
                                    echo '<td>'.$laModulos[$i][1].'</td>';
                                    echo '</tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-10 span10">
                        <h3>Servicios</h3>
                        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
                            <thead>
                                <th>Codigo</th><th>Nombre</th><th>Enlace</th>
                            </thead>
                            <tbody>
                            <?php
                                require_once('../clases/clase_servicio.php');
                                $lobjServicio=new clsServicio;
                                $laServicios=$lobjServicio->consultar_servicios();
                                for($i=0;$i<count($laServicios);$i++)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$laServicios[$i][0].'</td>';
                                    echo '<td>'.$laServicios[$i][1].'</td>';
                                    echo '<td>'.$laServicios[$i][2].'</td>';
                                    echo '</tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>