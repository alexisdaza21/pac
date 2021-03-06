<!DOCTYPE html>
<html>
<head>
	<title>Listado de pagos</title>
<body>
  <?php  include("header.php"); ?> 
          <body  style="   background: #fff; "  >
                    <section id="content_outer_wrapper" class="file-manager">
        <div id="content_wrapper" class="rightnav_v2 lg">
          <div id="header_wrapper" class="header-md" style="background-image: url(assets/images/banner_inicio.jpg);background-size: cover;
          padding-bottom: 30%;">
            <ul class="card-actions icons lg alt-actions left-top">
              <li>
                <a href="javascript:void(0)" class="drawer-trigger" data-drawer="open-left">
                <!--  <i class="zmdi zmdi-menu"></i>-->
                </a>
              </li>
            </ul>
            <div class="container-fluid">
              <div class="row">
                <div class="col-xs-12">
                  <header id="header" >
                    <h1> Carpetas</h1>
                    <ol class="breadcrumb"  >
                      <li><a href="javascript:void(0)"><?=  $_GET["nit"]; ?></a></li>
                      <li><a href="javascript:void(0)"><?= $trabajos->tipo; ?></a></li>
                      <li class="active">Carpetas</li>
                    </ol>
                  </header> 
                </div>
              </div>
            </div>
            <ul class="card-actions icons lg alt-actions right-top">
              <li>
                <a href="javascript:void(0)" class="drawer-trigger" data-drawer="toggle-right" title="acoplar">
                  <i class="zmdi zmdi-info"></i>
                </a>
              </li>
            </ul>
              <?php 
              if ($_SESSION["sesion"] == "trabajador") {
               ?>
       <nav class="btn-fab-group">
              <button class="btn btn-primary btn-fab fab-menu" data-fab="down">
                <i class="zmdi zmdi-plus"></i>
              <div class="ripple-container"></div></button>
              <ul class="nav-sub">
             
           
                <li style="transform: translateY(48px);"><span data-toggle="tooltip" data-placement="right" title="Nueva Carpeta"><a href="javascript:void(0)" data-toggle="modal" data-target="#basic_modal" class="btn btn-info btn-fab btn-fab-sm"><i class="mdi mdi-folder-plus">
                  
                </i></a></span> </li>

              </ul>
            </nav>
          </div> <?php }?>
          
          
          <div id="content" class="container-fluid">
            <div class="content-body">
              <section id="gridview" class="m-t-30">
                <h3>Folders</h3>
                <ul class="folders">
                   <?php
                         foreach ($carpetas as $carpeta) 
                        {?>
                  <li>
                    <div class="card card-folder card-item enable-context-menu" data-item-selected="false" data-item-type="Folder" data-item-size="72 KB" data-item-location="<?= $carpeta->nombre;?>" data-item-modified="<?= $carpeta->fechaCre;?>" data-item-opened="<?= $carpeta->Trab->documento;?>" data-item-created="<?= $carpeta->fechaCre;?>"
                    data-item-offline="true">
                    <div class="card-heading">
                      <i class="zmdi zmdi-folder"></i>
                    </div>
                    <div class="card-body">
                      <span class="title"><?= $carpeta->nombre;?></span>
                     <a onclick="editar('<?= $carpeta->id_carpetas;?>','<?= $carpeta->nombre;?>')" title="Cambiar nombre"
                        ><i class="zmdi zmdi-border-color" ></i></a>
                    </div>

                    <div class="card-footer">
                       
                        
                        <a href="index.php?c=archivos&a=admin&id=<?= $_GET["id"]; ?>&nit=<?= $_GET["nit"]; ?>&carpeta=<?= $carpeta->id_carpetas;  ?>" title="archivos"><i class="zmdi zmdi-file-plus" ></i></a>

                       
                      
                    </div>
                  </div>
                </li> 

                    <!-- editar carpetas-->
<div class="modal fade" id="editar<?= $carpeta->id_carpetas;?>" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none;">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Cambiar nombre de la Carpeta
<br> <?= $carpeta->nombre;?>
              </h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <div class="modal-body">        
           <form action="index.php?c=carpetas&a=update&up=<?=  $carpeta->id_carpetas ?>&id=<?= $_GET["id"]; ?>&nit=<?= $_GET["nit"];?>"  method="POST">
                    <div class="modal-body" >
                      <div class="form-group has-success is-empty">
                          <label class="control-label" for="inputSuccess1">Ingrese el nuevo nombre de carpeta</label>
                          <input type="text" class="form-control datepicker"  placeholder="Nombre Carpeta..." aria-label="Use the arrow keys to pick a date" name="Carpetas[nombre]"   value="" required>
                                 <input type="hidden" name="date(Y-m-d)"   value="" >
                              
                        </div>

                       </div>
                       <div class="modal-footer">
                                          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
                                          <button type="submit" class="btn btn-primary">Ok</button>
                                        </div>
                                      </div>
                                      </form>
                                      <!-- modal-content -->
                                    </div>
                                    <!-- modal-dialog -->
                                  </div>
</div>
                                   <!-- editar carpetas-->
              <?php } ?>
          </ul>
        </section>
      
<aside id="rightnav" class="item-panel p-15 scrollbar">
  <h3 id="item-title"><i class="zmdi zmdi-cloud"></i> <span class="title">Gestion de archivos</span></h3>
  <div class="tabpanel">
    <ul class="nav nav-tabs nav-justified darken">
      <li class="active" role="presentation"><a href="#file-detail-panel" data-toggle="tab" aria-expanded="true">Detalles</a></li>

    </ul>
  </div>
  <div class="tab-content p-t-15">
    <div class="tab-pane fadeIn active" id="file-detail-panel">
      <figure id="current-img">
      </figure>
   
      <ul id="item-details" class="style-none border-grey-top-1px border-grey-bottom-1px p-t-15 p-b-15">
        <li id="type"><span class='title'>Tipo</span><span class="info"></span></li>
        <li id="location"><span class='title'>Nombre</span><span class="info"></span></li>
        <li id="opened"><span class='title'>Creada Por</span><span class="info"></span></li>
        <li id="created"><span class='title'>Fecha Creacion</span><span class="info"></span></li>
      </ul>
      <ul id="item-desc" class="style-none p-t-15 p-b-15">
        <li><span class='title'>Pacioli</span><a href="javascript:void(0)" class="pull-right"><i class="zmdi zmdi-folder"></i></a></li>
      </ul>
    </div>

  </div>
</aside>


</div>
</div>
    <script type="text/javascript" >
            function eliminar(de,id){
                swal({
                    title: "Esta seguro?",
                    text: "Esta pago se eliminara!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                        swal("Muy bien!", "Se ha eliminado","success");
                        setTimeout(function(){
                        location.href="index.php?c=pagos&a=delete&de="+de+"&id="+id;
                    }, 1000);
                    }
                  });
            }
      function editar(ed, nombre){
                swal({
                    title: "Quieres editar la carpeta:",
                    text:nombre,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                        //swal("Muy bien!", "Espera un momento","success");
                        //setTimeout(function(){
                     $("#editar"+ed).modal("show");
                        //}, 1000);
                    }
                  });
            }
  </script>
   <script type="text/javascript">
    function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
    </script>
    <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>   
<?php include("footer.php"); ?>

<div class="modal fade" id="basic_modal" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none;">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Agregar Nueva Carpeta..</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <div class="modal-body">    
<form action="index.php?c=carpetas&a=create" method="post" autocomplete="off" enctype="multipart/form-data">
  <div class="card">
                  <div class="card-body">
                  <div class="form-group is-empty">
                          <div class="input-group">
                            <label >Nombre </label>
                            <input type="text" class="form-control datepicker"  placeholder="Nombre Carpeta..." aria-label="Use the arrow keys to pick a date" name="Carpetas[nombre]"   value="" required>
                                 <input type="hidden" name="Carpetas[id]"   value="<?= $_GET["id"]; ?>" >
                                 <input type="hidden" name="Carpetas[nit]"   value="<?= $_GET["nit"]; ?>" >
                          </div>
                          </div>
                            </div>
                    

                             
                          </div>
                          </div>  
                       <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Ok</button>
            </div>
</form>
     </div>
     </div>
     </div>

