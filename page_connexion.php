<?php
include "header.php";
include "navbar.php";
?>
<style>
    .form-box {
    max-width: 450px;
    margin: 80px auto;
    padding: 25px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
</style>
<div class="form-box">
    <form action="actions/" method="post" class="mt-3">
        <div class="mb-3">
            <label class="form-label" for="titre">Titre</label>
            <input id="titre" type="text" required maxlength="50" name="titre" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
        </div>

        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <button type="submit" class="btn btn-success w-100">OK</button>
    </form>
</div>

<?php
include "footer.php";
?>