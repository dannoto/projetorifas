<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Recuperação</title>
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
                    <h1 class="text-white font-bold">Recuperação</h1>
                    <p class="text-white text-xl mt-5 mb-8 ">Insira seu e-mail para recuperar.</span></a></p>
                </div>
                
                <input type="email" name="user_email" required class="p-2" placeholder="E-mail">

                <button class="bg-orange text-white  font-semibold  font-semibold">RECUPERAR</button>

            
            </form>
        </div>
    </section>

    <!-- Footer -->
        <?php $this->load->view('comp/Footer');?>
        <?php $this->load->view('comp/js');?>
        <script>

    $('#form-recovery').submit(function(e) {

        e.preventDefault()
    

           
            $.ajax({
                 method: 'POST',
                 url: '<?=base_url() ?>recuperacao/sendRecoveryEmail',
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

    <!-- Footer -->
</body>
</html>