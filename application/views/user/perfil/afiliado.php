<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Painel de Afiliado</title>
    <?php $this->load->view('comp/css'); ?>
</head>
<style>
    #table_cadastrados_info {
        display: none;
    }
    .table_cadastrados {
        width: 100%;
        max-width: 100%;
    }

    #table_pendentes_info {
        display: none;
    }
    .table_pendentes {
        width: 100%;
        max-width: 100%;
    }
    #table_pendentes_length {
        display: none;
    }

    #table_pendentes_filter {
        display: none;
    }

    /*  */

    #table_concluidos_info {
        display: none;
    }
    .table_concluidos {
        width: 100%;
        max-width: 100%;
    }
    #table_concluidos_length {
        display: none;
    }

    #table_concluidos_filter {
        display: none;
    }
    /*  */
    .menu-item {
        border-bottom: 5px solid gray;
        color: #FFF;
        text-align: center;
        height: 40px;
    }

    .menu-active {
        border-bottom: 5px solid orange;
    }

    .box-item {
        height: 80px;
    }

    .aff-link {
        height: 40px;
        border-radius: 5px 0px 0px 5px;
        width: 70%;
    }

   

    #table_cadastrados_length {
        display: none;
    }

    #table_cadastrados_filter {
        display: none;
    }

    #table_cadastrados_info {
        color: #FFF !important
    }

    #table_cadastrados_next {
        color: #FFF !important
    }

    #table_cadastrados_previous {
        color: #FFF !important
    }

    .paginate_button {
        color: #FFF !important
    }

    #table_cadastrados_filter>label {
        color: #FFF !important
    }

    #table_cadastrados_paginate {
        color: #FFF !important
    }

    #table_cadastrados_length>label {
        color: #FFF !important
    }

    .table_cadastrados {
        max-width: 100%;
    }

    .user-img {
        width: 50px;
        height: 50px;
        max-width: 50px;
        max-height: 50px;
        object-fit: cover;
    }

    @media(max-width:1000px) {
        .box-item {
            min-height: 80px;
            max-height: auto;
        }
        .box-item p {
            font-size: 12px;
        }

        .aff-link {
            height: 40px;
            border-radius: 5px 0px 0px 5px;
            width: 85%;
        }

        .table_cadastrados {
            width: 100%;
            max-width: 100%;
        }


        .menu-item {
        border: 5px solid gray;
        border-radius: 5px;
        color: #FFF;
        text-align: center;
        height: 50px;
        margin-top: 10px;
        padding-top:10px
    }

    .menu-active {
        border: 5px solid orange;
    }

    }
</style>

<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar'); ?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar'); ?>

    <?php $user_affiliate = $this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_affiliate'];    ?>

    <section  class="xl:mt-32 mt-24">
        <br><br>
        <div class="faq-container xl:m-0 m-3 mb-8 xl:ml-0 ml-3 grid xl:grid-cols-2 xl:space-y-0 space-y-5 grid-cols-1 place-items-between">
            <div class="col-span-1">
                <h1 style="font-size:25px ;" class="text-xl text-5x1 font-semibold text-white xl:ml-32">Painel de Afiliação</h1>
            </div>

            <div class="flex col-span-1 place-items-center">

                <div class="aff-link bg-white text-black font-semibold p-2">https://betraffle.com.br?ref=<?= $user_affiliate ?></div>
                <button style=" height: 40px;cursor:pointer;border-radius: 0px 5px 5px 0px" class=" btn-aff-link px-5 py-3 bg-orange"><i class="fas text-white fa-copy"></i></button>

            </div>
        </div>
        <div class="grid xl:m-0 m-3 xl:mt-5  xl:grid-cols-4 grid-cols-2 xl:ml-32 xl:mr-32">

            <div class="col-span-1 border border-1 box-item border-orange m-3 p-2 bg-orange" style="border-radius:5px">
                <p class="font-semibold text-white  text-xl mb-2 text-center"><?= count($this->register_model->get_cadastros_ref($user_affiliate)); ?></p>
                <p class="font-semibold text-sm text-black text-uppercase text-center"> CADASTROS</p>
            </div>
            <div class="col-span-1 border border-1 box-item border-orange m-3 p-2 bg-orange" style="border-radius:5px">
                <p class="font-semibold text-white  text-xl mb-2 text-center"><?= count($this->register_model->get_cliques_totais($user_affiliate)); ?></p>
                <p class="font-semibold text-sm text-black text-uppercase text-center">CLIQUES TOTAIS</p>
            </div>
            <div class="col-span-1 border border-1 box-item border-orange m-3 p-2 bg-orange" style="border-radius:5px">
                <p class="font-semibold text-white  text-xl mb-2 text-center">R$ <?=$this->register_model->getAffiliateComissionTotalPending($this->session->userdata('session_user')['id']);?></p>
                <p class="font-semibold text-sm text-black text-uppercase text-center">REPASSES PENDENTES</p>
            </div>
            <div class="col-span-1 border border-1 box-item border-orange m-3 p-2 bg-orange" style="border-radius:5px">
                <p class="font-semibold text-white  text-xl mb-2 text-center">R$ <?=$this->register_model->getAffiliateComissionTotal($this->session->userdata('session_user')['id']);?></p>
                <p class="font-semibold text-sm text-black text-uppercase text-center">RENDIMENTOS TOTAIS</p>
            </div>

        </div>
        <br>
        <div class="xl:ml-32  xl:m-0 m-5  xl:mr-10 mb-5">

            <ul class="grid  grid-cols-1  xl:grid-cols-3">
                <div class="col-span-1" style="cursor:pointer">
                    <li reference="cadastros" class="menu-item menu-active">USUÁRIOS CADASTRADOS</li>
                </div>
                <div class="col-span-1" style="cursor:pointer">
                    <li reference="pendentes" class="menu-item">REPASSES PENDENTES</li>

                </div>
                <div class="col-span-1" style="cursor:pointer">
                    <li reference="concluidos" class="menu-item">REPASSES CONCLUÍDOS</li>

                </div>

            </ul>
        </div>
        <section class="faq-container">

            <div class="xl:ml-32 xl:mr-10 block-div div-cadastros" id="">
                <?php if (count($this->register_model->get_cadastros_ref($user_affiliate))  > 0) {  ?>

                    <table id="table_cadastrados" class=" text-white ">
                        <thead>
                            <tr>
                                <th class="text-white"><small>NOME</small></th>
                                <th class="text-white"><small>E-MAIL </small></th>
                                <th class="text-white"><small>DATA DE CADASTRO </small></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->register_model->get_cadastros_ref($user_affiliate) as $r) {  ?>
                                <tr>
                                   
                                    <td>
                                        <small>DANIEL RIBEIRO DO AMARAL</small>
                                    </td>
                                    <td>
                                        <small>dantars@outlook.com</small>
                                    </td>
                                    <td>
                                        <small>27/04/1998 às 12:34:23</small>
                                    </td>
                                </tr>


                            <?php } ?>
                        </tbody>
                    </table>

                <?php } else { ?>

                    <div class="mt-8 mb-8 ">
                        <p class="text-sm font-semibold text-center text-white">NENHUM USUÁRIO CADASTRADO.</p>
                    </div>
                <?php } ?>
            </div>
            <div class="xl:ml-32 block-div div-pendentes" style="display:none" id=" ">
                <?php if (count($this->register_model->getAffiliateComissionPending($this->session->userdata('session_user')['id']))  > 0) {  ?>

                    <table id="table_pendentes" class=" text-white ">
                        <thead>
                            <tr>
                                <th class="text-white"><small>ID</small></th>
                                <th class="text-white"><small>ORIGEM</small></th>
                                <th class="text-white"><small>COMISSÃO </small></th>
                                <th class="text-white"><small>DATA </small></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->register_model->getAffiliateComissionPending($this->session->userdata('session_user')['id']) as $r) {  ?>
                                <tr>
                                    <td>
                                       <small>#<?=$r->comission_payment_id?></small>
                                    </td>
                                    <td>
                                        <small><?=$this->user_model->getUserById($r->comission_payer)['user_name']?> <?=$this->user_model->getUserById($r->comission_payer)['user_surname']?></small>
                                    </td>
                                    <td>
                                        <small>R$ <?=$r->comission?></small>
                                    </td>
                                    <td>
                                        <small><?=$r->comission_date?></small>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                <?php } else { ?>

                    <div class="mt-8 mb-8 ">
                        <p class="text-sm font-semibold text-center text-white">NENHUMA COMISSÃO PENDENTE.</p>
                    </div>
                <?php } ?>
            </div>
            <div class="xl:ml-32  block-div div-concluidos" style="display:none" id="">
                <?php if (count($this->register_model->getAffiliateComissionFinished($this->session->userdata('session_user')['id']))  > 0) {  ?>

                    <table id="table_concluidos" class=" text-white ">
                        <thead>
                            <tr>
                                <th class="text-white"><small>ID DA TRANSAÇÃO</small></th>
                                <th class="text-white"><small>DATA DO REPASSE</small></th>
                                <th class="text-white"><small>VALOR REPASSADO </small></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->register_model->getAffiliateComissionFinished($this->session->userdata('session_user')['id']) as $r) {  ?>
                                <tr>
                           
                                    <td>
                                    <small>#<?=$r->id?></small>
                                    </td>
                                    <td>
                                    <small><?=$r->comission_date?></small>
                                    </td>
                                    <td>
                                    <small>R$ <?=$r->comission_amount?></small>
                                    </td>
                                </tr>


                            <?php } ?>
                        </tbody>
                    </table>

                <?php } else { ?>

                    <div class="mt-8 mb-8 ">
                        <p class="text-sm font-semibold text-center text-white">NENHUMA COMISSÃO REPASSADA.</p>
                    </div>
                <?php } ?>
            </div>
        </section>
    </section>


    <!-- Footer -->
    <?php $this->load->view('comp/Footer'); ?>
    <!-- Footer -->
    <?php $this->load->view('comp/js'); ?>
    <script src="<?= base_url() ?>assets/faq/main.js"></script>

    <script>
        var faq = document.getElementsByClassName("faq-page");
        var i;

        for (i = 0; i < faq.length; i++) {
            faq[i].addEventListener("click", function() {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("active");

                /* Toggle between hiding and showing the active panel */
                var body = this.nextElementSibling;
                if (body.style.display === "block") {
                    body.style.display = "none";
                } else {
                    body.style.display = "block";
                }
            });
        }
    </script>

    <script>
        $('#update-form').submit(function(e) {

            e.preventDefault()


            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>registro/update_user',
                data: $(this).serialize(),
                success: function(data) {
                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        swal(resp.message)
                    } else {
                        swal(resp.message)
                    }
                },
                error: function(data) {
                    swal('Ocorreu um erro temporário.');
                    console.log(data);
                },
            });


        })
    </script>
    <script>
        $(document).ready(function() {

            var table = new DataTable('#table_cadastrados', {
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json',
                },
            });

            var table = new DataTable('#table_pendentes', {
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json',
                },
            });


            var table = new DataTable('#table_concluidos', {
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json',
                },
            });
            // $('#table_cadastrados').DataTable();

            $('#table_cadastrados_next').css('color', '#FFF');
            $('#table_cadastrados_previous').css('color', '#FFF');
            $('#table_cadastrados_info').css('color', '#FFF');

            $('#table_pendentes_next').css('color', '#FFF');
            $('#table_pendentes_previous').css('color', '#FFF');
            $('#table_pendentes_info').css('color', '#FFF');


        });
    </script>
    <script>
        $('.menu-item').on('click', function(e) {

            var reference = $(this).attr('reference');
            $('.menu-item').removeClass('menu-active')
            $(this).addClass('menu-active')

            // Hide Blocks
            $('.block-div').css('display', 'none')

            // Show Block clicekdd
            $('.div-' + reference).css('display', 'block')

        })
    </script>


    <script>
        document.querySelector('.btn-aff-link').addEventListener('click', function() {
            const affLink = document.querySelector('.aff-link');
            const textToCopy = affLink.innerText;

            // Cria um elemento de área de transferência temporário
            const tempTextArea = document.createElement('textarea');
            tempTextArea.value = textToCopy;
            document.body.appendChild(tempTextArea);

            // Seleciona o texto na área de transferência temporária
            tempTextArea.select();
            tempTextArea.setSelectionRange(0, 99999); // Para dispositivos móveis

            // Copia o texto para a área de transferência
            document.execCommand('copy');

            // Remove o elemento de área de transferência temporário
            document.body.removeChild(tempTextArea);

            // Feedback de sucesso
            // alert('Texto copiado: ' + textToCopy);
        });
    </script>








</body>

</html>