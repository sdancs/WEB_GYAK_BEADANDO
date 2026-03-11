document.addEventListener("DOMContentLoaded", function() {
    
    let urlap = document.getElementById('kapcsolatForm');

    if (urlap) {
        urlap.addEventListener('submit', function(event) {
            let hibak = [];
            
            let nev = document.getElementById('nev').value.trim();
            let email = document.getElementById('email').value.trim();
            let targy = document.getElementById('targy').value.trim();
            let uzenet = document.getElementById('uzenet').value.trim();

            if (nev === '') {
                hibak.push("A név megadása kötelező!");
            }

            if (email === '') {
                hibak.push("Az e-mail cím megadása kötelező!");
            } else {
                let emailMinta = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailMinta.test(email)) {
                    hibak.push("Kérem, adjon meg egy érvényes e-mail címet!");
                }
            }

            if (targy === '') { hibak.push("A tárgy megadása kötelező!"); }
            if (uzenet === '') { hibak.push("Az üzenet megadása kötelező!"); }

            if (hibak.length > 0) {
                event.preventDefault(); 
                document.getElementById('js-hibak').innerHTML = hibak.join('<br>');
            } else {
                document.getElementById('js-hibak').innerHTML = ''; 
            }
        });
    }
});