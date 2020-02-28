<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Inicio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      <div class="row">
          <div class="col-lg-12">
            <div class="card with-border">
              <div class="card-header">
                <p class="card-title">Gerenciar Provas</p>
              </div>
              <div class="card-body">
                <p class="card-text">
                
                    <div class="row">
                    <?php  echo $this->session->flashdata("mensagem");?>
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover dataTable" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th> Titulo </th>
                                        <th> Categoria </th>
                                        <th> Dificuldade </th>
                                        <th> Arquivo da Questao </th>
                                        <th> Excluir Questao </th>
                                </thead>
                                <tbody> 
                                    <?php foreach($resultado as $key)
                                    {
                                    ?>            
                                        <tr role="row" class="odd">
                                            <td><?php echo $key->titulo; ?></td>
                                            <td><?php echo $key->categoria; ?></td>
                                            <td><?php echo $key->dificuldade; ?></td>
                                            <td><a href='<?php echo base_url("./questoes/".$key->nome); ?>' target='_blank'>Link</a></td>
                                            <td><a href="<?php echo base_url("gerenciar/excluirQuestao/".$prova."/".$key->id); ?>"><button type='button' class="btn btn-danger">Excluir</button></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </p>
                

              </div>
                

              
              <div class="card-footer">
                <a href="<?php echo base_url('gerenciar'); ?>"><button type="button" class="btn btn-primary">Voltar</button></a>
              </div>
            </div>

           
          </div>
        
        </div>

        
        <!-- /.row (main row) -->
     
      
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>