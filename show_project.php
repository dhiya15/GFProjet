<?php
session_start();
if (isset($_SESSION['result'])) {
    ?>
    <!doctype html>
    <html lang="en">
        <head>
            <?php include 'static/head.php'; ?>
        </head>
        <body>
            <!--================ Navbar =================-->
            <?php include 'static/navbar2.php'; ?>


            <!--================Home Banner Area =================-->
            <section class="banner_area">
                <div class="banner_inner d-flex align-items-center">
                    <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                    <div class="container">
                        <div class="banner_content text-center">
                            <h2>Détails du projet</h2>
                        </div>
                    </div>
                </div>
            </section>
            <!--================End Home Banner Area =================-->

            <?php
            $sql = "SELECT `project`.`id`,`project`.`title`,`project`.`categorie`,`project`.`address`,`project`.`description`,`project`.`date`,`project`.`image`,`project`.`user_id`,`users`.`fname`,`users`.`lname`,`users`.`username` FROM `project` INNER JOIN `users` ON `users`.`id`=`project`.`user_id` WHERE `project`.`id`=" . $_GET['id'];
            $exec = mysqli_query($conn, $sql);
            $arr = array();
            $i = 0;
            while ($row = mysqli_fetch_array($exec)) {
                $arr[$i] = $row;
                $i++;
            }
            ?>

            <!--================Portfolio Details Area =================-->
            <section class="portfolio_details_area p_120">
                <div class="container">
                    <div class="portfolio_details_inner">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="left_img">
                                    <img class="img-fluid" src="data:image/jpeg;base64,<?php echo base64_encode($arr[0]['image']); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portfolio_right_text">
                                    <h4><?php echo $arr[0]['title']; ?></h4>
                                    <p><?php echo $arr[0]['description']; ?></p>
                                    <ul class="list">
                                        <li><span>Categorie</span>: <?php echo $arr[0]['categorie']; ?></li>
                                        <li><span>Date</span>:  <?php echo $arr[0]['date']; ?></li>
                                        <li><span>Auteur</span>:  <?php echo $arr[0]['fname'] . " " . $arr[0]['lname']; ?></li>
                                        <li><span>Address</span>:  <?php echo $arr[0]['address']; ?></li>
                                        <li><span>Email</span>:  <?php echo $arr[0]['username']; ?></li>
                                        <li style="margin-top: 25px;"><button class="btn btn-info show-alert">Enoyer un message</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p></p>
                        <p></p>
                    </div>
                </div>
            </section>
            <!--================End Portfolio Details Area =================-->


            <?php include 'static/footer.php'; ?>
            <?php include 'static/calljs.php'; ?>
            <!-- bootbox code -->
            <script src="bootbox/bootbox.min.js"></script>
            <script src="bootbox/bootbox.locales.min.js"></script>
            <script>
                $(document).on("click", ".show-alert", function (e) {
                    var f = <?php echo $_SESSION['result']; ?>;
                    var t = <?php echo $arr[0]['user_id']; ?>;
                    var a = <?php echo $_GET['id']; ?>;
                    console.log("from : " + f);
                    console.log("to : " + t);
                    bootbox.prompt({
                        title: "Ecrire votre message",
                        inputType: 'textarea',
                        callback: function (m) {
                            console.log("message : " + m);
                            if(m !== null){
                                $.ajax({
                                    method: "POST",
                                    url: "messages/send_message.php",
                                    data: {from: f, to: t, message: m, about: a},
                                    success: function (data, textStatus, jqXHR) {
                                        console.log(data);
                                        bootbox.alert("Message envoyé avec succé");
                                    },  
                                    error: function (jqXHR, textStatus, errorThrown) {
                                        bootbox.alert("Erreur :( !");
                                    },
                                    complete: function (jqXHR, textStatus ) {
                                        //window.open('all_my_messages.php', '_self');
                                    }
                                });
                            }
                        }
                    });
                });
            </script>
            <?php include 'static/onload.php'; ?>
        </body>
    </html>
    <?php
} else {
    echo "<script>window.open('index.php', '_self')</script>";
}
