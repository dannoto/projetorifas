<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Pagamentos</title>
    <?php $this->load->view('comp/css'); ?>
</head>

<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar'); ?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar'); ?>






    <section  class="xl:mt-32 mt-32">


        <h1 style="font-size:25px ;" class="text-xl text-5x1 text-left font-semibold text-white xl:ml-32 ml-12">Meus Pagamentos</h1>
        <div class="grid xl:grid-cols-1 xl:ml-36 xl:mr-36 xl:mt-12">


            <br>
            <br>

            <div class="col-span-1 xl:m-0 m-3">

                <table id="table_raffles" class="display text-white w-full">
                    <thead>
                        <tr>
                            <th class="text-white"><small>ID</small></th>
                            <th class="text-white"><small>DATA</small></th>
                            <th class="text-white"><small>VALOR </small></th>
                            <th class="text-white"><small>PROCESSAMENTO</small></th>
                            <th class="text-white"><small>TIPO</small></th>

                            <th class="text-white"><small>STATUS</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pagamentos as $r) { ?>
                            <tr>
                                <td>
                                    <p>#<?= $r->id ?></p>
                                </td>

                                <td>
                                    <p><?= $r->payments_date; ?> às <?= $r->payments_time ?></p>
                                </td>
                                <td>
                                    <p>R$ <?= $r->payments_amount; ?></p>
                                </td>
                                <td>
                                    <p style="font-size:12px;text-transform:uppercase">
                                        <?php if ($r->payments_proccess == 1) {
                                            echo "MercadoPago";
                                        } else if ($r->payments_proccess == 0) {
                                            echo "Crédito da Conta";
                                        } ?>
                                    </p>
                                </td>
                                <td>
                                    <p><?= $r->payments_type ?></p>
                                </td>
                                <td style="font-size:12px;text-transform:uppercase">
                                    <p>
                                        <?php
                                        if ($r->payments_status == 1) {
                                            echo "aprovado";
                                        } else if ($r->payments_status == 2) {
                                            echo "pendente";
                                        } else if ($r->payments_status == 3) {
                                            echo "recusado";
                                        } else if ($r->payments_status == 4) {
                                            echo "estornado";
                                        }
                                        ?>
                                    </p>
                                </td>


                            </tr>


                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </section>


    <!-- Footer -->
    <?php $this->load->view('comp/Footer'); ?>
    <!-- Footer -->
    <?php $this->load->view('comp/js'); ?>
    <script src="<?= base_url() ?>assets/faq/main.js"></script>


    <script>
        $(document).ready(function() {
            $('#table_raffles').DataTable();
        });
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


</body>

</html>