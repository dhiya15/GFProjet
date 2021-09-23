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
                                    <p>Comment allez vous aujourd'hui !</p>
                                    <a class="banner_btn" href="#">Voir le nouveau</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--================Projects Area =================-->
            <section class="projects_area p_120">
                <div class="container">
                    <div class="main_title">
                        <h2>Les dernier projets ajouter</h2>
                    </div>
                    <div class="projects_fillter">
                        <ul class="filter list">
                            <li class="active" data-filter="*"><a href="#">All Categories</a></li>
                            <?php
                            $sql = "SELECT `categorie` FROM `project` GROUP BY `categorie`";
                            $exec = mysqli_query($conn, $sql);
                            $arr = array();
                            $i = 0;
                            while ($row = mysqli_fetch_array($exec)) {
                                $arr[$i] = $row;
                                $i++;
                            }

                            for ($i = 0; $i < count($arr); $i++) {
                                ?>
                                <li data-filter=".<?php echo $arr[$i]['categorie']; ?>">
                                    <a href="#">
                                        <?php echo $arr[$i]['categorie']; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>



                    <div class="projects_inner row">
                        <?php
                        include 'projects/limit.php';
                        $sql = "SELECT `project`.`id`,`project`.`title`,`project`.`categorie`,"
                                . "`project`.`description`,`project`.`date`,`project`.`image`,"
                                . "`users`.`fname`,`users`.`lname` FROM `project` INNER JOIN "
                                . "`users` ON `users`.`id`=`project`.`user_id` ORDER BY `date` DESC "
                                . "LIMIT " . LimitP::$start_projects_number . ", " . LimitP::$end_projects_number;
                        $exec = mysqli_query($conn, $sql);
                        $arr = array();
                        $i = 0;
                        while ($row = mysqli_fetch_array($exec)) {
                            $arr[$i] = $row;
                            $i++;
                        }

                        for ($i = 0; $i < count($arr); $i++) {
                            ?>

                            <div class="l_blog_item col-lg-4 col-sm-6 brand <?php echo $arr[$i]['categorie']; ?> ">
                                <div class="l_blog_img">
                                    <img class="img-fluid" src="data:image/jpeg;base64,<?php echo base64_encode($arr[$i]['image']); ?>" alt="">                                    
                                </div>
                                <div class="l_blog_text">
                                    <div class="date">
                                        <a href="#"><?php echo $arr[$i]['date']; ?>  |  Par <?php echo $arr[$i]['fname'] . " " . $arr[$i]['lname']; ?></a>
                                    </div>
                                    <a href="show_project.php?id=<?php echo $arr[$i]['id']; ?>">
                                        <h4><?php echo $arr[$i]['title']; ?></h4>
                                    </a>
                                    <p><?php echo substr($arr[$i]['description'], 0, 50); ?></p>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                </div>
            </section>

            <?php //include 'static/footer.php'; ?>
            <?php include 'static/calljs.php'; ?>
            <?php include 'static/onload.php'; ?>    
            
        </body>
    </html>
    <?php
} else {
    echo "<script>window.open('index.php', '_self')</script>";
}
