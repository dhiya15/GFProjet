<?php

$id = $_GET['id'];
$user_id = $_GET['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once 'project.php';
    
    $project = new Project();
    
    $project->setId($id);
    
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
    
    $project->setUser_id($user_id);
    
    $result = $project->update();
    
    $message = "";
    if ($result['response'] == 0) {
        $message = "Reussir !";
    } else {
        $message = "Erreur !";   
    }
    // $message = "$title, $categorie, $description, $address, $id, $user_id";
    //$message = $result['response'];
    echo "<script>alert('$message')</script>";
    echo "<script>window.open('../all_my_projects.php', '_self')</script>";
    
}