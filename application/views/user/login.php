<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login</title>
    <?php $this->load->view('comp/css');?>
</head>
<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar');?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar');?>

    <section>
        <div class="grid place-items-center xl:mr-44 xl:ml-44  login xl:m-0 m-8">
            
            <form action="" class="" id="form-login">
                <div>
                    <h1 class="text-white font-bold">Login</h1>
                    <p class="text-white text-xl mt-10 mb-2 font-semibold">Não tem uma conta? <a href="<?=base_url()?>registro"><span class="text-orange font-semibold">Registrar-se</span></a></p>
                </div>
                
                <input type="email" name="user_email" class="p-2" required placeholder="E-mail">
                <input type="password" name="user_password" class="p-2"  required placeholder="Senha">

                <button class="bg-orange text-white font-semibold">ENTRAR</button>

                <div>
                    <p class="text-white text-xl mt-5 mb-28">Esqueceu sua senha? <a href="<?=base_url()?>recuperacao"><span class="text-orange font-semibold">Recuperar</span></a></p>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
        <?php $this->load->view('comp/Footer');?>
    <!-- Footer -->
        <?php $this->load->view('comp/js');?>

        <script>
            $('#form-login').submit(function(e) {

                e.preventDefault()

                $.ajax({
                    method: 'POST',
                    url: '<?=base_url() ?>login/auth',
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
                    },
                });
            })

        </script>
</body>
</html>