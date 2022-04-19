
<div class="card card_kerdes ">
<h2 class="mt-3 mt-3_kerdes">Kérdés felvétele.</h2>
<form action="<?php echo base_url(); ?>kerdes_felvetel" method="POST">
    <div class="form-group form_kerdes">
        <label for="leiras">Kérdés:</label>
        <input type="text" class="form-control" id="leiras in_ker" style="width: 600px;" placeholder="Leírás" name="leiras" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['leiras']) ?>" <?php endif; ?>>
    </div>
    <div class="form-group form_kerdes">
        <label for="temakor">Témakör:</label>
        <select class="form-control" id="temakor" name="temakor" style="width: 600px;" >
            <?php 

            foreach($temakor as $row)
            { 
             echo '<option value="'.$row->id.'">'.$row->id.' '.$row->leiras.'</option>';
             
            }
           
            ?>
            </select>


    </div>
    <div class="form-group form_kerdes">
        <label for="nehezseg" >Nehézségi szint:</label>

        <select class="form-control" id="nehezseg" name="nehezseg" style="width: 600px;">
            <?php 

            foreach($nehezseg as $row)
            { 
             echo '<option value="'.$row->id.'">'.$row->id.' '.$row->leiras.' </option>';
            
            }
            ?>
            </select>

    </div>
    
    <button type="submit" class="btn btn-primary btn_kerdes">Felvétel</button>

</form>

</div>
