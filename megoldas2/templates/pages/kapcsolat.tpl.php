<h1 style="margin-top: 0;">Kapcsolat</h1>
<p>Kérdése van szolgáltatásainkkal kapcsolatban? Várjuk megkeresését az alábbi elérhetőségeken!</p>

<hr>

<div style="display: flex; flex-wrap: wrap; gap: 20px;">
    <div id="contact-info" style="flex: 1; min-width: 300px;">
        <h2>Elérhetőségeink</h2>
        <ul style="line-height: 1.8;">
            <li><strong>Cégnév:</strong> Sárgahegyi Tiszta Víz Kft.</li>
            <li><strong>Cím:</strong> 6000 Kecskemét, Izsáki út 10.</li>
            <li><strong>Telefon:</strong> +36 63 123 4567</li>
            <li><strong>E-mail:</strong> info@sargahegyiviz.hu</li>
            <li><strong>Nyitvatartás:</strong> H-P: 08:00 - 16:00</li>
        </ul>
    </div>
<script src="scripts/uzenet.js" defer></script>
    <div id="contact-form" style="flex: 1; min-width: 300px;">
        <h2>Írjon nekünk!</h2>
        
        <?php if(isset($eredmeny_uzenet) && $eredmeny_uzenet != ""): ?>
            <div style="font-weight: bold; margin-bottom: 15px; padding: 10px; border-radius: 5px; color: white; background-color: <?= $eredmeny_hiba ? 'red' : 'green' ?>;">
                <?= $eredmeny_uzenet ?>
            </div>
        <?php endif; ?>

        <form id="contact-form-data" method="POST">
            <div id="js-hibak" style="color: red; font-weight: bold; margin-bottom: 15px;"></div>
            
            <label for="nev">Az Ön neve:</label><br>
            <input type="text" id="nev" name="nev" placeholder="Kovács János" style="width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; box-sizing: border-box;"><br>

            <label for="email">E-mail címe:</label><br>
            <input type="text" id="email" name="email" placeholder="pelda@email.hu" style="width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; box-sizing: border-box;"><br>

            <label for="targy">Tárgy:</label><br>
            <input type="text" id="targy" name="targy" placeholder="Miben segíthetünk?" style="width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; box-sizing: border-box;"><br>

            <label for="uzenet">Üzenet:</label><br>
            <textarea id="uzenet" name="uzenet" rows="6" placeholder="Ide írhatja az üzenetét..." style="width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; box-sizing: border-box;"></textarea><br>

            <button type="submit" id="kuldes-gomb" style="padding: 10px 20px; background-color: #333; color: white; border: none; cursor: pointer; font-size: 16px; border-radius: 5px;">Üzenet küldése</button>
        </form>
    </div>
</div>

<div class="box" style="margin-top: 30px; padding: 0;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2726.359491914282!2d19.665911876841612!3d46.89564797113354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da774e6311df%3A0x83c0e0f262ab0376!2zS2Vjc2tlbcOpdCwgQ3PDoWtpIEZyaWd5ZXMgw6lww7xsZXQsIEl6c8Oha2kgw7p0IDEwLCA2MDAw!5e0!3m2!1shu!2shu!4v1772870865824!5m2!1shu!2shu" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
