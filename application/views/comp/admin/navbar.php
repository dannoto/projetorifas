<?php if ($this->session->userdata('session_user')) { ?>
<div class="navbar">
        <!-- Desktop -->
        <div class="xl:block hidden">

            <div class="m-5 grid xl:grid-cols-5 ">
            
                <div class="xl:col-span-3">
                    <a href="<?=base_url()?>">
                        <img src="<?=base_url()?>assets/img/logo.png" class="navbar-logo" alt="">
                    </a>
                </div>
            
                <div class="xl:col-span-2 flex">
                    
                    
                    <div class="" style="margin-left:350px ;cursor:pointer"  onclick="toggleNav()" >
                        <i class="text-white text-orange fal fa-bars "></i>
                    </div>

                </div>
            </div>
        </div>
        <!-- Desktop -->


        <!-- Mobile -->
       <div class="xl:hidden block">
          
                
        
                
                <div class="grid grid-cols-4  flex justify-items-center m-3">
                    
                   
                    <div class="col-span-3">
                            <a href="<?=base_url()?>">
                                <img src="<?=base_url()?>assets/img/logo.png" class="navbar-logo" style="object-fit:cover" alt="">
                            </a>
                    </div>
                    <div class="col-span-1" style="cursor:pointer" onclick="toggleNav()" >
                    <i class="text-white text-orange fal fa-bars "></i>
                    </div>

                </div>
          
       </div>
        <!-- Mobile -->
    </div>

<?php } else {?>

    <div class="navbar">
        <!-- Desktop -->
        <div class="xl:block hidden">

            <div class="m-5 grid xl:grid-cols-5 mt-5 ">
            
                <div class="xl:col-span-3">
                    <a href="<?=base_url()?>">
                        <img src="<?=base_url()?>assets/img/logo.png" class="navbar-logo" alt="">
                    </a>
                </div>
            
                <div class="xl:col-span-2 flex">
                    <div class="ml-5">
                        <a href="<?=base_url()?>vencedores">
                            <p class="text-white font-bold text-xl">Vencedores</p>
                        </a>
                    </div>
                    <div class="ml-8">
                        <a href="<?=base_url()?>login">
                            <p class="text-white font-bold text-xl">Login</p>
                        </a>
                    </div>
                    <div class="ml-16 -mt-2" style="cursor:pointer">
                        <a href="<?=base_url()?>registro">
                            <button class="text-white px-5 font-semibold py-3 bg-orange" style="border-radius:33px ;">Registrar-se</button>
                        </a>
                    </div>
                 

                </div>
            </div>
        </div>
        <!-- Desktop -->


        <!-- Mobile -->
       <div class="xl:hidden block">
          
                
        
                
                <div class="grid grid-cols-5  flex justify-items-center m-3">
                    
                    <div class="col-span-1" style="cursor:pointer">
                        <!-- <a href="<?=base_url()?>carrinho">
                            <i class="text-white fal fa-shopping-cart"></i>
                        </a> -->
                    </div>
                    <div class="col-span-3">
                            <a href="<?=base_url()?>">
                                <img src="<?=base_url()?>assets/img/logo.png" class="navbar-logo" style="object-fit:cover" alt="">
                            </a>
                    </div>
                    <div class="col-span-1" style="cursor:pointer" onclick="toggleNav()" >
                        <i class="text-white text-orange fal fa-bars "></i>
                    </div>

                </div>
          
       </div>
        <!-- Mobile -->
    </div>
<?php } ?>