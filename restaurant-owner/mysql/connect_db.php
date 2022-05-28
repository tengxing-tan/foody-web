<?php
/**
 * Establish database
 * db name: 'foody'
*/
$conn = mysqli_connect("localhost", "root", NULL, "foody", "3306") or die(mysqli_connect_error());