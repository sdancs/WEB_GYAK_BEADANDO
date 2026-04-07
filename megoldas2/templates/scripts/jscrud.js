const apiUrl = '/logicals/api.php';
let isEditing = false;

// Oldal betöltésekor fut le minden
document.addEventListener("DOMContentLoaded", () => {

    // adatok lekérése
    fetchSzerelok();

    // FORM eseménykezelő IDE kerül!
    document.getElementById('szereloForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const az = document.getElementById('az').value;
        const nev = document.getElementById('nev').value;
        const kezdev = document.getElementById('kezdev').value;

        const payload = { az: az, nev: nev, kezdev: kezdev };
        const method = isEditing ? 'PUT' : 'POST';

        try {
            const response = await fetch(apiUrl, {
                method: method,
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });

            const result = await response.json();

            if (result.status === 'sikeres') {
                mutatUzenet(result.uzenet, "green");
                formTorles();
                fetchSzerelok();
            } else {
                mutatUzenet("Hiba: " + result.uzenet, "red");
            }

        } catch (error) {
            mutatUzenet("Hálózati hiba történt!", "red");
        }
    });

});

// --- READ ---
async function fetchSzerelok() {
    try {
        const response = await fetch(apiUrl);
        const data = await response.json();
        renderTable(data);
    } catch (error) {
        mutatUzenet("Hiba az adatok betöltésekor!", "red");
    }
}

// --- Táblázat ---
function renderTable(data) {
    const tbody = document.getElementById('szereloTablaBody');
    tbody.innerHTML = '';

    data.forEach(szerelo => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${szerelo.az}</td>
            <td>${szerelo.nev}</td>
            <td>${szerelo.kezdev}</td>
            <td>
                <button onclick="editSzerelo(${szerelo.az}, '${szerelo.nev}', ${szerelo.kezdev})">Szerkesztés</button>
                <button onclick="deleteSzerelo(${szerelo.az})">Törlés</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

// --- EDIT ---
function editSzerelo(az, nev, kezdev) {
    document.getElementById('az').value = az;
    document.getElementById('nev').value = nev;
    document.getElementById('kezdev').value = kezdev;

    document.getElementById('az').readOnly = true;
    isEditing = true;
    document.getElementById('mentesGomb').textContent = "Módosítás";
}

// --- DELETE ---
async function deleteSzerelo(az) {
    if (!confirm("Biztosan törölni szeretnéd?")) return;

    try {
        const response = await fetch(apiUrl, {
            method: 'DELETE',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ az: az })
        });

        const result = await response.json();

        if (result.status === 'sikeres') {
            mutatUzenet(result.uzenet, "green");
            fetchSzerelok();
        } else {
            mutatUzenet("Hiba a törlésnél!", "red");
        }

    } catch (error) {
        mutatUzenet("Hálózati hiba történt!", "red");
    }
}

// --- RESET ---
function formTorles() {
    document.getElementById('szereloForm').reset();
    document.getElementById('az').readOnly = false;
    isEditing = false;
    document.getElementById('mentesGomb').textContent = "Mentés";
}

// --- ÜZENET ---
function mutatUzenet(szoveg, szin) {
    const div = document.getElementById('uzenet');
    div.textContent = szoveg;
    div.style.color = szin;
    setTimeout(() => div.textContent = '', 3000);
}