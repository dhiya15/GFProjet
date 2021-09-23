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
                            <h2>Vos messages</h2>
                        </div>
                    </div>
                </div>
            </section>
            <!--================End Home Banner Area =================-->
<?php 
$sql = "SELECT `message`.`froom`,`message`.`too`,`message`.`about`,`message`.`message`,`message`.`date`,`users`.`fname`,`users`.`lname`,`users`.`username`,`project`.`title`,`project`.`image` FROM `message` INNER JOIN `users` ON `message`.`froom`=`users`.`id` INNER JOIN `project` ON `message`.`about`=`project`.`id` WHERE `message`.`id`=".$_GET['id_msg'];
$exec = mysqli_query($conn, $sql);
$arr = mysqli_fetch_array($exec)
?>
            <!--================Portfolio Details Area =================-->
            <section class="portfolio_details_area p_120">
                <div class="container">
                    <div class="portfolio_details_inner">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="left_img">
                                    <img class="img-fluid" src="data:image/jpeg;base64,<?php echo base64_encode($arr['image']); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portfolio_right_text">
                                    <h4>Message</h4>
                                    <p><?php echo $arr['date']; ?></p>
                                    <ul class="list">
                                        <li><span>Source</span>: <?php echo $arr['fname'] . " " . $arr['lname']; ?></li>
                                        <li><span>Email</span>: <?php echo $arr['username']; ?></li>
                                        <li><span>Projet</span>:  <?php echo $arr['title']; ?></li>
                                        <li><span>Message</span>:  <?php echo $arr['message']; ?></li>
                                        <li style="margin-top: 25px;">
                                            <a class="genric-btn info radius show-alert"><span style="color: black">Répondez</span></a>
                                            <a style="margin-left: 30px;" class="genric-btn info radius" href="messages/delete_message.php?idMsg=<?php echo $_GET['id_msg']; ?>" onclick="return confirm('Vous voulez vraiment supprimer le message !')">
                                                <span style="color: black">Supprimer</span>
                                            </a>
                                        </li>
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

            <?php include 'static/calljs.php'; ?>
            <!-- bootbox code -->
            <script src="bootbox/bootbox.min.js"></script>
            <script src="bootbox/bootbox.locales.min.js"></script>
            
            <script>
                $(document).on("click", ".show-alert", function (e) {
                    var f = <?php echo $arr['too']; ?>;
                    var t = <?php echo $arr['froom']; ?>;
                    var a = <?php echo $arr['about']; ?>;
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
