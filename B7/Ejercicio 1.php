<?php
include 'RecursosIntroB/includes/header.php'
?>
<form method="post" action="Ejercicio_1.php" enctype="multipart/form-data">
    <label for="image"><b>Upload file:</b></1abel>
        <input type="file" name="image" accept="image/*" id="image">
        <br>
        <input type="submit" value="Upload">
</form>

<?php
include 'RecursosIntroB/includes/footer.php'
?>