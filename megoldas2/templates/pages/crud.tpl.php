<h2>Fetch API CRUD - Szerelők kezelése</h2>

<div id="uzenet"></div>

<form id="szereloForm">
    <div>
        <label>Azonosító:</label><br>
        <input type="number" id="az" required>
    </div>
    <div>
        <label>Név:</label><br>
        <input type="text" id="nev" required>
    </div>
    <div>
        <label>Kezdés éve:</label><br>
        <input type="number" id="kezdev" required>
    </div>
    <button type="submit" id="mentesGomb">Mentés</button>
    <button type="button" onclick="formTorles()">Mégse</button>
</form>

<table border="solid 1px black">
    <thead>
    <tr>
        <th>Azonosító</th>
        <th>Név</th>
        <th>Kezdés éve</th>
        <th>Műveletek</th>
    </tr>
    </thead>
    <tbody id="szereloTablaBody"></tbody>
</table>