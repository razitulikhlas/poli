<div class="content-wrapper">
	<section class="content">
		<?php foreach($jenispoli as $row) { ?>
			<form action="<?php echo base_url().'jenispoli/update'; ?>" method="post">
				<div class="form-group">
        <input type="hidden" class="form-control" name="kd_poli" value="<?= $row->kd_poli ?>">
      </div>
      <div class="form-group">
        <label for="namapoli">NAMA POLI</label>
        <input type="text" name="namapoli" class="form-control" id="namapoli" placeholder="Nama Poli" value="<?= $row->nama_poli ?>">
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Nama Poli" value="<?= $row->keterangan ?>">
      </div>
      
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
			</form>
		<?php } ?>
	</section>
</div>