<?php
function miSort(array &$miArray) {
    sort($miArray);
    return $miArray;
}

$ciclos = ['DAW', 'ASIR', 'DAM'];

miSort($ciclos);

print_r($ciclos);


?>

<?php
function incrementa(int &$numero) : int {
    return $numero++;
}

$numero = 0;

for($i=0; $i < 10; $i++) {
    echo "<p>".incrementa($numero)."</p>";
}
?>
