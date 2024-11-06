<?php


$currentScript = basename($_SERVER['SCRIPT_NAME']);
?>
<header class="header">
    <nav class="flex">
        <a href="index.php" class="logo">
            <img src="assets/images/IMG_2296.png" alt="Coffee Corner Express Logo">
            TeaProj. E-Sip
        </a>
        <div class="hamburger" id="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
        <nav class="navbar">
            <a class="nav-link <?php echo ($currentScript == 'index.php') ? 'active' : ''; ?>" href="index.php">Home</a>
            <a class="nav-link <?php echo ($currentScript == 'index-menu.php') ? 'active' : ''; ?>" href="index-menu.php">Menu</a>
            <a class="nav-link <?php echo ($currentScript == 'sign-in-page.php') ? 'active' : ''; ?>" href="sign-in-page.php">Login</a>
            <a class="nav-link <?php echo ($currentScript == 'sign-up-page.php') ? 'active' : ''; ?>" href="sign-up-page.php">Register</a>
        </nav>
    </nav>
</header>

<script>
    document.getElementById('menu-btn').addEventListener('click', function() {
        document.querySelector('.navbar').classList.toggle('show');
    });
</script>
