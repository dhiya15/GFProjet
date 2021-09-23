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
            <script>$('#nbr_msg').text(0);</script>
            <?php
            include 'static/navbar2.php';

            $sql = "UPDATE `message` SET `notify`=0 WHERE `too`=" . $_SESSION['result'];
            $exec = mysqli_query($conn, $sql);

            $sql = "SELECT `message`.`id`, `message`.`froom`, `message`.`too`, `message`.`about`, `message`.`message`, `message`.`date`, `message`.`notify`, `message`.`readed`,`users`.`id` as `user_id`, `users`.`username`, `project`.`title` FROM `message` INNER JOIN `users` ON `message`.`froom`=`users`.`id` AND `message`.`too`=".$_SESSION['result']." INNER JOIN `project` ON `message`.`about`=`project`.`id` WHERE `message`.`hidefroom`=0";
            $exec = mysqli_query($conn, $sql);

            $arr = array();
            $i = 0;
            while ($row = mysqli_fetch_array($exec)) {
                $arr[$i] = $row;
                $i++;
            }
            ?>

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

            <table class="table table-dark">         
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Source</th>
                        <th scope="col">Date</th>
                        <th scope="col">Message</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($arr !== null) { for ($i = 0; $i < count($arr); $i++) { ?>
                    <tr>
                        <th scope="row"><?php echo $i+1; ?></th>
                        <td><?php echo $arr[$i]['username']; ?></td>
                        <td><?php echo $arr[$i]['date']; ?></td>
                        <td><?php echo substr($arr[$i]['message'], 0, 70)."..."; ?></td>
                        <td><a href="show_message.php?id_msg=<?php echo $arr[$i]['id']; ?>">Afficher</a></td>
                    </tr>
                    <?php }} ?>
                </tbody>      
            </table>

            <?php include 'static/footer.php'; ?>
            <?php include 'static/calljs.php'; ?>
            <!-- bootbox code -->
            <script src="bootbox/bootbox.min.js"></script>
            <script src="bootbox/bootbox.locales.min.js"></script>
            <script>
                
            </script>
            <?php include 'static/onload.php'; ?>
            
        </body>
    </html>
    <?php
} else {
    echo "<script>window.open('index.php', '_self')</script>";
}
