<?php
require_once "header.php";
require_once 'database.php';
?>
<div class="client_add">
    <form action="client_add_traitement.php" method="post">
        <input type="text" name="firstname" placeholder="Firstname">
        <input type="text" name="lastname" placeholder="Lastname">
        <input type="text" name="phone" placeholder="Phone number">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="city" placeholder="City">
        <input type="text" name="code_postal" placeholder="Cp">
        <input type="submit">
    </form>
</div>
<?php
require_once "footer.php";
?>

