

 

  <!-- Content Wrapper. Contains page content -->
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
            <div class="card">
              <div class="card-header">
                <p class="card-title">Cadastro de Provas</p>
              </div>
              <div class="card-body">
              <?php echo validation_errors(); ?>
              <?php echo form_open(); ?>
                <p class="card-text">
                <div class="form-group">
                  <label for="anoProva">Ano da Prova</label>
                  <input type="text" name="ano" class="form-control" id="anoProva" placeholder="Escreva o ano. Ex: 2015">
                </div>
                <div class="form-group">
                  <label>Modalidade Prova</label>
                  <select name="modalidade" class="form-control">
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
                  <label for="descricao">Alguma observação</label>
                  <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Não obrigatorio">
                </div>
                <div class="form-group">
                  <label for="inputFileProva">Envio do arquivo de prova</label>
                  <input type="file" id="inputFileProva" name="arquivo">

                  <p class="help-block">Favor colocar o arquivo apenas em pdf.</p>
                </div>
                   


               
                </p>


              </div>
              
              
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Cadastrar</button>
              </div>
              <?php echo form_close();?>
            </div>

           
          </div>
        
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <p class="card-title">Cadastro de Questões</p>
              </div>
              <div class="card-body">
                
                <p class="card-text">
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Provas</label>
                    <select class="form-control">
                        <?php
                        ?>
                    </select>
                  
                  </div>
                    
                </div>
                <div class="form-group">
                  <label for="inputFileProva">Envio do arquivo da questão</label>
                  <input type="file" id="inputFileProva">

                  <p class="help-block">Favor colocar o arquivo apenas em pdf.</p>
                </div>

               
                </p>


              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Cadastrar</button>
              </div>
            </div>

           
          </div>
        
        </div>
        <!-- /.row (main row) -->
     
      
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>

    //on startup
$(function() {
    //add a click event-handler to the button
    $("#btnAddForm").click(function() {
        $clone = $("fieldset").last().clone() //clone the last fieldset
        $number = $clone.find("span") //get the element with the number
        $number.html(parseInt($number.html()) + 1) //add 1 to the number
        $("fieldset").last().after($clone) //insert the new clone
    })
})
  </script>