<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <?php
        $pendaftaran = $this->m_pendaftaran->tampil_data();
        echo "<script> var pendaftaran = ".json_encode($pendaftaran->result()).";</script>";
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>ANALISA PENYAKIT</b></h4>
                        <div style="text-align: right; margin-bottom: 10px;">
                            <a href='#' class="on-default edit-row btn btn-success" data-toggle="modal" data-target="#custom-width-modal" onClick="ResetInput()" class="col-sm-6 col-md-4 col-lg-3">
                                <i class="ti-plus"></i></a>
                        </div>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Resep Obat</th>
                                    <th>Analisa Penyakit</th>
                                    <th>Diagnosa Penyakit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                    $no = 1;
                                    foreach($resep->result() as $u){ 
                                        echo"<tr>
                                        <td>".$no."</td>
                                        <td>".$u->nama."</td>
                                        <td>".$u->resep."</td>
                                        <td>".$u->diagnosa."</td>
                                        <td>".$u->analisa."</td>
                                        <td>
                                            
                                            <a href ='#' class='on-default edit-row btn btn-primary' data-toggle='modal' data-target='#custom-width-modal' onClick=\"SetInput('".$u->id_resep."','".$u->id_pendaftaran."','".$u->resep."')\" class='col-sm-6 col-md-4 col-lg-3'>
                                            <i class='ti-pencil'></i></a>
                                           
                                          
                                            <a href='#' class='on-default default-row btn btn-danger' data-toggle='modal' data-target='#delete-modal' onClick=\"setInput1('".$u->id_resep."','".$u->id_pendaftaran."','".$u->resep."')\" class='col-sm-6 col-md-4 col-lg-3'>
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
                        <h4 class="modal-title">ANALISA PENYAKIT</h4>
                        <form action="<?php echo base_url('bidan/resep/add'); ?>" method="post">
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="id_resep" name="id_resep">
                                    <label for="field-3" class="control-label">Nama Pasien</label>
                                    <select class="form-control selectpicker"  data-style="btn-white"  id="id_pendaftaran" name="id_pendaftaran"required>
                                        <option value=""></option>
                                        <?php
                                        $pendaftaran = $this->m_pendaftaran->tampil_data();
                                        foreach($pendaftaran->result() as $row) {
                                            echo "<option value='".$row->id_pendaftaran."'>".$row->nama."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Resep Obat</label>
                                   <input type="text" class="form-control" id="resep" name="resep" required>
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
                        <h4 class="modal-title" id="custom-width-modalLabel">RESEP OBAT</h4>
                        <form action="<?php echo base_url('bidan/resep/delete'); ?>" method="post" class="form-horizontal" role="form">
                    </div>
                    <div class="modal-body">
                        <h4>Konfirmasi</h4>
                        <p>Apakah anda yakin ingin menghapus data ini ?</p>
                        <div class="form-group">
                             <input type="hidden" id="id_analisa1" name="id_analisa1">
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
                    function SetInput(id_resep, id_pendaftaran, resep) {
                        document.getElementById('id_resep').value = id_resep;
                        document.getElementById('id_pendaftaran').value = id_pendaftaran;
                        document.getElementById('resep').value = resep;
                    }
                    function setInput1(id_resep, id_pendaftaran, resep) {
                        document.getElementById('id_resep1').value = id_resep;
                        document.getElementById('id_pendaftaran1').value = id_pendaftaran;
                        document.getElementById('resep1').value = resep;
                    }
                    function ResetInput(id_resep, id_pendaftaran, resep) {
                        document.getElementById('id_resep').value = "";
                        document.getElementById('id_pendaftaran').value = "";
                        document.getElementById('resep').value = "";
                    }

                   
                    </script>
                    