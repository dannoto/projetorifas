<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meus Sorteios</title>
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
            padding-top: 10px
        }

        .menu-active {
            border: 5px solid orange;
        }

    }
</style>


<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/navbar'); ?>
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/sidebar'); ?>

    <section>

        <div class=" xl:ml-36 xl:mr-36 xl: mt-12 m-3 perfil-sorteios-breadcumb">
            <h2 class="text-white font-bold text-xl text-3x1">Gerenciamento de Afiliados</h2>
            <p class="text-white ">Gerencie os repasses.</p>

            <!-- <button  class="text-orange text-white font-semibold px-3 py-2 border border-orange hidden mt-2"  id="openModalEdit">+ EDITAR SORTEIO</button>  -->

        </div>
        <div class="faq-container xl:m-0 m-3 mb-8 xl:ml-0 ml-3 grid xl:grid-cols-2 xl:space-y-0 space-y-5 grid-cols-1 place-items-between">
            <div class=" col-span-1 place-items-center">
            </div>
            <div class=" col-span-1 ">
                <form action="" id="form-affiliate-setting">
                    <h4 class="text-sm uppercase font-semibold text-orange">Configuração de Afiliação</h4>
                    <div class="grid xl:grid-cols-3 grid-cols-2">
                        <div class="col-span-1 pt-3 m-2">
                            <label class="mt-2 text-white text-xs" for="">SISTEMA DE AFILIAÇÃO</label><br>
                            <select style="width:100%;height:40px" class="p-2 mt-2 affiliate-input" name="c_active" id="">
                                <option value="1" <?php if ($affiliate_settings['c_active'] == 1) {
                                                        echo "selected";
                                                    } ?>>ATIVADO</option>
                                <option value="0" <?php if ($affiliate_settings['c_active'] == 0) {
                                                        echo "selected";
                                                    } ?>>DESATIVADO</option>
                            </select>
                        </div>
                        <div class="col-span-1 pt-3 m-2">
                            <label class="mt-2 text-white text-xs" for="">PORCENTAGEM DE AFILIAÇÃO</label><br>
                            <input id="c_porcentage" value="<?= $affiliate_settings['c_porcentage'] ?>" name="c_porcentage" style="width:50%;height:40px" class="p-2 affiliate-input mt-2" max="100" min="0" type="number"> <span class="text-white">%</span>
                        </div>
                        <div class="col-span-1 pt-3 m-2">
                            <label class="mt-2 text-white text-xs mt-2" for=""></label><br>
                            <button style="width:50%;height:40px" type="submit" class="bg-orange mt-2 text-white"><small>APLICAR</small></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <section>


            <div class="grid xl:m-0 m-3 xl:mt-5  xl:grid-cols-4 grid-cols-2 xl:ml-32 xl:mr-32">

                <div class="col-span-1 border border-1 box-item border-orange m-3 p-2 bg-orange" style="border-radius:5px">
                    <p class="font-semibold text-white  text-xl mb-2 text-center"><?= count($this->admin_model->cadastrosTotais()); ?></p>
                    <p class="font-semibold text-sm text-black text-uppercase text-center"> CADASTROS TOTAIS</p>
                </div>
                <div class="col-span-1 border border-1 box-item border-orange m-3 p-2 bg-orange" style="border-radius:5px">
                    <p class="font-semibold text-white  text-xl mb-2 text-center"><?= count($this->admin_model->cliquesTotais()); ?></p>
                    <p class="font-semibold text-sm text-black text-uppercase text-center">CLIQUES TOTAIS</p>
                </div>
                <div class="col-span-1 border border-1 box-item border-orange m-3 p-2 bg-orange" style="border-radius:5px">
                    <p class="font-semibold text-white  text-xl mb-2 text-center">R$ <?= $this->admin_model->repassesPendentesTotal(); ?></p>
                    <p class="font-semibold text-sm text-black text-uppercase text-center">REPASSES PENDENTES</p>
                </div>
                <div class="col-span-1 border border-1 box-item border-orange m-3 p-2 bg-orange" style="border-radius:5px">
                    <p class="font-semibold text-white  text-xl mb-2 text-center">R$ <?= $this->admin_model->repassesRealizadosTotal(); ?> </p>
                    <p class="font-semibold text-sm text-black text-uppercase text-center">REPASSES REALIZADOS</p>
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
            <br><br>
            <section class="faq-container">

                <div class="xl:ml-32 xl:mr-10 block-div div-cadastros" id="">
                    <?php if (count($this->admin_model->cadastrosTotais())  > 0) {  ?>

                        <table id="table_cadastrados" class=" text-white ">
                            <thead>
                                <tr>
                                    <th class="text-white"><small>NOME DO AFILIADO</small></th>
                                    <th class="text-white"><small>CPF</small></th>
                                    <th class="text-white"><small>E-MAIL </small></th>
                                    <th class="text-white"><small>DATA DE CADASTRO </small></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->admin_model->cadastrosTotais() as $r) {  ?>
                                    <tr>
                                        <td>
                                            <small><?= $r->user_name ?> <?= $r->user_surname ?></small>
                                        </td>
                                        <td>
                                            <small><?= $r->user_cpf ?></small>
                                        </td>
                                        <td>
                                            <small><?= $r->user_email ?></small>
                                        </td>
                                        <td>
                                            <small><?= $r->user_date ?></small>
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
                    <?php if (count($this->admin_model->repassesPendentes())  > 0) {  ?>

                        <table id="table_pendentes" class=" text-white ">
                            <thead>
                                <tr>
                                    <th class="text-white"><small>NOME</small></th>
                                    <th class="text-white"><small>CPF</small></th>
                                    <th class="text-white"><small>E-MAIL </small></th>

                                    <th class="text-white"><small>VALOR DA COMISSÃO </small></th>
                                    <th class="text-white"><small>AÇÕES</small></th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->admin_model->repassesPendentes() as $r) {  ?>
                                    <?php $user = $this->user_model->getUserById($r->comission_receiver); ?>
                                    <tr>
                                        <td>
                                            <small><?= $user['user_name'] ?> <?= $user['user_surname']  ?></small>
                                        </td>
                                        <td>
                                            <small><?= $user['user_cpf']  ?></small>
                                        </td>
                                        <td>
                                            <small><?= $user['user_email']  ?></small>
                                        </td>
                                        <td>
                                            <small>R$ <?= $this->admin_model->repassesPendentesByUser($user['id']) ?></small>
                                        </td>
                                        <td>
                                            <i class="fas fa-eye text-orange btn-detalhes" style="cursor:pointer" title="VER DETALHAMENTO" id="" receiver="<?= $r->comission_receiver ?>"></i>
                                            <i class="fas fa-check ml-5 text-green-500 btn-concluido" style="cursor:pointer" title="MARCAR COMO CONCLUÍDO" id="" receiver="<?= $r->comission_receiver ?>"></i>
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
                    <?php if (count($this->admin_model->repassesRealizados())  > 0) {  ?>

                        <table id="table_concluidos" class=" text-white ">
                            <thead>
                                <tr>
                                    <th class="text-white"><small>NOME DO AFILIADO</small></th>
                                    <th class="text-white"><small>CPF</small></th>
                                    <th class="text-white"><small>E-MAIL </small></th>
                                    <th class="text-white"><small>DATA DO REPASSE </small></th>
                                    <th class="text-white"><small>VALOR DO REPASSE </small></th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->admin_model->repassesRealizados() as $r) {  ?>
                                    <?php $user = $this->user_model->getUserById($r->comission_user); ?>
                                    <tr>
                                        <td>
                                            <small><?= $user['user_name'] ?> <?= $user['user_surname']  ?></small>
                                        </td>
                                        <td>
                                            <small><?= $user['user_cpf']  ?></small>
                                        </td>
                                        <td>
                                            <small><?= $user['user_email']  ?></small>
                                        </td>
                                        <td>
                                            <small><?= $r->comission_date  ?></small>
                                        </td>
                                        <td>
                                            <small>R$ <?= $r->comission_amount ?></small>
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
            </section>
        </section>
        <br><br>
    </section>




    <!-- add Faq -->
    <button id="myBtn" class=""></button>

    <div id="myModal" class="modal">

        <div class="modal-content">
            

          
        </div>
    </div>


    <?php $this->load->view('comp/js'); ?>

    <script src="<?= base_url() ?>assets/faq/main.js"></script>

    <script>

        function closeModal() 
        {
            var modal = document.getElementById("myModal");

            modal.style.display = "none";
        }
        // Create
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementById("close-modal");

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        $("#close-modal").on('click', function(e) {
            alert('jkndkfsjfsdf')
            modal.style.display = "none";
        })  

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

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
        $('.delete-cupom').on('click', function(e) {
            e.preventDefault();

            var cupom_id = $(this).attr('id')


            $.ajax({
                url: '<?= base_url() ?>painel/actDeletecupons',
                type: 'POST',
                data: {
                    cupom_id: cupom_id
                },
                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        location.reload()
                        // swal(resp.message)

                    } else {
                        swal(resp.message)
                    }

                },
                error: function(data) {
                    swal('Ocorreu um erro inesperado.')
                },

            });

        })
    </script>
    <script>
        $("#form-cupom").submit(function(e) {

            e.preventDefault();

            var content = $(this).serialize();

            $.ajax({
                url: '<?= base_url() ?>painel/actaddCupons',
                type: 'POST',
                data: content,
                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        location.reload()
                        // swal(resp.message)

                    } else {
                        swal(resp.message)
                    }

                },
                error: function(data) {
                    swal('Ocorreu um erro inesperado.')
                },

            });
        });
    </script>


    <!-- ======= -->
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

    <!-- Affiliate Setting -->
    <script>
        $('#form-affiliate-setting').on('submit', function(e) {
            e.preventDefault()

            var c_porcentage = $('#c_porcentage').val()

            if (c_porcentage <= 100 && c_porcentage >= 0) {

                var form = $(this).serialize()

                $.ajax({
                    url: '<?= base_url() ?>painel/act_update_affiliate_settings',
                    type: 'POST',
                    data: form,
                    success: function(data) {

                        var resp = JSON.parse(data)

                        swal(resp.message)
                    },
                    error: function(data) {
                        swal('Ocorreu um erro ao atualizar as configurações.')
                    },

                });

            } else {
                swal('Insira uma porcentagem entre 0% e 100%.')
            }

        })
    </script>
    <!-- Affiliate Settinfs -->

    <!-- DETALHES -->

    <script>
        $('.btn-detalhes').on('click', function(e) {
            e.preventDefault();

            var receiver = $(this).attr('receiver')

            $.ajax({
                url: '<?= base_url() ?>painel/act_get_affiliate_detalhes',
                type: 'POST',
                data: {
                    receiver: receiver
                },
                success: function(data) {

                    $('.modal-content').html("")
                    $('.modal-content').html(data)

                    $('#myBtn').click()

                },

            });



        })


        $('.btn-concluido').on('click', function(e) {
            e.preventDefault();

            var receiver = $(this).attr('receiver')

            swal({
                title: "Tem certeza?",
                text: "Você confirma que o repasse foi feito ao afiliado?",
                icon: "warning",
                buttons: [
                    'Não, cancelar!',
                    'Sim, confirmo!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title: 'Beleza!',
                        text: 'Aguarde o processamento...',
                        icon: 'warning'
                    })


                    $.ajax({
                        url: '<?= base_url() ?>painel/act_confirmar_repasse',
                        type: 'POST',
                        data: {
                            receiver: receiver
                        },
                        success: function(data) {

                            var resp = JSON.parse(data)

                            if (resp.status == "true") {

                                swal({
                                    title: 'Maravilha!',
                                    text: 'O repasse foi confirmado ao afiliado',
                                    icon: 'warning'
                                }).then(function(e) {
                                    location.reload()
                                })

                            } else {

                                swal("Opss!", resp.message, "error")
                            }


                        },

                    });


                }
            })
        })
    </script>
</body>

</html>