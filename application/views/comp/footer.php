<!-- Desktop -->
<style>
    .cky-classic-bottom {
        bottom: 0;
        left: 0;
    }

    .cky-notice-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .cky-notice-btn-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 15px;
    }

    .cky-notice-btn-wrapper .cky-btn {
        text-shadow: none;
        box-shadow: none;
    }

    .cky-btn-customize {
        color: #1863dc;
        background: transparent;
        border: 2px solid;
        border-color: #1863dc;
        padding: 8px 28px 8px 14px;
        position: relative;
    }

    .cky-btn {
        font-size: 14px;
        font-family: inherit;
        line-height: 24px;
        padding: 8px 27px;
        font-weight: 500;
        margin: 0 8px 0 0;
        border-radius: 2px;
        white-space: nowrap;
        cursor: pointer;
        text-align: center;
        text-transform: none;
        min-height: 0;
    }

    .cky-notice-btn-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 15px;
    }

    .cky-notice-des {
        color: #212121;
        font-size: 14px;
        line-height: 24px;
        font-weight: 400;
    }

    .cky-consent-container {
        position: fixed;
        width: 100%;
        box-sizing: border-box;
        z-index: 9999999;
        height: 117px;
    }

    .cky-consent-container .cky-consent-bar {
        background: #ffffff;
        border: 1px solid;
        padding: 16.5px 24px;
        box-shadow: 0 -1px 10px 0 #acabab4d;
    }

    .cky-notice .cky-title {
        color: #212121;
        font-weight: 700;
        font-size: 18px;
        line-height: 24px;
        margin: 0 0 10px 0;
    }

    .cky-notice-des {
        color: #212121;
        font-size: 14px;
        line-height: 24px;
        font-weight: 400;
    }

    @media (max-width:1000px) {
        .cky-consent-container {
            position: fixed;
            width: 100%;
            box-sizing: border-box;
            z-index: 9999999;
            height: 217px;
        }

        .cky-notice {
            width: 1005;
            display: block;
        }

        .cky-notice-group {
            display: block;
            justify-content: space-between;
            align-items: center;
        }

        .cky-notice-btn-wrapper {
            margin-top: 15px;
        }

        .footer {
            font-size: 12px;
        }

        .footer li{
           
            font-weight: 100 !important;

        }
    }
</style>
<div class="cky-consent-container cky-classic-bottom" style="display: none;">
    <div class="cky-consent-bar" data-cky-tag="notice" style="border-color: #D4D8DF; background-color: #FFFFFF;">
        <div class="cky-notice">
            <p class="cky-title" data-cky-tag="title" style="color: #212121;">Valorizamos a sua privacidade
            </p>
            <div class="cky-notice-group">
                <div class="cky-notice-des" data-cky-tag="description" style="color: #212121;">
                    <p style="font-weight: 100 !important;">Usamos cookies para aprimorar sua experiência de navegação, veicular anúncios ou conteúdo personalizado e analisar nosso tráfego. Ao clicar em "Aceitar tudo", você concorda com o uso de cookies.
                    </p>
                </div>
                <div class="cky-notice-btn-wrapper" data-cky-tag="notice-buttons">
                    <!-- <button class="cky-btn cky-btn-customize" aria-label="Customize" data-cky-tag="settings-button" style="color: #FFBD0A; border-color: #FFBD0A; background-color: #FFFFFF;">Customize</button>  -->
                    <button class="cky-btn cky-btn-reject" aria-label="Reject All" data-cky-tag="reject-button" style="color: #FFBD0A; border:1px solid #FFBD0A; background-color: #FFFFFF;">Rejeitar Tudo</button>
                    <button class="cky-btn cky-btn-accept" aria-label="Accept All" data-cky-tag="accept-button" style="color: #FFFFFF; border-color: #FFBD0A; background-color: #FFBD0A;">Aceitar Tudo</button>
                </div>
            </div>
        </div>
    </div>

</div>

<section class="footer  mt-12 xl:block hidden ">


    <div class="xl:ml-32 xl:mr-32 xl:m-5 footer-links  ">

        <div class="grid xl:grid-cols-6 grid-cols-2  ">
            <div class="xl:col-span-2  grid place-items-center ">
                <div class=" ">
                    <img class="footer-logo m-auto" src="<?= base_url() ?>assets/img/logo.png" alt="">
                </div>
                <div class="m-auto  ">
                    <ul class="flex  ">
                        <li class="ml-3"><img src="<?= base_url() ?>assets/img/icons/facebook.svg" alt=""></li>
                        <li class="ml-3"><img src="<?= base_url() ?>assets/img/icons/instagram.svg" alt=""></li>
                        <li class="ml-3"><img src="<?= base_url() ?>assets/img/icons/twitter.svg" alt=""></li>
                    </ul>
                </div>

            </div>
            <div class="xl:col-span-1   xl:pt-0 pt-5 ">
                <h1>Links</h1>
                <ul>
                    <li style="font-weight:normal"> <a href="<?= base_url() ?>perfil/sorteios"> Meus Sorteios </a></li>
                    <li style="font-weight:normal"> <a href="<?= base_url() ?>vencedores"> Vencedores </a></li>
                    <li style="font-weight:normal"> <a href="<?= base_url() ?>perfil/conta"> Conta </a></li>
                    <li style="font-weight:normal"> <a href="<?= base_url() ?>termos"> Jogo Responsável </a></li>
                </ul>
            </div>
            <div class="xl:col-span-1  xl:pt-0 pt-5">
                <h1>Informações</h1>
                <ul>
                    <li> <a href="<?= base_url() ?>ajuda"> Ajuda </a></li>
                    <li> <a href="<?= base_url() ?>termos"> Termos </a></li>
                    <li> <a href="<?= base_url() ?>privacidade"> Privacidade </a></li>
                </ul>

            </div>
            <div class="xl:col-span-1  xl:pt-0 pt-5">
                <h1>Categorias</h1>
                <ul>
                    <li> <a href="<?= base_url() ?>#sorteios"> Dinheiro </a></li>
                    <li> <a href="<?= base_url() ?>#sorteios"> Tecnologia </a></li>
                    <li> <a href="<?= base_url() ?>#sorteios"> Viagens </a></li>
                    <li> <a href="<?= base_url() ?>#sorteios"> Eletrodomésticos </a></li>
                </ul>
            </div>
            <div class="xl:col-span-1 cols-span-2  xl:pt-0 pt-5">
                <h1>Contato</h1>
                <ul>

                    <!--<li><i class="fas fa-phone ml-2"></i> (11) 9999-9999</li>-->
                    <li><i class="fas fa-envelope ml-2"></i> sac@exemplo.com</li>

                </ul>
            </div>

        </div>

    </div>

    <div class="mt-10">
        <center>
            <small style="text-align: center !important;font-size:12px" class=" mt-5  text-white">Desenvolvido por <a style="text-align:center" class="font-semibold" href="https://ccoanalitica.com/plataformas">CCO Analítica</a></small>

        </center>
    </div>
</section>



<section class="footer  mt-12 xl:hidden block ">


    <div class="xl:ml-32 xl:mr-32 xl:m-5 footer-links  ">
        <div class="xl:col-span-1  grid place-items-center ">
            <div class=" ">
                <img class="footer-logo m-auto" src="<?= base_url() ?>assets/img/logo.png" alt="">
            </div>
            <div class="m-auto  ">
                <ul class="flex  ">
                    <li class="ml-3"><img src="<?= base_url() ?>assets/img/icons/facebook.svg" alt=""></li>
                    <li class="ml-3"><img src="<?= base_url() ?>assets/img/icons/instagram.svg" alt=""></li>
                    <li class="ml-3"><img src="<?= base_url() ?>assets/img/icons/twitter.svg" alt=""></li>
                </ul>
            </div>

        </div>
        <br>
        <!-- <hr>
        <br> -->
        <div class="grid grid-cols-2   ">

            <div class="xl:col-span-1  mb-3  mt-5 ml-8 ">
                <h1>Links </h1>
                <ul>
                    <li style="font-weight:normal"> <a href="<?= base_url() ?>perfil/sorteios"> Meus Sorteios </a></li>
                    <li style="font-weight:normal"> <a href="<?= base_url() ?>vencedores"> Vencedores </a></li>
                    <li style="font-weight:normal"> <a href="<?= base_url() ?>perfil/conta"> Conta </a></li>
                    <li style="font-weight:normal"> <a href="<?= base_url() ?>termos"> Jogo Responsável </a></li>
                </ul>
            </div>
            <div class="xl:col-span-1 mb-3 mt-5 ml-8">
                <h1>Informações</h1>
                <ul>
                    <li> <a href="<?= base_url() ?>ajuda"> Ajuda </a></li>
                    <li> <a href="<?= base_url() ?>termos"> Termos </a></li>
                    <li> <a href="<?= base_url() ?>privacidade"> Privacidade </a></li>
                </ul>

            </div>
            <div class="xl:col-span-1 mt-5 ml-8 ">
                <h1>Categorias</h1>
                <ul>
                    <li> <a href="<?= base_url() ?>#sorteios"> <p style="font-weight:100">Dinheiro</p> </a></li>
                    <li> <a href="<?= base_url() ?>#sorteios"> Tecnologia </a></li>
                    <li> <a href="<?= base_url() ?>#sorteios"> Viagens </a></li>
                    <li> <a href="<?= base_url() ?>#sorteios"> Eletrodomésticos </a></li>
                </ul>
            </div>
            <div class="xl:col-span-1 cols-span-2 mt-5 ml-8 ">
                <h1>Contato</h1>
                <ul>

                    <!-- <li> (11) 9999-9999</li> -->
                    <li>sac@betraffle.com.br</li>

                </ul>
            </div>

        </div>

    </div>

    <div class="mt-10">
        <center>
            <small style="text-align: center !important;font-size:12px" class=" mt-5  text-white">Desenvolvido por <a style="text-align:center" class="font-semibold" href="https://ccoanalitica.com/plataformas">CCO Analítica</a></small>

        </center>
    </div>
</section>
<!-- Desktop -->

<!-- Mobile -->
<!-- <section class="footer  mt-12 xl:hiddden block">


    <div class="xl:ml-32 xl:mr-32 xl:m-5 footer-links  ">

        <div class="grid xl:grid-cols-6 ">
            <div class="xl:col-span-2   ">
                <div class=" ">
                    <img class="footer-logo m-auto" src="<?= base_url() ?>assets/img/logo.png" alt="">
                </div>
                <div class="m-auto  ">
                    <ul class="flex  ">
                        <li class="ml-3"><img src="<?= base_url() ?>assets/img/icons/facebook.svg" alt=""></li>
                        <li class="ml-3"><img src="<?= base_url() ?>assets/img/icons/instagram.svg" alt=""></li>
                        <li class="ml-3"><img src="<?= base_url() ?>assets/img/icons/twitter.svg" alt=""></li>
                    </ul>
                </div>

            </div>
            <div class="xl:col-span-1  ">
                <h1>Links</h1>
                <ul>
                    <li style="font-weight:normal"> <a href="<?= base_url() ?>perfil/sorteios"> Meus Sorteios </a></li>
                    <li style="font-weight:normal"> <a href="<?= base_url() ?>vencedores"> Vencedores </a></li>
                    <li style="font-weight:normal"> <a href="<?= base_url() ?>perfil/conta"> Conta </a></li>
                    <li style="font-weight:normal"> <a href="<?= base_url() ?>termos"> Jogo Responsável </a></li>
                </ul>
            </div>
            <div class="xl:col-span-1">
                <h1>Informações</h1>
                <ul>
                    <li> <a href="<?= base_url() ?>ajuda"> Ajuda </a></li>
                    <li> <a href="<?= base_url() ?>termos"> Termos </a></li>
                    <li> <a href="<?= base_url() ?>privacidade"> Privacidade </a></li>
                </ul>

            </div>
            <div class="xl:col-span-1">
                <h1>Categorias</h1>
                <ul>
                    <li> <a href="<?= base_url() ?>#sorteios"> Dinheiro </a></li>
                    <li> <a href="<?= base_url() ?>#sorteios"> Tecnologia </a></li>
                    <li> <a href="<?= base_url() ?>#sorteios"> Viagens </a></li>
                    <li> <a href="<?= base_url() ?>#sorteios"> Eletrodomésticos </a></li>
                </ul>
            </div>
            <div class="xl:col-span-1">
                <h1>Contato</h1>
                <ul>

                    <li><i class="fas fa-phone ml-2"></i> (11) 9999-9999</li>
                    <li><i class="fas fa-envelope ml-2"></i> sac@exemplo.com</li>

                </ul>
            </div>

        </div>

    </div>

    <div class="mt-10">
        <center>
            <small style="text-align: center !important;font-size:12px" class=" mt-5  text-white">Desenvolvido por <a style="text-align:center" class="font-semibold" href="https://ccoanalitica.com/plataformas">CCO Analítica</a></small>

        </center>
    </div>
</section> -->
<!-- Mobile -->