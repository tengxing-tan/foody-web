<?php
/**
 * Establish database
 * db name: 'foodydb'
 */
$conn = mysqli_connect("localhost", "root", NULL, "foodydb", "3306") or die(mysqli_connect_error());
