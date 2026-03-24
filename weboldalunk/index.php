<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sárgahegyi Tiszta Víz Kft</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=LINE+Seed+JP&family=Playpen+Sans+Thai:wght@100..800&display=swap" rel="stylesheet">
    <script src="uzenet.js" defer></script> 
</head>
<body>

    <nav id="menu">
        <a href="?oldal=index.tpl">Főoldal</a>
        <a href="?oldal=kepek">Képek</a>
        <a href="?oldal=kapcsolat">Kapcsolat</a>
        <a href="?oldal=crud">CRUD</a>
        
        <?php if(isset($_SESSION['login'])): ?>
            <span style="font-size: 16px; margin-right: 20px;">
                Bejelentkezett: <?php echo $_SESSION['csaladi_nev'] . " " . $_SESSION['utonev'] . " (" . $_SESSION['login'] . ")"; ?>
            </span>
            <a href="?oldal=uzenetek">Üzenetek</a> <a href="?oldal=kilepes" id="logoff">Kilépés</a>
        <?php else: ?>
            <a href="?oldal=belepes" id="login">Bejelentkezés</a>
        <?php endif; ?>
    </nav>

    <div id="content">
        <?php include($keresett_oldal_fajlja); ?> 
    </div>

</body>
</html>