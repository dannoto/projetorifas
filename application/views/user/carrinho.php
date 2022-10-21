<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meus Créditos</title>
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
    padding:15px
}

@media (max-width:820px) {
    #selected-tickets {
        width: 250px;
        max-width: 250px;
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    padding:15px
}
}

#selector-groups, #selected-tickets {
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


    <?php if (count($cart) > 0) { ?>

    <section>
        <div class="grid xl:grid-cols-3 grid-cols-1">

            <div class="xl:col-span-2 col-span-1">

                <div class="m-3 pt-2">
                    <div class="grid grid-cols-3  bg-darkLight  xl:grid hidden">
                        <div class="col-span-1 m-3">
                            <p class="text-white text-right font-semibold uppercase ">Sorteio</p>
                        </div>
                        <div class="col-span-1 m-3">
                        </div>
                        <div class="col-span-1 m-3">
                            <p class="text-white text-center font-semibold uppercase ">Sub-total</p>
                        </div>
                    </div>

                    <?php foreach ($cart as $c) { ?>

                            <div class="grid xl:grid-cols-5 grid-cols-1 bg-darkLight mt-3">
                                <div class="col-span-1 grid place-items-center xl:mt-0 mt-5">
                                    <span onclick="deleteCart(<?=$c->id?>, <?=$c->cart_user?>, <?=$c->cart_raffle?>)" style="cursor:pointer"><i style="font-size:35px" class="fal fa-times  hidden xl:block text-red-500"></i></span>
                                </div>
                                <div class="xl:col-span-3 col-span-1 flex  m-3">
                                <div > 

                                            <button onclick="deleteCart(<?=$c->id?>, <?=$c->cart_user?>, <?=$c->cart_raffle?>)"  class="mt-0 xl:hidden block  border border-red-500 px-1" style="width: 100%"><small style="font-size:11px ;" class="text-red-500"> + REMOVER </small></button>

                                    <img class="mt-2" src="<?=base_url()?>assets/img/raffles/<?=$this->raffles_model->getRaffle($c->cart_raffle)['raffles_image'] ?>" style="max-width:100px;width:100px;max-height:100px;height:100px;object-fit:cover" alt="">
                                    
                                        <a href="<?=base_url()?>sorteio/<?=$c->cart_raffle?>">
                                            <button  class="mt-3 border border-green-500 px-1" style="width: 100%"><small style="font-size:11px ;" class="text-green-500"> + ADD TICKETS</small></button>
                                        </a>
                                   
                                </div>
                                <div class="">
                                    <a href="<?=base_url()?>sorteio/<?=$c->cart_raffle?>">
                                        <h1 class="text-white font-semibold line-clamp-2 text-xl ml-3"><?=$this->raffles_model->getRaffle($c->cart_raffle)['raffles_title'] ?></h1>
                                    </a>

                                    <div class="flex m-3 " >
                                        <div id="selected-tickets" class="body-bg-alt">

                                            <?php foreach($this->cart_model->getCartTickets($this->raffles_model->getRaffle($c->cart_raffle)['id'], $this->session->userdata('session_user')['id']) as $t) { ?>
                                                <div id="selected-ticket" onclick="deleteTicket(<?=$t->id?>, <?=$c->cart_user?>, <?=$c->cart_raffle?>)" class="flex selected-ticket" data-n="<?=$t->cart_ticket?>"><i class="fa fa-close mr-1 mt-1 " style="font-size:13px"></i> <?=$t->cart_ticket?></div>
                                            <?php } ?>
                                    
                                        </div>

                                    </div>

                                </div>
                                
                                    
                                </div>
                                <div class="col-span-1 grid place-items-center">
                                    <p class="text-xl font-semibold text-center text-white xl:mb-0 mb-5 ">R$ <?=$c->cart_amount?></p>
                                </div>
                            </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-span-1">
               
                <div class="bg-darkLight m-3 ">
                    
                    <div class="xl:m-5 m-3">
                        <p class="font-bold text-white text-xl uppercase pt-5">Resumo do Carrinho</p>
                    </div>

                    <div class="xl:m-5 m-3">
                    <p class="text-white text-base mb-2">Tem um cupom?</p>
                        <div class="grid grid-cols-2">
                            <div class="grid-cols-1">
                                <input id="cupom_code" class="py-2 border border-orange bg-transparent p-2 text-white uppercase" type="text">
                            </div>
                            <div class="grid-cols-1">
                                 <button id="cupom_button" class="bg-orange text-black border border-orange font-bold w-full  px-2 py-2"><small>APLICAR</small></button>
                            </div>
                        </div>

                    </div>

                    <?php if ($this->cart_model->getCartFromCupom($this->session->userdata('session_user')['id'])['cart_discount'] > 0) { ?>
                        <div class="flex justify-between xl:m-5 pt-2 mb-3 m-3 border border-orange p-3 ">
                            <p class="text-orange font-bold line-clamp-1 text-xl"><small><?=$this->cart_model->getCupomById($this->cart_model->getCartFromCupom($this->session->userdata('session_user')['id'])['cart_discount_id'])['cart_discount_code'];?></small></p>
                            <p class="text-orange font-bold  text-xl"><small><?=$this->cart_model->getCartFromCupom($this->session->userdata('session_user')['id'])['cart_discount']?>% DE DESCONTO</small> <i style="font-size:25px;cursor:pointer" onclick="disaplyCupom(<?=$this->cart_model->getCartFromCupom($this->session->userdata('session_user')['id'])['cart_discount_id']?>) " class="fal fa-times ml-5 text-red-500"></i></p>
                        </div>
                    <?php } ?>
                    
                    <div class="flex justify-between xl:m-5 pt-8 mb-3 m-3">
                        <p class="text-white  text-xl">TOTAL</p>
                        <p class="text-white  text-xl">R$ <?=$this->cart_model->getTotalCart()?></p>
                    </div>

                    <div class="xl:ml-5 xl:mr-5 mb-0 xl:mt-0 mt-5  m-3">
                        <button class="bg-orange text-black mb-5 font-bold w-full  px-3 py-3">CONCLUIR PAGAMENTO <i class="fas ml-3  fa-chevron-right text-black"></i></button>
                    </div>

                    <?php if ($this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_credit'] >= $this->cart_model->getTotalCart()) { ?>
                        <div class="xl:ml-5 xl:mr-5 mb-0 xl:mt-0  m-3">
                                <form action="<?=base_url() ?>pagamentos/credito" method="POST">
                                    <input name="credito" type="hidden">
                                    <button type="submit" class="bg-green-500 text-white mb-5 font-bold w-full  px-3 py-3">PAGAR COM MEUS CRÉDITOS</button>
                                </form>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section>

    <?php } else { ?>

            <section >
                <div  class="text-center bg-darkLight">
                        <p class="text-white text-xl font-semibold uppercase pt-20">Carrinho Vazio</p>
                    
                        <p class="text-white uppercase"><small>Adicione items no carrinho</small></p>


                            <a href="<?=base_url() ?>">
                            <button class="bg-orange text-black mt-5 mb-20 px-3 py-2"> <small><i class="fas fa-chevron-left "></i> VOLTAR E COMPRAR</small></button>

                            </a>
                    </div>
            </section>

    <?php } ?>

    <!-- Footer -->
        <?php $this->load->view('comp/Footer');?>
    <!-- Footer -->
        <?php $this->load->view('comp/js');?>
        <script>

            function deleteTicket(cart_ticket, cart_user, cart_raffle) {
                $.ajax({
                    method: 'POST',
                    url: '<?=base_url() ?>carrinho/deleteCartTicket',
                    data: {
                        cart_ticket:cart_ticket,
                        cart_user:cart_user,
                        cart_raffle: cart_raffle
                    },
                    success: function (data) {
                           
                           location.reload()
                   },
                   error: function (data) {
                       swal('Ocorreu um erro temporário.');
                   },
                });
            }

            function deleteCart(cart_id, cart_user, cart_raffle) {

                $.ajax({
                    method: 'POST',
                    url: '<?=base_url() ?>carrinho/deletecart',
                    data: {
                        cart_id:cart_id,
                        cart_user:cart_user,
                        cart_raffle: cart_raffle
                    },
                    success: function (data) {
                           
                            location.reload()
                    },
                    error: function (data) {
                        swal('Ocorreu um erro temporário.');
                    },
                });
            }
        </script>

        <script>

            function disaplyCupom(cupom_id) {
                $.ajax({
                        method: 'POST',
                        url: '<?=base_url() ?>carrinho/desaplyCupom',
                        data: {
                            cupom_id:cupom_id,
                        
                        },
                        success: function (data) {

                            var resp = JSON.parse(data)

                            if (resp.status == "true") {

                                location.reload()

                            } else {

                                swal(resp.message)

                            }
                               
                        },
                        error: function (data) {
                            swal('Ocorreu um erro temporário.');
                        },
                    });

            }


            $('#cupom_button').on('click', function(e) {
                var cart_discount_code = $('#cupom_code').val()

                if (cart_discount_code.length > 0 ){
                    $.ajax({
                        method: 'POST',
                        url: '<?=base_url() ?>carrinho/applyCupom',
                        data: {
                            cart_discount_code:cart_discount_code,
                        
                        },
                        success: function (data) {

                            var resp = JSON.parse(data)

                            if (resp.status == "true") {

                                location.reload()

                            } else {

                                swal(resp.message)

                            }
                               
                        },
                        error: function (data) {
                            swal('Ocorreu um erro temporário.');
                        },
                    });
                } else {
                    swal('Insira um código válido.')
                }
            })
           

        </script>

</body>
</html>