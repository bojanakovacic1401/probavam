<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prikupljanje podataka iz forme
    $ime = htmlspecialchars($_POST['ime']);
    $prezime = htmlspecialchars($_POST['prezime']);
    $telefon = htmlspecialchars($_POST['telefon']);
    $datum = htmlspecialchars($_POST['datum']);
    $vreme = htmlspecialchars($_POST['vreme']);

    // Provera da li je vreme u validnom rasponu (od 15:00 do 21:00)
    $validno_vreme = strtotime($vreme) >= strtotime('15:00') && strtotime($vreme) <= strtotime('21:00');

    if ($validno_vreme) {
        // Sastavljanje poruke za email
        $to = "bojanakovacic1401@gmail.com";
        $subject = "Novi zakazani termin";
        $message = "Ime: $ime\n";
        $message .= "Prezime: $prezime\n";
        $message .= "Broj telefona: $telefon\n";
        $message .= "Datum: $datum\n";
        $message .= "Vreme: $vreme\n";

        // Slanje email poruke
        $headers = "From: webmaster@example.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "Hvala što ste zakazali termin.";
        } else {
            echo "Došlo je do greške prilikom slanja email poruke.";
        }
    } else {
        echo "Uneseno vreme nije u dozvoljenom rasponu (od 15:00 do 21:00).";
    }
}
?>
