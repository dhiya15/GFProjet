<?php
    //session_start();
    include_once 'static/dbconnect.php';
    $object = new DBConnect();
    $conn = $object->conn;
    $sql = "SELECT * FROM `users` WHERE `id` = " . $_SESSION['result'];
    $exec = mysqli_query($conn, $sql);
    $arr = array();
    $i = 0;
    while ($row = mysqli_fetch_array($exec)) {
        $arr[$i] = $row;
        $i++;
    }
    $result = $arr;
?>
<header class="header_area">
    <div class="main_menu" id="mainNav">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="home.php">Accueil</a></li> 
                        <li class="nav-item"><a class="nav-link" href="all_my_messages.php?id=<?php echo $_SESSION['result']; ?>">Messages</a> (<span id="nbr_msg">0</span>)</li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $result[0]['fname'] . " " . $result[0]['lname']; ?></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="add_my_project.php">Ajouter projet</a></li>
                                <li class="nav-item"><a class="nav-link" href="all_my_projects.php">Mes projet</a></li>
                                <li class="nav-item"><a class="nav-link" href="profil.php">Profil</a></li>
                                <li class="nav-item"><a class="nav-link" href="logout.php">Deconnexion</a></li>
                            </ul>
                        </li> 
                    </ul>
                </div> 
            </div>
        </nav>
    </div>
</header>
