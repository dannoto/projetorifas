<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Registre-se</title>
    <?php $this->load->view('comp/css'); ?>
</head>


<style>
    label {
        /* margin-bottom: 0px;
        font-weight: 300; */
    }
</style>
<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar'); ?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar'); ?>


    <section class="xl:mt-32 mt-36">
        <div class="grid place-items-center xl:mr-32 xl:ml-32 registro xl:m-0 m-8">


            <form action="<?= base_url() ?>registro/add_user" method="POST" id="form-register">
                <div>
                    <h1 class="text-white font-bold">Registre-se</h1>
                    <p class="text-white text-xl mt-2 mb-5 ">Já tem uma conta? <a href="<?= base_url() ?>login"><span class="text-orange font-semibold">Login</span></a></p>
                </div>
                <input type="hidden" name="user_ref" id="user_ref" required class="pl-2">

                <div class="grid grid-cols-2">
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">Nome</label>
                        <input type="text" name="user_name" required class="pl-2" maxlength="200" placeholder="Nome">
                    </div>
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">Sobrenome</label>
                        <input type="text" name="user_surname" required class="pl-2" maxlength="200" placeholder="Sobrenome">
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
                        <input type="text" id="user_document" data-mask="999.999.999-99" minlength="14" maxlength="14" name="user_document" required class="pl-2">
                    </div>
                </div>

                <div class="grid grid-cols-3">
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">DDD</label>
                        <input type="text" data-mask="(99)" id="user_ddd" name="user_ddd" required minlength="4" maxlength="4" class="pl-2" placeholder="(XX)">
                    </div>
                    <div class="col-span-2 m-2">
                        <label for="" class="text-white">Número de Telefone</label>
                        <input type="text" data-mask="99999-9999" id="user_phone" name="user_phone" minlength="10" maxlength="10" required class="pl-2" placeholder="XXXXX-XXXX">
                    </div>
                </div>

                <div class="grid grid-cols-2">
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">Senha</label>
                        <input type="password" name="user_password" id="user_password" required class="pl-2" minlength="6" maxlength="200" placeholder="******">
                    </div>
                    <div class="col-span-1 m-2">
                        <label for="" class="text-white">Confirm. da Senha</label>
                        <input type="password" name="user_password_confirm" id="user_password_confirm" required class="pl-2" minlength="6" maxlength="200" placeholder="******">
                    </div>
                </div>
                <div class="form-group mt-3 mb-3 m-2">
                    <div>
                        <label class="form-check-label" for="id_marketing_0">
                            <small class="text-white"> Gostaria de receber atualizações emocionantes sobre sorteios, promoções de parceiros, descontos exclusivos e ingressos grátis!</small>
                        </label>
                    </div>
                    <div class="flex mt-3 space-x-10">

                        <label class="flex" for="id_marketing_0">
                            <small class="text-white">Sim</small>
                            <span class="radio"><input type="radio" name="marketing" value="True" style="margin: 0px 10px;width:18px;height:18px" autocomplete="on" id="id_marketing_0"></span>
                        </label>

                        <label class="flex" for="id_marketing_1">
                            <small class="text-white">Não</small>
                            <span class="radio"><input type="radio" name="marketing" value="False" style="margin: 0px 10px;width:18px;height:18px" autocomplete="on" id="id_marketing_1"></span>
                        </label>

                    </div>
                </div>

                <div class="m-2 mb-2">
                    <button class="bg-orange text-white  font-semibold">CRIAR UMA CONTA</button>
                </div>
                <div class="mt-2 m-3 mt-5">
                    <small class="text-white">Ao criar uma conta, você concorda que tem pelo menos 18 anos de idade, e leu, aceita e concorda com os <a href="" class="text-orange">Termos e Condições</a> e a <a href="" class="text-orange">Política de Privacidade</a>.</small>
                </div>


            </form>
        </div>
    </section>

    <!-- Footer -->
    <?php $this->load->view('comp/Footer'); ?>
    <?php $this->load->view('comp/js'); ?>


    <!-- Footer -->

    <script>
        $(document).ready(function(e) {
            if (getCookie('ref')) {

                var user_ref = getCookie('ref')

                $('#user_ref').val(user_ref)
            }
        })
    </script>
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

                // var yes
                // var no = $('#check_no').val
                var mkt = $('input[name=marketing]:checked', '#form-register').val()

                if (mkt != undefined) {

                    
                    $.ajax({
                        method: 'POST',
                        url: '<?= base_url() ?>registro/add_user',
                        data: $(this).serialize(),
                        success: function(data) {
                            var resp = JSON.parse(data)

                            if (resp.status == "true") {
                                window.location.href = '<?= base_url() ?>'
                            } else {
                                swal(resp.message)
                            }
                        },
                        error: function(data) {
                            swal('Ocorreu um erro temporário.');
                            console.log(data);
                        },
                    });

                } else {
                    swal('Marque se deseja receber nossas promoções.')
                }

            }

        })
    </script>
</body>

</html>