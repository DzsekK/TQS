

<div class="card card_ranglista">

  <div class="card-header head_rang">
  <h2>Ranglista</h2>
  <p>Itt találod a játékban legjobb pontszámot elért játékosokat</p>   
  </div>

  <table class="table table-hover table_rang">
    <thead>
      <tr>
        <th>Helyezés</th>
        <th>Felhasználónév</th>
        <th>Pontszám</th>
      </tr>
    </thead>
    <tbody>
    <?php $szam=1 ?>
    <?php foreach ($felhasznalok as $felhasznalo): ?>
      
                    <tr>
                        <td><?php echo $szam++ ?></td>
                        <td><?php echo $felhasznalo['felhasznalo_nev'] ?></td>
                        <td><?php echo $felhasznalo['pontszam'] ?></td>
                       
                       
                    </tr>
                <?php endforeach; ?>
  </table>
  
</div>