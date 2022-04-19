

<div class="card card_felhasznalok">

    <div class="card-header head_felh">
  <h2>Üdvözlünk,<?php echo($user['felhasznalo_nev']) ?> </h2>
    </div>
         
  <table class="table table-hover table_felhasznalok">
    <thead>
      <tr>
        <th>ID</th>
        <th>Felhasználónév</th>
        <th>Email</th<>
        <th>Pontszám</th>
        <th>Müvelet</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($felhasznalok as $felhasznalo): ?>
      
                    <tr >
                        <td><?php echo $felhasznalo['id']?></td>
                        <td><?php echo $felhasznalo['felhasznalo_nev'] ?></td>
                        <td><?php echo $felhasznalo['email']?></td>
                        <td><?php echo $felhasznalo['pontszam'] ?></td>
                        <td><button onclick="user_delete(<?php echo $felhasznalo['id'] ?>)" class="btn btn-danger" style="width: 100%;">Törlés</button></td>
                       
                       
                    </tr>
                <?php endforeach; ?>
  </table>
  
  <p ><a class="link link_felh" href="<?php echo base_url(); ?>kerdes_felvetel">Kérdés felvétele</a></p>
  <p ><a class="link link_felh" href="<?php echo base_url(); ?>valasz_felvetel">Válasz felvétele</a></p>


</div>


<script>
	function user_delete(id) {
		if(confirm("Biztos, hogy törölni szeretné a kiválasztott felhasználót?")){
			location = "<?php echo base_url() . "kezdolap/user_delete/" ?>" +id;
		}
	}

</script>
