<?php if ($this->session->userdata('session_user')) { ?>
    <div class="navbar fixed-top">
        <!-- Desktop -->
        <div class="xl:block hidden">

        <div class="    grid xl:grid-cols-5 mt-5 ">

                <div class="xl:col-span-2">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url() ?>assets/img/<?= $this->admin_model->getConfiguracoes()['configuracoes_logo'] ?>" class="navbar-logo" alt="">
                    </a>
                </div>

                <div class="xl:col-span-3  grid place-items-end ">
                    <div class="flex">
                    <div class="ml-5">
                        <a href="<?= base_url() ?>vencedores">
                            <p class="text-white font-bold text-xl">Vencedores</p>
                        </a>
                    </div>
                    <div class="ml-8">
                        <a href="<?= base_url() ?>perfil/sorteios">
                            <p class="text-white font-bold text-xl">Meus Sorteios</p>
                        </a>
                    </div>
                    <div class="ml-8" style="cursor:pointer">
                        <a href="<?= base_url() ?>carrinho">
                            <i class="text-white fal fa-shopping-cart"></i>
                        </a>
                    </div>
                    <div class="ml-8 mr-16" style="cursor:pointer" onclick="toggleNav()">
                        <i class="text-white text-orange fal fa-user-circle "></i>
                    </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Desktop -->


        <!-- Mobile -->
        <div class="xl:hidden block">

        <div class="grid grid-cols-5  flex justify-items-center m-3 ">

                <div class="col-span-1" style="cursor:pointer">
                    <a href="<?= base_url() ?>carrinho">
                        <i class="text-white fal fa-shopping-cart pt-3"></i>
                    </a>
                </div>
                <div class="col-span-3">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url() ?>assets/img/<?= $this->admin_model->getConfiguracoes()['configuracoes_logo'] ?>" class="navbar-logo" style="object-fit:contain" alt="">
                    </a>
                </div>
                <div class="col-span-1" style="cursor:pointer" onclick="toggleNav()">
                    <i class="text-white text-orange fal fa-user-circle pt-3"></i>
                </div>

            </div>

        </div>
        <!-- Mobile -->
    </div>

<?php } else { ?>

    <div class="navbar fixed-top">
        <!-- Desktop -->
        <div class="xl:block hidden">

            <div class="    grid xl:grid-cols-5 mt-5 ">

                <div class="xl:col-span-2">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url() ?>assets/img/logo.png" class="navbar-logo" alt="">
                    </a>
                </div>

                <div class="xl:col-span-3  grid place-items-end ">
                    <div class="flex">
                        <div class="ml-5">
                            <a href="<?= base_url() ?>vencedores">
                                <p class="text-white mt-3 font-bold text-xl">Vencedores</p>
                            </a>
                        </div>
                        <div class="ml-8">
                            <a href="<?= base_url() ?>login">
                                <p class="text-white mt-3 font-bold text-xl">Login</p>
                            </a>
                        </div>
                        <div class="ml-16 mr-16 " style="cursor:pointer">
                            <a href="<?= base_url() ?>registro">
                                <button class="text-white px-5 font-semibold py-3 bg-orange" style="font-family: 'Gilroy ExtraBold', sans-serif;
    font-size: 18px;
    font-weight: 400;
    color: #ffffff !important;
    background: #FFBD0A;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    padding: 10px 20px 10px 20px;
    text-decoration: none !important;
    word-break: break-all;
    cursor: pointer;">Registrar-se</button>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- Desktop -->


        <!-- Mobile -->
        <div class="xl:hidden block">




            <div class="grid grid-cols-5  flex justify-items-center m-3 ">

                <div class="col-span-1" style="cursor:pointer">
                    <a href="<?= base_url() ?>carrinho">
                        <i style="font-size: 32px;" class="text-white fal fa-shopping-cart pt-3"></i>
                    </a>
                </div>
                <div class="col-span-3">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url() ?>assets/img/logo.png" class="navbar-logo" style="object-fit:contain" alt="">
                    </a>
                </div>
                <div class="col-span-1" style="cursor:pointer" onclick="toggleNav()">
                    <i style="font-size: 32px;" class="text-white text-orange fal fa-user-circle pt-3 "></i>
                </div>

            </div>

        </div>
        <!-- Mobile -->
    </div>
<?php } ?>