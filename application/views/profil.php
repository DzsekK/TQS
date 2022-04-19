

<div class="card card_profil">
  <div class="card-header head_prof">
    <h1>Profilom</h1>
  </div>
<div class="card-body body_prof">

  <h2>Üdvözlünk,<?php echo($user['felhasznalo_nev']) ?> </h2>
  <p>Itt találod a profilodhoz tartozó információkat,illetve megváltoztathatod jelszavad.</p> 
    
  
 
  <table class="table table-sm ">
    <thead>
      <tr>
        <th>Felhasználónév</th>
        <th>Email</th>
        <th>Jelszó</th>
        <th>Pontszam</th>
        <th>Jelszó megváltoztatása</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo($user['felhasznalo_nev']) ?></td>
        <td><?php echo($user['email']) ?></td>
        <td>******</td>
        <td><?php echo($user['pontszam']) ?></td>
        
        <td><button onclick="window.location='<?php echo base_url(); ?>valtoztatas'">Jelszó megváltoztatása</button></td>
      </tr>
      
     
    </tbody>
  </table>
  </div>
</div>
