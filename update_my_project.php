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
                                    <p>Modifier votre projet ici !</p>
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
                                    <h2>Information du projet</h2>
                                </div>

                                <?php
                                    $object = new DBConnect();
                                    $conn = $object->conn;
                                    $sql = "select * from `project` WHERE `id` = " . $_GET['id'];

                                    $exec = mysqli_query($conn, $sql);
                                    $result = array();
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($exec)) {
                                        $result[$i] = $row;
                                        $i++;
                                    }
                                ?>

                                <form class="row contact_form" action="projects/update_project.php?id=<?php echo $result[0]['id']; ?>&user_id=<?php echo $result[0]['user_id']; ?>" method="post" id="contactForm" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="title" placeholder="Titre du projet" value="<?php echo $result[0]['title']; ?>" required="required">
                                        </div>
                                        <div class="form-group">
                                            <input list="categories" name="categorie" id="category" class="form-control" required="required" value="<?php echo $result[0]['categorie']; ?>" placeholder="Catégorie">
                                            <datalist id="categories">
                                              <option value="Economie">
                                              <option value="Informatique">
                                              <option value="Agriculture">
                                              <option value="Ergonomique">
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value="<?php echo $result[0]['address']; ?>"  class="form-control" id="subject" name="address" placeholder="Address" required="required">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="description" id="message" rows="1" placeholder="Description du projete" required="required"><?php echo $result[0]['description']; ?></textarea>
                                        </div>
                                        <div class="">
                                            <input type="file" name="image" accept="image/*" class="" placeholder="Image du projet" required="required"/>                                        
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <input type="submit" value="Modifier" class="btn submit_btn">
                                    </div>
                                </form>

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
    } else {
        echo "<script>window.open('index.php', '_self')</script>";
    }