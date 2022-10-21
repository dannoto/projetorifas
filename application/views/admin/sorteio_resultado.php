<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meus Sorteios</title>
    <?php $this->load->view('comp/css');?>

</head>
<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/navbar');?>
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/sidebar');?>

    <section>

        <!-- <div class=" xl:ml-36 xl:mr-36 xl: mt-12 m-3 perfil-sorteios-breadcumb">
            <h1 class="text-white font-bold text-xl text-3x1">Gerenciar Sorteios</h1>
            <p class="text-white xl:font-semibold">Gerencia todos os seus sorteios.</p>
            <button class="text-orange text-white font-semibold px-3 py-2 border border-orange mt-2"  id="myBtn">+ CRIAR SORTEIO</button>
            <button  class="text-orange text-white font-semibold px-3 py-2 border border-orange hidden mt-2"  id="openModalEdit">+ EDITAR SORTEIO</button>

        </div> -->
        
        <div class="grid xl:grid-cols-1 xl:ml-36 xl:mr-36 xl:mt-12">
            
            
            <div class="col-span-1 xl:m-0 m-3 ">

                    <?php $raffle = $this->raffles_model->getRaffle($winner['winner_raffle']) ?>
                    <?php $winner_user = $this->user_model->getUserById($winner['winner_user']) ?>

                    <div>
                        <a href="<?=base_url() ?>painel/sorteios">
                            <span class="text-white font-semibold"> <i class="fas fa-chevron-left text-white mr-3"></i> VOLTAR AOS SORTEIOS</span>
                        </a>
                    </div>
                    <a href="<?=base_url() ?>sorteio/<?=$raffle['id']?>">
                    <p class="text-white mt-5 font-bold text-center text-yellow-500" style="font-size: 30px;"><?=$raffle['raffles_title']?></p>

                    </a>

                        <br>
                       <center> <i class="fal fa-trophy ml-3 text-center text-white" style="font-size: 70px"></i></center>
                       <br>
                        <h2 class="text-white font-bold text-xl text-3x1 text-center">DATA DO SORTEIO</h2>
                        <h1  class="text-white font-bold text-xl text-3x1 text-green-500 text-center"><?=$winner['winner_date']?> às  <?=$winner['winner_time']?></h1>

                       <br>
                        <h2 class="text-white font-bold text-xl text-3x1 text-center">VENCEDOR</h2>
                    <h1  class="text-white font-bold text-xl text-3x1 text-green-500 text-center"><?=$winner_user['user_name']?> <?=$winner_user['user_surname']?></h1>
                    <br>
                        <h2 class="text-white font-bold text-xl text-3x1 text-center">TICKET SORTEADO</h2>
                        <h1  class="text-white font-bold text-xl text-3x1 text-center text-green-500 mt-3" style="font-size: 50px;"><?=$winner['winner_ticket']?></h1>

               
            </div>
        </div>
        <br><br>
    </section>



    <?php $this->load->view('comp/js');?>


 
  
</body>
</html>