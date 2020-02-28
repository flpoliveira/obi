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
                                        <th> Ano </th>
                                        <th> Modalidade </th>
                                        <th> Arquivo da Prova </th>
                                        <th> Questões da Prova </th>
                                        <th> Excluir Prova </th>
                                </thead>
                                <tbody> 
                                    <?php foreach($resultado as $key)
                                    {
                                    ?>            
                                        <tr role="row" class="odd">
                                            <td><?php echo $key->ano; ?></td>
                                            <td><?php echo $key->descricao; ?></td>
                                            <td><a href='<?php echo base_url("./provas/".$key->arquivoProva); ?>' target='_blank'>Link</a></td>
                                            <td><a href='<?php echo base_url("gerenciar/questoesProva/".$key->id); ?>'><button type='button' class="btn btn-default">Abrir</button></a></td>
                                            <td><a href="<?php echo base_url("gerenciar/excluir/".$key->id); ?>"><button type='button' class="btn btn-danger">Excluir</button></a></td>
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
                
              </div>
            </div>

           
          </div>
        
        </div>

        
        <!-- /.row (main row) -->
     
      
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>