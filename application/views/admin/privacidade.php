<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meus Sorteios</title>
    <?php $this->load->view('comp/css');?>

</head>

<style>

     .input {
        width: 100%;
        border:1px solid orange;
        height: 40px;
        background-color:#1c1c27 ;
        padding: 12px;
        color:#FFF;
     }
</style>
<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/navbar');?>
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/sidebar');?>

    <section>

        <div class=" xl:ml-36 xl:mr-36 xl: mt-12 m-3 perfil-sorteios-breadcumb">
            <h1 class="text-white font-bold text-xl text-3x1">Gerenciar Privacidade</h1>
            <p class="text-white xl:font-semibold">Edite seus privacidade.</p>
           
            <button  class="text-orange text-white font-semibold px-3 py-2 border border-orange hidden mt-2"  id="openModalEdit">+ EDITAR SORTEIO</button> 

        </div>
        
        <div class="grid xl:grid-cols-1 xl:ml-36 xl:mr-36 xl:mt-12">
            
            
            <div class="col-span-1 xl:m-0 m-3">

                <form id="update-form">

                        <input type="text" class="form-control input" name="privacy_title" required value="<?=$this->admin_model->getPrivacy()['privacy_title']?>"><br><br>

                        <textarea name="privacy_content"  class="form-control input"  required style="height: 500px;"><?=$this->admin_model->getPrivacy()['privacy_content']?></textarea>
                
                        <br><br>
                        <button type="submit" class="px-3 py-2 w-full bg-green-500 text-white font-semibold">ATUALIZAR</button>
                        <br><br>
                 </form>
               
            </div>
        </div>
        <br><br>
    </section>





 
    <?php $this->load->view('comp/js');?>
    <script>
        
        $("#update-form").submit(function(e) {

            e.preventDefault();    

            var formData = $(this).serialize();

            $.ajax({
                url: '<?=base_url()?>painel/updateprivacy',
                type: 'POST',
                data: formData,
                success: function (data) {

                    var resp = JSON.parse(data)
    
                    if (resp.status == "true") {
                        swal(resp.message)
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

   
</body>
</html>