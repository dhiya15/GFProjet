<?php 
    session_start();
    if(isset($_SESSION['result'])){ 
?>
<!doctype html>
<html lang="en">
    <head>
        <?php include 'static/head.php'; ?>
    </head>
    <body>
        <!--================ Navbar =================-->
        <?php include 'static/navbar2.php'; ?>

        <!--================ Home =================-->
        <section class="home_banner_area">
            <div class="banner_inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="home_left_img">
                                <img src="img/banner/home-left-1.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner_content">
                                <h5>Bienvenue</h5>
                                <h2><?php echo $result[0]['fname'] . " " . $result[0]['lname']; ?></h2>
                                <p>Modifier votre information ici !</p>
                                <a class="banner_btn" href="#">Commencer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--================Feature Area =================-->
        <section class="feature_area p_120">
            <div class="container">
                <div class="feature_inner row">
                    <div class="col-lg-2 col-sm-2 text-center"></div>
                    <div class="col-lg-8 col-sm-8 text-center">
                        <div class="testi_item">
                            <div class="main_title">
                                <h2>Mes information</h2>
                            </div>
                            <form class="row contact_form" action="users/update_user.php?id=<?php echo $result[0]['id']; ?>" method="post" id="contactForm">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="fname" placeholder="Nom" required="required" value="<?php echo $result[0]['fname']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="lname" placeholder="Prénom" required="required" value="<?php echo $result[0]['lname']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="phone" class="form-control" id="subject" name="phone" placeholder="Téléphone" required="required" value="<?php echo $result[0]['phone']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="subject" name="username" placeholder="Email" required="required" value="<?php echo $result[0]['username']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="subject" name="pass" placeholder="Mot de passe" required="required" value="<?php echo $result[0]['pass']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <input type="submit" value="Enregistrer" class="btn submit_btn">
                                </div>
                            </form>
                            <div style="margin-top: 30px;">
                                <a href="users/delete_user.php?id=<?php echo $result[0]['id']; ?>" onclick="return confirm('Vous voulez vraiment supprimer le compte !')">Supprimer mon compte</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 text-center"></div>
                </div>
            </div>
        </section>


        <?php include 'static/footer.php'; ?>
        <?php include 'static/calljs.php'; ?>
        <?php include 'static/onload.php'; ?>
    </body>
</html>
<?php 
    }else{
        echo "<script>window.open('index.php', '_self')</script>";
    }
