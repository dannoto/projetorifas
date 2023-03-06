<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Login</title>
    <?php $this->load->view('comp/css'); ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.theme.default.min.css">
</head>
<style>
    .checked {
        color: green;
    }

    .highlight-selected-category {
        border-radius: 16px;
        background-color: #FFBD0A;
        opacity: 0.8;
        color: #FFF !important;
    }

    .category-text-select {
        cursor: pointer;
        font-size: 20px;
        color: #FFF !important;
        opacity: 0.8;
        margin-bottom: 10px;
        margin-right: 10px;
    }
</style>
<style>
    .related {
        transition: transform .2s;
        /* Animation */
        cursor: pointer;
        border-radius: 12px;

    }

    .related:hover {
        transform: scale(1.03);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>

<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar'); ?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar'); ?>

    <!-- Banners -->
    <section>
        <div id="" class="mt-10 mb-5">
            <div class="grid xl:grid-cols-1 grid-cols-1 xl:mr-12 xl:ml-12">


                <?php foreach ($this->raffles_model->getRafflesFeatured()  as $t) { ?>
                    <a href="<?= base_url() ?>sorteio/<?= $t->id ?>">
                        <div class="xl:col-span-1 col-span-1 xl:m-0 m-3 " style="position:relative;z-index: 1;">
                            <!-- <div class="ml-5 mr-5">
                                <img src="<?= base_url() ?>assets/img/raffles/<?= $t->raffles_image ?>" style="width:100%;max-width:100%;object-fit:cover;height:300px;" alt="">
                                </div> -->


                            <div class="ml-5 mr-5 p-3 bg-darkLight mb-5" style="background-image:url(<?= base_url() ?>assets/img/raffles/<?= $t->raffles_image ?>);background-repeat:none; height:350px;object-fit:cover;background-position:center">
                                <div style="background-color:black;opacity:0.7;height:350px;left:0;right:0;top:0;position:absolute;width:97%;z-index: 2;margin-left:1.6%">

                                </div>
                                <div class="xl:w-1/3 xl:ml-12" style="z-index: 9999;position:absolute">
                                    <p class="text-xl py-2 mt-12 mb-3 text-white font-bold line-clamp-2" style="font-size:45px"><?= $t->raffles_title ?></p>
                                    <p class="text-orange text-xl tbaset-xl font-bold" style="font-size:25px">R$ <?= $t->raffles_tickets_value ?></p>
                                    <div class="progress mt-3 progress-square" style="height: 0.5rem; max-height: 8px !important; border-radius: 8px; background-color: rgba(255, 189, 10, 0.2)">
                                        <div class="progress-bar progress-square" role="progressbar" style="width: <?= $t->raffles_progress ?>%; background-color: #FFBD0A; max-height: 8px !important; height: 0.5rem; border-radius: 8px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="entries_left mt-3 flex justify-between raffle_card_subtitle">
                                        <div class="flex">
                                            <small class="text-white"> <i class="fas fa-ticket-alt mr-2" style="transform: rotate(-45deg); font-size: 11px;" aria-hidden="true"></i>
                                                <?= count($this->payments_model->checkBuyedTickets($t->id, null)) ?> / <?= $t->raffles_tickets ?> </small>
                                        </div>
                                        <div class="">
                                            <small class="text-white"><i class="fas text-white fa-clock mr-1" aria-hidden="true"></i><?= $t->raffles_progress ?> %</small>

                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button style="border-radius:5px" class="text-black font-semibold bg-yellow-500 px-3 py-2">PARTICIPAR</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>

                <?php }  ?>

            </div>

    </section>
    <!-- Banners -->
    <!-- Estatisticas -->
    <section>

    </section>
    <!-- Estatisticas -->
    <br>
    <!-- Depoimentos -->
    <section class=" mb-5 xl:ml-20 mr-8 ml-8" >

        <div>
            <p class="text-white mb-5 font-semibold text-left text-xl xl:mb-3" style="font-size:35px;">Depoimentos</p>
        </div>
        <div class="grid xl:grid-cols-4 grid-cols-1 mb-3 mt-3" >


            <div class="owl-carousel col-span-4">

                <?php foreach ($this->admin_model->getDepoimentos() as $p) { ?>


                    <div class="text-white">
                        <div>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <!-- <p class="line-clamp-1 mt-1 mb-1 font-semibold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos?</p> -->
                        <p class="justify line-clamp-3"><small><?= $p->depoimentos_content ?></small></p>
                        <small class="font-semibold"><?= $p->depoimentos_title ?> </small>
                    </div>


                <?php } ?>

            </div>
        </div>
    </section>
    <!-- Depoimentos -->


    <!-- Sorteios -->
    <br>
    <section class="mt-8">
        <div class="flex justify-between xl:mr-20 xl:ml-20 xl:flex hidden mr-8 ml-8">
            <div class=" ">
                <p class="text-white font-semibold text-center text-xl" style="font-size:35px;">Lista de Sorteios</p>
            </div>
            <div class="  ">
                <ul class="flex">
                    <li class=" nav-menu text-gray-500  highlight-selected-category category-text-select  mr-5 p-3 font-semibold text-xl " style="cursor:pointer;border-radius: 20px;" id="all">Todos</li>
                    <li class=" nav-menu text-gray-500 mr-5 p-3  text-xl font-semibold " style="cursor:pointer;border-radius: 20px;" id="1">Dinheiro</li>
                    <li class=" nav-menu text-gray-500 mr-5 p-3  text-xl font-semibold " style="cursor:pointer;border-radius: 20px;" id="2">Tecnologia</li>
                    <li class=" nav-menu text-gray-500 mr-5 p-3  text-xl font-semibold " style="cursor:pointer;border-radius: 20px;" id="3">Eletrodoméstico</li>
                    <li class=" nav-menu text-gray-500 mr-5 p-3  text-xl font-semibold " style="cursor:pointer;border-radius: 20px;" id="6">Viagens</li>

                    <li class=" nav-menu text-gray-500 mr-5 p-3  text-xl font-semibold " style="cursor:pointer;border-radius: 20px;" id="others">Outros</li>
                </ul>
            </div>
        </div>
        <div class="mr-8 ml-8 xl:hidden block">
            <div>
                <p class="text-white font-semibold text-center text-xl" style="font-size:25px;">Lista de Sorteios</p>
            </div>
            <div class="  ">
                <ul class="block mt-5">
                    <li class="nav-menu highlight-selected-category category-text-select  mr-5 p-3 font-semibold text-xl " style="cursor:pointer;border-radius: 12px;" id="all">Todos</li>
                    <li class="nav-menu text-gray-500 mr-5 p-3  text-xl font-semibold " style="cursor:pointer;border-radius: 12px;" id="1">Dinheiro</li>
                    <li class="nav-menu text-gray-500 mr-5 p-3  text-xl font-semibold " style="cursor:pointer;border-radius: 12px;" id="2">Tecnologia</li>
                    <li class="nav-menu text-gray-500 mr-5 p-3  text-xl font-semibold " style="cursor:pointer;border-radius: 12px;" id="3">Eletrodoméstico</li>
                    <li class=" nav-menu text-gray-500 mr-5 p-3  text-xl font-semibold " style="cursor:pointer;border-radius: 20px;" id="6">Viagens</li>

                    <li class="nav-menu text-gray-500 mr-5 p-3  text-xl font-semibold " style="cursor:pointer;border-radius: 12px;" id="others">Outros</li>
                </ul>
            </div>

        </div>
        <div class="mt-10 " id="sorteios">
            <div class="grid xl:grid-cols-4 grid-cols-1 xl:mr-12 xl:ml-12  nav-response nav-response-all">


                <?php foreach ($this->raffles_model->getRaffles()  as $t) { ?>
                    <a href="<?= base_url() ?>sorteio/<?= $t->id ?>">
                        <div class="xl:col-span-1 col-span-1 xl:m-0 m-3 related">
                            <div class="ml-5 mr-5">
                                <img src="<?= base_url() ?>assets/img/raffles/<?= $t->raffles_image ?>" style="width:100%;max-width:100%;object-fit:cover;height:300px;" alt="">
                            </div>
                            <div class="ml-5 mr-5 p-3 bg-darkLight mb-5">
                                <h1 class="text-xl text-white font-bold line-clamp-2"><?= $t->raffles_title ?></h1>
                                <p class="text-orange text-xl tbaset-xl font-semibold">R$ <?= $t->raffles_tickets_value ?></p>
                                <div class="progress mt-3 progress-square" style="height: 0.5rem; max-height: 8px !important; border-radius: 8px; background-color: rgba(255, 189, 10, 0.2)">
                                    <div class="progress-bar progress-square" role="progressbar" style="width: <?= $t->raffles_progress ?>%; background-color: #FFBD0A; max-height: 8px !important; height: 0.5rem; border-radius: 8px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="entries_left mt-3 flex justify-between raffle_card_subtitle">
                                    <div class="">
                                        <small class="text-gray-400"><i class="fas text-gray-400 fa-clock mr-1" aria-hidden="true"></i><?= $t->raffles_progress ?> %</small>

                                    </div>
                                    <div class="flex">
                                        <small class="text-gray-400"> <i class="fas fa-ticket-alt mr-2" style="transform: rotate(-45deg); font-size: 11px;" aria-hidden="true"></i>
                                            <?= count($this->payments_model->checkBuyedTickets($t->id, null)) ?> / <?= $t->raffles_tickets ?> </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                <?php }  ?>

            </div>

        </div>
        <div class=" ">
            <div class="grid xl:grid-cols-4 grid-cols-1 xl:mr-12 xl:ml-12  nav-response nav-response-1">
            </div>
        </div>
        <div class="">
            <div class="grid xl:grid-cols-4 grid-cols-1 xl:mr-12 xl:ml-12  nav-response nav-response-2">
            </div>
        </div>
        <div class="">
            <div class="grid xl:grid-cols-4 grid-cols-1 xl:mr-12 xl:ml-12  nav-response nav-response-3">
            </div>
        </div>
        <div class="">
            <div class="grid xl:grid-cols-4 grid-cols-1 xl:mr-12 xl:ml-12  nav-response nav-response-6">
            </div>
        </div>
        <div class=" ">
            <div class="grid xl:grid-cols-4 grid-cols-1 xl:mr-12 xl:ml-12  nav-response nav-response-others">
            </div>
        </div>
    </section>
    <!-- Sorteios -->



    <!-- Footer -->
    <?php $this->load->view('comp/Footer'); ?>
    <!-- Footer -->
    <?php $this->load->view('comp/js'); ?>
    <script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });
    </script>

    <script>
        $('#form-login').submit(function(e) {

            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>login/auth',
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
                },
            });
        })
    </script>

    <script>
        $('.nav-menu').on('click', function(e) {
            var raffles_category = $(this).attr('id')

            $('.nav-response').css('display', 'none');
            $('.nav-response-' + raffles_category).css('display', 'grid');


            $('.nav-menu').removeClass('highlight-selected-category')
            $('.nav-menu').removeClass('category-text-select')


            $('#' + raffles_category).addClass('highlight-selected-category')
            $('#' + raffles_category).addClass('category-text-select')



            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>home/getRafflesByCategory',
                data: {
                    raffles_category: raffles_category
                },
                success: function(data) {


                    $('.nav-response-' + raffles_category).html("")
                    $('.nav-response-' + raffles_category).append(data)

                },
                error: function(data) {
                    swal('Ocorreu um erro temporário.');
                },
            });



        })
    </script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,

            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    dots: false,
                    dotsEach: false,
                },
                600: {
                    items: 3,
                    nav: true,
                    dots: false,
                    dotsEach: false,
                },
                1000: {
                    items: 4,
                    nav: false,
                    loop: true,
                    dots: false,
                    dotsEach: false,
                }
            }
        })
    </script>
</body>

</html>