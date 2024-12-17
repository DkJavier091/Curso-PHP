<?php
// Lista de canciones inicial
$playlist = [
    "Blinding Lights" => "The Weeknd",
    "Estoy enfermo" => "Pignoise",
    "Levitating" => "Dua Lipa",
    "One more night" => "Maroon 5",
    "Feel Good Inc." => "Gorillaz"
];

$additionalSongs = [
    "No One Left To Love" => "ROOS+BERG",
    "VOYS" => "BROCKHAMPTON",
    "Apple" => "Charli XCX",
    "Megan's Piano" => "Meghan Thee Stallion"
];

// 1. Agregar Canciones a la Lista
function addSong(&$playlist, $title, $artist, $position)
{
    if (!array_key_exists($title, $playlist)) {
        if ($position === "inicio") {
            $playlist = array_merge([$title => $artist], $playlist); // Agrega al inicio
        } else if ($position === "final") {
            $playlist[$title] = $artist; // Agrega al final
        }
        $message = "Se ha agregado satisfactoriamente la canción '$title' de '$artist' al $position.";
    } else {
        $message = "La canción ya existe en la lista, no se puede añadir.";
    }
    return "<p>$message</p>";
}

// 2. Eliminar Canciones de la Lista
function removeSong(&$playlist, $title)
{
    $firstKey = array_key_first($playlist);
    $lastKey = array_key_last($playlist);
    $message = "La canción '$title' no coincide con la primera ni la última en la lista.";

    if ($firstKey === $title) {
        array_shift($playlist); // Elimina la primera canción
        $message = "La canción '$title' fue eliminada (primera posición).";
    } elseif ($lastKey === $title) {
        array_pop($playlist); // Elimina la última canción
        $message = "La canción '$title' fue eliminada (última posición).";
    }
    return "<p>$message</p>";
}

// 3. Buscar Canciones en la Lista
function searchSong($playlist, $title)
{
    if (array_key_exists($title, $playlist)) {
        $message = "La canción '$title' se encuentra en la lista.";
    } else {
        $message = "La canción '$title' no se encuentra en la lista.";
    }
    return "<p>$message</p>";
}

// 4. Verificar si una canción existe en la lista
function checkSong($playlist, $title)
{
    $titles = array_keys($playlist);
    if (in_array($title, $titles)) {
        $message = "La canción '$title' se encuentra en la lista.";
    } else {
        $message = "La canción '$title' no se encuentra en la lista.";
    }
    return "<p>$message</p>";
}

// 5. Contar Canciones en la Lista
function countSongs($playlist)
{
    $numSongs = count($playlist);
    return "<p>El número de canciones en la lista es: $numSongs</p>";
}

// 6. Seleccionar Canciones Aleatorias
function randomSong($playlist)
{
    $randomKey = array_rand($playlist, 1);
    $artist = $playlist[$randomKey];
    return "<p>La canción aleatoria es: $randomKey - $artist</p>";
}

// 7. Imprimir la lista de canciones
function showPlaylist($playlist)
{
    $songList = implode(" - ", array_keys($playlist));
    return "<p>$songList</p>";
}

// 8. Convertir la lista de canciones en un array
function convertPlaylistToArray($songString)
{
    $playlistArray = explode(" - ", $songString);
    return $playlistArray;
}

// 9. Eliminar Canciones Duplicadas
function removeDuplicates($playlist)
{
    return array_unique($playlist);
}

// 10. Fusionar Listas de Canciones
function mergePlaylists($playlist1, $playlist2)
{
    return array_merge($playlist1, $playlist2);
}
?>


<?php include './includes/header.php'; ?>

<h2>Lista de Canciones</h2>
<ul>
    <?php foreach ($playlist as $title => $artist) : ?>
        <li><?= $title ?> - <?= $artist ?></li>
    <?php endforeach; ?>
</ul>

<h2>Agregar Canciones</h2>
<?= addSong($playlist, "Dance Monkey", "Tones and I", "final") ?>
<?= addSong($playlist, "Dance Monkey", "Tones and I", "final") ?>

<h2>Eliminar Canciones</h2>
<?= removeSong($playlist, "Blinding Lights"); ?>
<?= removeSong($playlist, "Feel Good Inc."); ?>

<h2>Lista de Canciones Actualizada</h2>
<ul>
    <?php foreach ($playlist as $title => $artist) : ?>
        <li><?= $title ?> - <?= $artist ?></li>
    <?php endforeach; ?>
</ul>

<h2>Buscar Canciones</h2>
<?= searchSong($playlist, "Levitating"); ?>

<h2>Verificar Canciones</h2>
<?= checkSong($playlist, "Dance Monkey"); ?>

<h2>Contar Canciones: </h2>
<?= countSongs($playlist); ?>

<h2>Canción Aleatoria</h2>
<?= randomSong($playlist); ?>

<h2>Lista de Reproducción</h2>
<?= showPlaylist($playlist); ?>

<h2>Convertir Lista en Array (Array Convertido)</h2>
<?php
$songString = implode(" - ", array_keys($playlist));
$playlistArray = convertPlaylistToArray($songString);
echo "<ul>";
foreach ($playlistArray as $song) {
    echo "<li>$song</li>";
}
echo "</ul>";
?>

<h2>Eliminar Canciones Duplicadas</h2>
<?php
$uniquePlaylist = removeDuplicates($playlistArray);
echo "<ul>";
foreach ($uniquePlaylist as $song) {
    echo "<li>$song</li>";
}
echo "</ul>";
?>

<h2>Fusionar Listas de Canciones</h2>
<?php
$finalPlaylist = mergePlaylists($playlist, $additionalSongs);
echo "<ul>";
foreach ($finalPlaylist as $song => $artist) {
    echo "<li>$song - $artist</li>";
}
echo "</ul>";
?>

<?php include './includes/footer.php'; ?>