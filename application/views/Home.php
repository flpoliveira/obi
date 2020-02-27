

 

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
            <div class="card with-border">
              <div class="card-header">
                <p class="card-title">Cadastro de Provas</p>
              </div>
              <div class="card-body">
              <?php echo validation_errors(); ?>
              <?php 
                $attributes = array("enctype"=>"multipart/form-data");
                
                echo form_open('home/index',$attributes); ?>
                <?php if($this->session->flashdata("mensagem") != "") echo "<p class='alert alert-success'>".$this->session->flashdata("mensagem")."</p>";?>
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
                <input type="hidden" id="gambiarra" name="gambiarra" value="0">
                <div class='questoes'>
                <div class="card card-primary" id="clona">
                        <div class="card-header">
                          <p class="card-title">Questao #<i id='numeroQuestao'>1</i></p>
                        </div>
                        <div class="card-body">
                          <p class="card-text">
                          <div class="row">
                            <div class="col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for='tituloQuestao' id="labelTituloQuestao">Título</label>
                                <input type='text' name='hue' class='form-control' id='tituloQuestao' placeholder='Titulo'>
                              </div>
                              <div class="form-group">
                                <label for='selectDificuldade' id="labelSelectDificuldade">Dificuldade</label>
                                <select class='form-control' id='selectDificuldade' name='hue2'>
                                  <?php
                                    foreach($dificuldade as $key)
                                    {
                                  ?>
                                      <option value="<?php echo $key->id; ?>"><?php echo $key->descricao; ?></option>
                                  <?php
                                    }
                                  ?>
                                </select>
                              </div>
                              </div>
                            <div class="col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for='selectCategoria' id='labelSelectCategoria'>Categoria</label>
                                <select class='form-control' id='selectCategoria' name='hue3'>
                                <?php
                                    foreach($categoria as $key)
                                    {
                                  ?>
                                      <option value="<?php echo $key->id; ?>"><?php echo $key->descricao; ?></option>
                                  <?php
                                    }
                                  ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="inputFileQuestao" id="labelInputFileQuestao">Envio do arquivo da questão</label>
                                <input type="file" id="inputFileQuestao" name="arquivoQuestao">
                                <p class="help-block">Favor colocar o arquivo apenas em pdf.</p>
                              </div>
                              
                            </div>
                            </div>
                          </p>
                        </div>
                            
                  </div>
                </div>
                <center><button type="button" onclick="geraQuestao()" id="botaoGeraQuestao" class="btn btn-primary">Cadastrar uma questão</button>
                                    
                </p>
                

              </div>
                

              
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Enviar</button>
              </div>
              <?php echo form_close();?>
            </div>

           
          </div>
        
        </div>

        
        <!-- /.row (main row) -->
     
      
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script>
  
    aux = 0;
    bonitinho = ["danger", "primary",  "warning", "success"];
    $('#clona').hide();
    
    
    function geraQuestao(){
      $("#botaoGeraQuestao").hide();
      aux++;
      var clonee = $('#clona').clone();
    
      clonee.attr({
        "id":"clona"+aux,
        "class":"card card-"+bonitinho[aux%4]
        });
      clonee.find("#numeroQuestao").html(aux)
      clonee.find("#labelTituloQuestao").attr({
        'for': 'tituloQuestao'+aux,
        'id': 'labelTituloQuestao'+aux
      });
      clonee.find("#tituloQuestao").attr({
        "id":"tituloQuestao"+aux,
        "name": "titulo[]"
      });
      clonee.find("#labelSelectDificuldade").attr({
        'for': 'selectDificuldade'+aux,
        'id': 'labelSelectDificuldade'+aux
      });

      clonee.find("#selectDificuldade").attr({
        'id':'selectDificuldade'+aux,
        'name':'dificuldade[]'
      })

      clonee.find("#labelSelectCategoria").attr({
        'for': 'selectCategoria'+aux,
        'id': 'labelSelectCategoria'+aux
      });
      clonee.find("#selectCategoria").attr({
        "id":"selectCategoria"+aux,
        "name": "categoria[]"
      });

      clonee.find("#labelInputFileQuestao").attr({
        'for': 'inputFileQuestao'+aux,
        'id': 'labelInputFileQuestao'+aux
      });
      clonee.find("#inputFileQuestao").attr({
        "id":"inputFileQuestao"+aux,
        "name":"inputFileQuestao"+aux
      });
      $("#gambiarra").attr("value", aux);
      

      $(clonee).appendTo('.questoes');
      clonee.show();
      $("#botaoGeraQuestao").show();
       
       
    }

  </script>
  
                        
                      