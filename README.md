# Laravel 11 Sanctum autentikációval
Admin és User felhasználói rétegekhez útvonal/csoportos útvonal kapcsolása  
Belépés és kilépés tesztelése  
A token segítségével lekérdezzük a felhasználókat (user és admin útvonalak).  

## Lépések (alap projekt esetében; most a klónozás után csak a 7. lépéstől szükséges a végrehajtás):
1. Terminálba írjuk be (Sanctum installálása):  
php artisan install:api  
2. A Model fájlban use HasApiTokens beállítása
3. A users tábla kiegészítése role mezővel (itt 0 az admin és 1 a user: default), illetve a User.php Model fájlban isAdmin és isUser függvények írása  
4. DatabaseSeeders.php-ben adatok létrehozása (itt egy admin és egy user van létrehozva)
5. Az ApiController fájlban alap sikeres és sikertelen esetek kezelése függvényekkel
6. Az AuthController (őse a fenti ApiController osztály) fájlban belépéskor email, jelszó ellenőrzése után genráltatunk egy tokent, kilépéskor töröljük a megadott tokent.  
7. php artisan db:seed vagy php artisan migrate:fresh --seed utasítás futtatásával az adatbázisba is bekerülnek az adatok (utóbbi minden egyebet is frissít az adatbázisban).
8. Tesztelés Thunder Clientben a json kiterjesztésű fájl importálásával is lehetséges.
9. Először lépjünk be valamelyik felhasználó adataival (password: abc123),  
10. majd az eredményül kapott token segítségével (Auth/Bearer) tesztelhetjük a user illetve az admin útvonalat is.
11. Kilépésnél is adjuk meg a tokent!
