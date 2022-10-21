<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meus Créditos</title>
    <?php $this->load->view('comp/css');?>

</head>
<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar');?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar');?>

    <br>
    <section class="xl:ml-64 ml-12">
        <a href="<?=base_url() ?>">
            <i style="font-size:34px" class="fas fa-chevron-left text-white"></i>
        </a>
    </section>

    <section>
            <div style="height:200px ;" class="text-center">
                    <p class="text-white mt-24">SALDO DE CRÉDITOS</p>
                    <p style="font-size:50px ;" class="font-bold text-white">R$ <?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_credit'] ?></p>
            </div>
        
    </section>

    <!-- Footer -->
        <?php $this->load->view('comp/Footer');?>
    <!-- Footer -->
        <?php $this->load->view('comp/js');?>

</body>
</html>