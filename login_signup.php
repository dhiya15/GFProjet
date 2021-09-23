<!doctype html>
<html lang="en">
    <head>
        <?php include 'static/head.php'; ?>
    </head>
    <body>
        <!--================ Navbar =================-->
        <?php include 'static/navbar.php'; ?>

        <!--================ Signin_sign up =================-->
        <section class="testimonials_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>Inscris vous / Se connecter</h2>
                    <p>Gratuit et rest toujours gratuit</p>
                </div>
                <div class="testi_inner">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="testi_item">
                                <h2>Inscription</h2>
                                <form class="row contact_form" action="users/add_user.php" method="post" id="contactForm">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="fname" placeholder="Nom" required="required">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="lname" placeholder="Prénom" required="required">
                                        </div>
                                        <div class="form-group">
                                            <input type="phone" class="form-control" id="subject" name="phone" placeholder="Téléphone" required="required">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="subject" name="username" placeholder="Email" required="required">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="subject" name="pass" placeholder="Mot de passe" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <input type="submit" value="Inscrir" class="btn submit_btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="testi_item">
                                <h2>Se connecter</h2>
                                <form class="row contact_form" action="users/find_user.php" method="post" id="contactForm">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="subject" name="username" placeholder="Email" required="required">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="subject" name="pass" placeholder="Mot de passe" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <input type="submit" value="Se connecter" class="btn submit_btn">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <?php include 'static/footer.php'; ?>
        <?php include 'static/calljs.php'; ?>
    </body>
</html>