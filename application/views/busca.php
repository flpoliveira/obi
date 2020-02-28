<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OBInaUDESC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css');?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition">
  
  <!-- /.login-logo -->
  
  <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            Sistema de Busca da OBI na UDESC
        </h3>
    </div>
    <div class="card-body ">
        <p class="card-text">

        <form action="<?php echo base_url('Busca');?>" method="POST">
            <div class="form-group">
                  <label for="titulo">Titulo</label>
                  <input type="text" name="titulo" class="form-control" placeholder="Escreva o título ou parte dele da questão">
    
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ano da prova</label>
                        <select name="ano" class="form-control">
                            <option value="0"> Não selecionar </option>
                            <?php
                            foreach($ano as $key)
                            {
                            ?>
                                <option value='<?php echo $key->id; ?>'><?php echo $key->ano; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Dificuldade da Questão</label>
                        <select name="dificuldade" class="form-control">
                            <option value="0"> Não selecionar </option>
                            <?php
                            foreach($dificuldade as $key)
                            {
                            ?>
                                <option value='<?php echo $key->id; ?>'><?php echo $key->descricao; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    
                </div>
           
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Modalidade Prova</label>
                        <select name="modalidade" class="form-control">
                            <option value="0"> Não selecionar </option>
                            <?php
                            foreach($modalidade as $key)
                            {
                            ?>
                                <option value='<?php echo $key->id; ?>'><?php echo $key->descricao; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Categoria da Questão</label>
                        <select name="categoria" class="form-control">
                            <option value="0"> Não selecionar </option>
                            <?php
                            foreach($categoria as $key)
                            {
                            ?>
                                <option value='<?php echo $key->id; ?>'><?php echo $key->descricao; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            
        

          <!-- /.col -->
          <div class="pull-right">
            <button type="submit" class="btn btn-primary btn-block">Buscar</button>
          </div>
          <!-- /.col -->
          </form>
        <br>
        <?php if(isset($resultado))
        {
        ?>
          <div class="row"><div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                            <th> Ano </th>
                            <th> Modalidade </th>
                            <th> Arquivo da Prova </th>
                            <th> Titulo </th>
                            <th> Categoria </th>
                            <th> Dificuldade </th>
                            <th> Arquivo da Questão </th>
                </thead>
                <tbody> 
                    <?php foreach($resultado as $key)
                    {
                    ?>            
                        <tr role="row" class="odd">
                            
                                <td><?php echo $key->ano; ?></td>
                                <td><?php echo $key->modalidade; ?></td>
                                <td><a href='<?php echo base_url("./provas/".$key->arquivoProva); ?>' target='_blank'>Link</a></td>
                                <td><?php echo $key->titulo; ?></td>
                                <td><?php echo $key->categoria; ?></td>
                                <td><?php echo $key->dificuldade; ?></td>
                                <td><a href='<?php echo base_url("./questoes/".$key->arquivoQuestao); ?>' target='_blank'>Link</a></td>
                                
                        
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                </tfoot>
              </table></div></div>
        <?php 
        }
        ?>
        </p>
    
      

      
      <!-- /.social-auth-links -->

    <br>
    </div>
    <!-- /.login-card-body -->
  </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>"></script>

</body>
</html>
