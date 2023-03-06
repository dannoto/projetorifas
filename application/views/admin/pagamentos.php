<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meus Sorteios</title>
    <?php $this->load->view('comp/css'); ?>

</head>

<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/navbar'); ?>
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/sidebar'); ?>

    <section>
    <h1 style="font-size:25px ;" class="text-xl text-5x1 text-left font-semibold text-white xl:ml-32 ml-12"> Pagamentos</h1>

        <div class="grid xl:grid-cols-1 xl:ml-36 xl:mr-36 xl:mt-8">

     

            <br>
            <br>

            <div class="col-span-1 xl:m-0 m-3">

                <table id="table_raffles" class="display text-white w-full">
                    <thead>
                        <tr>
                            <th class="text-white"><small>ID</small></th>
                            <th class="text-white"><small>USUÁRIO</small></th>
                            <th class="text-white"><small>CPF</small></th>
                            <th class="text-white"><small>E-MAIL</small></th>

                            <th class="text-white"><small>DATA</small></th>

                            <th class="text-white"><small>VALOR </small></th>
                            <th class="text-white"><small>PROCESSAMENTO</small></th>
                            <th class="text-white"><small>TIPO</small></th>

                            <th class="text-white"><small>STATUS</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pagamentos as $r) { ?>
                            <tr>
                                <td>
                                    <p>#<?= $r->id ?></p>
                                </td>

                                <td>
                                    <p><?=$this->user_model->getUserById( $r->payments_user)['user_name'] ?></p>
                                </td>

                                <td>
                                    <p><?=$this->user_model->getUserById( $r->payments_user)['user_cpf'] ?></p>
                                </td>

                                <td>
                                    <p><?=$this->user_model->getUserById( $r->payments_user)['user_email'] ?></p>
                                </td>

                                <td>
                                    <p><?= $r->payments_date; ?> às <?= $r->payments_time ?></p>
                                </td>
                                <td>
                                    <p>R$ <?= $r->payments_amount; ?></p>
                                </td>
                                <td>
                                    <p style="font-size:12px;text-transform:uppercase">
                                        <?php if ($r->payments_proccess == 1) {
                                            echo "MercadoPago";
                                        } else if ($r->payments_proccess == 0) {
                                            echo "Crédito da Conta";
                                        } ?>
                                    </p>
                                </td>
                                <td>
                                    <p><?= $r->payments_type ?></p>
                                </td>
                                <td style="font-size:12px;text-transform:uppercase">
                                    <p>
                                        <?php
                                        if ($r->payments_status == 1) {
                                            echo "aprovado";
                                        } else if ($r->payments_status == 2) {
                                            echo "pendente";
                                        } else if ($r->payments_status == 3) {
                                            echo "recusado";
                                        } else if ($r->payments_status == 4) {
                                            echo "estornado";
                                        }
                                        ?>
                                    </p>
                                </td>


                            </tr>


                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </section>



    <!-- Create Raffle Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1 class="text-xl text-5x1 font-bold text-white ">Novo Sorteio</h1>
            <p class="text-white">Publique um novo sorteio para seus usuários.</p>

            <div>
                <form action="" id="form-raffles">
                    <div class="grid xl:grid-cols-2 grid-cols-1">
                        <div class="col-span-1 xl:m-2">
                            <br>
                            <label class="text-white " for="">Título do Sorteio</label><br>
                            <input type="text" name="raffles_title" required maxlength="200" class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">

                            <br><br>
                            <label class="text-white " for="">Categoria do Sorteio</label><br>
                            <select name="raffles_category" required class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">
                                <option value="">Escolher Categoria...</option>
                                <?php foreach ($this->category_model->getCategories() as $c) { ?>
                                    <option value="<?= $c->id ?>"><?= $c->raffles_name ?></option>
                                <?php } ?>
                            </select>

                            <br><br>
                            <label class="text-white " for="">Imagem do Sorteio</label><br>

                            <div class=" bg-orange w-full p-2 mt-2" style="cursor: pointer;height:41px;" id="div-upload">
                                <p class="text-black font-semibold"><i class="fas fa-images"></i> Escolha uma Imagem</p>
                            </div>
                            <input type="file" style="display: none;" name="raffles_image" required accept="image/*" id="input-upload" class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">

                            <br>
                            <label class="text-white " for="">Descrição do Sorteio</label><br>
                            <textarea name="raffles_description" required maxlength="1000" class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white" cols="60" rows="10"></textarea>
                        </div>
                        <div class="col-span-1 xl:m-2">

                            <div class="grid grid-cols-2">
                                <div class="col-span-1 ">
                                    <br>
                                    <label class="text-white " for="">Número de Tickers</label><br>
                                    <input type="number" min="3" max="1000000" name="raffles_tickets" required class="p-2 mt-2 xl:w-2/3 w-full border bg-dark border-orange text-white">
                                </div>
                                <div class="col-span-1 ml-2">
                                    <br>
                                    <label class="text-white " for="">Limite de Compra</label><br>
                                    <input type="number" min="0" max="100" name="raffles_tickets_limit" required class="p-2 mt-2 xl:w-2/3  border bg-dark border-orange text-white"> <span class="text-white">%</span>
                                </div>
                            </div>

                            <br>
                            <label class="text-white " for="">Valor do Ticket <span class="text-white">(R$) </span></label><br>
                            <input type="text" name="raffles_tickets_value" required class="p-2 mt-2 xl:w-1/3 raffles_value  border bg-dark border-orange text-white">

                            <br><br>
                            <label class="text-white " for="">Status do Sorteio</label><br>
                            <select name="raffles_status_publish" required class="p-2 mt-2 xl:w-1/3 w-2/3 border bg-dark border-orange text-white">
                                <option value="1">Publicado</option>
                                <option value="0">Rascunho</option>
                            </select>


                        </div>
                    </div>
                    <div class="xl:m-2 xl:mt-0 mt-5">
                        <button class="text-black bg-orange px-3 py-3 font-semibold w-full">CRIAR SORTEIO</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- Create Raffle Modal -->




    <!-- Edit Raffle Modal -->
    <div id="raffleModalEdit" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1 class="text-xl text-5x1 font-bold text-white line-clamp-1" id="update_raffles_title_h1">Novo Sorteio</h1>
            <p class="text-white">Publique um novo sorteio para seus usuários.</p>

            <div>
                <form action="" id="form-edit-raffles">
                    <div class="grid xl:grid-cols-2 grid-cols-1">
                        <div class="col-span-1 xl:m-2">
                            <br>
                            <input type="hidden" name="raffles_id" id="update_raffles_id">
                            <label class="text-white " for="">Título do Sorteio</label><br>
                            <input type="text" name="raffles_title" id="update_raffles_title" required maxlength="200" class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">

                            <br><br>
                            <label class="text-white " for="">Categoria do Sorteio</label><br>
                            <select name="raffles_category" id="update_raffles_category" required class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">

                            </select>

                            <br><br>
                            <label class="text-white " for="">Imagem do Sorteio</label><br>

                            <div class=" bg-orange w-full p-2 mt-2" style="cursor: pointer;height:41px;" id="div-upload-edit">
                                <p class="text-black font-semibold line-clamp-1" id="update_raffles_image"><i class="fas fa-images"></i> Escolha uma Imagem</p>
                            </div>
                            <input type="file" style="display: none;" name="raffles_image" accept="image/*" id="input-upload-edit" class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">

                            <br>
                            <label class="text-white " for="">Descrição do Sorteio</label><br>
                            <textarea name="raffles_description" required maxlength="1000" id="update_raffles_description" class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white" cols="60" rows="10"></textarea>
                        </div>
                        <div class="col-span-1 xl:m-2">

                            <div class="grid grid-cols-2">
                                <div class="col-span-1 ">
                                    <br>
                                    <label class="text-white " for="">Número de Tickers</label><br>
                                    <input type="number" min="3" max="1000000" id="update_raffles_tickets" name="raffles_tickets" required class="p-2 mt-2 xl:w-2/3 w-full border bg-dark border-orange text-white">
                                </div>
                                <div class="col-span-1 ml-2">
                                    <br>
                                    <label class="text-white " for="">Limite de Compra</label><br>
                                    <input type="number" min="0" max="100" name="raffles_tickets_limit" id="update_raffles_tickets_limit" required class="p-2 mt-2 xl:w-2/3  border bg-dark border-orange text-white"> <span class="text-white">%</span>
                                </div>
                            </div>

                            <br>
                            <label class="text-white " for="">Valor do Ticket <span class="text-white">(R$) </span></label><br>
                            <input type="text" name="raffles_tickets_value" required id="update_raffles_tickets_value" class="raffles_value p-2 mt-2 xl:w-1/3  border bg-dark border-orange text-white">

                            <br><br>
                            <label class="text-white " for="">Status do Sorteio</label><br>
                            <select name="raffles_status_publish" id="update_raffles_publish" required class="p-2 mt-2 xl:w-1/3 w-2/3 border bg-dark border-orange text-white">

                            </select>

                            <br><br>

                            <div class="grid grid-cols-1 xl:grid-cols-1">
                                <div class="col-span-1">

                                    <button type="button" onclick="runRaffle()" class="bg-green-500 text-white px-2 py-2 " style="width:100%;">
                                        INICIAR SORTEIO MANUALMENTE
                                    </button>

                                </div>
                            </div>




                        </div>


                    </div>
                    <div class="xl:m-2 xl:mt-0 mt-5">
                        <button class="text-black bg-orange px-3 py-3 font-semibold w-full">ATUALIZAR SORTEIO</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- Edit Raffle Modal -->



    <?php $this->load->view('comp/js'); ?>
    <script>
        $(document).ready(function() {
            $('#table_raffles').DataTable();
        });
    </script>
    <script>
        // Create
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        // Create

        // Edit

        var modalEdit = document.getElementById("raffleModalEdit");
        var btnEdit = document.getElementById("openModalEdit");
        var spanEdit = document.getElementsByClassName("close")[1];

        // When the user clicks on the button, open the modal
        btnEdit.onclick = function() {
            modalEdit.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        spanEdit.onclick = function() {
            modalEdit.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modalEdit) {
                modalEdit.style.display = "none";
            }
        }


        // Edit
    </script>
    <script>
        $('#div-upload').on('click', function() {
            $('#input-upload').click()
        })

        $('#div-upload-edit').on('click', function() {
            $('#input-upload-edit').click()
        })
    </script>
    <script>
        $(function() {
            $('.raffles_value').maskMoney();
        })
    </script>
    <script>
        $("#form-raffles").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '<?= base_url() ?>painel/add_sorteio',
                type: 'POST',
                data: formData,
                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        location.reload()
                    } else {
                        swal(resp.message)
                    }

                },
                error: function(data) {
                    swal('Ocorreu um erro inesperado.')
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });


        $("#form-edit-raffles").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '<?= base_url() ?>painel/update_sorteio',
                type: 'POST',
                data: formData,
                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        location.reload()
                    } else {
                        swal(resp.message)
                    }

                },
                error: function(data) {
                    swal('Ocorreu um erro inesperado.')
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>
    <script>
        function getUpdatePublish(raffles_status_publish, raffles_id) {
            $.ajax({
                url: '<?= base_url() ?>painel/getUpdatePublish',
                type: 'POST',
                data: {
                    raffles_status_publish: raffles_status_publish,
                    raffles_id: raffles_id
                },
                success: function(data) {

                    $('#update_raffles_publish').html("")
                    $('#update_raffles_publish').append(data)

                },

            });
        }

        function getUpdateCategory(raffles_category) {

            $.ajax({
                url: '<?= base_url() ?>painel/getUpdateCategory',
                type: 'POST',
                data: {
                    raffles_category: raffles_category
                },
                success: function(data) {

                    $('#update_raffles_category').html("")
                    $('#update_raffles_category').append(data)

                },

            });
        }
    </script>
    <script>
        $(".edit-raffles").on('click', function() {

            var raffles_id = $(this).data('id')
            var raffles_title = $(this).data('title')
            var raffles_description = $(this).data('description')
            var raffles_image = $(this).data('image')
            var raffles_category = $(this).data('category')
            var raffles_tickets = $(this).data('tickets')
            var raffles_tickets_limit = $(this).data('ticketslimit')
            var raffles_tickets_value = $(this).data('ticketsvalue')
            var raffles_status_publish = $(this).data('statuspublish')
            var raffles_user = $(this).data('user')

            getUpdateCategory(raffles_category)
            getUpdatePublish(raffles_status_publish, raffles_id)

            $('#update_raffles_id').val(raffles_id)
            $('#update_raffles_title').val(raffles_title)
            $('#update_raffles_title_h1').text(raffles_title)
            $('#update_raffles_description').val(raffles_description)
            $('#update_raffles_image').text(raffles_image)
            // $('#update_raffles_title').val(raffles_category)
            $('#update_raffles_tickets').val(raffles_tickets)
            $('#update_raffles_tickets_limit').val(raffles_tickets_limit)
            $('#update_raffles_tickets_value').val(raffles_tickets_value)
            // $('#update_raffles_title').val(raffles_status_publish)
            $('#update_raffles_user').val(raffles_user)





            $('#openModalEdit').click()


        })
    </script>

    <script>
        function runRaffle() {
            var raffle_id = $('#update_raffles_id').val()

            // alert(raffle_id)
            swal({
                title: "Tem certeza?",
                text: "Ao rodar o sorteio, não poderá ser desfeito.",
                icon: "warning",
                buttons: [
                    'Não, cancelar!',
                    'Sim, rode o sorteio!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title: 'Vamos lá!',
                        text: 'O sorteio está em processo. Aguarde...',
                        icon: 'success'
                    })


                    $.ajax({
                        url: '<?= base_url() ?>cron/runRaffleManual',
                        type: 'POST',
                        data: {
                            raffle_id: raffle_id
                        },
                        success: function(data) {

                            var resp = JSON.parse(data)

                            if (resp.status == "true") {

                                var base = "<?= base_url() ?>";
                                window.location.href = base + "painel/sorteio_resultado/" + raffle_id

                            } else {

                                swal("Opss!", resp.message, "error")
                            }


                        },

                    });


                } else {
                    swal("Cancelado", "O Sorteio manual foi cancelado.", "error");
                }
            })
        }
    </script>

    <script>
        function deleteRaffle(raffle_id) {

            swal({
                title: "Certeza que deseja excluir?",
                text: "Todos os tickets comprados serão reembolsados em forma de créditos.",
                icon: "warning",
                buttons: [
                    'Não!',
                    'Sim, excluir!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {


                    swal({
                        title: 'Aguardade!',
                        text: 'Estamos processando o estorno. Aguarde...',
                        icon: 'success'
                    })

                    $.ajax({
                        url: '<?= base_url() ?>painel/deleteRaffle',
                        type: 'POST',
                        data: {
                            raffle_id: raffle_id
                        },
                        success: function(data) {

                            var resp = JSON.parse(data)

                            if (resp.status == "true") {

                                // swal({
                                //     title: 'Tudo certo!',
                                //     text: resp.message,
                                //     icon: 'success'
                                // })

                                location.reload()


                            } else {

                                swal("Opss!", resp.message, "error")
                            }


                        },

                    });


                } else {
                    // swal("Cancelado", "O Sorteio manual foi cancelado.", "error");
                }
            })
        }
    </script>
</body>

</html>