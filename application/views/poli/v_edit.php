<div class="content-wrapper">
	<section class="content">
		<?php foreach($poli as $row) { ?>
			<form action="<?php echo base_url().'poli/update'; ?>" method="post">
				<div class="form-group">
        <input type="hidden" class="form-control" name="kd_poli" value="<?= $row->kd_poli ?>">
      </div>
      <div class="form-group">
        <label for="namapoli">NAMA POLI</label>
        <input type="text" name="namapoli" class="form-control" id="namapoli" placeholder="Nama Poli" value="<?= $row->nama ?>">
      </div>
      <div class="form-group">
        <label for="kd_dokter">KODE DOKTER</label>
        <select class="form-control form-control-lg" id="kd_dokter" name="kd_dokter" >
          <?php 
              $dokter =$this->dokter_model->get_data();;
           ?>
          
          <?php foreach($dokter as $row) : ?>
          <option><?php echo $row['kd_dokter']. '-'.$row['nama']  ?></option>
        <?php endforeach; ?>
        </select>
    </div>
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
			</form>
		<?php } ?>
	</section>
</div>