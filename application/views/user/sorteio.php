<?php $divisory =$this->raffles_model->RafflesDiv($raffle['raffles_tickets']); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Sorteio</title>
    <?php $this->load->view('comp/css');?>
</head>
<style>

.bubble {
	position: relative;
	background: #FFBD0A;
	border-radius: .4em;
	width: 40px;
}

.on {
    display: block;
}

.off {
    display: block;
}

.bubble:after {
	content: '';
	position: absolute;
	bottom: 0;
	left: 50%;
	width: 0;
	height: 0;
	border: 6px solid transparent;
	border-top-color: #ffbd0a;
	border-bottom: 0;
	margin-left: -6px;
	margin-bottom: -6px;
}


#selector-groups, #selected-tickets {
    border-radius: 16px;
}
#selector-groups {
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
.ativo {
    color: #FFFFFF;
    background-color: #FFBD0A;
}
.group-selector {
    user-select: none;
    cursor: pointer;
    padding: 5px 16px;
    border-radius: 16px;
    color: #FFFFFF;
    font-weight: semibold;
    white-space: nowrap;
}
.selector-item.selected {
    background-color: #FFBD0A;
    color: white;
    cursor: pointer;
}
.selector-item.free {
    cursor: pointer;
    background-color: white;
    color: black;
}
.selector-item {
    user-select: none;
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 38px;
    height: 38px;
    color: white;
    border-radius: 50%;
    cursor: not-allowed;
    font-weight: 800;
    font-size: 12px;
    text-align: center;
    background-color: gray;
}

.mine {
    user-select: none;
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 38px;
    height: 38px;
    color: white;
    border-radius: 50%;
    cursor: not-allowed;
    font-weight: 800;
    font-size: 12px;
    text-align: center;
    background-color: #22c55e;
}

.selector-item-blocked {
    user-select: none;
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 38px;
    height: 38px;
    color: white;
    border-radius: 50%;
    cursor: not-allowed;
    font-weight: 800;
    font-size: 12px;
    text-align: center;
    background-color: gray;
}
 .body-bg-alt {
    background-color: #28293D;
}
.justify-content-start {
    -ms-flex-pack: start!important;
    justify-content: flex-start!important;
}
.selector-group-item {
    overflow-y: scroll;
    max-height: 250px;
    min-height: 250px;
   
    gap: 12px !important;
}

.flex-item-container {
    gap: 16px;
    flex-wrap: wrap;
    display: flex;
}

#selected-tickets {
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
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

<body class="bg-dark" style="overflow-x:hidden">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar');?>
    <!-- Navbar -->

    <?php $this->load->view('comp/sidebar');?>

   <section>
        <div class="grid xl:grid-cols-3 grid-cols-1 xl:ml-10">
            <div class="xl:col-span-2 col-span-1 m-5 ">
                <div>
                    <img style="object-fit:cover ;width:100%;height:400px;max-height:400px" src="<?=base_url() ?>assets/img/raffles/<?=$raffle['raffles_image']?>" alt="">
                </div>
                <hr class="mt-5 mb-5" style="opacity: 0.4;">
                <div>
                  <p class="text-white" style="line-break:auto"><?=nl2br($raffle['raffles_description'])?></p>
                </div>
                

            </div>
       
            <div class="xl:col-span-1 col-span-1 m-5 ">
                <h1  style="font-size: 35px;" class="text-xl text-white font-bold"><?=$raffle['raffles_title']?></h1>

                <div class="grid grid-cols-3 mt-5" style="width:100% ;" >
                    <div class="bg-darkLight col-span-1 " style="height:70px; width:100%;border:5px solid #1c1c27">
                        <center>
                            <small class="text-white f mt-3 font-semibold text-center">MAX TICKETS</small>
                            <p class="text-orange text-center"><?=$raffle['raffles_tickets_limit']?></p>
                        </center>
                    </div>
                    <div class="bg-darkLight col-span-1 " style="height:70px; width:100%;border:5px solid #1c1c27">
                        <center>
                            <small class="text-white mt-3 font-semibold text-center">TICKETS</small>
                            <p class="text-orange text-center"><?=$raffle['raffles_tickets']?></p>
                        </center>
                    </div>
                    <div class="bg-darkLight col-span-1 " style="height:70px; width:100%;border:5px solid #1c1c27">
                        <center>
                            <small class="text-white mt-3 font-semibold text-center"><i class="fa fa-spinner mr-1"></i> SORTEIO</small>
                            <p class="text-orange text-center"><?=$raffle['raffles_progress']?>%</p>
                        </center>
                    </div>
                </div>

                <div class="grid place-items-center mt-5 mb-1">
                    <small class="text-center text-white">Leia os <a href="<?=base_url()?>termos" class="text-orange nodecoration">termos</a> antes de apostar.</small>
                    <p style="font-size: 25px;" class="text-orange mt-5 text-xl font-semibold">R$ <?=$raffle['raffles_tickets_value']?></p>
                    <small class="text-white text-xs">VALOR DO TICKET</small>

                </div>
                <div class="mt-1 mb-5">
                    <div class="mb-4">

                        <div class="percentage_sold_bubble_container" style="width: 60.32064128256513%;
                            margin-bottom: 15px; text-align: center;
                            margin-left: calc(<?=$raffle['raffles_progress']?>% - 20px)">
                                <br>
                            <div class="bubble" style="color: black; font-size: 12px;">
                            <?=$raffle['raffles_progress']?>% 
                            </div>
                        </div>

                        <div class="progress-bar" style="width: calc(0% *0.89); background-color: rgba(0,0,0,0); border-right: 1px solid white; height: 8px; position: absolute; padding: 1px;"></div> 
                            <div class="progress progress-square" style="height: 0.5rem; max-height: 8px !important; border-radius: 8px; background-color: rgba(255, 189, 10, 0.2); padding-left: 1px; padding-top: 1px;
                                ">
                                <div class="progress-bar progress-square" role="progressbar" style="width: <?=$raffle['raffles_progress']?>%; background-color: #FFBD0A; max-height: 6px !important; height: 0.5rem; border-radius: 6px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> 
                            <div class="flex justify-between" style="font-family: nunito; font-size: 13px;color:#FFF">
                                        <div>0</div>
                                        <div><?php $rest = ( $raffle['raffles_tickets'] - count( $this->payments_model->checkBuyedTickets($raffle['id'], null))); echo $rest; ?> restantes</div>
                                        <div><?=$raffle['raffles_tickets']?></div>
                            </div>
                         

                    </div>
                </div>
                <div class="grid xl:grid-cols-1 grid-cols-1 mt-5 mb-1">
                    <!-- <div class="xl:col-span-1 col-span-1 ml-1 mr-1 h-full">
                        <button onclick="openTicketsQuantity()" style="border:1px solid #FFF;height: 87px " class="tickets-quantity-open text-white font-semibold py-2 w-full mt-5 ">SELECIONAR <br><i class="fas fa-sort-down text-left" aria-hidden="true"></i></button>

                       <div style="max-height: 150px;overflow-y:scroll; position:absolute;width:200px;display:none"  class="bg-white tickets-quantity text-black">
                            <ul>
                                <li class="mt-3" style="cursor:pointer" > <i class="fas fa-ticket-alt pr-3 ml-3" style="transform: rotate(-45deg) scale(1) translate(7px);" aria-hidden="true"></i> 1 </li>
                                <li class="mt-3" style="cursor:pointer" > <i class="fas fa-ticket-alt pr-3 ml-3" style="transform: rotate(-45deg) scale(1) translate(7px);" aria-hidden="true"></i> 2 </li>
                                <li class="mt-3" style="cursor:pointer" > <i class="fas fa-ticket-alt pr-3 ml-3" style="transform: rotate(-45deg) scale(1) translate(7px);" aria-hidden="true"></i> 3 </li>
                                <li class="mt-3" style="cursor:pointer" > <i class="fas fa-ticket-alt pr-3 ml-3" style="transform: rotate(-45deg) scale(1) translate(7px);" aria-hidden="true"></i> 4 </li>
                                <li class="mt-3" style="cursor:pointer" > <i class="fas fa-ticket-alt pr-3 ml-3" style="transform: rotate(-45deg) scale(1) translate(7px);" aria-hidden="true"></i> 1 </li>
                                <li class="mt-3" style="cursor:pointer" > <i class="fas fa-ticket-alt pr-3 ml-3" style="transform: rotate(-45deg) scale(1) translate(7px);" aria-hidden="true"></i> 2 </li>
                                <li class="mt-3" style="cursor:pointer" > <i class="fas fa-ticket-alt pr-3 ml-3" style="transform: rotate(-45deg) scale(1) translate(7px);" aria-hidden="true"></i> 3 </li>
                                <li class="mt-3" style="cursor:pointer" > <i class="fas fa-ticket-alt pr-3 ml-3" style="transform: rotate(-45deg) scale(1) translate(7px);" aria-hidden="true"></i> 4 </li>
                            </ul>
                       </div>
                    </div> -->


                    <?php if ($this->raffles_model->getRaffleWinner($raffle['id'])) { ?>
                        <?php $winner = $this->raffles_model->getRaffleWinner($raffle['id']) ?>
                        <?php $winner_user = $this->user_model->getUserById($winner['winner_user']) ?>


                        <div class="grid grid-cols-2 bg-green-500 mt-3 mb-3 ">  
                            <div class="col-span-1 m-3">
                                <!-- <center> <i class="fal fa-trophy  text-center text-white" style="font-size: 70px"></i></center> -->
                                <p class="text-white  text-center font-bold" style="font-size: 60px"><?=$winner['winner_ticket']?></p>

                            </div>
                            <div class="col-span-1 m-3">
                                <p class=" font-bold uppercase text-black">vencedor</p>
                                <p class="text-white font-semibold"><?=$winner_user['user_name']?> <?=$winner_user['user_surname']?></p>

                                <p class=" font-bold uppercase text-black">Data do Sorteio</p>
                                <p class="text-white font-semibold"><?=$winner['winner_date']?> às  <?=$winner['winner_time']?></p>
                            </div>


                        </div>

                    <?php } else { ?>

                        <?php if ( $this->session->userdata('session_user')) { ?>

                            <?php if (count( $this->payments_model->checkBuyedTickets($raffle['id'], $this->session->userdata('session_user')['id'])) >= $raffle['raffles_tickets_limit']) { ?>

                            
                                    <div class="xl:col-span-2 col-span-1">
                                    <button  class="border border-red-500 text-red-500 disabled font-semibold py-2 w-full mt-2 mb-1"><i class="fas fa-close" aria-hidden="true"></i> VOCÊ COMPROU O MAX. DE TICKETS</button>
                                            <button id="myBtn" class="bg-orange text-white font-semibold py-2 w-full mt-2 mb-5"><i class="fas fa-th" aria-hidden="true"></i> VER MEUS TICKETS</button>
                                    </div>
                                
                            <?php }else { ?>

                                    <div class="xl:col-span-2 col-span-1">
                                            <a href="<?=base_url() ?>carrinho">
                                            <button id="label_buy" class="bg-orange text-white font-semibold py-2 w-full mt-5 ">COMPRAR</button>
                                            </a>
                                            <button id="myBtn" class="bg-orange text-white font-semibold py-2 w-full mt-2 mb-5"><i class="fas fa-th" aria-hidden="true"></i> ESCOLHER MEUS TICKETS</button>
                                    </div>

                            <?php } ?>

                        <?php } else { ?>
                            
                                <div class="xl:col-span-2 col-span-1">
                                    <a href="<?=base_url() ?>login">
                                        <button id="label_buy" class="bg-orange text-white font-semibold py-2 w-full mt-5 ">COMPRAR</button>
                                    </a>
                                    <a href="<?=base_url() ?>login">
                                        <button  class="bg-orange text-white font-semibold py-2 w-full mt-2 mb-5"><i class="fas fa-th" aria-hidden="true"></i> ESCOLHER MEUS TICKETS</button>

                                    </a>
                                </div>
                        <?php }  ?>
                    <?php }  ?>

                </div>
                <div>
                    <p class="text-white text-xs">* Este sorteio será feito por um algoritmo aleatório. O sorteio começa quando todos os tiques foram adquiridos.</p>
                </div>

            </div>
        </div>
        <div class="xl:w-2/3 w-full xl:ml-10" >
            <div class="m-5">
                <h1 style="font-size: 25px;" class="text-white text-xl text-3x1 font-bold text-left ">
                    Você também pode gostar
                </h1>
            </div>
            <div class="grid xl:grid-cols-3 grid-cols-1">

            <?php if (count($this->raffles_model->getRafflesRelated($raffle['raffles_category'])) == 3) { ?>

                <?php foreach ($this->raffles_model->getRafflesRelated($raffle['raffles_category'])  as $t) { ?>
                    <a href="<?=base_url() ?>sorteio/<?=$t->id?>">
                        <div class="xl:col-span-1 col-span-1 xl:m-0 m-3 related">
                            <div class="ml-5 mr-5">
                            <img src="<?=base_url() ?>assets/img/raffles/<?=$t->raffles_image?>" style="width:100%;max-width:100%;object-fit:cover;height:300px;" alt="">
                            </div>
                            <div class="ml-5 mr-5 p-3 bg-darkLight mb-5">
                                <h1 class="text-xl text-white font-bold line-clamp-2"><?=$t->raffles_title?></h1>
                                <p class="text-orange text-xl tbaset-xl font-semibold">R$ <?=$t->raffles_tickets_value?></p>
                                <div class="progress mt-3 progress-square" style="height: 0.5rem; max-height: 8px !important; border-radius: 8px; background-color: rgba(255, 189, 10, 0.2)">
                                    <div class="progress-bar progress-square" role="progressbar" style="width: <?=$t->raffles_progress?>%; background-color: #FFBD0A; max-height: 8px !important; height: 0.5rem; border-radius: 8px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="entries_left mt-3 flex justify-between raffle_card_subtitle">
                                    <div class="flex">
                                        <small class="text-white"> <i class="fas fa-ticket-alt" style="transform: rotate(-45deg); font-size: 11px;" aria-hidden="true"></i>
                                        <?=count($this->payments_model->checkBuyedTickets( $t->id, null)) ?> / <?=$t->raffles_tickets?> </small>  
                                    </div>
                                    <div class="">
                                        <small class="text-white"><i class="fas text-white fa-clock mr-1" aria-hidden="true"></i><?=$t->raffles_progress?> %</small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                <?php }  ?>

            <?php } else { ?>

                <?php foreach ($this->raffles_model->getRafflesRelatedRandom()  as $t) { ?>
                    <a href="<?=base_url() ?>sorteio/<?=$t->id?>">
                        <div class="xl:col-span-1 col-span-1 xl:m-0 m-3 related">
                            <div class="ml-5 mr-5">
                            <img src="<?=base_url() ?>assets/img/raffles/<?=$t->raffles_image?>" style="width:100%;max-width:100%;object-fit:cover;height:300px;" alt="">
                            </div>
                            <div class="ml-5 mr-5 p-3 bg-darkLight mb-5">
                                <h1 class="text-xl text-white font-bold line-clamp-2"><?=$t->raffles_title?></h1>
                                <p class="text-orange text-xl tbaset-xl font-semibold">R$ <?=$t->raffles_tickets_value?></p>
                                <div class="progress mt-3 progress-square" style="height: 0.5rem; max-height: 8px !important; border-radius: 8px; background-color: rgba(255, 189, 10, 0.2)">
                                    <div class="progress-bar progress-square" role="progressbar" style="width:<?=$t->raffles_progress?>%; background-color: #FFBD0A; max-height: 8px !important; height: 0.5rem; border-radius: 8px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="entries_left mt-3 flex justify-between raffle_card_subtitle">
                                    <div class="flex">
                                        <small class="text-white"> <i class="fas fa-ticket-alt" style="transform: rotate(-45deg); font-size: 11px;" aria-hidden="true"></i>
                                        <?=count($this->payments_model->checkBuyedTickets( $t->id, null)) ?> / <?=$t->raffles_tickets?> </small>  
                                    </div>
                                    <div class="">
                                        <small class="text-white"><i class="fas text-white fa-clock mr-1" aria-hidden="true"></i><?=$t->raffles_progress?> %</small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                <?php }  ?>

            <?php } ?>
                
                
            </div>
        </div>
    
   </section>



   <!-- Create Raffle Modal -->
<div id="myModal" class="modal border border-white">

<!-- Modal content -->
<div class="modal-content" style="border:2px solid #FFF">
  <span class="close">&times;</span>

  <div class="grid place-items-center mb-5">
        <div>
            <h1 class="text-white font-bold text-xl uppercase ">Selecione seus Tickets</h1>
        </div>
        <div class="flex justify-items-center">
            <div><small class="text-white mr-5"><i class="fa fa-circle text-green-500"></i> SEUS TICKETS</small></div>
            <div><small class="text-white"><i class="fa fa-circle text-gray-500"></i> INDISPONÍVEIS</small></div>
        </div>
  </div>
  
<input type="hidden" id="cart_limit">
<input type="hidden" id="buyed_limit">

  <div id="selector-groups" class="justify-content-start flex-item-container mt-5 mb-5 p-2 body-bg-alt">

                        
         
        <?php for ($t = 0; $t < $divisory; $t++) { ?>



                <?php if ($t == $divisory - 1) { ?>

                  
                    <div class="group-selector mr-3 " data-group="<?=$t?>" ><?php echo (($t) * 300) + 1 ;?> - <?php echo $raffle['raffles_tickets'] ;?></div> 


               <?php } else if ($t == 0) { ?>

                    <div class="group-selector mr-3 ativo" data-group="<?=$t?>" ><?=$t+1?> - 300</div> 

               <?php } else if ($t == 1) {?>

                    <?php $y = $t +1?>
                    <div class="group-selector mr-3 " data-group="<?=$t?>" ><?php echo (($t) * 300) + 1 ;?> - <?php echo ($y * 300) ;?></div> 

               <?php } else {?>

                    <?php $y = $t +1?>
                    <div class="group-selector mr-3 " data-group="<?=$t?>" ><?php echo (($t) * 300)+ 1 ;?> - <?php echo ($y * 300) ;?></div> 

              <?php } ?>

               
           <?php } ?>
      
        
  </div>

  <div>
      <form action="" id="form-raffles">

       
         <div id="selector-inner-groups">


            <?php for ($t = 0; $t < $divisory; $t++) { ?>
               
                <?php if ($t == 0) { ?>

                    <div data-groupDiv="<?=$t?>" class="selector-group-item  justify-content-start flex-item-container ">
                            <?php echo $this->raffles_model->RafflesNumbers($t, '300', $raffle['raffles_tickets'],$raffle['id']); ?>                           
                    </div>

                <?php } else {?>

                    <div data-groupDiv="<?=$t?>" style="display:none" class="selector-group-item  justify-content-start flex-item-container ">
                            <?php echo $this->raffles_model->RafflesNumbers($t, '300', $raffle['raffles_tickets'],$raffle['id']); ?>                           
                    </div>

                <?php } ?>

            <?php } ?>
           
            
         </div>

         <?php if (count( $this->payments_model->checkBuyedTickets($raffle['id'], $this->session->userdata('session_user')['id'])) >= $raffle['raffles_tickets_limit']) { ?>

                     
      

        <?php }else { ?>

            <div class="xl:m-2 xl:mt-5 mb-5 mt-5  flex justify-between">
                <div class="flex">
                    <p class="text-white  mr-5">Tickets Selecionados</p>
                </div>
                <div>
                    <button type="button" id="remove-all-tickets" style="border:1px solid #FFF;border-radius:10px" class="px-2 py-1 text-white "><small><i class="fa fa-close"></i> remover todos</small></button>
                </div>
            </div>
            <div id="selected-tickets" class="body-bg-alt">
                <!-- <div id="selected-ticket" class="flex selected-ticket" data-n="1"><i class="fa fa-close mr-1 mt-1 " style="font-size:13px"></i> 15</div>
                <div id="selected-ticket" class="flex selected-ticket" data-n="1"><i class="fa fa-close mr-1 mt-1 " style="font-size:13px"></i> 25</div> -->
        
            </div>
            <div class="xl:m-2 xl:mt-0 mt-1 grid xl:grid-cols-2 grid-cols-1  pt-8">
                    <div class="col-span-1 xl:col-span-1 mb-3" >
                        <div id="amount_div" class="flex" style="display:none;">
                            <p class="text-white  mr-5"><span id="label_quantity">0</span> Entrada(s)</p>
                            <p class="text-white ">R$ <span id="label_amount">0</span></p>
                        </div>
                    </div>
                    <div class="col-span-1 xl:col-span-1 grid grid-place-right">
                        <button id="cart_send" type="button" class="px-3 py-3 bg-orange text-white font-semibold"><i class="fa fa-shopping-cart"></i> ADICIONAR NO CARRINHO</button>
                    </div>
            </div>

        <?php } ?>
         
      </form>
  </div>
</div>

</div>
<!-- Create Raffle Modal -->

           

    <!-- Footer -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <?php $this->load->view('comp/Footer');?>
        <?php $this->load->view('comp/js');?>

        <script>

            $(document).ready(function(){
                checkTotalTicketsCart()
                checkTotalTicketsBuyed()
            })
        </script>


        <script>
            function openTicketsQuantity() {
                var display = $('.tickets-quantity').css('display')
                            
                if (display == "none") {
                    $('.tickets-quantity').css('display','block')
                } else {
                    $('.tickets-quantity').css('display','none')
                }
            }
        </script>
      
        <script>
             // Create
             var modal = document.getElementById("myModal");
            var btn = document.getElementById("myBtn");
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            // Create
        </script>
    <!-- Footer -->
    <script>

        $('.group-selector').on('click', function(e){

            $('.group-selector').removeClass('ativo')
            $(this).addClass('ativo')



            var group = $(this).data('group')
            var group_div_all = $(this).data('.selector-group-item')


            $('.selector-group-item').css('display','none');


            var group_div = document.querySelector('[data-groupdiv="'+group+'"]');
            group_div.style.display = "flex"

            // console.log(group_div)


        })

        // Remove Selected All
        $('#remove-all-tickets').on('click', function (e) {
            $('#selected-tickets').html("")

            $('.selected').addClass('free')
            $('.selected').removeClass('selected')

            updateCount()
        
        })

        

        //Select Ticket
        $('.selector-item').on('click', function (e) {


            checkTotalTicketsCart()
            checkTotalTicketsBuyed()

            var cartCount =  $('#buyed_limit').val()
            var buyedCount = $('#cart_limit').val()
            var tickets_limit = "<?=$raffle['raffles_tickets_limit']?>"
            var selectedCount = $('#label_quantity').text()

            var totalCount = (parseInt(cartCount) + parseInt(buyedCount));
            var geral = (parseInt(selectedCount) + parseInt(totalCount)) 

            // alert("geral "+geral)
            // alert("limite "+tickets_limit)
            // alert("selected "+selectedCount)
         
            if ( parseInt(geral) >= parseInt(tickets_limit) || parseInt(selectedCount) >= parseInt(tickets_limit)) {

                swal('Você atingiu o limite máximo de '+tickets_limit+' tickets.')

            } else {

                var ticket = $(this).data('n')
                var classList = $(this).attr('class').split(/\s+/);
    
    
                for (var i = 0; i < classList.length; i++) {
    
                    if (classList[i] === 'free') {
    
                            $('#selected-tickets').append('<div id="selected-'+ticket+'" class="flex selected-ticket " onclick="deleteTicket(this, this.id)" data-n-selected="'+ticket+'"><i class="fa fa-close mr-1 mt-1 " style="font-size:13px"></i> '+ticket+'</div>')
                            $(this).removeClass('free')
                            $(this).addClass('selected')
    
                    } else { 
    
                        $(this).removeClass('selected')
                        $(this).addClass('free')
    
                        var ticket_selected = document.querySelector('[data-n-selected="'+ticket+'"]');
    
                        // Removing selected ticket
                        var id = this.id
                        $('#selected-'+id).remove()
    
                       
                    } 
    
                }
    
             
                // Label Total                    
                updateCount()
            }



        })

        function checkTotalTicketsCart() {

            var cart_user  = "<?=$this->session->userdata('session_user')['id'] ?>"
            var cart_raffle = "<?=$raffle['id']?>"

            var response = "";


               return $.ajax({
                    method: 'POST',
                    url: '<?=base_url() ?>carrinho/checkTotalTicketsCart',
                    data: {
                        cart_user:cart_user,
                        cart_raffle:cart_raffle,
                    },
                    success: function (data) {
                        var resp = JSON.parse(data)
                        $('#cart_limit').val(resp.message)


                    },
                   
                });



        }

        function checkTotalTicketsBuyed() {
            var raffle_user  = "<?=$this->session->userdata('session_user')['id'] ?>"
            var raffle_id = "<?=$raffle['id']?>"

            // var response = "";

            return $.ajax({
                    method: 'POST',
                    url: '<?=base_url() ?>carrinho/checkTotalTicketsBuyed',
                    data: {
                        raffle_user:raffle_user,
                        raffle_id:raffle_id,
                    },
                    success: function (data) {
                        var resp = JSON.parse(data)
                        $('#buyed_limit').val(resp.message)
                    },
                   
                });

            // return response;

        }


        function updateCount(){
            $('#amount_div').css('display','flex')

            var label_quantity = []
            var quantity_price = "<?=$raffle['raffles_tickets_value']?>"


            $(".selected-ticket").each(function() {
                label_quantity.push($(this).attr("data-n-selected"));
            });

           

            var label_amount = (parseFloat(label_quantity.length) * parseFloat(quantity_price))
            $('#label_quantity').text("")
            $('#label_amount').text("")
            
            $('#label_quantity').text(label_quantity.length)
            $('#label_amount').text(label_amount)

            if (label_quantity.length == 0) {
                $('#amount_div').css('display','none')

            } 
        }

        
     
        // Remove selected ticket by Select
        function deleteTicket(e, id) {
          
            var id = id.replace('selected-','')
            //  var choose = document.getElementById(id)

            //  console.log(choose)
            $('#'+id).removeClass('selected')
            $('#'+id).addClass('free')

            e.remove()
            updateCount()
        }

       
    </script>
    <script>

        $('#cart_send').on('click', function (e) {
            e.preventDefault()

            var cart_raffle = "<?=$raffle['id']?>"
            var cart_ticket = []
            var ticket_value = "<?=$raffle['raffles_tickets_value']?>"
            var cart_user ="<?=$this->session->userdata('session_user')['id'] ?>"

            $(".selected-ticket").each(function() {
                cart_ticket.push($(this).attr("data-n-selected"));
            });

            if (cart_ticket.length > 0) {

                $.ajax({
                    method: 'POST',
                    url: '<?=base_url() ?>carrinho/addcarttickets',
                    data: {
                        cart_raffle:cart_raffle,
                        cart_ticket:cart_ticket,
                        cart_user:cart_user,
                        ticket_value: ticket_value
                    },
                    success: function (data) {
                        var resp = JSON.parse(data)

                        if (resp.status == "true") {
                            // window.location.href = '<?=base_url()?>'

                            var label_amount = $('#label_amount').text()
                            $('#label_buy').text('COMPRAR - R$ '+label_amount)

                            $('.close').trigger('click')
                            swal(resp.message)

                        } else {
                            swal(resp.message)
                        }
                    },
                    error: function (data) {
                        swal('Ocorreu um erro temporário.');
                    },
                });


            } else {
                swal('Selecione ao menos 1 ticket.')
            }
        })
    </script>
</body>
</html>















