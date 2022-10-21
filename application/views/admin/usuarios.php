<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meus Sorteios</title>
    <?php $this->load->view('comp/css');?>

</head>
<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/navbar');?>
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/sidebar');?>

    <section>

        <div class=" xl:ml-36 xl:mr-36 xl: mt-12 m-3 perfil-sorteios-breadcumb">
            <h1 class="text-white font-bold text-xl text-3x1">Gerenciar Usuários</h1>
            <p class="text-white xl:font-semibold">Gerencia todos os seus usuários.</p>
           
            <button  class="text-orange text-white font-semibold px-3 py-2 border border-orange hidden mt-2"  id="openModalEdit">+ EDITAR SORTEIO</button> 

        </div>
        
        <div class="grid xl:grid-cols-1 xl:ml-36 xl:mr-36 xl:mt-12">
            
            
            <div class="col-span-1 xl:m-0 m-3">

                <table id="table_raffles" class="display text-white w-full">
                    <thead>
                        <tr>
                            <th class="text-white"><small></small></th>
                            <th class="text-white"><small>NOME</small></th>
                            <th class="text-white"><small>E-MAIL</small></th>
                            <th class="text-white"><small>STATUS </small></th>
                            <th class="text-white"><small>DATA DE CADASTRO</small></th>
                            <th class="text-white"><small>AÇÕES</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->user_model->getUsers() as $r)  { ?>
                            <tr>
                                <td><img src="<?=base_url()?>assets/img/logo.png" style="height: 50px;max-height: 50px;width:50px;max-width:50px; object-fit:cover" alt=""></td>
                                <td><small><?=substr($r->user_name, 0, 100)?> <?=substr($r->user_surname, 0, 100)?></small></td>
                                <td><small><?=$r->user_email?></small></td>
                                <td>
                                    <?php if ($r->user_status == 1) {  ?>
                                        <small class="text-green-500">ATIVO</small>
                                    <?php } else {  ?>
                                        <small class="text-orange">BANIDO</small>
                                    <?php } ?>
                                </td>
                                <td><small><?=$r->user_date?></small></td>
                                <td>
                              

                                        <span class="edit-raffles" style="cursor:pointer" data-id="<?=$r->id?>" data-name="<?=$r->user_name?>" data-credit="<?=str_replace(",",".",$r->user_credit)?>" data-surname="<?=$r->user_surname?>" data-email="<?=$r->user_email?>" data-cpf="<?=$r->user_cpf?>" data-ddd="<?=$r->user_ddd?>" data-phone="<?=$r->user_phone?>" title="Editar" >
                                            <i class="fas fa-edit"></i>
                                        </span>

                                        <?php if ($r->user_status == 1) { ?>
                                            <i class="fas text-red-500 fa-ban ml-5" data-id="<?=$r->id?>"  onclick="banirUsuario(<?=$r->id?>, <?=$r->user_status?>)" title="Banir" style="cursor:pointer"></i>
                                        <?php } else { ?>
                                            <i class="fas text-green-500 fa-ban ml-5" data-id="<?=$r->id?>"  onclick="banirUsuario(<?=$r->id?>, <?=$r->user_status?>)" title="Desbanir" style="cursor:pointer"></i>
                                        <?php }?>

                                </td>

                            </tr>
                        <?php } ?>
                       
                    </tbody>
                </table>
               
            </div>
        </div>
        <br><br>
    </section>






<!-- Edit Raffle Modal -->
<div id="raffleModalEdit" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1 class="text-xl text-5x1 font-bold text-white line-clamp-1" id="update_user_title"></h1>
        <p class="text-white">Edite os dados do usuário.</p>

        <div>
            <form action="" id="form-edit-raffles">
            <div class="grid xl:grid-cols-1 grid-cols-1">
                   
                    <div class="col-span-1 xl:m-2">
                    <input type="text"  id="update_id"  name="user_id" required class="p-2 mt-2 hidden  w-full border bg-dark border-orange text-white">

                        <div class="grid grid-cols-2" >
                            <div class="col-span-1 ">
                                <br>
                                <label  class="text-white " for="">Nome</label><br>
                                <input type="text"  id="update_user_name"  name="user_name" required class="p-2 mt-2  w-full border bg-dark border-orange text-white">
                            </div>
                            <div class="col-span-1 ml-2">
                                <br>
                                <label  class="text-white " for="">Sobrenome</label><br>
                                <input type="text" name="user_surname" id="update_user_surname" required  class="p-2 mt-2 w-full  border bg-dark border-orange text-white"> 
                            </div>
                        </div>

                        <div class="grid grid-cols-2" >
                            <div class="col-span-1 ">
                                <br>
                                <label  class="text-white " for="">E-mail  </label><br>
                                <input type="text" name="user_email" required   id="update_user_email" class="raffles_value p-2 mt-2 w-full  border bg-dark border-orange text-white"> 
                            </div>
                            <div class="col-span-1 ml-2">
                                <br>
                                <label  class="text-white " for="">CPF  </label><br>
                                <input type="text" name="user_cpf" required   id="update_user_cpf" class="raffles_value p-2 mt-2 w-full  border bg-dark border-orange text-white"> 
                            </div>
                        </div>

                       
                        <div class="grid grid-cols-2" >
                            <div class="col-span-1 ">
                                <br>
                                <label  class="text-white " for="">DDD  </label><br>
                                <input type="text" name="user_ddd" required   id="update_user_ddd" class="raffles_value p-2 mt-2 w-full  border bg-dark border-orange text-white"> 
                            </div>
                            <div class="col-span-1 ml-2">
                                <br>
                                <label  class="text-white " for="">Telefone  </label><br>
                                <input type="text" name="user_phone" required   id="update_user_phone" class="raffles_value p-2 mt-2 w-full  border bg-dark border-orange text-white"> 
                            </div>
                        </div>

                        <div class="grid grid-cols-2" >
                            <div class="col-span-1 ">
                                <br>
                                <label  class="text-white " for="">Créditos  </label><br>
                                <input type="text" name="user_credit" required   id="update_user_credit" class="raffles_value p-2 mt-2 w-full  border bg-dark border-orange text-white"> 
                            </div>
                            
                        </div>
                        <br><br>
                        
                        <div class="grid grid-cols-1 xl:grid-cols-1">
                            <div class="col-span-1">
    
                                <button type="submit"  class="bg-green-500 text-white px-2 py-2 " style="width:100%;">
                                    ATUALIZAR DADOS
                                </button>
                       
                            </div>
                        </div>
                        
                        


                    </div>
                   
                 
            </div>
          
            </form>
        </div>
    </div>

</div>
<!-- Edit Raffle Modal -->


 
    <?php $this->load->view('comp/js');?>
    <script>
        
        $("#form-edit-raffles").submit(function(e) {

            e.preventDefault();    

            var formData = $(this).serialize();

            $.ajax({
                url: '<?=base_url()?>painel/updateUser',
                type: 'POST',
                data: formData,
                success: function (data) {

                    var resp = JSON.parse(data)
    
                    if (resp.status == "true") {
                        location.reload()
                    } else {
                        swal(resp.message)
                    }
                                    
                },
                error: function (data) {
                    swal('Ocorreu um erro inesperado.')
                },
           
            });
        });

    </script>
    <script>

         
             // Edit
             var modal = document.getElementById("raffleModalEdit");
            var btn = document.getElementById("myBtn");
            var span = document.getElementsByClassName("close")[0];

             var modalEdit = document.getElementById("raffleModalEdit");
            var btnEdit = document.getElementById("openModalEdit");
            var spanEdit = document.getElementsByClassName("close")[1];

        //      // When the user clicks on the button, open the modal
            // btn.onclick = function() {
            //     modal.style.display = "block";
            // }

            // // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            // Create

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
        $(document).ready( function () {
            $('#table_raffles').DataTable();
        } );
    </script>
    <script>
        function banirUsuario(id, atual)
        {

            $.ajax({
                url: '<?=base_url()?>painel/banirUser',
                type: 'POST',
                data: {user_id:id, user_status:atual},
                success: function (data) {

                    var resp = JSON.parse(data)
    
                    if (resp.status == "true") {
                        location.reload()
                    } else {
                        swal(resp.message)
                    }
                                    
                },
                error: function (data) {
                    swal('Ocorreu um erro inesperado.')
                },
           
            });
        }


        $(".edit-raffles").on('click', function() {

            var id = $(this).data('id')
            var user_name = $(this).data('name')
            var user_surname = $(this).data('surname')
            var user_email = $(this).data('email')
            var user_cpf = $(this).data('cpf')
            var user_ddd = $(this).data('ddd')
            var user_phone = $(this).data('phone')
            var user_credit = $(this).data('credit')


            // getUpdateCategory(raffles_category)
            // getUpdatePublish(raffles_status_publish,raffles_id)

            $('#update_id').val(id)
            $('#update_user_name').val(user_name)
            $('#update_user_surname').val(user_surname)
            $('#update_user_email').val(user_email)
            $('#update_user_cpf').val(user_cpf)
            $('#update_user_ddd').val(user_ddd)
            $('#update_user_phone').val(user_phone)
            $('#update_user_credit').val(user_credit)

            $('#update_user_title').text(user_name + " " + user_surname)

            


            $('#openModalEdit').click()


        })
    </script>

   
</body>
</html>