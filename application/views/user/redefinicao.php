<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Redefinição</title>
    <?php $this->load->view('comp/css');?>
</head>
<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar');?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar');?>

    
    <section>
        <div class="grid place-items-center xl:mr-36 xl:ml-36 recuperacao xl:m-0 m-8">
            
            <form action="" id="form-recovery" class="mb-28 recuperacao-form">
                <div>
                    <h1 class="text-white font-bold">Nova Senha</h1>
                    <!-- <p class="text-white text-xl mt-5 mb-8 ">Insira seu e-mail para recuperar.</span></a></p> -->
                </div>
                <input type="hidden" name="user_token" value="<?=$user_token?>">
                <label class="text-white" for="">Senha</label>
                <input type="password" name="user_password" minlength="6"  placeholder="******" id="user_password" required class="p-2" >
                <br><br>
                <label class="text-white pt-2" for="">Confirm. da Senha</label>
                
                <input type="password" name="user_password_confirm" minlength="6"  placeholder="******" id="user_password_confirm" required class="p-2" >
                <br><br>

                <button class="bg-orange text-white  font-semibold  font-semibold">ATUALIZAR</button>

            
            </form>
        </div>
    </section>

    <!-- Footer -->
        <?php $this->load->view('comp/Footer');?>
        <?php $this->load->view('comp/js');?>
        <script>

    $('#form-recovery').submit(function(e) {

        e.preventDefault()

        var user_password = $('#user_password').val()
        var user_password_confirm = $('#user_password_confirm').val()


        if (user_password !== user_password_confirm) {

            swal("Suas senhas não combinam.")

        } else {

            $.ajax({
                 method: 'POST',
                 url: '<?=base_url() ?>redefinicao/updatePassword',
                 data: $(this).serialize(),
                 success: function (data) {
                     var resp = JSON.parse(data)
    
                     if (resp.status == "true") {
                        window.location.href = "<?=base_url() ?>login"
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

    <!-- Footer -->
</body>
</html>