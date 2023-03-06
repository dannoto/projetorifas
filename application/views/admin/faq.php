<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meus Sorteios</title>
    <?php $this->load->view('comp/css'); ?>

</head>

<style>
    .input {
        width: 100%;
        border: 1px solid orange;
        height: 40px;
        background-color: #1c1c27;
        padding: 12px;
        color: #FFF;
    }
</style>

<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/navbar'); ?>
    <!-- Navbar -->
    <?php $this->load->view('comp/admin/sidebar'); ?>

    <section>

        <div class=" xl:ml-36 xl:mr-36 xl: mt-12 m-3 perfil-sorteios-breadcumb">
            <h1 class="text-white font-bold text-xl text-3x1">FAQ</h1>
            <p class="text-white xl:font-semibold">Gerencie as perguntas frequentes.</p>

            <!-- <button  class="text-orange text-white font-semibold px-3 py-2 border border-orange hidden mt-2"  id="openModalEdit">+ EDITAR SORTEIO</button>  -->

        </div>

        <div class="grid xl:grid-cols-1 xl:ml-24 xl:mr-24 xl:mt-12">


            <div class="col-span-1 xl:m-0 m-3">


                <div>
                    <button id="myBtn" class=" px-3 py-2 border border-1 border-yellow-500 text-yellow-500 font-semibold">+ ADICIONAR FAQ</button>
                </div>

                <div>
                    <section class="grid xl:grid-cols-5 grid-cols-1">

                        <?php foreach ($faqs as $f) { ?>
                            <!-- <div class="grid xl:grid-cols-3 grid-cols-1"> -->

                            <div class="xl:col-span-1 col-span-1">
                                <button id="<?= $f->id ?>" class="pt-5 delete-faq" style="padding-top:50px">
                                    <i class="fa fa-close text-red-500" style="font-size:50px"></i>
                                </button>
                            </div>
                            <div class="xl:col-span-4 col-span-1">
                                <p class="text-yellow-500 font-semibold" style="padding-top: 50px;"><?= $f->faq_title ?></p>
                                <div>
                                    <p class="text-white"><?= $f->faq_content ?></p>
                                    <br>
                                    <hr style="width:100%;height:1px;background-color:#FFF">
                                </div>
                            </div>



                          
                        <?php } ?>
                    </section>

                </div>


            </div>
        </div>
        <br><br>
    </section>




    <!-- add Faq -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1 class="text-xl text-5x1 font-bold text-white ">Nova FAQ</h1>
            <!-- <p class="text-white">Publique um novo sorteio para seus usuários.</p> -->

            <div>
                <form action="" id="form-faq">
                    <div class="grid xl:grid-cols-1 grid-cols-1">
                        <br>

                        <label class="text-white" for="">TÍTULO</label>
                        <input type="text" name="faq_title" class="input" maxlength="200" required>
                        <br>
                        <label class="text-white" for="">CONTEÚDO</label>
                        <textarea name="faq_content" style="height:200px;" class="input" id="" required></textarea>
                        <br><br>
                    </div>
                    <div class="xl:m-2 xl:mt-0 mt-5">
                        <button class="text-black bg-orange px-3 py-3 font-semibold w-full">CRIAR FAQ</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- add Faq -->


    <?php $this->load->view('comp/js'); ?>

    <script src="<?= base_url() ?>assets/faq/main.js"></script>

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
    </script>

    <script>
        var faq = document.getElementsByClassName("faq-page");
        var i;

        for (i = 0; i < faq.length; i++) {
            faq[i].addEventListener("click", function() {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("active");

                /* Toggle between hiding and showing the active panel */
                var body = this.nextElementSibling;
                if (body.style.display === "block") {
                    body.style.display = "none";
                } else {
                    body.style.display = "block";
                }
            });
        }
    </script>

    <script>
        $('.delete-faq').on('click', function(e) {
            e.preventDefault();

            var faq_id = $(this).attr('id')

            // alert(faq_id)

            $.ajax({
                url: '<?= base_url() ?>painel/actdeletefaq',
                type: 'POST',
                data: {
                    faq_id: faq_id
                },
                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        location.reload()
                        // swal(resp.message)

                    } else {
                        swal(resp.message)
                    }

                },
                error: function(data) {
                    swal('Ocorreu um erro inesperado.')
                },

            });

        })
    </script>
    <script>
        $("#form-faq").submit(function(e) {

            e.preventDefault();

            var content = $(this).serialize();

            $.ajax({
                url: '<?= base_url() ?>painel/actaddfaq',
                type: 'POST',
                data: content,
                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        location.reload()
                        // swal(resp.message)

                    } else {
                        swal(resp.message)
                    }

                },
                error: function(data) {
                    swal('Ocorreu um erro inesperado.')
                },

            });
        });
    </script>


</body>

</html>