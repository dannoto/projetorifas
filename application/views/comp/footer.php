

<section class=" footer  mt-12 ">
    <div class="xl:ml-36 xl:mr-36 xl:m-5 footer-payments  grid xl:grid-cols-4 grid-cols-1 place-items-center">
        <div class="xl:col-span-1 col-span-1 xl:mt-0 mt-3">
            <img src="<?=base_url()?>assets/img/icons/mais18.png" alt="">
        </div>
        <div class="xl:col-span-2 col-span-1 xl:mt-0 mt-3">
            <img src="<?=base_url()?>assets/img/icons/bandeiras.png" alt="">
        </div>
        <!-- <div class="xl:col-span-1 col-span-1 xl:mt-0 mt-3">
            <img src="<?=base_url()?>assets/img/icons/paypal.png" alt="">
        </div> -->
        <div class="xl:col-span-1 col-span-1 xl:mt-0 mt-3">
            <img src="<?=base_url()?>assets/img/icons/mercadopago.png" alt="">
        </div>
    </div>

    <div class=" mt-12 xl:ml-32 xl:mr-32 xl:m-5 footer-links  " >

        <div class="grid xl:grid-cols-6 ">
            <div class="xl:col-span-2  grid place-items-center ">
                <div class=" ">
                    <img class="footer-logo m-auto" src="<?=base_url()?>assets/img/<?= $this->admin_model->getConfiguracoes()['configuracoes_logo'] ?>" alt="">
                </div>
                <div class="m-auto  ">
                    <ul class="flex  ">
                        <li class="ml-3">
                            <a href="<?= $this->admin_model->getConfiguracoes()['configuracoes_social_facebook'] ?>">
                                <img src="<?=base_url()?>assets/img/icons/facebook.svg" alt=""></li>
                            </a>
                        <li class="ml-3">
                            <a href="<?= $this->admin_model->getConfiguracoes()['configuracoes_social_instagram'] ?>">
                                <img src="<?=base_url()?>assets/img/icons/instagram.svg" alt=""></li>
                            </a>
                        <li class="ml-3">
                            <a href="<?= $this->admin_model->getConfiguracoes()['configuracoes_social_twitter'] ?>">
                                <img src="<?=base_url()?>assets/img/icons/twitter.svg" alt=""></li>
                            </a>
                    </ul>
                </div>

            </div>
            <div class="xl:col-span-1  ">
                <h1>Links</h1>
                <ul>
                    <li> <a href="<?=base_url()?>perfil/sorteios"> Meus Sorteios </a></li>
                    <li> <a href="<?=base_url()?>vencedores"> Vencedores </a></li>
                    <li> <a href="<?=base_url()?>perfil/conta"> Conta </a></li>
                    <li> <a href="<?=base_url()?>termos"> Jogo Responsável </a></li>
                </ul>
            </div>
            <div class="xl:col-span-1">
                <h1>Informações</h1>
                <ul>
                    <li> <a href="<?=base_url()?>ajuda"> Ajuda </a></li>
                    <li> <a href="<?=base_url()?>termos"> Termos </a></li>
                    <li> <a href="<?=base_url()?>privacidade"> Privacidade </a></li>
                    <!-- <li> <a href="<?=base_url()?>"> Trabalhe Conosco </a></li> -->
                </ul>

            </div>
            <div class="xl:col-span-1">
                <h1>Categorias</h1>
                <ul>
                    <li> <a href="<?=base_url()?>#sorteios"> Dinheiro </a></li>
                    <li> <a href="<?=base_url()?>#sorteios"> Tecnologia </a></li>
                    <li> <a href="<?=base_url()?>#sorteios"> Viagens </a></li>
                    <li> <a href="<?=base_url()?>#sorteios"> Eletrodomésticos </a></li>
                </ul>
            </div>
            <div class="xl:col-span-1">
                <h1>Contato</h1>
                <ul>    
                                    
                    <li><i class="fas fa-phone ml-2"></i> <?= $this->admin_model->getConfiguracoes()['configuracoes_contato_telefone'] ?></li>
                    <li><i class="fas fa-envelope ml-2"></i> <?= $this->admin_model->getConfiguracoes()['configuracoes_contato_email'] ?></li>
                    
                </ul>
            </div>
        
        </div>

    </div>
</section>