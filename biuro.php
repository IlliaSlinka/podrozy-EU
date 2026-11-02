<?php
$polaczenie = mysqli_connect("localhost", "root", "", "podroze");
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl9.css">
    <title>Poznaj Europę</title>
</head>

<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <main>
        <section id="lewy">
            <h2>Promocje</h2>
            <table>
                <tr>
                    <td>Warszawa</td>
                    <td>od 600zł</td>
                </tr>
                <tr>
                    <td>Wenecja</td>
                    <td>od 1200 zł</td>
                </tr>
                <tr>
                    <td>Paryż</td>
                    <td>od 1200 zł</td>
                </tr>
            </table>
        </section>
        <section id="srodkowy">
            <h2>W tym roku jedziemy do...</h2>
            <!-- skrypt 1 -->
            <?php
            $wynik1 = mysqli_query($polaczenie, "SELECT zdjecia.nazwaPliku, zdjecia.podpis FROM zdjecia ORDER BY zdjecia.podpis ASC;");
            while ($wiersz1 = mysqli_fetch_array($wynik1)) {
                echo "<img src='$wiersz1[0]' alt='$wiersz1[1]' title='$wiersz1[1]'>";
            }
            ?>
        </section>
        <section id="prawy">
            <h2>Kontakt</h2>
            <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 444555666</p>
        </section>
    </main>
    <article>
        <h3>W poprzednich latach byliśmy...</h3>
        <ol>
            <!-- skrypt 2 -->
            <?php
            $wynik2 = mysqli_query($polaczenie, "SELECT wycieczki.cel, wycieczki.dataWyjazdu FROM wycieczki WHERE wycieczki.dostepna != TRUE;");
            while ($wiersz2 = mysqli_fetch_array($wynik2)) {
                echo "<li>";
                echo "Dnia $wiersz2[1] pojecahliśmy do $wiersz2[0]";
                echo "</li>";
            }
            ?>
        </ol>
    </article>
    <footer>
        <p>Stronę wykonał: Illia Slinka</p>
    </footer>
</body>

</html>

<?php
mysqli_close($polaczenie);
?>