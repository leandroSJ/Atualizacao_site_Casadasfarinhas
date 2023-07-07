<?php
@session_start();
require_once 'verificar.php';
require_once '../conexao.php';

$tabela = 'slider_receitas';  

?>

<div class="">
    <a class="btn btn-primary" onclick="inserir()" class="btn btn-primary btn-flat btn-pri">
        <i class="fa fa-plus" aria-hidden="true"></i> Adcionar Receita
    </a>
</div>

<div class="bs-example widget-shadow" style="padding:15px" id="listar">

</div>

<!-- Modal Inserir-->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span id="titulo_inserir"></span></h4>
                <button id="btn-fechar" type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="margin-top: -20px">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form">
                <div class="modal-body">   
                    
                    <div class="row">
                        <div class="col-md-12">
                            <Label>Título</Label>
                            <input class="form-control" type="text" name="titulo_receitas" id="titulo_receitas" required>
                        </div>                                                
                    </div>                                                                            

                    <div class="row">                        
                        <div class="col-md-12">
                            <Label>link da receita</Label>
                            <input class="form-control" type="text" name="link_receitas" id="link_receitas" required>
                        </div>
                        
                    </div>
                
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Foto (1920x500)</label>
                                <input class="form-control" type="file" name="foto" onChange="carregarImg();"
                                    id="foto">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="divImg">
                                <img src="img/produtos/sem-foto.jpg" width="80px" id="target">
                            </div>
                        </div>

                    </div>

                    <input type="hidden" name="id" id="id">

                    <br>
                    <small>
                        <div id="mensagem" class = "text-center"></div>
                    </small>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>


        </div>
    </div>
</div>

<script type="text/javascript">
    var pag = "<?= $pag ?>"
</script>
<script src="js/ajax.js"></script>

<script type="text/javascript">
    function carregarImg() {
        var target = document.getElementById('target');
        var file = document.querySelector("#foto").files[0];

        var reader = new FileReader();

        reader.onloadend = function() {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }
</script>
