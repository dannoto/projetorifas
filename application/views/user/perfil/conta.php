<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Conta</title>
    <?php $this->load->view('comp/css');?>
</head>
<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar');?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar');?>

   

    <section>
        <br><br>
        <div class="faq-container">
            <h1 style="font-size:25px ;" class="text-xl text-5x1 font-semibold text-white xl:ml-64 ml-12">Minhas Informações</h1>
        </div>
        <section class="faq-container">

        <div class="grid place-items-center mb-8  registro xl:m-0 m-8">

           <form id="update-form" action="">

                <div class="grid grid-cols-2 mt-8">
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">Nome</label>
                        <input type="text" name="user_name" required value="<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_name']?>" class="pl-2" maxlength="200" placeholder="Nome">
                    </div>
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">Sobrenome</label>
                        <input type="text" name="user_surname" required class="pl-2" maxlength="200" value="<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_surname']?>"  placeholder="Sobrenome">
                    </div>
                </div>

                <div class="grid grid-cols-1">
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">E-mail</label>
                        <input type="email" name="user_email" required class="pl-2" value="<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_email']?>"  maxlength="200" placeholder="exemplo@email.com">
                    </div>
                </div>
               

                <div class="grid grid-cols-3">
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">DDD</label>
                        <input type="text" data-mask="(99)" id="user_ddd" name="user_ddd" required  minlength="4" maxlength="4" value="<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_ddd']?>"  class="pl-2" placeholder="(XX)">
                    </div>
                    <div class="col-span-2 m-2">
                        <label for="" class="text-white">Número de Telefone</label>
                        <input type="text" data-mask="99999-9999" id="user_phone" name="user_phone" minlength="10" maxlength="10" required class="pl-2" value="<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_phone']?>"   placeholder="XXXXX-XXXX">
                    </div>
                </div>

                <div class="m-2">
                    <button class="bg-orange text-white  font-semibold">ATUALIZAR</button>
                </div>

           </form>
        </div>
        </section>
    </section>

        
    <!-- Footer -->
        <?php $this->load->view('comp/Footer');?>
    <!-- Footer -->
    <?php $this->load->view('comp/js');?>
    <script src="<?=base_url() ?>assets/faq/main.js"></script>

    <script>
        var faq = document.getElementsByClassName("faq-page");
        var i;

        for (i = 0; i < faq.length; i++) {
            faq[i].addEventListener("click", function () {
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
                url: '<?=base_url() ?>registro/update_user',
                data: $(this).serialize(),
                success: function (data) {
                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        swal(resp.message)
                    } else {
                        swal(resp.message)
                    }
                },
                error: function (data) {
                    swal('Ocorreu um erro temporário.');
                    console.log(data);
                },
            });
        

        })

    </script>


</body>
</html>