<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Vencedores</title>
    <?php $this->load->view('comp/css'); ?>
</head>

<?php

// setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
// date_default_timezone_set('America/Sao_Paulo');

// echo strftime('%A, %d de %B de %Y', strtotime('today'));

// $mounth = strftime(' %B / %Y', strtotime('today'));

$mounth = array(
    '01' => 'Janeiro',
    '02' => 'Fevereiro',
    '03' => 'Março',
    '04' => 'Abril',
    '05' => 'Maio',
    '06' => 'Junho',
    '07' => 'Julho',
    '08' => 'Agosto',
    '09' => 'Setembro',
    '10' => 'Outubro',
    '11' => 'Novembro',
    '12' => 'Dezembro'
);


?>

<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar'); ?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar'); ?>

    <section class="grid place-items-center vencedores">
        <div>
            <h1 class="text-white font-semibold"> Vencedores de <?= $mounth[date('m')] ?> / <?= date('Y') ?></h1>

        </div>
        <!-- <div class="vencedores-busca mt-5 mb-5">
            <form action="">
                <input type="text" class="p-2 bg-darkLight text-white" placeholder="Busque o vencedor pelo nome">
            </form>
        </div> -->

        <?php if (count($this->raffles_model->getWinners(date('m-Y'))) > 0) { ?>

            <div class="grid grid-cols-1 xl:grid-cols-2 vencedores-field">

                <?php foreach ($this->raffles_model->getWinners(date('m-Y')) as $w) { ?>

                    <?php $raffle = $this->raffles_model->getRaffle($w->winner_raffle); ?>
                    <?php $winner = $this->user_model->getUserById($w->winner_user); ?>

                    <a href="<?= base_url() ?>sorteio/<?= $w->winner_raffle ?>">
                        <div class="col-span-1 m-2 mt-5">
                            <div class="grid xl:grid-cols-3 grid-cols-2 col-span-3  border-b border-orange ">
                                <div class="xl:col-span-1">
                                    <img src="<?= base_url() ?>assets/img/raffles/<?=$raffle['raffles_image']?>" alt="">
                                </div>
                                <div class="xl:col-span-2 xl:ml-2">
                                    <h1 class="text-orange font-semibold text-base line-clamp-1"><?=$raffle['raffles_title'] ?></h1>
                                    <p class="text-white line-clamp-1 mt-5 "><i class="fal fa-trophy ml-3 "></i> <?= $winner['user_name'] ?></p>
                                    <p class="text-white"><i class="fal fa-calendar text-white ml-3 mr-3 "> </i><?= $w->winner_date ?></p>
                                </div>
                            </div>
                        </div>
                    </a>

                <?php } ?>


            </div>

        <?php } else { ?>

            <div class="grid vencedores-field">

                <br><br><br><br>

                <center>
                    <p class="text-white uppercase ">NENHUM VENCEDOR NO MÊS DE <?= $mounth[date('m')] ?>.</p>
                </center>

                <br><br><br><br>


            </div>

        <?php } ?>

    </section>

    <!-- Footer -->
    <?php $this->load->view('comp/Footer'); ?>
    <!-- Footer -->
    <?php $this->load->view('comp/js'); ?>

</body>

</html>