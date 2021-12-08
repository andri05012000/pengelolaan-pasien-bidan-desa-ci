<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>PENDAFTARAN PASIEN</b></h4>
                        <!-- Full width modal -->
                        <div style="text-align: right; margin-bottom: 10px;">
                            <a href='#' class="on-default edit-row btn btn-success" data-toggle="modal" data-target="#custom-width-modal" onClick="ResetInput()" class="col-sm-6 col-md-4 col-lg-3">
                                <i class="ti-plus"></i></a>
                        </div>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Alamat Pasien</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                    $no = 1;
                                    foreach($pendaftaran->result() as $u){ 
                                        echo"<tr>
                                        <td>".$no."</td>
                                        <td>".$u->nama."</td>
                                        <td>".$u->alamat."</td>
                                        <td>
                                            
                                            <a href ='#' class='on-default edit-row btn btn-primary' data-toggle='modal' data-target='#custom-width-modal' onClick=\"SetInput('".$u->id_pendaftaran."','".$u->nama."','".$u->alamat."')\" class='col-sm-6 col-md-4 col-lg-3'>
                                            <i class='ti-pencil'></i></a>
                                           
                                          
                                            <a href='#' class='on-default default-row btn btn-danger' data-toggle='modal' data-target='#delete-modal' onClick=\"setInput1('".$u->id_pendaftaran."','".$u->nama."','".$u->alamat."')\" class='col-sm-6 col-md-4 col-lg-3'>
                                            <i class='ti-trash'></i></a>
                                        </td>
                                    </tr>";
                                    $no++;
                                    } 
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- container -->
        <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">PENDAFTARAN PASIEN</h4>
                        <form action="<?php echo base_url('admin/pendaftaran/add'); ?>" method="post">
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="form-group">
			                        <input type="hidden" id="id_pendaftaran" name="id_pendaftaran">
			                        <label for="field-3" class="control-label">Nama Pasien</label>
                            		<input type="text" class="form-control" id="nama" name="nama" required>
                        		</div>
                        	</div>
                        </div>	
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Alamat Pasien</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required >
                                </div>
                            </div>
                        </div>	
                        <div class="hidden">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">User</label>
                                    <select type="hidden" class="form-control" id="id_user" name="id_user" data-style="btn-white" >
                                        <option value="1">Super Admin</option>
                                        <option value="2">Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>  

                        <td>
                        <div class="model-footer">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                    <button type="submit" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Batal</button>
                               </div>
                                </td>
                                </td>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="width:55%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="custom-width-modalLabel">PENDAFATRAN PASIEN</h4>
                        <form action="<?php echo base_url('admin/pendaftaran/delete'); ?>" method="post" class="form-horizontal" role="form">
                    </div>
                    <div class="modal-body">
                        <h4>Konfirmasi</h4>
                        <p>Apakah anda yakin ingin menghapus data ini ?</p>
                        <div class="form-group">
                             <input type="hidden" id="id_pendaftaran1" name="id_pendaftaran1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
                    </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal--->



	                <script type="text/javascript">
	                function SetInput(id_pendaftaran, nama, alamat) {
	                    document.getElementById('id_pendaftaran').value = id_pendaftaran;
	                    document.getElementById('nama').value = nama;
	                    document.getElementById('alamat').value = alamat;
	                }
	                function setInput1(id_pendaftaran, nama, alamat) {
	                    document.getElementById('id_pendaftaran1').value = id_pendaftaran;
	                    document.getElementById('nama1').value = nama;
	                    document.getElementById('alamat1').value = alamat;
	                }
	                function ResetInput(id_pendaftaran, nama, alamat) {
	                    document.getElementById('id_pendaftaran').value = "";
	                    document.getElementById('nama').value = "";
	                    document.getElementById('alamat').value = "";
	                }

	               
	                </script>
	                