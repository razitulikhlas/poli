<div class="content-wrapper">
	<section class="content">
		<?php foreach($obat as $row) { ?>
			<form action="<?php echo base_url().'obat/update'; ?>" method="post">
				<div class="form-group">
              <input type="hidden" class="form-control" name="kode_obat" id="kode_obat" value="<?php echo $row->kd_obat ?>">
            </div>
            <div class="form-group">
              <label for="namaobat">NAMA OBAT</label>
              <input type="text" name="namaobat" class="form-control" id="namaobat" placeholder="Nama Obat" value="<?php echo $row->nama_obat ?>">
            </div>
            <div class="form-group">
              <label for="jenisobat">JENIS Obat</label>
              <select class="form-control form-control-lg" id="jenisobat" name="jenisobat">
                <option>Pil</option>
                <option>tablet</option>
              </select>
          </div>
          <div class="form-group">
            <label for="tgl_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control" id="tgl_masuk" name="tglmasuk" value="<?php echo $row->tgl_masuk ?>">
          </div>
          <div class="form-group">
            <label for="expired">EXPIRED OBAT</label>
            <input type="text" class="form-control" id="expired" name="expired" placeholder="Expired Obat" value="<?php echo $row->expired ?>">
          </div>
          <div class="form-group">
            <label for="keterangan">KETERANGAN</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $row->keterangan ?>" placeholder="Keterangan Obat">
          </div>
         <div class="form-group">
            <label for="harga">harga</label>
            <input type="text" value="<?php echo $row->harga ?>" class="form-control" id="harga" name="harga" placeholder="harga">
          </div>
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
			</form>
		<?php } ?>
	</section>
</div>