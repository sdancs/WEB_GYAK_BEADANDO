<h2>Beérkezett üzenetek</h2>

<?php if (isset($hibauzenet)): ?>
    <p style="color: red;"><?= $hibauzenet ?></p>
<?php endif; ?>

<?php if (count($uzenetek) > 0): ?>
    <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 10px;">Küldő neve</th>
                <th style="padding: 10px;">E-mail</th>
                <th style="padding: 10px;">Tárgy</th>
                <th style="padding: 10px;">Üzenet</th>
                <th style="padding: 10px;">Küldés ideje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($uzenetek as $u): ?>
                <tr>
                    <td style="padding: 10px;"><?= htmlspecialchars($u['nev']) ?></td>
                    <td style="padding: 10px;"><?= htmlspecialchars($u['email']) ?></td>
                    <td style="padding: 10px;"><?= htmlspecialchars($u['targy']) ?></td>
                    <td style="padding: 10px;"><?= nl2br(htmlspecialchars($u['uzenet'])) ?></td>
                    <td style="padding: 10px;"><?= $u['datum'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Még nem érkezett üzenet.</p>
<?php endif; ?>