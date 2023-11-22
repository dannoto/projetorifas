<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meus Sorteios</title>
    <?php $this->load->view('comp/css');?>

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
    <?php $this->load->view('comp/navbar');?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar');?>

    <section  class="xl:mt-32 mt-24">

        <div class=" xl:ml-36 xl:mr-36 xl: mt-12 m-3 perfil-sorteios-breadcumb">
            <h1 class="text-white font-bold text-xl text-3x1">Meus Sorteios</h1>
            <p class="text-white xl:font-semibold">Acompanhe seus sorteios concluídos e em andamento.</p>

        </div>
        <div class="grid xl:grid-cols-2 xl:ml-36 xl:mr-36 xl:mt-12">
            <div class="col-span-1 xl:m-0 m-3">
                <p class="text-white text-xl">Sorteios Em Andamento</p>
                <ul class="perfil-sorteios-list xl:m-5 m-3">
                    
                    <?php if (count($this->payments_model->checkBuyedProfile(null, $this->session->userdata('session_user')['id'] )) > 0 ) { ?>

                        <?php foreach ($this->payments_model->checkBuyedProfile(null, $this->session->userdata('session_user')['id'] ) as $s ) { ?>

                            <?php if ( $this->raffles_model->getRaffle($s->raffles_id)['raffles_status_random']  == 1 || $this->raffles_model->getRaffle($s->raffles_id)['raffles_status_random']  == 2 ) { ?>
                                <?php $raffle = $this->raffles_model->getRaffle($s->raffles_id);?>
                                <a href="<?=base_url() ?>sorteio/<?=$raffle['id']?>">
                                    <li>
                                        <div class="grid xl:grid-cols-3 xl:bg-dark bg-darkLight col-span-3 border-b border-orange ">
                                            <div class="xl:col-span-1">
                                                <img src="<?=base_url()?>assets/img/raffles/<?=$raffle['raffles_image']?>" alt="">
                                            </div>
                                            <div class="xl:col-span-2 ml-2">
                                                <h1 class="text-orange font-semibold xl:mt-0 mt-3 text-xl line-clamp-1"><?=$raffle['raffles_title']?></h1>
                                                <div class="flex space-x-2 ml-5 xl:mb-0 mb-5 mt-2">
                                                    <span class="text-white"><i class="fal fa-ticket text-orange"></i> <?=count($this->payments_model->checkBuyedTickets($raffle['id'], $this->session->userdata('session_user')['id'] ))?> Tickets</span>
                                                    <i class="fa-solid fa-circle-small"></i>
                            
                                                    <span class="text-orange">●</span>
                                                    <span class="text-orange">Em Andamento</span>
                                                </div>
                                                <div class="flex m-3 ">
                                                        <div id="selected-tickets" class="body-bg-alt">
            
                                                            <?php foreach ($this->payments_model->checkBuyedTickets($raffle['id'], $this->session->userdata('session_user')['id'] ) as $t) { ?>
                                                                <div id="selected-ticket" onclick="" class="flex selected-ticket" data-n="<?= $t->ticket_number ?>"><?= $t->ticket_number ?></div>
                                                            <?php } ?>
            
                                                        </div>

                                                     </div>
                                            </div>
                                              
                                        </div>
                                    </li>
                                </a>

                            <?php }  ?>

                        <?php }  ?>

                    <?php } else { ?>

                        <li class=" border-b border-orange">
                            <p class="text-center text-white mb-3 text-md uppercase"><small>Nenhum sorteio em andamento.</small></p>
                        </li>

                    <?php } ?>
                </ul>
            </div>
            <div class="col-span-1 xl:m-0 m-3">
                <p class="text-white text-xl">Histórico de Sorteios</p>
                <ul class="perfil-sorteios-list xl:m-5 m-3">
                    <?php if (count($this->payments_model->checkBuyedProfile(null, $this->session->userdata('session_user')['id'] )) > 0 ) { ?>

                        <?php foreach ($this->payments_model->checkBuyedProfile(null, $this->session->userdata('session_user')['id'] ) as $s ) { ?>

                            <?php if ( $this->raffles_model->getRaffle($s->raffles_id)['raffles_status_random']  == 3 ||  $this->raffles_model->getRaffle($s->raffles_id)['raffles_status_random']  == 4 ) { ?>
                                <?php $raffle = $this->raffles_model->getRaffle($s->raffles_id);?>
                                <a href="<?=base_url() ?>sorteio/<?=$raffle['id']?>">
                                    <li>
                                        <div class="grid xl:grid-cols-3 xl:bg-dark bg-darkLight col-span-3 border-b border-orange ">
                                            <div class="xl:col-span-1">
                                                <img src="<?=base_url()?>assets/img/raffles/<?=$raffle['raffles_image']?>" alt="">
                                            </div>
                                            <div class="xl:col-span-2 ml-2">
                                                <h1 class="text-orange font-semibold xl:mt-0 mt-3 text-xl line-clamp-1"><?=$raffle['raffles_title']?></h1>
                                                <div class="flex space-x-2 ml-5 xl:mb-0 mb-5 mt-2">
                                                    <span class="text-white"><i class="fal fa-ticket text-orange"></i> <?=count($this->payments_model->checkBuyedTickets($raffle['id'], $this->session->userdata('session_user')['id'] ))?> Tickets</span>
                                                    <i class="fa-solid fa-circle-small"></i>
                            
                                                   <?php if($raffle['raffles_status_random'] == 4) {  ?>
                                                        <span class="text-red-500">●</span>
                                                        <span class="text-red-500">Cancelado</span>
                                                    <?php } else { ?>

                                                        <?php if($this->payments_model->checkWinner($raffle['id'], $this->session->userdata('session_user')['id'] )) {  ?>
                                                            <span class="text-green-500">●</span>
                                                            <span class="text-green-500">Venceu</span>
                                                        <?php } else { ?>

                                                            <span class="text-red-500">●</span>
                                                            <span class="text-red-500">Não Venceu</span>

                                                        <?php } ?>

                                                    <?php } ?>
                                                    

                                                </div>
                                                 <div class="flex m-3 ">
                                                        <div id="selected-tickets" class="body-bg-alt">
            
                                                            <?php foreach ($this->payments_model->checkBuyedTickets($raffle['id'], $this->session->userdata('session_user')['id'] ) as $t) { ?>
                                                                <div id="selected-ticket" onclick="" class="flex selected-ticket" data-n="<?= $t->ticket_number ?>"><?= $t->ticket_number ?></div>
                                                            <?php } ?>
            
                                                        </div>

                                                     </div>

                                            </div>
                                        </div>
                                    </li>
                                </a>

                            <?php }  ?>

                        <?php }  ?>

                    <?php } else { ?>

                        <li class="border-b border-orange">
                            <p class="text-center text-white mb-3 text-md uppercase"><small>Nenhum sorteio no histórico.</small></p>
                        </li>

                    <?php } ?>
                 
                </ul>
            </div>
        </div>
    </section>

    <!-- Footer -->
        <?php $this->load->view('comp/Footer');?>
    <!-- Footer -->
        <?php $this->load->view('comp/js');?>

</body>
</html>