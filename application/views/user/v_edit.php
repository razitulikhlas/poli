<div class="content-wrapper">
	<section class="content">
		<?php foreach($user as $row) { ?>
			<form action="<?php echo base_url().'user/update'; ?>" method="post">
			
				<div class="form-group">
	        		<label for="kduser"></label>
				    <input type="hidden" class="form-control" name="kduser" id="kduser" value="<?php echo $row->kd_user ?>">
			    </div>
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row->nama ?>">
      </div>
      <div class="form-group">
        <label for="kdpoli">Level</label>
        <input type="text" name="level" class="form-control" id="kdpoli" value="<?php echo $row->level ?>">
      </div>
      <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" name="foto" class="form-control" id="foto" value="<?php echo $row->photo ?>">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" value="<?php echo $row->password ?>">
         
      </div>
      
      
   
      
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
          <?php echo form_close(); ?>
			</form>
		<?php } ?>
	</section>
</div>