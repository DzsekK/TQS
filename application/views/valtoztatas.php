

<div class="card card_valt" style="width: 18rem;">
  
  <div class="card-body body_valt">
    <h5 class="card-title">Jelszó megváltoztatása</h5>
    <form action="<?php echo base_url(); ?>valtoztatas" method="POST">
    <div class="form-group">
        <label for="password">Jelszó:</label>
        <input type="password" class="form-control" id="password" placeholder="Jelszó" name="password" required>
    </div>
    <div class="form-group">
        <label for="new_password">Új jelszó:</label>
        <input type="new_password" class="form-control" id="new_password" placeholder="Új jelszó" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required title="A jelszónak legalább egy kis egy nagybetüt valamint egy számot kell tarlamaznia. Legalább 6 karakter hosszú kell,hogy legyen.">
    </div>
    <div class="form-group">
        <label for="new_password_confirm">Új jelszó megerősítése:</label>
        <input type="new_password_confirm" class="form-control" id="new_password_confirm" placeholder="Új jelszó mégegyszer" name="new_password_confirm" required>
    </div>
    <button type="submit" class="btn btn-primary btn_valt">Jelszó megváltoztatása</button>
  </div>
</form>
</div>
  
</div>