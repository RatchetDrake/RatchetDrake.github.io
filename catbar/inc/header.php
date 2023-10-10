<nav>
    <span><box-icon type='solid' name='cat' animation='tada-hover' color="#fff" size="45px"></box-icon> Chat Peau De paille</span>
    <ul>
        <li><a href="support.php">Support</a></li>
        <?php if ($_GET['page'] !== "login") : ?>
            <li><a href="login.php"> <?php echo !empty($_SESSION) ? 'Se Déconnecter' : "S'identifier"?></a></li>
        <?php endif; ?>
    </ul>
</nav>