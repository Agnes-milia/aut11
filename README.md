# Laravel 11 Sanctum autentikációval
Admin és User felhasználói rétegekhez útvonal kapcsolása  
Belépés és kilépés ellenőrzése  
A token segítségével lekérdezzük a felhasználókat.  

## Lépések (alap projekt esetében; most a klónozás után csak az 5. lépéstől szükséges):
1. Terminálba írjuk be (Sanctum installálása):  
php artisan install:api  
2. A Model fájlban use HasApiTokens beállítása
3. A users tábla kiegészítése role mezővel (itt 0 az admin és 1 a user: default)
4. DatabaseSeeders.php-ben adatok létrehozása (itt egy admin és egy user van létrehozva)
5. php artisan db:seed vagy php artisan migrate:fresh --seed utasítás futtatásával az adatbázisba is bekerülnek az adatok (utóbbi minden egyebet is frissít az adatbázisban).
6. Tesztelés Thunder Clientben a json kiterjesztésű fájl importálásával is lehetséges.
7. Először lépjünk be valamelyik felhasználó adataival (password: abc123),  
8. majd az eredményül kapott token segítségével (Auth/Bearer) tesztelhetjük a user illetve az admin útvonalat is.
9. Kilépésnél is adjuk meg a tokent!
