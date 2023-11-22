<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meus Sorteios</title>
    <?php $this->load->view('comp/css'); ?>
    <script src="https://cdn.tiny.cloud/1/iqu3uiofpxmar8p4ni5b3uzak7a2kfn54a98gjkwqa0zvkiw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/navbar'); ?>
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/sidebar'); ?>

    <section>

        <div class=" xl:ml-36 xl:mr-36 xl: mt-12 m-3 perfil-sorteios-breadcumb">
            <h1 class="text-white font-bold text-xl text-3x1">Gerenciar Sorteios</h1>
            <p class="text-white xl:font-semibold">Gerencia todos os seus sorteios.</p>
            <button class="text-orange text-white font-semibold px-3 py-2 border border-orange mt-2" id="myBtn">+ CRIAR SORTEIO</button>
            <button class="text-orange text-white font-semibold px-3 py-2 border border-orange hidden mt-2" id="openModalEdit">+ EDITAR SORTEIO</button>

        </div>

        <div class="grid xl:grid-cols-1 xl:ml-36 xl:mr-36 xl:mt-12">


            <div class="col-span-1 xl:m-0 m-3">

                <table id="table_raffles" class="display text-white w-full">
                    <thead>
                        <tr>
                            <th class="text-white"><small></small></th>
                            <th class="text-white"><small>TÍTULO</small></th>
                            <th class="text-white"><small>PROGRESSO</small></th>
                            <th class="text-white"><small>STATUS PUBLICAÇÃO</small></th>
                            <th class="text-white"><small>STATUS SORTEIO</small></th>
                            <th class="text-white"><small>DATA</small></th>
                            <th class="text-white"><small>AÇÕES</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sorteios as $r) { ?>
                            <tr>
                                <td><img src="<?= base_url() ?>assets/img/raffles/<?= $r->raffles_image ?>" style="height: 50px;max-height: 50px;width:50px;max-width:50px; object-fit:cover" alt=""></td>
                                <td><small><?= substr($r->raffles_title, 0, 50) ?>...</small></td>
                                <td><small><?= $r->raffles_progress ?>%</small></td>
                                <td>
                                    <?php if ($r->raffles_status_publish == 1) {  ?>
                                        <small class="text-green-500">PUBLICADO</small>
                                    <?php } else {  ?>
                                        <small class="text-orange">RASCUNHO</small>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($r->raffles_status_random == 1) {  ?>
                                        <small class="text-orange">ABERTO</small>
                                    <?php } else if ($r->raffles_status_random == 2) {  ?>
                                        <small class="text-green-500">EM ANDAMENTO</small>
                                    <?php } else if ($r->raffles_status_random == 3) { ?>
                                        <small class="text-blue-500">CONCLUÍDO</small>
                                    <?php } else  if ($r->raffles_status_random == 4) {  ?>
                                        <small class="text-red-500">CANCELADO</small>

                                    <?php }  ?>
                                </td>
                                <td><small><?= $r->raffles_date ?></small></td>
                                <td>
                                    <?php if ($r->raffles_status_random == 1) {  ?>

                                        <span class="edit-raffles" style="cursor:pointer" data-id="<?= $r->id ?>">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <i class="fas fa-trash ml-5" data-id="<?= $r->id ?>" onclick="deleteRaffle(<?= $r->id ?>)" title="Excluir" style="cursor:pointer"></i>
                                    <?php } else if ($r->raffles_status_random == 3) {  ?>
                                        <a href="<?= base_url() ?>painel/sorteio_resultado/<?= $r->id ?>">
                                            <i class="fal fa-trophy ml-5" title="Vencedor" style="cursor:pointer"></i>
                                        </a>
                                    <?php }
                                    if ($r->raffles_status_random == 4) { ?>

                                    <?php }  ?>


                                </td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
        <br><br>
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
                    <div class="grid xl:grid-cols-5 grid-cols-1">
                        <div class="col-span-3 xl:m-2">
                            <br>
                            <label class="text-white " for="">Título do Sorteio</label><br>
                            <input type="text" id="add_raffles_title" name="raffles_title" required maxlength="200" class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">

                            <br><br>
                            <label class="text-white " for="">Categoria do Sorteio</label><br>
                            <select name="raffles_category" id="add_raffles_category" required class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">
                                <option value="">Escolher Categoria...</option>
                                <?php foreach ($this->category_model->getCategories() as $c) { ?>
                                    <option value="<?= $c->id ?>"><?= $c->raffles_name ?></option>
                                <?php } ?>
                            </select>

                            <br><br>
                            <label class="text-white " for="">Imagem do Sorteio <br><small style="font-size:10px">RECOMENDAÇÃO (1452x780)</small></label><br>

                            <div class=" bg-orange w-full p-2 mt-2" style="cursor: pointer;height:41px;" id="div-upload">
                                <p class="text-black font-semibold"><i class="fas fa-images"></i> Escolha uma Imagem</p>
                            </div>
                            <input type="file" style="display: none;" name="raffles_image" required accept="image/*" id="input-upload" class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">
                            <br>

                            <label class="text-white " for="">Imagem do Sorteio Destaque <br><small style="font-size:10px">RECOMENDAÇÃO (3456x1440)</small></label><br>

                            <div class=" bg-orange w-full p-2 mt-2" style="cursor: pointer;height:41px;" id="div-upload-featured">
                                <p class="text-black font-semibold"><i class="fas fa-images"></i> Escolha uma Imagem</p>
                            </div>
                            <input type="file" style="display: none;" name="raffles_image_featured" required accept="image/*" id="input-upload-featured" class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">
                            <br>
                            <label class="text-white " for="">Descrição do Sorteio</label><br>
                            <textarea name="raffles_description " id="add_raffles_description" required maxlength="1000" class=" p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white" cols="60" rows="10"></textarea>
                        </div>
                        <div class="col-span-2 xl:m-2">
                            <br>
                            <small class="text-orange font-semibold ">QUANTITATIVO</small>
                            <div class="grid grid-cols-2">
                                <div class="col-span-1 ">
                                    <br>
                                    <label class="text-white " for="">Número de Tickers</label><br>
                                    <input type="number" min="3" max="1000000" name="raffles_tickets" id="add_raffles_tickets" required class="p-2 mt-2 xl:w-2/3 w-full border bg-dark border-orange text-white">
                                </div>
                                <div class="col-span-1 ml-2">
                                    <br>
                                    <label class="text-white " for="">Limite de Compra</label><br>
                                    <input type="number" min="0" max="1000000" name="raffles_tickets_limit" id="add_raffles_tickets_limit" required class="p-2 mt-2 xl:w-2/3  border bg-dark border-orange text-white"> <span class="text-white">UND.</span>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <small class="text-orange font-semibold ">PRECIFICAÇÃO</small>
                            <div class="grid grid-cols-2">
                                <div class="col-span-1 ml-2">
                                    <br>

                                    <label class="text-white " for="">Sorteio Gratuito?</label><br>
                                    <select name="raffles_isfree" id="add_raffles_isfree" style="width:80%" required class="p-2 mt-2 xl:w-1/3 w-2/3 border bg-dark border-orange text-white">
                                        <option value="0">NÃO</option>
                                        <option value="1">SIM</option>
                                    </select>
                                </div>
                                <div class="col-span-1 ">
                                    <br>
                                    <label class="text-white " for="">Valor do Ticket <span class="text-white">(R$) </span></label><br>
                                    <input style="width:80%" type="text" name="raffles_tickets_value" id="add_raffles_tickets_value" required class="p-2 mt-2 xl:w-1/3 raffles_value  border bg-dark border-orange text-white">

                                </div>

                            </div>
                            <br><br>
                            <hr>
                            <br>
                            <small class="text-orange font-semibold ">CASHBACK</small>
                            <div class="grid grid-cols-2">
                                <div class="col-span-1 ml-2">
                                    <br>
                                    <label class="text-white " for=""> Cashback?</label><br>
                                    <select name="raffles_cashback" id="add_raffles_cashback" style="width:80%" required class="p-2 mt-2 xl:w-1/3 w-2/3 border bg-dark border-orange text-white">
                                        <option value="0">NÃO</option>
                                        <option value="1">SIM</option>
                                    </select>
                                </div>
                                <div class="col-span-1 ">
                                    <br>
                                    <label class="text-white " for="">Cashback <span class="text-white">(%) </span></label><br>
                                    <input type="number" min="0" max="100" name="raffles_cashback_amount" id="add_raffles_cashback_amount" required class="p-2 mt-2 xl:w-2/3  border bg-dark border-orange text-white"> <span class="text-white">%</span>

                                </div>
                            </div>


                            <br><br>
                            <hr>
                            <br>
                            <small class="text-orange font-semibold ">STATUS</small>
                            <div class="grid grid-cols-2">
                                <div class="col-span-1 ml-2">
                                    <br>
                                    <label class="text-white " for="">Status do Sorteio</label><br>
                                    <select name="raffles_status_publish" id="add_raffles_status_publish" style="width:80%" required class="p-2 mt-2 xl:w-1/3 w-2/3 border bg-dark border-orange text-white">
                                        <option value="1">Publicado</option>
                                        <option value="0">Rascunho</option>
                                    </select>
                                </div>
                                <div class="col-span-1 ">
                                    <br>
                                    <label class="text-white " for="">Destaque</label><br>
                                    <select name="raffles_featured" id="add_raffles_featured" style="width:80%" required class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">
                                        <option value="1">SIM</option>
                                        <option value="0">NÃO</option>
                                    </select>
                                </div>
                            </div>
                            <br>


                        </div>
                    </div>
                    <br>
                    <div class="xl:m-2 xl:mt-0 mt-5">
                        <button id="btn_add_sorteio" class="text-black bg-orange px-3 py-3 font-semibold w-full">CRIAR SORTEIO</button>
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
                    <div class="grid xl:grid-cols-5 grid-cols-1">
                        <div class="col-span-3 xl:m-2">
                            <br>
                            <input type="hidden" id="update_raffles_id" name="raffles_id" required maxlength="200" class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">

                            <label class="text-white " for="">Título do Sorteio</label><br>
                            <input type="text" id="update_raffles_title" name="raffles_title" required maxlength="200" class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">

                            <br><br>
                            <label class="text-white " for="">Categoria do Sorteio</label><br>
                            <select name="raffles_category" id="update_raffles_category" required class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">
                                <option value="">Escolher Categoria...</option>
                                <?php foreach ($this->category_model->getCategories() as $c) { ?>
                                    <option value="<?= $c->id ?>"><?= $c->raffles_name ?></option>
                                <?php } ?>
                            </select>

                            <br><br>
                            <label class="text-white " for="">Imagem do Sorteio <br><small style="font-size:10px">RECOMENDAÇÃO (1452x780)</small></label><br>

                            <div class=" bg-orange w-full p-2 mt-2" style="cursor: pointer;height:41px;" id="update-div-upload">
                                <p class="text-black font-semibold " id="update_image"><i class="fas fa-images"></i> Escolha uma Imagem</p>
                            </div>
                            <input type="file" style="display: none;" name="raffles_image" accept="image/*" id="update-input-upload" class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">
                            <br>

                            <label class="text-white " for="">Imagem do Sorteio Destaque <br><small style="font-size:10px">RECOMENDAÇÃO (3456x1440)</small></label><br>

                            <div class=" bg-orange w-full p-2 mt-2" style="cursor: pointer;height:41px;" id="update-div-upload-featured">
                                <p class="text-black font-semibold " id="update_images_featured"><i class="fas fa-images"></i> Escolha uma Imagem</p>
                            </div>
                            <input type="file" style="display: none;" name="image_featured" accept="image/*" id="update-input-upload-featured" class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">
                            <br>
                            <label class="text-white " for="">Descrição do Sorteio</label><br>
                            <textarea name="raffles_description " id="update_raffles_description" required maxlength="1000" class=" raffles_description p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white" cols="60" rows="10"></textarea>
                        </div>
                        <div class="col-span-2 xl:m-2">
                            <br>
                            <small class="text-orange font-semibold ">QUANTITATIVO</small>
                            <div class="grid grid-cols-2">
                                <div class="col-span-1 ">
                                    <br>
                                    <label class="text-white " for="">Número de Tickers</label><br>
                                    <input type="number" min="3" max="1000000" name="raffles_tickets" id="update_raffles_tickets" required class="p-2 mt-2 xl:w-2/3 w-full border bg-dark border-orange text-white">
                                </div>
                                <div class="col-span-1 ml-2">
                                    <br>
                                    <label class="text-white " for="">Limite de Compra</label><br>
                                    <input type="number" min="0" max="1000000" name="raffles_tickets_limit" id="update_raffles_tickets_limit" required class="p-2 mt-2 xl:w-2/3  border bg-dark border-orange text-white"> <span class="text-white">UND.</span>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <small class="text-orange font-semibold ">PRECIFICAÇÃO</small>
                            <div class="grid grid-cols-2">
                                <div class="col-span-1 ml-2">
                                    <br>

                                    <label class="text-white " for="">Sorteio Gratuito?</label><br>
                                    <select name="raffles_isfree" id="update_raffles_isfree" style="width:80%" required class="p-2 mt-2 xl:w-1/3 w-2/3 border bg-dark border-orange text-white">
                                        <option value="0">NÃO</option>
                                        <option value="1">SIM</option>
                                    </select>
                                </div>
                                <div class="col-span-1 ">
                                    <br>
                                    <label class="text-white " for="">Valor do Ticket <span class="text-white">(R$) </span></label><br>
                                    <input style="width:80%" type="text" name="raffles_tickets_value" id="update_raffles_tickets_value" required class="p-2 mt-2 xl:w-1/3 raffles_value  border bg-dark border-orange text-white">

                                </div>

                            </div>
                            <br><br>
                            <hr>
                            <br>
                            <small class="text-orange font-semibold ">CASHBACK</small>
                            <div class="grid grid-cols-2">
                                <div class="col-span-1 ml-2">
                                    <br>
                                    <label class="text-white " for=""> Cashback?</label><br>
                                    <select name="raffles_cashback" id="update_raffles_cashback" style="width:80%" required class="p-2 mt-2 xl:w-1/3 w-2/3 border bg-dark border-orange text-white">
                                        <option value="0">NÃO</option>
                                        <option value="1">SIM</option>
                                    </select>
                                </div>
                                <div class="col-span-1 ">
                                    <br>
                                    <label class="text-white " for="">Cashback <span class="text-white">(%) </span></label><br>
                                    <input type="number" min="0" max="100" name="raffles_cashback_amount" id="update_raffles_cashback_amount" required class="p-2 mt-2 xl:w-2/3  border bg-dark border-orange text-white"> <span class="text-white">%</span>

                                </div>
                            </div>


                            <br><br>
                            <hr>
                            <br>
                            <small class="text-orange font-semibold ">STATUS</small>
                            <div class="grid grid-cols-2">
                                <div class="col-span-1 ml-2">
                                    <br>
                                    <label class="text-white " for="">Status do Sorteio</label><br>
                                    <select name="raffles_status_publish" id="update_raffles_status_publish" style="width:80%" required class="p-2 mt-2 xl:w-1/3 w-2/3 border bg-dark border-orange text-white">
                                        <option value="1">Publicado</option>
                                        <option value="0">Rascunho</option>
                                    </select>
                                </div>
                                <div class="col-span-1 ">
                                    <br>
                                    <label class="text-white " for="">Destaque</label><br>
                                    <select name="raffles_featured" id="update_raffles_featured" style="width:80%" required class="p-2 mt-2 xl:w-full w-full border bg-dark border-orange text-white">
                                        <option value="1">SIM</option>
                                        <option value="0">NÃO</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button class="bg-green-500 text-white font-semobold p-2" onclick="runRaffle()"> RODAR SORTEIO MANUALMENTE</button>


                        </div>
                    </div>
                    <br>
                    <div class="xl:m-2 xl:mt-0 mt-5">
                        <button id="btn_update_sorteio" class="text-black bg-orange px-3 py-3 font-semibold w-full">ATUALIZAR SORTEIO</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- Edit Raffle Modal -->



    <?php $this->load->view('comp/js'); ?>

    <script>

function htmlspecialchars_decode(str) {
            var doc = new DOMParser().parseFromString(str, "text/html");
            return doc.documentElement.textContent;
        }

        $("#btn_add_sorteio").on('click', function(e) {

            e.preventDefault();


            var formData = new FormData();

            formData.append('raffles_title', $('#add_raffles_title').val());
            formData.append('raffles_category', $('#add_raffles_category').val());

            var raffles_image = document.getElementById('input-upload');
            formData.append('raffles_image', raffles_image.files[0]);

            var raffles_image_featured = document.getElementById('input-upload-featured');
            formData.append('raffles_image_featured', raffles_image_featured.files[0]);

            var raffles_description = tinymce.get("add_raffles_description").getContent();
            formData.append('raffles_description', raffles_description);

            // Quantitativo
            formData.append('raffles_tickets', $('#add_raffles_tickets').val());
            formData.append('raffles_tickets_limit', $('#add_raffles_tickets_limit').val());

            // Precificacao
            formData.append('raffles_tickets_value', $('#add_raffles_tickets_value').val());
            formData.append('raffles_isfree', $('#add_raffles_isfree').val());

            // Cashback
            formData.append('raffles_cashback', $('#add_raffles_cashback').val());
            formData.append('raffles_cashback_amount', $('#add_raffles_cashback_amount').val());

            // Status
            formData.append('raffles_status_publish', $('#add_raffles_status_publish').val());
            formData.append('raffles_featured', $('#add_raffles_featured').val());




            console.log($('#add_raffles_tickets_limit').val())
            console.log($('#add_raffles_cashback_amount').val())

            if ($('#add_raffles_cashback').val() == 1 && $('#add_raffles_cashback_amount').val() == "") {
                swal('Defina a % do casback.')
            } else if ($('#add_raffles_cashback_amount').val() < 0 || $('#add_raffles_cashback_amount').val() > 100) {
                swal('Defina o cashback entre 0% e 100%.')
            } else if ($('#add_raffles_isfree').val() == 1 && $('#add_raffles_tickets_value').val() == "") {
                swal('Defina o valor do ticket.')
            } else if ($('#add_raffles_title').val() == "") {
                swal('Defina o título.')
            } else if (raffles_image.files[0] == undefined) {
                swal('Defina a imagem principal.')
            } else if (raffles_image_featured.files[0] == undefined) {
                swal('Defina a segunda imagem.')
            } else if ($('#add_raffles_category').val() == "") {
                swal('Defina a categoria.')
            } else if (raffles_description == "") {
                swal('Defina a descriçao.')
            } else if ($('#add_raffles_tickets').val() == "") {
                swal('Defina o número de tickets.')
            } else if ($('#add_raffles_tickets_limit').val() == "") {
                swal('Defina o limite de compra dos tickets.')
            } else if ($('#add_raffles_tickets_limit').val() < 0 || $('#add_raffles_tickets_limit').val() > 100) {
                swal('Defina limite de compra entre 0% e 100%.')
            } else {

                $.ajax({
                    url: '<?= base_url() ?>painel/add_sorteio',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {

                        var resp = JSON.parse(data)

                        if (resp.status == "true") {
                            swal({
                                title: "Excelente!",
                                text: resp.message,
                                icon: "success",
                                // buttons: [
                                //     'Não, cancelar!',
                                //     'Sim, rode o sorteio!'
                                // ],
                                dangerMode: true,
                            }).then(function(isConfirm) {
                                if (isConfirm) {
                                    location.reload()
                                }
                            })
                        } else {
                            swal(resp.message)
                        }

                    },
                    error: function(data) {
                        swal('Ocorreu um erro inesperado.')
                    },

                });
            }


        });

        $("#btn_update_sorteio").on('click', function(e) {


            e.preventDefault();


            var formData = new FormData();

            formData.append('raffles_id', $('#update_raffles_id').val());

            formData.append('raffles_title', $('#update_raffles_title').val());


            formData.append('raffles_title', $('#update_raffles_title').val());
            formData.append('raffles_category', $('#update_raffles_category').val());

            var raffles_image = document.getElementById('update-input-upload');
            formData.append('raffles_image', raffles_image.files[0]);

            var raffles_image_featured = document.getElementById('update-input-upload-featured');
            formData.append('raffles_image_featured', raffles_image_featured.files[0]);

            var raffles_description = tinymce.get("update_raffles_description").getContent();
            formData.append('raffles_description', raffles_description);


            // Quantitativo
            formData.append('raffles_tickets', $('#update_raffles_tickets').val());
            formData.append('raffles_tickets_limit', $('#update_raffles_tickets_limit').val());

            // Precificacao
            formData.append('raffles_tickets_value', $('#update_raffles_tickets_value').val());
            formData.append('raffles_isfree', $('#update_raffles_isfree').val());

            // Cashback
            formData.append('raffles_cashback', $('#update_raffles_cashback').val());
            formData.append('raffles_cashback_amount', $('#update_raffles_cashback_amount').val());

            // Status
            formData.append('raffles_status_publish', $('#update_raffles_status_publish').val());
            formData.append('raffles_featured', $('#update_raffles_featured').val());



            console.log($('#update_raffles_tickets_limit').val())
            console.log($('#update_raffles_cashback_amount').val())

            if ($('#update_raffles_cashback').val() == 1 && $('#update_raffles_cashback_amount').val() == "") {
                swal('Defina a % do casback.')
            } else if ($('#update_raffles_cashback_amount').val() < 0 || $('#update_raffles_cashback_amount').val() > 100) {
                swal('Defina o cashback entre 0% e 100%.')
            } else if ($('#update_raffles_isfree').val() == 1 && $('#update_raffles_tickets_value').val() == "") {
                swal('Defina o valor do ticket.')
            } else if ($('#update_raffles_title').val() == "") {
                swal('Defina o título.')
            }  else if ($('#update_raffles_category').val() == "") {
                swal('Defina a categoria.')
            } else if (raffles_description == "") {
                swal('Defina a descriçao.')
            } else if ($('#update_raffles_tickets').val() == "") {
                swal('Defina o número de tickets.')
            } else if ($('#update_raffles_tickets_limit').val() == "") {
                swal('Defina o limite de compra dos tickets.')
            } else if ($('#update_raffles_tickets_limit').val() < 0 || $('#update_raffles_tickets_limit').val() > 100) {
                swal('Defina limite de compra entre 0% e 100%.')
            } else {


                $.ajax({
                    url: '<?= base_url() ?>painel/update_sorteio',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {

                        var resp = JSON.parse(data)

                        if (resp.status == "true") {
                            // location.reload()
                            swal({   title: "Excelente!",
                                text: resp.message,
                                icon: "success",
                                // buttons: [
                                //     'Não, cancelar!',
                                //     'Sim, rode o sorteio!'
                                // ],
                                dangerMode: true,}).then(function(isConfirm) {
                                if (isConfirm) {
                                    location.reload()
                                }
                            })
                        } else {
                            swal(resp.message)
                        }

                    },
                    error: function(data) {
                        swal('Ocorreu um erro inesperado.')
                    },
          
                });
            }


        });

        $(".edit-raffles").on('click', function() {
            var raffles_id = $(this).data('id')

            $.ajax({
                url: '<?= base_url() ?>painel/act_get_raffle',
                type: 'POST',
                data: {
                    raffles_id: raffles_id
                },

                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status != "false") {
                        // location.reload()
                        $('#update_raffles_id').val(resp.id)
                        $('#update_raffles_title').val(resp.raffles_title)
                        $('#update_raffles_title_h1').text(resp.raffles_title)
                        // $('#update_raffles_description').val(htmlspecialchars_decode(raffles_description))

                        var raffles_description = resp.raffles_description
                        tinymce.get("update_raffles_description").setContent(htmlspecialchars_decode(raffles_description));

                        $('#update_raffles_image').text(resp.raffles_image)
                        $('#update_raffles_image_featured').text(resp.raffles_image_featured)

                        
                        $('#update_raffles_status_publish').val(resp.raffles_status_publish)


                        $('#update_raffles_tickets').val(resp.raffles_tickets)
                        $('#update_raffles_tickets_limit').val(resp.raffles_tickets_limit)
                        $('#update_raffles_tickets_value').val(resp.raffles_tickets_value)

                        $('#update_raffles_isfree').val(resp.raffles_isfree)


                        $('#update_raffles_featured').val(resp.raffles_featured)

                        $('#update_raffles_cashback').val(resp.raffles_cashback)
                        $('#update_raffles_cashback_amount').val(resp.raffles_cashback_amount)

                        $('#update_raffles_category').val(resp.raffles_category)

                        $('#openModalEdit').click()


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
        tinymce.init({
            selector: '#add_raffles_description',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ]
        });

        tinymce.init({
            selector: '#update_raffles_description',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ]
        });
    </script>
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

        $('#div-upload-featured').on('click', function() {
            $('#input-upload-featured').click()
        })

        $('#div-upload-edit-featured').on('click', function() {
            $('#input-upload-edit-featured').click()
        })

        // 

        $('#update-div-upload').on('click', function() {
            $('#update-input-upload').click()
        })

        $('#update-div-upload-edit').on('click', function() {
            $('#update-input-upload-edit').click()
        })

        $('#update-div-upload-featured').on('click', function() {
            $('#update-input-upload-featured').click()
        })

        $('#update-div-upload-edit-featured').on('click', function() {
            $('#update-input-upload-edit-featured').click()
        })
    </script>
    <script>
        $(function() {
            $('.raffles_value').maskMoney();
        })
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
            var raffles_featured = $(this).data('featured')
            var raffles_isfree = $(this).data('isfree')


            var raffles_user = $(this).data('user')

            var raffles_cashback = $(this).data('cashback')
            var raffles_cashback_amount = $(this).data('cashbackamount')
            var raffles_image_featured = $(this).data('imagesfeatured')


            console.log(raffles_isfree)
            // getUpdateCategory(raffles_category)
            // getUpdatePublish(raffles_status_publish, raffles_id)

            $('#update_raffles_id').val(raffles_id)
            $('#update_raffles_title').val(raffles_title)
            $('#update_raffles_title_h1').text(raffles_title)
            // $('#update_raffles_description').val(htmlspecialchars_decode(raffles_description))

            tinymce.get("update_raffles_description").setContent(htmlspecialchars_decode(raffles_description));

            $('#update_raffles_image').text(raffles_image)
            $('#update_raffles_image_featured').text(raffles_image_featured)

            // $('#update_raffles_isfree').text(raffles_isfree)


            // $('#update_raffles_title').val(raffles_category)
            $('#update_raffles_tickets').val(raffles_tickets)
            $('#update_raffles_tickets_limit').val(raffles_tickets_limit)
            $('#update_raffles_tickets_value').val(raffles_tickets_value)
            // $('#update_raffles_title').val(raffles_status_publish)
            $('#update_raffles_user').val(raffles_user)

            $('#update_raffles_featured').val(raffles_featured)

            $('#update_raffles_cashback').val(raffles_cashback)
            $('#update_raffles_cashback_amount').val(raffles_cashback_amount)

            $('#update_raffles_category').val(raffles_category)

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