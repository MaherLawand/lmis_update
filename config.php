<?php

$conn = mysqli_connect("localhost", "root", "", "lmis_system");

if (!$conn) {
    echo "Connection Failed";
}