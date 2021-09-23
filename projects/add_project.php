<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once 'project.php';
    
    $project = new Project();
    
    $title = $_POST['title'];
    $project->setTitle($title);
    
    $categorie = $_POST['categorie'];
    $project->setCategorie($categorie);
    
    $address = $_POST['address'];
    $project->setAddress($address);
    
    $description = $_POST['description'];
    $project->setDescription($description);
    
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    $project->setImage($img);
    
    $user_id = $_GET['user_id'];
    $project->setUser_id($user_id);
    
    $result = $project->insert();
    
    $message = "";
    if ($result['response'] == 0) {
        $message = "Reussir !"; 
    } else {
        $message = "Erreur !";
    }
    
    echo "<script>alert('$message')</script>";
    echo "<script>window.open('../add_my_project.php', '_self')</script>";
    
}