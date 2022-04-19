

<div class="card card_regisztracio">
<h2 class="mt-3 mt-3_regisztracio">Regisztráció</h2>
<form action="<?php echo base_url(); ?>regisztracio" method="POST">
    <div class="form-group form_regisztracio">
        <label for="felhasznalo_nev">Felhasználónév:</label><br>
        <input type="text" class="form-control formf" style="width: 500px;" id="felhasznalo_nev" placeholder="Felhasználónév" name="felhasznalo_nev" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['felhasznalo_nev']) ?>" <?php endif; ?>>
    </div>
    <div class="form-group form_regisztracio">
        <label for="email">Email:</label><br>
        <input type="email" class="form-control forme" id="email" style="width: 500px;" placeholder="Email" name="email" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['email']) ?>" <?php endif; ?>>
    </div>
    <div class="form-group form_regisztracio">
        <label for="password">Jelszó:</label><br>
        <input type="password" class="form-control formp" id="password" style="width: 500px;" placeholder="Jelszó" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['password']) ?>" <?php endif; ?>title="A jelszónak legalább egy kis egy nagybetüt valamint egy számot kell tarlamaznia. Legalább 6 karakter hosszú kell,hogy legyen.">
    </div>
    <div class="form-group form_regisztracio">
        <label for="password_confirm">Jelszó megerősítése:</label>
        <input type="password" class="form-control formp" id="password_confirm" style="width: 500px;" placeholder="Jelszó megerősítése" name="password_confirm" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['password_confirm']) ?>" <?php endif; ?>>
    </div>
   
    <button type="submit" class="btn btn-primary btn-regisztracio">Regisztráció</button>
</form>
</div>