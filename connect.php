<?php
  $title = $_POST['title'];
  $author = $_POST['author']; 
  $pages = $_POST['pages'];
  $category = $_POST['category'];

  $conn = new mysqli('localhost', 'root', '', 'bookList');
  $stmt = $conn->prepare("insert into Book(title, author, pages, category) 
  values(?, ?, ?, ?)");

  $stmt->bind_param("ssis", $title, $author, $pages, $category);
  $stmt->execute();
  
  ?>