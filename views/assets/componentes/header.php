<header>
    <nav>
        <div class="nav-logo">
            <a href="index.php"><img src="assets/img/aya_logo.png" alt=""></a>
        </div>
        <div class="nav-container">
            <ul class="nav-links">
                <li class="link"><a href="alertas.php">Alertas</a></li>
                <li class="link"><a href="Mapa.php">Mapa</a></li>
                <li class="link"><a href="reportes.php">Reportar</a></li>
            </ul>
        </div>

        <?php
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['idUsuario'])) {
    echo '<a href="dashboard.php"><button class="btn-login">Dashboard</button></a>';
} else {
    echo '<a href="login.php"><button class="btn-login"><i class="fa-solid fa-right-to-bracket"></i></button></a>';
}?>
    </nav>
</header>