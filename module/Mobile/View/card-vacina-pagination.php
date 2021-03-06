<?php
/**@var $this Controller
 * **/
$pet= new PetModel();
$objCv = new CartaoVacinaModel();
$petshop = new PetShopModel();
$servico =new ServicoModel();
?>
<h2 class="text-center">Cartão de Vacina</h2>
<h3 class="text-center" style="color: #fff;"><?=ucwords($pet->getNomePetById(['id_pet'=>$id_pet]))?></h3>

<?php


#xd(empty($cartoes[0]));
if(!isset($cartoes) || empty($cartoes[0])){
    echo'<h4>Não existem registros cadastrados para esse pet.</h4>';
}else {
    ?>
    <link rel="stylesheet" href="/assets/css/mobile/evento.css">


        <div class="row">
            <div class="">

                <div id="evento">

                    <table class="table table-bordered" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Detalhes</th>
                            <th>Data</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cartoes as $cv):
                            $dados = $objCv->getById(['id_cartao_vacina' => $cv['id_cartao_vacina']]);

                            ?>
                            <tr>
                                <td><?= '<a href="" class="btn-modal" data-cartao="' . $this->enc($dados['id_cartao_vacina']) . '" >' . ucwords($servico->getNomeServicoById(['id_servico' => $dados['id_servico']])) . '</a>' ?></td>
                                <td><?= date('d/m/y',strtotime($dados['dt_evento'])) ?></td>
                                <td>
                                    <button class="btn btn-danger btn-excluir"
                                            data-id="<?= $this->enc($dados['id_cartao_vacina']) ?>"><i
                                            class="ion-trash-a"></i>
                                    </button>

                                </td>


                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    <?php
}
?>

<div id="modal">
</div>

<script>
    $(".btn-modal").click(function(e){
        e.preventDefault();

        $.ajax({
            type:'post',
            dataType:'text',
            url:'/mobile/modal-card-vacina',
            async:true,
            cache:false,
            data:{
                id_cartao_vacina:$(this).data('cartao')
            },
            success:function(data){

                $("#modal").html(data);
                $("#modal-info").modal('show');
            }
        });

    });

    $('.btn-excluir').click(function () {
        var id= $(this).data('id');

        swal({
            title: "Você tem certeza?",
            text: "Essa ação irá excluir esse registro do banco de dados",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "excluir",
            cancelButtonText: "cancelar",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type:'POST',
                    dataType:'text',
                    url:'/mobile/card-vacina-delete',
                    async:false,
                    cache:false,
                    data:{
                        id:id
                    },
                    success: function(data){
                        if(data=='<?=$this->enc('success')?>'){
                            swal("Deletado!", "Seu registro foi deletado com sucesso.", "success");
                            carregarCartao();
                        }else{
                            console.log(data);
                        }
                    }

                });

            } else {
                swal("Cancelado", "Seu registro está seguro :)", "error");
            }
        });
    });
</script>