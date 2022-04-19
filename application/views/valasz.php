
<div class="card card_valasz ">
<h2 class="mt-3 mt-3_valasz">Válaszok felvétele.</h2>
<form action="<?php echo base_url(); ?>valasz_felvetel" method="POST">
    <div class="form-group form_valasz">
        <label for="leiras">Válasz:</label>
        <input type="text" class="form-control " id="leiras" style="width: 600px;" placeholder="Leírás" name="leiras" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['leiras']) ?>" <?php endif; ?>>
    </div>
    <div class="form-group form_valasz">
        <label for="nehezseg" >Kérdés:</label>

        <select class="form-control " id="kerdes" style="width: 600px;" name="kerdes">
            <?php 

            foreach($kerdes as $row)
            { 
             echo '<option value="'.$row->id.'">'.$row->id.' '.$row->leiras.' </option>';
            
            }
            ?>
            </select>

    </div>
    <div class="form-group form_valasz">
        <label for="helyes">Igaz vagy hamis:</label>
        <select class="form-control " id="helyes" name="helyes" style="width: 600px;">
            <option value="1">Igaz</option>
            <option value="0">Hamis</option>
            
        </select>
  
    </div>
    
    <button type="submit" class="btn btn-primary btn_valasz">Felvétel</button>
    </form>
</div>

