<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Registre-se</title>
    <?php $this->load->view('comp/css');?>
</head>
<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar');?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar');?>

    
    <section>
        <div class="grid place-items-center xl:mr-44 xl:ml-44 registro xl:m-0 m-8">
            
            <form action="<?=base_url() ?>registro/add_user" method="POST" id="form-register">
                <div>
                    <h1 class="text-white font-bold">Registre-se</h1>
                    <p class="text-white text-xl mt-2 mb-5 ">Já tem uma conta? <a href="<?=base_url()?>login"><span class="text-orange font-semibold">Login</span></a></p>
                </div>
                
                <div class="grid grid-cols-2">
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">Nome</label>
                        <input type="text" name="user_name" required class="pl-2" maxlength="200" placeholder="Nome">
                    </div>
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">Sobrenome</label>
                        <input type="text" name="user_surname" required class="pl-2" maxlength="200"  placeholder="Sobrenome">
                    </div>
                </div>

                <div class="grid grid-cols-1">
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">E-mail</label>
                        <input type="email" name="user_email" required class="pl-2" maxlength="200" placeholder="exemplo@email.com">
                    </div>
                </div>
                <div class="grid grid-cols-1">
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">CPF</label>
                        <input type="text" id="user_document" data-mask="999.999.999-99"  minlength="14" maxlength="14" name="user_document" required class="pl-2" >
                    </div>
                </div>

                <div class="grid grid-cols-3">
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">DDD</label>
                        <input type="text" data-mask="(99)" id="user_ddd" name="user_ddd" required  minlength="4" maxlength="4" class="pl-2" placeholder="(XX)">
                    </div>
                    <div class="col-span-2 m-2">
                        <label for="" class="text-white">Número de Telefone</label>
                        <input type="text" data-mask="99999-9999" id="user_phone" name="user_phone" minlength="10" maxlength="10" required class="pl-2"  placeholder="XXXXX-XXXX">
                    </div>
                </div>

                <div class="grid grid-cols-2">
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">Senha</label>
                        <input type="password" name="user_password" id="user_password" required class="pl-2" minlength="6" maxlength="200" placeholder="******">
                    </div>
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">Confirm. da Senha</label>
                        <input type="password" name="user_password_confirm" id="user_password_confirm" required class="pl-2" minlength="6" maxlength="200"  placeholder="******">
                    </div>
                </div>

                <div class="m-2">
                    <button class="bg-orange text-white  font-semibold">CRIAR UMA CONTA</button>
                </div>

          
            </form>
        </div>
    </section>

    <!-- Footer -->
        <?php $this->load->view('comp/Footer');?>
        <?php $this->load->view('comp/js');?>
       

    <!-- Footer -->

    <script>

    $('#form-register').submit(function(e) {

        var user_document = $('#user_document').val()
        var user_ddd = $('#user_ddd').val()
        var user_phone = $('#user_phone').val()
        var user_password = $('#user_password').val()
        var user_password_confirm = $('#user_password_confirm').val()

        e.preventDefault()
    

        if (user_document.length !== 14) {
  
            
           swal('Preencha o CPF corretamente.')

        } else if (user_ddd.length !== 4) {

           swal('Preencha o DDD corretamente.')

        } else if (user_phone.length !== 10) {

           swal('Preencha seu telefone corretamente.')

        } else if (user_password !== user_password_confirm) {

           swal('Suas senhas não combinam.')

        } else {

           
            $.ajax({
                 method: 'POST',
                 url: '<?=base_url() ?>registro/add_user',
                 data: $(this).serialize(),
                 success: function (data) {
                     var resp = JSON.parse(data)

                     if (resp.status == "true") {
                        window.location.href = '<?=base_url()?>'
                     } else {
                       swal(resp.message)
                     }
                 },
                 error: function (data) {
                    swal('Ocorreu um erro temporário.');
                     console.log(data);
                 },
            });
        }

    })


        
    </script>
</body>
</html>