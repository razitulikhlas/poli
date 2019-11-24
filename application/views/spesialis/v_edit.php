<div class="content-wrapper">
	<section class="content">
		<?php foreach($spesialis as $row) { ?>
			<form action="<?php echo base_url().'spesialis/update'; ?>" method="post" class="form-group ml-3 mt-0
        ">
			 <div class="form-group">
        <input type="hidden" class="form-control" name="kode_spesialis" value="<?= $row->kd_spesialis ?>">
      </div>
      <div class="form-group">
        <label for="namaspesialis">NAMA SPESIALIS</label>
        <input type="text" name="namaspesialis" class="form-control" id="namaspesialis" value="<?= $row->nama ?>" placeholder="Nama Spesialis">
      </div>
    <div class="form-group">
        <label for="tarif">TARIF</label>
        <input type="text" class="form-control" id="tarif" name="tarif" placeholder="Tarif" value="<?= $row->tarif ?>">
      </div>
      <div class="form-group">
        <label for="keterangan">KETERANGAN</label>
        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $row->keterangan ?></textarea>
      </div>
     
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
			</form>
		<?php } ?>
	</section>
</div>