<?php
include_once "db_ecommerce.php";
$con=mysqli_connect($host,$user,$pass,$db);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tablaProductos" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>categoria</th>
                    <th>coleccion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Imagen(es)</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $query="SELECT id,nombre,precio,marca,categoria,coleccion,descripcion,estado,stock from productos; ";
                        $res=mysqli_query($con,$query);

                        while ($row=mysqli_fetch_assoc($res)){
                    ?>
                  <tr>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['marca'] ?></td>
                    <td><?php echo $row['categoria'] ?></td>
                    <td><?php echo $row['coleccion'] ?></td>
                    <td><?php echo $row['precio'] ?></td>
                    <td><?php echo $row['stock'] ?></td>
                    <td><?php echo $row['estado'] ?></td>
                  </tr>
                  <?php
                        }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>