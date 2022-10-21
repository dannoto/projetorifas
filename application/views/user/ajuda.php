<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Ajuda</title>
    <?php $this->load->view('comp/css');?>
</head>
<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar');?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar');?>

    <section>
   
            <h1 style="font-size:30px ;" class="text-xl mt-12 text-5x1 font-semibold text-white xl:ml-64 ml-12">Perguntas Frequentes</h1>
     
    </section>

    <section>
        <br><br>
        <div class="faq-container">
            <h1 style="font-size:25px ;" class="text-xl text-5x1 font-semibold text-white xl:ml-64 ml-12">Perguntas Frequentes</h1>
        </div>
        <section class="faq-container">
            <div class="faq-one">
                <!-- faq question -->
                <h1 class="faq-page text-white">What is an FAQ Page?</h1>
                <!-- faq answer -->
                <div class="faq-body">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                        necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                        aperiam.
                        Perspiciatis, porro!</p>
                </div>
            </div>
            <hr class="hr-line">
            <div class="faq-one">
                <!-- faq question -->
                <h1 class="faq-page text-white">What is an FAQ Page?</h1>
                <!-- faq answer -->
                <div class="faq-body">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                        necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                        aperiam.
                        Perspiciatis, porro!</p>
                </div>
            </div>
            <hr class="hr-line">
            <div class="faq-one">
                <!-- faq question -->
                <h1 class="faq-page text-white">What is an FAQ Page?</h1>
                <!-- faq answer -->
                <div class="faq-body">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                        necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                        aperiam.
                        Perspiciatis, porro!</p>
                </div>
            </div>
            <hr class="hr-line">
            <div class="faq-one">
                <!-- faq question -->
                <h1 class="faq-page text-white">What is an FAQ Page?</h1>
                <!-- faq answer -->
                <div class="faq-body">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                        necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                        aperiam.
                        Perspiciatis, porro!</p>
                </div>
            </div>
        </section>
    </section>

        
    <!-- Footer -->
        <?php $this->load->view('comp/Footer');?>
    <!-- Footer -->
    <?php $this->load->view('comp/js');?>
    <script src="<?=base_url() ?>assets/faq/main.js"></script>

    <script>
        var faq = document.getElementsByClassName("faq-page");
        var i;

        for (i = 0; i < faq.length; i++) {
            faq[i].addEventListener("click", function () {
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


</body>
</html>