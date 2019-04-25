<?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=restaurante', 'root', '');
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage() . '<br/>';
        exit;
    }
