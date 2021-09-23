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
                                    <p>Vous trouverez tous vos projets ici</p>
                                    <a class="banner_btn" href="#">Commencer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--================Latest Blog Area =================-->
            <section class="latest_blog_area p_120">
                <div class="container">
                    <div class="main_title">
                        <h2>Mes projets</h2>
                    </div>
                    <div class="row latest_blog_inner">

                        <?php
                            $object = new DBConnect();
                            $conn = $object->conn;
                            $sql = "select * from `project` where `user_id`=".$_SESSION['result'];

                            $exec = mysqli_query($conn, $sql);
                            $result = array();
                            $i = 0;
                            while ($row = mysqli_fetch_array($exec)) {
                                $result[$i] = $row;
                                $i++;
                            }

                            for ($i = 0; $i < count($result); $i++) {
                        ?>
                            <div class="col-lg-4">
                                <div class="l_blog_item">
                                    <div class="l_blog_img">
                                        <img class="img-fluid" src="data:image/jpeg;base64,<?php echo base64_encode($result[$i]['image']); ?>" alt="">
                                    </div>
                                    <div class="l_blog_text">
                                        <div class="date">
                                            <a href="#"><?php echo $result[$i]['date']; ?></a>
                                        </div>
                                        <a href="">
                                            <h4><?php echo $result[$i]['title']; ?></h4>
                                        </a>
                                        <p><?php echo substr($result[$i]['description'], 0, 50); ?>...</p>
                                        <p style="margin-top: 20px;">
                                            <a href="update_my_project.php?id=<?php echo $result[$i]['id']; ?>" class="">Modifier</a>
                                            <a href="projects/delete_project.php?id=<?php echo $result[$i]['id']; ?>" class="" style="margin-left: 20px;">Supprimer</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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