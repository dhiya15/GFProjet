<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    include_once 'project.php';
    
    $project = new Project();
    
    $id = $_GET['id'];
    $project->setId($id);
    
    $index = $_GET['index'];
    
    $result = $project->find($index);
    
    
}