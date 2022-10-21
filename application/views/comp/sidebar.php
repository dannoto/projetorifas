<!-- Sidebar start -->
<?php if ($this->session->userdata('session_user')) { ?>

<div id="sideNav"   class="sidebar-menu bg-dark" style='box-shadow: 10px 0px 50px 0.1px #00000085; max-width: 400px; width: 0px;display:none;position:fixed;'>

  <div class="sidebar-menu-content p-5" >


    <div class="sidebar-menu-top">
      <div class="welcome-member ">
        <div class="grid grid-cols-2" style="height:44px ;" >
         
          <div class="col-span-1">
            <h2 class="text-white ml-2 mt-5  mt-2 ml-1 text-base font-semibold" >Olá, <?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_name'] ?>!</h2>
          </div>
          <div class="col-span-1  grid place-items-center">
            <a href="javascript:void(0)" class=" font-semibold text-white " onclick="toggleNav()"
              style='font-size: 44px; font-weight: 300;position: relative;margin-left: 145px;margin-top: -15px;'>×
            </a>
          </div>
        </div>

       
      </div>
    </div>


    <div class="sidebar-menu-links grid grid-cols-2  pt-2">

        <div class="col-span-1" >
          <a id="menu-myraffle"  href="<?=base_url() ?>perfil/sorteios/">
            <div style="height:90px" class="grid place-items-center  m-1 sidebar-menu-link bg-darkLight text-white"><span><i class="far fa-ticket fa-lg"
                  style="font-weight: 300; transform:rotate(-45deg)"></i> </span>
              <p>Meus Sorteios</p>
            </div>
          </a>
        </div>
        <div class="col-span-1" >
          <a id="menu-creditwallet"  href="<?=base_url() ?>perfil/creditos">
            <div style="height:90px" class="grid place-items-center  m-1 sidebar-menu-link bg-darkLight text-white">
              <div class="flex justify-content-end ">
                <div class="primary-text text-orange" style="position: absolute; font-size: 12px;margin-top:-10px">R$ <?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_credit'] ?></div>
              </div>
              <span>
                <i class="fal fa-coin fa-lg" style="font-weight: 300;"></i>
              </span>
              <p style="padding-bottom: 7px;">Meus Créditos</p>
            </div>
          </a>
        </div>
        <div class="col-span-1" >
          <a id="menu-winner"  href="<?=base_url() ?>vencedores/">
            <div style="height:90px" class="grid place-items-center  m-1 sidebar-menu-link bg-darkLight text-white"><span><i class="fal fa-trophy fa-lg"></i></span>
              <p>Vencedores</p>
            </div>
          </a>
        </div>
        <div class="col-span-1" >
          <a id="menu-livedraw"  href="<?=base_url() ?>#sorteios">
            <div style="height:90px" class="grid place-items-center  m-1 sidebar-menu-link bg-darkLight text-white"><span><i class="fal fa-video fa-lg"></i></span>
              <p>Sorteios</p>
            </div>
          </a>
        </div>
        <div class="col-span-1" >
          <a id="menu-logout"  href="<?=base_url() ?>sair/">
            <div style="height:90px" class="grid place-items-center  m-1 sidebar-menu-link bg-darkLight text-white"><span><i class="far fa-sign-out fa-lg" style='font-weight: 300;'></i></span>
              <p>Sair</p>
            </div>
          </a>
        </div>

    </div>

    <h3 class='my-2  ml-2 mt-5  text-white text-base font-semibold'>Conta</h3>

    <div class="sidebar-menu-links">

      <div class="sidebar-menu-links grid grid-cols-2  pt-2">

          <div class="col-span-1">
            <a id="menu-personalinfo" href="<?=base_url() ?>perfil/conta">
              <div style="height:90px" class="grid place-items-center  m-1 sidebar-menu-link bg-darkLight text-white"><span><i class="far fa-user fa-lg" style='font-weight: 300;'></i></span>
                <p>Informações </p>
              </div>
            </a>

          </div>
          <div class="col-span-1">
          </div>

      </div>
     
      

    </div>



    <h3 class='my-2 ml-2 mt-5 text-white text-base font-semibold'>Apoio</h3>

    <div class="sidebar-menu-links">

      <div class="sidebar-menu-links grid grid-cols-2  pt-2">
          <div class="col-span-1">
            <a id="menu-help" href="<?=base_url() ?>ajuda">
              <div style="height:90px" class="grid place-items-center grid place-items-center  m-1 sidebar-menu-link bg-darkLight text-white">
              
                <span><i class="fal fa-question-circle fa-lg"></i></span>
                <p>Ajuda &amp; FAQs</p>

              </div>
            </a>
          </div>
          <div class="col-span-1">
          </div>
      </div>

    </div>

    <br>
    <p class="text-center mt-3 mb-2 more-links text-white"><a href="<?=base_url() ?>termos/">Termos</a> | <a
        href="<?=base_url() ?>privacidade/">Privacidade</a> | <a href="<?=base_url() ?>ajuda/">Ajuda</a> 
        <div class="grid place-items-center">
            <div class="m-auto  ">
                  <center>
                  <ul class="flex  ">
                        <li class="ml-3"><img src="<?=base_url()?>assets/img/icons/facebook.svg" alt=""></li>
                        <li class="ml-3"><img src="<?=base_url()?>assets/img/icons/instagram.svg" alt=""></li>
                        <li class="ml-3"><img src="<?=base_url()?>assets/img/icons/twitter.svg" alt=""></li>
                    </ul>
                  </center>
            </div>
        </div>
        
    
  </div>

</div>

<?php } else {?>


  <div id="sideNav"   class="sidebar-menu bg-dark" style='box-shadow: 10px 0px 50px 0.1px #00000085; max-width: 400px; width: 0px;display:none;position:fixed;'>

<div class="sidebar-menu-content p-5" >


  <div class="sidebar-menu-top">
    <div class="welcome-member ">
      <div class="grid grid-cols-2" style="height:44px ;" >
       
        <div class="col-span-1 ">
             <a href="<?=base_url()?>registro">
                            <button class="text-white px-5 font-semibold py-3  ml-2 bg-orange" style="border-radius:33px ;">Registrar-se</button>
                        </a>
        </div>
        <div class="col-span-1  grid place-items-center">
          <a href="javascript:void(0)" class=" font-semibold text-white " onclick="toggleNav()"
            style='font-size: 44px; font-weight: 300;position: relative;margin-left: 145px;margin-top: -15px;'>×
          </a>
        </div>
      </div>

     
    </div>
  </div>


  <div class="sidebar-menu-links grid grid-cols-2  pt-2">

      
      <div class="col-span-1" >
        <a id="menu-winner"  href="<?=base_url() ?>vencedores/">
          <div style="height:90px" class="grid place-items-center  m-1 sidebar-menu-link bg-darkLight text-white"><span><i class="fal fa-trophy fa-lg"></i></span>
            <p>Vencedores</p>
          </div>
        </a>
      </div>
      <div class="col-span-1" >
        <a id="menu-livedraw"  href="<?=base_url() ?>sorteios/">
          <div style="height:90px" class="grid place-items-center  m-1 sidebar-menu-link bg-darkLight text-white"><span><i class="fal fa-video fa-lg"></i></span>
            <p>Sorteios</p>
          </div>
        </a>
      </div>
      <div class="col-span-1" >
          <a id="menu-logout"  href="<?=base_url() ?>login/">
            <div style="height:90px" class="grid place-items-center  m-1 sidebar-menu-link bg-darkLight text-white"><span><i class="far fa-sign-in fa-lg" style='font-weight: 300;'></i></span>
              <p>Login</p>
            </div>
          </a>
        </div>
      <div class="col-span-1">
          <a id="menu-help" href="<?=base_url() ?>ajuda">
            <div style="height:90px" class="grid place-items-center grid place-items-center  m-1 sidebar-menu-link bg-darkLight text-white">
            
              <span><i class="fal fa-question-circle fa-lg"></i></span>
              <p>Ajuda &amp; FAQs</p>

            </div>
          </a>
        </div>

  </div>

  
 <br>

  <p class="text-center mt-3 mb-2 more-links text-white"><a href="<?=base_url() ?>termos/">Termos</a> | <a
      href="<?=base_url() ?>privacidade/">Privacidade</a> | <a href="<?=base_url() ?>ajuda/">Ajuda</a> 
      <div class="grid place-items-center">
          <div class="m-auto  ">
                <center>
                <ul class="flex  ">
                      <li class="ml-3"><img src="<?=base_url()?>assets/img/icons/facebook.svg" alt=""></li>
                      <li class="ml-3"><img src="<?=base_url()?>assets/img/icons/instagram.svg" alt=""></li>
                      <li class="ml-3"><img src="<?=base_url()?>assets/img/icons/twitter.svg" alt=""></li>
                  </ul>
                </center>
          </div>
      </div>
      
  
</div>

</div>

  <?php } ?>
        
            






        

        <!-- Navbar end -->
