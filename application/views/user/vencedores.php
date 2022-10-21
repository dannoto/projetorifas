<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Vencedores</title>
    <?php $this->load->view('comp/css');?>
</head>
<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar');?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar');?>

    <section class="grid place-items-center vencedores">
            <div>
                <h1 class="text-white font-semibold"> Vencedores de Julho / 2022</h1>
                
            </div>
            <div class="vencedores-busca mt-5 mb-5" >
                <form action="">
                    <input type="text" class="p-2 bg-darkLight text-white"  placeholder="Busque o vencedor pelo nome">
                </form>
            </div>
            <div class="grid grid-cols-1 xl:grid-cols-2 vencedores-field">
                <div class="col-span-1 m-2 mt-5">
                        <div class="grid xl:grid-cols-3 grid-cols-2 col-span-3  border-b border-orange ">
                            <div class="xl:col-span-1">
                                <img src="<?=base_url()?>assets/img/capa.png" alt="">
                            </div>
                            <div class="xl:col-span-2 xl:ml-2">
                                <h1 class="text-orange font-semibold text-base line-clamp-1">R$5.000 no PIX</h1>
                                <p class="text-white line-clamp-1 mt-5 "><i class="fal fa-trophy ml-3 "></i> Daniel Ribeiro</p>
                                <p class="text-white"><i class="fal fa-calendar text-white ml-3 mr-3 "> </i>18-07-2022</p>
                                
                            </div>
                        </div>
                </div>
                <div class="col-span-1 m-2 mt-5">
                        <div class="grid xl:grid-cols-3 grid-cols-2 col-span-3  border-b border-orange ">
                            <div class="xl:col-span-1">
                                <img src="<?=base_url()?>assets/img/capa-2.png" alt="">
                            </div>
                            <div class="xl:col-span-2 xl:ml-2">
                                <h1 class="text-orange font-semibold text-base line-clamp-1">PlayStation 5</h1>
                                <p class="text-white line-clamp-1 mt-5 "><i class="fal fa-trophy ml-3 "></i> Daniel Ribeiro</p>
                                <p class="text-white"><i class="fal fa-calendar text-white ml-3 mr-3 "> </i>18-07-2022</p>
                                
                            </div>
                        </div>
                </div>
                <div class="col-span-1 m-2 mt-5">
                        <div class="grid xl:grid-cols-3 grid-cols-2 col-span-3  border-b border-orange ">
                            <div class="xl:col-span-1">
                                <img src="<?=base_url()?>assets/img/capa-3.png" alt="">
                            </div>
                            <div class="xl:col-span-2 xl:ml-2">
                                <h1 class="text-orange font-semibold text-base line-clamp-1">TV de 50 Polegadas</h1>
                                <p class="text-white line-clamp-1 mt-5 "><i class="fal fa-trophy ml-3 "></i> Daniel Ribeiro</p>
                                <p class="text-white"><i class="fal fa-calendar text-white ml-3 mr-3 "> </i>18-07-2022</p>
                                
                            </div>
                        </div>
                </div>
                <div class="col-span-1 m-2 mt-5">
                        <div class="grid xl:grid-cols-3 grid-cols-2 col-span-3  border-b border-orange ">
                            <div class="xl:col-span-1">
                                <img src="<?=base_url()?>assets/img/capa.png" alt="">
                            </div>
                            <div class="xl:col-span-2 xl:ml-2">
                                <h1 class="text-orange font-semibold text-base line-clamp-1">R$5.000 no PIX</h1>
                                <p class="text-white line-clamp-1 mt-5 "><i class="fal fa-trophy ml-3 "></i> Daniel Ribeiro</p>
                                <p class="text-white"><i class="fal fa-calendar text-white ml-3 mr-3 "> </i>18-07-2022</p>
                                
                            </div>
                        </div>
                </div>
                <div class="col-span-1 m-2 mt-5">
                        <div class="grid xl:grid-cols-3 grid-cols-2 col-span-3  border-b border-orange ">
                            <div class="xl:col-span-1">
                                <img src="<?=base_url()?>assets/img/capa-2.png" alt="">
                            </div>
                            <div class="xl:col-span-2 xl:ml-2">
                                <h1 class="text-orange font-semibold text-base line-clamp-1">PlayStation 5</h1>
                                <p class="text-white line-clamp-1 mt-5 "><i class="fal fa-trophy ml-3 "></i> Daniel Ribeiro</p>
                                <p class="text-white"><i class="fal fa-calendar text-white ml-3 mr-3 "> </i>18-07-2022</p>
                                
                            </div>
                        </div>
                </div>
                <div class="col-span-1 m-2 mt-5">
                        <div class="grid xl:grid-cols-3 grid-cols-2 col-span-3  border-b border-orange ">
                            <div class="xl:col-span-1">
                                <img src="<?=base_url()?>assets/img/capa-3.png" alt="">
                            </div>
                            <div class="xl:col-span-2 xl:ml-2">
                                <h1 class="text-orange font-semibold text-base line-clamp-1">TV de 50 Polegadas</h1>
                                <p class="text-white line-clamp-1 mt-5 "><i class="fal fa-trophy ml-3 "></i> Daniel Ribeiro</p>
                                <p class="text-white"><i class="fal fa-calendar text-white ml-3 mr-3 "> </i>18-07-2022</p>
                                
                            </div>
                        </div>
                </div>
            </div>
    </section>

    <!-- Footer -->
        <?php $this->load->view('comp/Footer');?>
    <!-- Footer -->
    <?php $this->load->view('comp/js');?>

</body>
</html>