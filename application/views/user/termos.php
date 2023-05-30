<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Termos</title>
    <?php $this->load->view('comp/css');?>
</head>
<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar');?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar');?>



    <section  class="xl:mt-32 mt-32">
        <br><br>
        <div class="faq-container">
            <h1 style="font-size:25px ;" class="text-xl text-5x1 text-center font-semibold text-white "><?=$this->admin_model->getTerms()['terms_title']?></h1>
        </div>
        

        <section class="faq-container">

        <div class="xl:ml-44 xl:mr-44  mt-12 ml-5 mr-5">

            <p class="text-white " style="line-break:all;"><?=$this->admin_model->getTerms()['terms_content']?></p>
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