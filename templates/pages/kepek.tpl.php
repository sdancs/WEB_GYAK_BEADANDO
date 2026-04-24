<h2>Képgaléria</h2>

<?php
// Feltöltött képek listázása
$dir = './images/upload/';
$kepek = array();

// Végigolvassuk a mappát
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != "." && $file != "..") {
                $kepek[] = $file;
            }
        }
        closedir($dh);
    }
}
?>

<div class="gallery-container">

    <?php foreach($kepek as $kep): ?>
        <div class="gallery-item">
            <img src="images/upload/<?= $kep ?>" alt="kep">
        </div>
    <?php endforeach; ?>

</div>

<hr>

<?php if(isset($_SESSION['login'])): ?>

    <h3>Kép feltöltése</h3>

    <form action="feltolt" method="post" enctype="multipart/form-data">
        <input type="file" name="kep" required>
        <button type="submit">Feltöltés</button>
    </form>

<?php else: ?>

    <p>Feltöltéshez jelentkezzen be!</p>

<?php endif; ?>