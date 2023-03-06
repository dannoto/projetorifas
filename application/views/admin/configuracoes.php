<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meus Sorteios</title>
    <?php $this->load->view('comp/css'); ?>

</head>

<style>
    .input {
        width: 100%;
        border: 1px solid orange;
        height: 40px;
        background-color: #1c1c27;
        padding: 12px;
        color: #FFF;
    }
</style>

<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/navbar'); ?>
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/sidebar'); ?>

    <section>

        <div class=" xl:ml-36 xl:mr-36 xl: mt-12 m-3 perfil-sorteios-breadcumb">
            <h1 class="text-white font-bold text-xl text-3x1">Configurações gerais</h1>
            <p class="text-white xl:font-semibold">Edite suas preferências.</p>

            <!-- <button  class="text-orange text-white font-semibold px-3 py-2 border border-orange hidden mt-2"  id="openModalEdit">+ EDITAR SORTEIO</button>  -->

        </div>

        <div class="grid xl:grid-cols-1 xl:ml-36 xl:mr-36 xl:mt-12">


            <div class="col-span-1 xl:m-0 m-3">



                <h1 class="text-white text-xl font-semibold">LOGO</h1>
                <br>

                <form id="form-update-logo">
                    <center>
                        <img src="<?= base_url() ?>assets/img/<?= $this->admin_model->getConfiguracoes()['configuracoes_logo'] ?>" alt="">
                        <input type="file" name="configuracoes_logo" id="configuracoes_logo" required>
                    </center>
                </form>

                <form id="update-form">
                    <h1 class="text-white text-xl font-semibold">CONTATO</h1>
                    <br>
                    <p class="text-white">Telefone</p>
                    <input type="text" class="form-control input" name="configuracoes_contato_telefone" required value="<?= $this->admin_model->getConfiguracoes()['configuracoes_contato_telefone'] ?>"><br><br>
                    <p class="text-white">E-mail</p>
                    <input type="email" class="form-control input" name="configuracoes_contato_email" required value="<?= $this->admin_model->getConfiguracoes()['configuracoes_contato_email'] ?>"><br><br>

                    <br>

                    <h1 class="text-white text-xl font-semibold">REDE SOCIAIS</h1>
                    <br>
                    <p class="text-white">Facebook</p>
                    <input type="text" class="form-control input" name="configuracoes_social_facebook" required value="<?= $this->admin_model->getConfiguracoes()['configuracoes_social_facebook'] ?>"><br><br>
                    <p class="text-white">Instagram</p>
                    <input type="text" class="form-control input" name="configuracoes_social_instagram" required value="<?= $this->admin_model->getConfiguracoes()['configuracoes_social_instagram'] ?>"><br><br>
                    <p class="text-white">Twitter</p>
                    <input type="text" class="form-control input" name="configuracoes_social_twitter" required value="<?= $this->admin_model->getConfiguracoes()['configuracoes_social_twitter'] ?>"><br><br>
                    <br>


                    <br><br>
                    <button type="submit" class="px-3 py-2 w-full bg-green-500 text-white font-semibold">ATUALIZAR</button>
                    <br><br>
                </form>

            </div>
        </div>
        <br><br>
    </section>






    <?php $this->load->view('comp/js'); ?>
    <script>

    $('#configuracoes_logo').on('change', function(e){
        $("#form-update-logo").submit()
        console.log('oisdsa')
    })

        $("#form-update-logo").on('submit',function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '<?= base_url() ?>painel/updatelogo',
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


        $("#update-form").submit(function(e) {

            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '<?= base_url() ?>painel/updateConfiguracoes',
                type: 'POST',
                data: formData,
                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        swal(resp.message)
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


</body>

</html>