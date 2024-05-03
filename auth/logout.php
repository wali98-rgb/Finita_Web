<?php
session_start();

// Menghapus Session
session_destroy();

header('location:../index.php?pesan=logout');
