<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include_once 'project.php';
    
    $project = new Project();
    
    $id = $_GET['id'];
    $project->setId($id);
    
    $result = $project->delete();

    $message = "";
    if ($result['response'] == 0) {
        $message = "Reussir !";   
    } else {
        $message = "Erreur !";
    }
    
    echo "<script>alert('$message')</script>";
    echo "<script>window.open('../all_my_projects.php', '_self')</script>";
}
