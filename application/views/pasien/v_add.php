<div class="content-wrapper">
	<section class="content">
			<form action="<?php echo base_url().'pasien/add_data'; ?>" method="post" class="form-group ml-3 mt-0
        ">
			<div class="form-group">
        <input type="hidden" class="form-control" >
      </div>
      <div class="form-group">
        <label for="namapasien">NAMA PASIEN</label>
        <input type="text" name="namapasien"  class="form-control" id="namapasien" placeholder="Nama Pasien">
      </div>
      <div class="form-group">
        <label for="jeniskelamin">JENIS KELAMIN</label>
        <select class="form-control form-control-lg" id="jeniskelamin" name="jeniskelamin">
          <option>pria</option>
          <option>wanita</option>
        </select>
    </div>
    <div class="form-group">
        <label for="kotalahir">KOTA KELAHIRAN</label>
        <input type="text" class="form-control" id="kotalahir" name="kotalahir"  placeholder="KOTA KELAHIRAN">
      </div>
      <div class="form-group">
        <label for="tgllahir">TANGGAL LAHIR</label>
        <input type="date" class="form-control" id="tgllahir" name="tgllahir" placeholder="Tanggal Lahir" >
      </div>

      <div class="form-group">
        <label for="Alamat">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
      </div>
         <div class="form-group">
        <label for="provinsi">PROVINSI</label>
        <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi" >
      </div>
      <div class="form-group">
        <label for="kota">KOTA</label>
        <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota" >
      </div>
      <div class="form-group">
        <label for="kecamatan">KECAMATAN</label>
        <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan" >
      </div>
      <div class="form-group">
        <label for="kelurahan">KELURAHAN</label>
        <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Kelurahan" >
      </div>
      <div class="form-group">
        <label for="ibukandung">NAMA IBU KANDUNG</label>
        <input type="text" class="form-control" id="ibukandung" name="ibukandung"  placeholder="Nama ibu kandnug">
      </div>

      <div class="form-group">
        <label for="nohp">No Hp</label>
        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No Handphone" >
      </div>
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
			</form>
	
	</section>
</div>