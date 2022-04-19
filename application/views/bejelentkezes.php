

<div class="card bejelentkezes_card">
<form action="<?php echo base_url(); ?>bejelentkezes" method="POST">
    <div class="form-group bejelentkezes" >
    <h1 class="mt-3 bejelentkezesh1" >Bejelentkezés</h1>
        <label for="felhasznalo_nev">Felhasználónév:</label>
        <input type="text"  class="form-control bejelentkezes_tx"  id="felhasznalo_nev" placeholder="Felhasználónév" name="felhasznalo_nev" required >
    </div>
    <div class="form-group bejelentkezes" >
        <label for="password" >Jelszó:</label>
        <input type="password" class="form-control bejelentkezes_p"  id="password" placeholder="Jelszó" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary bejelentkezes_btn">Bejelentkezés</button>
</form>
</div>