<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Banimento</title>
    <?php $this->load->view('comp/css'); ?>

</head>
<style>
    .body-bg-alt {
        background-color: #28293D;
    }

    #selected-tickets {
        width: 400px;
        max-width: 400px;
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        padding: 15px
    }

    @media (max-width:820px) {
        #selected-tickets {
            width: 250px;
            max-width: 250px;
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding: 15px
        }
    }

    #selector-groups,
    #selected-tickets {
        border-radius: 16px;
    }

    .selected-ticket {
        user-select: none;
        background-color: #FFBD0A;
        border-radius: 16px;
        font-family: Nunito;
        font-size: 16px;
        font-weight: 600;
        color: #FFFFFF;
        padding: 0px 8px;
        cursor: pointer;
        margin-right: 10px;
    }
</style>

<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar'); ?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar'); ?>


        <section>
            <div class="text-center bg-darkLight" style="height:300px">
                <p class="text-white text-xl font-semibold uppercase pt-20">Você foi banido!</p>
                <br>

                <p class="text-white uppercase"><small>Você descumpriu regras dos <a style="font-weight:600" href="<?=base_url()?>termos">Termos & Condições</a>. <br>Portanto, sua conta foi banida permanentemente.</small></p>


                <!-- <a href="<?= base_url() ?>sair">
                    <button class="bg-orange text-black mt-5 mb-20 px-3 py-2"> <small><i class="fas fa-chevron-left "></i> SAIR</small></button>
                </a> -->
            </div>
        </section>


    <!-- Footer -->
    <?php $this->load->view('comp/Footer'); ?>
    <!-- Footer -->
    <?php $this->load->view('comp/js'); ?>


</body>

</html>