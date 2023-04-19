@extends('index')

@section('isi_menu')

<div class="container-fluid">
    <!-- *************************************************************** -->
    <!-- Start First Cards -->
    <!-- *************************************************************** -->

<div class="modal fade" id="editedModal" tabindex="-1" role="dialog" aria-labelledby="editedModalLabel" aria-hidden="true">
    <form id="form_multi_edit" name="form_multi_edit" enctype="multipart/form-data" method="post" onsubmit="submit_edit_gambar_form(this); return false;">
    
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editedModalLabel">Form Edit Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Form</strong> Edit Usaha
                                    </div>
                                    <div class="card-body card-block">

                                   
                                            {{ csrf_field() }}
                                            <input type="hidden" name="edit_hidden_textfield" id="edit_hidden_textfield" />

                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Title</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="edit_text_title_new" name="edit_text_title_new" required="required" class="form-control" /><small class="form-text text-muted">Masukkan Title</small></div>
                                            </div>
                                            
                                            

                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Alt Desc</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="edit_text_desc_new" name="edit_text_desc_new" required="required"  class="form-control"><small class="form-text text-muted">Masukkan Alt Desc</small></div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Gambar Desktop <br />( landscape )</label></div>
                                                <div class="col-12 col-md-9"><input type="file" id="edit_f_upload_gambar" onchange="document.getElementById('edit_current_desktop_image').src = window.URL.createObjectURL(this.files[0]);" name="edit_f_upload_gambar" class="form-control"> <!-- <small class="form-text text-muted">Masukkan Nama Kategori</small> --> </div>

                                                <div class="col col-md-6"><div class="col-md-12"> <img src="" id="edit_desktop_image" class="img-fluid" style="opacity:0.5;" /> </div> </div>
                                                <div class="col col-md-6"><div class="col-md-12">  <img src="<?php echo url("public")."/default.png"; ?>" id="edit_current_desktop_image" class="img-fluid"  /> </div> </div>
                                            </div>
                                            

                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Gambar Mobile <br />( potrait )</label></div>
                                                <div class="col-12 col-md-9"><input type="file" id="edit_f_upload_gambar_mobile" name="edit_f_upload_gambar_mobile" onchange="document.getElementById('edit_current_mobile_image').src = window.URL.createObjectURL(this.files[0]);" class="form-control"> <!-- <small class="form-text text-muted">Masukkan Nama Kategori</small> --> </div>

                                                <div class="col col-md-6"><div class="col-md-12">  <img src="" id="edit_mobile_image" class="img-fluid" style="opacity:0.5;" /> </div> </div>
                                                <div class="col col-md-6"><div class="col-md-12">  <img src="<?php echo url("public")."/default.png"; ?>" id="edit_current_mobile_image" class="img-fluid"  /> </div> </div>

                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>

                                    <button type="reset" class="btn btn-secondary" style="display:none;" id="btn_reset">Reset</button>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>

            </div>
        </div>
    </form>

</div>

<div class="modal fade" id="detailSumbanganModal" tabindex="-1" role="dialog" aria-labelledby="editedModalLabel" aria-hidden="true">
    <form id="form_multi_edit" name="form_multi_edit" enctype="multipart/form-data" method="post" onsubmit="submit_edit_gambar_form(this); return false;">
    
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editedModalLabel">Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                        <strong>Bukti</strong> Pembayaran
                                </div>

                                <div class="card-body card-block">

                                    <div class="row">
                                    
                                        <div class="col-md-6" style="margin-top:20px;">

                                            <div class="row">
                                        
                                                <div class="col-md-12 col-12">
                                                <b> Nama Penyumbang : </b>
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <span id="span-nama-penyumbang"></span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-6" style="margin-top:20px;">

                                            <div class="row">
                                        
                                                <div class="col-md-12 col-12">
                                                <b> Metode Sumbangan : </b>
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <span id="span-metode-penyumbang"></span>
                                                </div>

                                            </div>

                                        </div>


                                        <div class="col-md-6" style="margin-top:20px;">

                                            <div class="row">
                                        
                                                <div class="col-md-12 col-12">
                                                <b> Tanggal : </b>
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <span id="span-tanggal-penyumbang"></span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-6" style="margin-top:20px;">

                                            <div class="row">
                                        
                                                <div class="col-md-12 col-12">
                                                <b> Deskripsi : </b>
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <span id="span-deskripsi-penyumbang"></span>
                                                </div>

                                            </div>

                                        </div>

                                    
                                    </div>


                                    <!-- <img src="" id="img_detail_sumbangan" alt="detail sumbangan" title="detail sumbangan" class="img-fluid" /> -->
                                </div>

                                <div class="card-body card-block">
                                    <img src="" id="img_detail_sumbangan" alt="detail sumbangan" title="detail sumbangan" class="img-fluid" />
                                </div>

                                </div>
                                
                            </div>

                                    <button type="reset" class="btn btn-secondary" style="display:none;" id="btn_reset">Reset</button>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </form>

</div>

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
  <form id="form_maintenance_usaha" name="form_maintenance_usaha" enctype="multipart/form-data" method="post" action="<?php echo url(Config::get('myconfig.adminPage')."/submit_post_add_sumbangan"); ?>">
    
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Form Maintenance Sumbangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        
        <div class="modal-body">
                
        <div class="col-lg-12">
        <div class="card">
            
        <div class="card-header">
            <strong>Form</strong> Input Sumbangan
        </div>
                        
                        
        <div class="card-body card-block">
                            
                        <!--<ul class="nav nav-tabs mb-3" id="div_tabs">-->
                        <!--    <li class="nav-item" onclick="#"><a href="#detail_usaha" data-toggle="tab" aria-expanded="false" class="nav-link active"><i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i><span class="d-none d-lg-block">Detail Usaha</span></a></li>-->
                        <!--    <li class="nav-item" onclick="#">-->
                        <!--    <a href="#pngg_jawab" data-toggle="tab" aria-expanded="false" class="nav-link "><i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i><span class="d-none d-lg-block">Penanggung Jawab</span></a>-->
                        <!--    </li>-->
                        <!--</ul>-->
                        
        <nav>
                  
        
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Detail Penyumbang</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pembayaran</a>
                    
        </div>

        </nav>
                <p>&nbsp;</p>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        
                        <div id="detail_usaha">

                            {{ csrf_field() }}

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Usaha</label></div>
                                    <div class="col-12 col-md-9">
                                        <select class="form-control" name="cmb_kategori_sumbangan" id="cmb_kategori_sumbangan" onchange="change_input(this.value);">
                                            <option value="1">Anonim</option>
                                            <option value="2">Donatur</option>
                                            <option value="3">Investor</option>
                                        </select>
                                        <!-- <input type="text" id="textinputan" name="textinputan" required="required" placeholder="" class="form-control"><small class="form-text text-muted">Masukkan Judul Berita</small> -->
                                    </div>
                                </div>

                                <div class="row form-group" id="div_usaha_display" style="display:none;">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Usaha</label></div>
                                    <div class="col-12 col-md-9">
                                        <select class="form-control" name="cmb_nama_usaha" id="cmb_nama_usaha">
                                            <option value="">- Pilih Usaha -</option>
                                                <?php
                                                foreach($usaha as $row_usa){
                                                    ?>
                                                        <option value="<?php echo $row_usa->id_usaha; ?>"><?php echo $row_usa->nama_usaha; ?></option>
                                                    <?php
                                                }
                                                ?>
                                        </select>
                                        <!-- <input type="text" id="textinputan" name="textinputan" required="required" placeholder="" class="form-control"><small class="form-text text-muted">Masukkan Judul Berita</small> -->
                                    </div>
                                </div>

                                <div class="row form-group" id="div_nama_display"  style="display:none;">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama :</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text_title_new" name="text_title_new"  class="form-control"><small class="form-text text-muted">Masukkan Nama Usaha</small></div>
                                </div>

                                <div class="row form-group" id="div_alamat_display"  style="display:none;">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Alamat :</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text_alamat_new" name="text_alamat_new" class="form-control"><small class="form-text text-muted">Masukkan Alamat Usaha</small></div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nominal  :</label></div>
                                    <div class="col-12 col-md-9"><input type="number" id="text_minimal_pembayaran" name="text_minimal_pembayaran" required="required" class="form-control" value="0" /><small class="form-text text-muted">Masukkan Inputan Minimal Pembayaran</small></div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Note :</label></div>
                                    <div class="col-12 col-md-9">
                                        <textarea id="text_email_usaha_new" name="text_email_usaha_new" required="required" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="row form-group" id="div_foto_display"  style="display:none;">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Foto :</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file_upload" name="file_upload" class="form-control" /></div>
                                </div>
                                

                                </div>
                                
                      
                    </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      
                      
                        <div id="pngg_jawab">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Metode Pembayaran  :</label></div>
                                
                                <div class="col-12 col-md-9">
                                    <select id="text_namapngg_new" name="text_namapngg_new" required="required" class="form-control">
                                        <option value="">Pilih Metode</option>
                                        <option value="1">Manual Transfer</option>
                                        <option value="3">Cash</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group"  style="margin-top:30px;">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bukti Pembayaran :</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="f_upload_gambar_mobile" name="f_upload_gambar_mobile" required="required" class="form-control"><small class="form-text text-muted">Masukkan Nama Kategori</small></div>
                            </div>
                            
                            
                            
                        </div>
                        
                  </div>
                  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                </div>

                                
                                
                            </div>
                        </div>
                        
                    </div>

                    <button type="reset" class="btn btn-secondary" style="display:none;" id="btn_reset">Reset</button>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>

            </div>
        </div>
    </form>

</div>


<div id="div_detail_berita" style="display:none;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" id="judul_berita"> Data Sumbangan </h4>
                        <hr />

                        <p>&nbsp;</p>

                        <center>
                            <div class="col-md-6">
                                <img id="img_berita" class="img-fluid" />
                            </div>
                        </center>

                        <p>&nbsp;</p>

                        <!-- <div class="col-md-12" id="isi_berita">
                            
                        </div> -->

                        </div>
                    </div>
                </div>
        </div>
</div>


<div class="content mt-3" id="div_form_berita" style="display:none;">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Data Tambah Sumbangan</strong>
                </div>
                <div class="card-body">

                <div class="col-lg-12">

                <form method="post" enctype="multipart/form-data" id="frm_berita" name="frm_berita" onsubmit="tambahdata(this); treturn false">
                    
                    <ul class="nav nav-tabs mb-3" id="div_tabs">
                        <li class="nav-item" onclick="#"><a href="#detail_usaha" data-toggle="tab" aria-expanded="false" class="nav-link "><i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i><span class="d-none d-lg-block">Detail Penyumbang</span></a>
                        </li>
                        <li class="nav-item" onclick="#"><a href="#pngg_jawab" data-toggle="tab" aria-expanded="false" class="nav-link "><i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i><span class="d-none d-lg-block">Pembayaran</span></a>
                        </li>
                    </ul>

                    <div class="card">
                        <div class="card-header">
                            <strong>Tambah</strong> Data
                        </div>
                        <div class="card-body card-block">
                            
                                <!--<div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Static</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static">Username</p>
                                    </div>
                                </div>
                                -->
                                <input type="hidden" name="t_idberita" id="t_idberita"  />

                                <div>
                                    <input type="hidden" name="t_aksi_pencarian" id="t_aksi_pencarian" value="" />
                                </div>

                                {{ csrf_field() }}

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Usaha</label></div>
                                    <div class="col-12 col-md-9">
                                        <select class="form-control" name="cmb_nama_usaha" id="cmb_nama_usaha">
                                            <option value=""></option>
                                        </select>
                                        <!-- <input type="text" id="textinputan" name="textinputan" required="required" placeholder="" class="form-control"><small class="form-text text-muted">Masukkan Judul Berita</small> -->
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Karyawan</label></div>
                                    <div class="col-12 col-md-9">
                                        <select class="form-control" name="cmb_nama_karyawan" id="cmb_nama_karyawan">
                                            <option value=""></option>
                                        </select>
                                        <input type="text" id="textinputan" name="textinputan" required="required" placeholder="" class="form-control" />
                                        <small class="form-text text-muted">Masukkan Judul Berita</small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Penyumbang</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="textinputan" name="textinputan" required="required" placeholder="" class="form-control"><small class="form-text text-muted">Masukkan Judul Berita</small></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nominal Sumbangan</label></div>
                                    <div class="col-12 col-md-9"><input type="number" id="teks_nominal_sumbangan" name="teks_nominal_sumbangan" required="required" value="0" class="form-control"><small class="form-text text-muted">Masukkan Nominal Sumbangan</small></div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Isi Usaha</label></div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="DSC" class="materialize-textarea"></textarea>
                                            <small class="form-text text-muted">Masukkan Isi Usaha</small>
                                        </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Foto</label></div>
                                    
                                    <div class="col-3 col-md-2" id="div_foto_berita">
                                        <img id="img_foto_berita" class="img-fluid" />
                                    </div>

                                    <div class="col-9 col-md-4"><input type="file" id="uploadinput" name="uploadinput" placeholder="Text" class="form-control"><small class="form-text text-muted">Upload Foto Berita</small></div>

                                </div>

                            
                        </div>
                    </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="openView()">Cancel</button>
                <button type="reset" class="btn btn-secondary" id="btn_cancel" style="display:none;">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn_submit_approve">
                    Submit
                </button>
            </div>

        </form>
                                                   
        </div>

        </div>
    </div>
</div>

      </div>
    </div><!-- .animated -->
</div><!-- .content -->

 <div class="row" id="view_berita_div">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
             
             <h4 class="card-title">Data Sumbangan</h4>

             <hr />

             <?php
               // if(Session::get('level') == "2"){
             ?>

                 <button onclick="openModal();" type="button"
                        class="btn waves-effect waves-light btn-primary"><i class="fas fa-plus"></i> Tambah Sumbangan 
                 </button>

             <?php
              //  }
             ?>
            
             <p></p>
             
            <div>

    <div class="row form-group">

    <p>&nbsp;</p>
                     
        <br clear="all" />
        <div class="col-md-12">

        <?php
            $tgl_awal = "";
            $tgl_akhir = "";

            if(isset($_GET['dateawal'])){
                $tgl_awal = $_GET['dateawal'];
            }

            if(isset($_GET['dateakhir'])){
                $tgl_akhir = $_GET['dateakhir'];
            }
        ?>


        <form method="get" name="form_search" url="<?php echo url(Config::get('myconfig.adminPage').'/datasumbangan'); ?>">
        
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-5">
                    Tanggal Awal : <br />
                    <input type="date" name="dateawal" id="dateawal" value="<?php echo $tgl_awal; ?>" class="form-control datepicker" />
                </div>
                <div class="col-md-5">
                    Tanggal Akhir : <br />
                    <input type="date" name="dateakhir" id="dateakhir" value="<?php echo $tgl_akhir; ?>" class="form-control datepicker" />
                </div>
                <div class="col-md-2">
                    
                    <button type="submit" class="form-control btn-primary" style="margin-top:23px;"> <i class="fa fa-search"></i> </button>
                </div>
            </div>

        </div>

        </form>

        </div>

        <div class="col col-md-3" style="margin-top:10px;"></div>

        <!-- <div class="col-9 col-md-9" style="margin-top:20px;">
            <input type="submit"  id="btn_submit_cari" name="btn_submit_cari" value="Cari Data" class="btn-primary" /> 
        </div> -->

    
        <div class="col-md-12">
            <p></p>
            Summary : <p></p>
            <hr />
        </div></p>

        <div class="col-md-12" style="background:#F5F5F5;">
        
            <div class="row">
                <div class="col-md-3" style="padding:5px; text-align:center; box-sizing:border-box; border-right:1px solid #DDDDDD;">
                    <b> Anonim </b> <br />
                    Rp. <?php echo format_rupiah($total_anonim); ?> , -
                </div>
                <div class="col-md-3" style="padding:5px; text-align:center;  box-sizing:border-box; border-right:1px solid #DDDDDD;">
                <b> Donatur </b> <br />
                    Rp.  <?php echo format_rupiah($total_karyawan); ?> , -
                </div>
                <div class="col-md-3" style="padding:5px; text-align:center;  box-sizing:border-box; border-right:1px solid #DDDDDD;">
                <b> Investor </b> <br />
                    Rp. <?php echo format_rupiah($total_usaha); ?> , -
                </div>
                <div class="col-md-3" style="padding:5px; text-align:center;  box-sizing:border-box; border-right:1px solid #DDDDDD;">
                <b> Keseluruhan </b> <br />
                    Rp. <?php echo format_rupiah($total_all); ?> , -
                </div>
            </div>
        </div>
    </div>


    <p>&nbsp;</p>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                
            </div>
            <div class="col-md-4">
                <div><button type="button" class="form-control btn-success" name="btn_export_pdf" id="btn_export_pdf" onClick="export_pdf_file();" /> <i class="fa fa-download"></i> &nbsp; Download Laporan</button></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-12" style="margin-top:20px; overflow:auto;">
            <table id="ikantable" class="table table-striped table-bordered display no-wrap datatable"
                style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nominal</th>
                        <th>Note</th>
                        <th>Tanggal</th>
                        <!--<th>Owner</th>-->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        $no = 1;
                        foreach($sumbangan as $rows){
                            $tgl = explode(" ",$rows->tanggal);
                            $nama = $rows->nama;

                            if($rows->nama == ""){
                                $nama = "Anonim";
                            }

                        ?>
                        
                        <tr>
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <b> <?php echo $nama; ?></b> <br /><small> <?php echo $rows->alamat; ?> </small> </b> </small>
                            </td>
                            <td>
                                Rp. <?php echo format_rupiah($rows->nominal); ?> , - <br /><small><?php echo Config::get("myconfig.metode_pembayaran")[($rows->metode)-1]; ?></small><br /><small>Via &raquo; <b> <?php echo $rows->nama_bank; ?> </b> </small>
                            </td>
                            <td>
                                <?php echo $rows->deskripsi; ?>
                            </td>
                            <td>
                                <?php echo tgl_indo($tgl[0]); ?>
                            </td>
                            <td> 
                                <a href="javascript:void(0)" onclick="view_details('<?php echo $rows->bukti_pembayaran; ?>','<?php echo $nama; ?>','<?php echo tgl_indo($tgl[0]); ?>','<?php echo $rows->deskripsi; ?>');"> <i class="fa fa-eye"></i> Detail </a> 
                            </td>
                        </tr>
                        
                        <?php
                        $no++;
                        }
                        ?>
                </tbody>
            </table>

            

    </div>

    <div id="div_container_isi">
                    

    </div>

</div>

        </div>
    </div>
</div>

</div>
                       

    <script type="text/javascript">
    
    var table = "";
    var active_id = "";

    function view_details(index,nama,tanggal,deskripsi){
        //alert("show");
        
        $("#img_detail_sumbangan").prop("src" , url_menu_asset+"/sumbangan/"+index);

        $("#span-nama-penyumbang").html(nama);
        $("#span-metode-penyumbang").html("Manual");
        $("#span-tanggal-penyumbang").html(tanggal);
        $("#span-deskripsi-penyumbang").html(deskripsi); 

        $("#detailSumbanganModal").modal("show");

    }
   

    var level_user = "<?php echo Session::get('level'); ?>";
    
    $('#ikantable').DataTable();

    function change_input(value){
        if(value == 1){
            $("#div_usaha_display").hide();
            $("#div_nama_display").hide();
            $("#div_alamat_display").hide();
            $("#div_foto_display").hide();

            // $("#div_usaha_display").val("");
            // $("#div_nama_display").val("");
            // $("#div_alamat_display").val("");
            // $("#div_alamat_display").val("");
            // $("#div_foto_display").val("");
        }
        else if(value == 2){
            $("#div_usaha_display").hide();
            $("#div_nama_display").show();
            $("#div_alamat_display").show();
            $("#div_foto_display").show();
        }
        else if(value == 3){
            $("#div_usaha_display").show();
            $("#div_alamat_display").show();
            $("#div_nama_display").hide();
            $("#div_alamat_display").hide();
        }
    }

    function export_pdf_file(){
        window.location = "<?php echo url(Config::get('myconfig.adminPage').'/download_pdf_sumbangan'); ?>";
    }

    function submit_gambar_form(form){

        var formData = new FormData(document.getElementById('form_multi'));
        formData.append("urutan_id" , active_id);

        //console.log("formdata" , formData);

        //console.log("submits" , );
        $.ajax({
            data:formData,
            url:url_menu_apis+"/"+"post_gambar_baru",
            type:"post",
            processData: false,
            contentType: false,
            cache: false,
            success:function(data){
                //$("#register_user_new").val();
                if(data == "success"){
                    $("#largeModal").modal("hide");
                    $("#btn_reset").click();
                }
            }
        });

        return false;

    }

    function submit_edit_gambar_form(form){

        var formData = new FormData(document.getElementById('form_multi_edit'));
        formData.append("urutan_id" , active_id);

        //console.log("formdata" , formData);

        //console.log("submits" , );
        $.ajax({
            data:formData,
            url:url_menu_apis+"/"+"post_gambar_baru_edit",
            type:"post",
            processData: false,
            contentType: false,
            cache: false,
            success:function(data){
                //$("#register_user_new").val();
                if(data == "success"){
                    $("#largeModal").modal("hide");
                    $("#btn_reset").click();
                }
            }
        });

        return false;

        }

    jQuery(document).ready(function() {


            $('#textinputancari').on('keypress', function (e) {
                
                 if(e.which === 13){
                    //alert("click");
                    ambil_beritaparam(active_id , $('#textinputancari').val(), $("#chk_cari").val());
                 }

            });

            $('#btn_submit_cari').on('click', function (e) {
                 //if(e.which === 13){
                    //alert("click");
                
                    //alert($(".chk_cari:checked").val());

                    ambil_beritaparam(active_id , $('#textinputancari').val(), $(".chk_cari:checked").val());
                // }
            });

            jQuery('textarea[name="DSC"]').ckeditor();

            $("#div_container_isi").html("");

            //$("#div_tabs").html("");

            // $.ajax({
            //     type:"get",
            //     url:"<?php //echo url('ambil_listberita'); ?>",
            //     data:"",
            //     dataType:"json",
            //     success:function(data){
            //     //console.log("databerita" , data);
            //     $.each(data,function(index , element){

            //         var sudah_update = '<a href="javascript:void(0)" onclick="open_detail('+element.id_berita+')" class="btn btn-warning"><i class="fas fa-bullseye"></i>  </a> </div><div style="float:right;"><a href="javascript:void(0)" class="btn btn-success" onclick="editModal('+element.id_berita+')"><i class="fas fa-pencil-alt"></i> Edit</a> &nbsp; <a href="javascript:void(0)" class="btn btn-primary"> <i class="fas fa-trash"></i> Hapus</a></div>';

            //         if(element.sudah_update == "1" && level_user != 3){
            //             sudah_update = "<i class='fa fa-check' style='color:green;'></i> Berita ini sudah diupdate oleh editor";
            //         }

            //         if(element.approved == "1"){
            //             sudah_update = "<i class='fa fa-check' style='color:green;'></i> Di Setujui";
            //         }

            //         var isi_berita = '<div class="col-lg-6 col-md-6" style="float:left; margin-top:30px; height:800px; overflow:auto;"><div class="card"><img class="card-img-top img-fluid" src="'+element.urlfoto+'" alt="Card image cap"><div class="card-body"><h4 class="card-title">'+element.judul_berita+'</h4><h5 class="card-title" style="text-align:right;"><small>'+element.tanggal+'</small></small></h5><p class="card-text">'+element.isi_berita+'</p><br clear="all" /><h4 class="card-title" style="text-align:left;">'+element.kode_wartawan+'<br clear="all" /> <p></p></h4> <div style="float:left;">'+sudah_update+'</h4></div></div></div>';

            //         $("#div_container_isi").append(isi_berita);

            //     });

            //   }
            // });


            //jQuery('.modal-dialog').draggable();


        } );

        function open_detail(id){

            jQuery.ajax({
                type:"GET",
                url:url_menu_apis+"/"+"ambil_listslides",
                dataType:"json",
                data:"posisi="+id,
                success:function(data){

                   // $("#view_berita_div").slideUp();
            
                    //$("#div_detail_berita").slideDown();

                    //jQuery("#judul_berita").html('<a onclick="openViewdetail()" style="cursor:pointer;"> <i class="fas fa-undo"></i> </a> &nbsp;'+" "+data.judul_berita);
                    //jQuery("#isi_berita").html(data.isi_berita);

                    jQuery("#img_berita").prop("src" , "<?php echo url('public/GambarSlides/'); ?>"+"/"+data.image_name);

                    

                    //jQuery("#editdataModal").modal('show');
                }
            });

        }

        

        function ambil_gambar(id){

            $("#div_container_isi").html("");
            active_id = id;

            $('#textinputancari').val("");
            $("#ditemukan_berita").html("");


            $.ajax({
                type:"get",
                url:url_menu_apis+"/"+"ambil_listslides"+"/"+id,
                data:"posisi="+id,
                dataType:"json",
                success:function(data){
                //console.log("databerita" , data);
                $.each(data,function(index , element){

                var sudah_update = '<a href="javascript:void(0)" onclick="open_detail('+element.id_berita+')" class="btn btn-warning"><i class="fas fa-bullseye"></i> </a> </div><div style="float:right;"><a href="javascript:void(0)" class="btn btn-success" onclick="editModal('+element.id_berita+')"><i class="fas fa-pencil-alt"></i> Edit</a> &nbsp; <a href="javascript:void(0)" class="btn btn-primary"> <i class="fas fa-trash"></i> Hapus</a></div>';

                if(element.sudah_update == "1"){
                    sudah_update = "<i class='fa fa-check' style='color:green;'></i> Berita ini sudah diupdate oleh editor";
                }

                if(element.approved == "1"){
                        sudah_update = "<i class='fa fa-check' style='color:green;'></i> Di Setujui";
                }

                var url_gambar = "<?php echo url('public/GambarSlides/'); ?>"+"/"+element.image_name;

                var is_aktif = "<div style='float:right; background:blue; color:#FFFFFF; cursor:pointer; padding:5px 10px 5px 10px; border-radius:10px; font-size:14px;' onclick='active_slides("+element.id_gambar_home+")'> Non Slide </div>";

                if(element.is_slide == 1){
                    is_aktif = "<div style='float:right; background:green; color:#FFFFFF;m cursor:pointer; padding:5px 10px 5px 10px; border-radius:10px; font-size:14px;' onclick='active_slides("+element.id_gambar_home+")'> Aktif </div>";

                }

                var abs_edit = "<div class='edit_gambar_icon' onclick='editedModal("+element.id_gambar_home+");'> <i class='fa fa-edit'></i> </div>";

                var isi_berita = '<div class="col-lg-4 col-md-6" style="float:left; position:relative; margin-top:30px; height:800px; overflow:auto;">'+abs_edit+'<div class="card"><img class="card-img-top img-fluid" style="height:150px; object-fit:cover;" src="'+url_gambar+'" alt="Card image cap" /><div class="card-body"><h4 class="card-title">'+element.title+'</h4><p class="card-text">'+is_aktif+'</p><br clear="all" /></div></div></div>';

                $("#div_container_isi").append(isi_berita);

                });

              }
            });

        }

        function append_kategori(){

            $("#kategoriinputan").html("");

            $.ajax({
                type:"get",
                url:"<?php echo url('ambil_listkategori_awal'); ?>",
                data:"",
                dataType:"json",
                success:function(data){
                //console.log("databerita" , data);
                var len = data.length;
                var a = 1;
                $.each(data,function(index , element){

                    var kategori = '<option value='+element.id_kategori_berita+'>'+element.name+'</option></li>';
                    a++;
                    $("#kategoriinputan").append(kategori);

                });

              }
            });

        }

        function openModal(){
            $("#largeModal").modal('show');
        }

        function editedModal(index){
            $("#editedModal").modal('show');

            $.ajax({
                type:"GET",
                data:"id="+index,
                url:url_menu_apis+"/get_gambar_slide",
                dataType:"json",
                success:function(data){
                    //alert(data.alt);
                    $("#edit_text_title_new").val(data.title);
                    $("#edit_text_desc_new").val(data.alt);

                    $("#edit_hidden_textfield").val(data.id_gambar_home);
                    
                    $("#edit_desktop_image").prop("src",url_menu_asset+"/GambarSlides/"+data.image_name);

                    $("#edit_mobile_image").prop("src",url_menu_asset+"/GambarSlides/"+data.image_name_mobile);
                    
                   
                }
            });
            
             $("#editedModal").modal('hide');

        }

        function active_slides(id){
            var conn = confirm("Tampilkan Gambar ke SlideShow ? "+id);

            if(conn == true){

                $.ajax({
                    type:"POST",
                    data:"id="+id,
                    url:url_menu_apis+"/post_active_slides",
                    success:function(data){
                        ambil_gambar(active_id);
                    }
                });

            }
        }

        function editModal(id){

            append_kategori();

            if(level_user == "3"){
                $("#btn_submit_approve").html("Submit & Approve");
            }
            else{
                $("#btn_submit_approve").html("Submit");
            }

            $("#view_berita_div").slideUp();
            
            $("#div_form_berita").slideDown();



            jQuery.ajax({
                type:"GET",
                url:"<?php echo url('ambil_berita'); ?>"+"/"+id,
                dataType:"json",
                data:"",
                async:false,
                success:function(data){

                    $("#view_berita_div").slideUp();
            
                    $("#div_form_berita").slideDown();

                    $("#div_foto_berita").show();

                    $("#div_video_berita").show();

                    var tgl = data.tanggal_berita;
                    var sp_tgl = tgl.split(" ");

                    jQuery("#t_idberita").val(data.id_berita);

                    jQuery("#textinputan").val(data.judul_berita);
                    jQuery("#hariinput").val(data.hari);
                    jQuery("#tanggalinput").val(sp_tgl[0]);
                    jQuery("#waktuinput").val(sp_tgl[1]);
                    jQuery("#t_aksi_pencarian").val("edit");

                    CKEDITOR.instances['DSC'].setData(data.isi_berita);

                    $("#img_foto_berita").prop("src" , "<?php echo url('public/berita/foto/'); ?>"+"/"+data.foto);

                    //jQuery("#img_berita").prop("src" , "<?php echo url('public/berita/foto/'); ?>"+"/"+data.foto);

                    

                    //jQuery("#editdataModal").modal('show');
                }
            });



        }

        function openView(){

            $("#view_berita_div").slideDown();
            
            $("#div_form_berita").slideUp();

        }

        function openViewdetail(){

            $("#view_berita_div").slideDown();
            
            $("#div_detail_berita").slideUp();

        }

        function deletedata(value){
            var conn = confirm("Hapus data ?");

            if(conn == true){
                jQuery.ajax({
                    type:"GET",
                    url:"<?php echo url('hapuskategori/'); ?>",
                    data:"id="+value,
                    success:function(data){
                        table.ajax.reload();
                    }
                })
            }
        }

        function editdataModal(value){
            
            jQuery.ajax({
                type:"GET",
                url:"<?php echo url('ambil_kategori'); ?>"+"/"+value,
                dataType:"json",
                data:"",
                success:function(data){

                    jQuery("#iduserinput_edit").val(data.id_kategori_berita);
                    jQuery("#textinput_edit").val(data.nama_kategori_berita);

                    jQuery("#editdataModal").modal('show');
                }
            });

            
        }

        function submit_edit_form(){
            var serial = jQuery("#form_multi_edit").serialize();

            jQuery.ajax({
                type:"POST",
                url:"<?php echo url('updatekategori'); ?>",
                data:serial,
                success:function(data){
                        jQuery("#editdataModal").modal('hide');
                        table.ajax.reload();
                }
            });

        }

        function tambahdata(){

            //var file_data =  $('#uploadinput').prop('files')[0]; 
            //var file_video = $('#videoinput').prop('files')[0]; 

            var form_data = new FormData(); 

            console.log("formdata" , form_data);        

            return false; 

            // form_data.append('uploadinput', file_data);
            // // form_data.append('videoinput', file_video);
            // form_data.append('hari', $("#hariinput").val());
            // form_data.append('tanggal', $("#tanggalinput").val());
            // form_data.append('waktu', $("#waktuinput").val());
            // form_data.append('judul', $("#textinputan").val());
            // form_data.append('kategori', $("#kategoriinputan").val());
            // form_data.append('DSC', CKEDITOR.instances['DSC'].getData());
            // form_data.append('_token', "<?php //echo csrf_token(); ?>");
            // form_data.append('t_idberita', $("#t_idberita").val());

            // var url = "<?php //echo url('tambahberita'); ?>";

            // if($('#t_aksi_pencarian').val() == "edit"){
            //     url = "<?php //echo url('updateberita'); ?>";
            // }

            // //alert(form_data);                             
            // $.ajax({
            //     url: url, // point to server-side PHP script 
            //     dataType: 'text',  // what to expect back from the PHP script, if anything
            //     cache: false,
            //     contentType: false,
            //     processData: false,
            //     data: form_data,                         
            //     type: 'post',
            //     success: function(response){
            //        // alert(php_script_response); // display response from the PHP script, if any
            //         ambil_berita(response);

            //         openView();
            //     }
            //  });


        }


        function submit_form(){
            var serial = jQuery("#form_multi").serialize();

            jQuery.ajax({
                type:"POST",
                url:"<?php echo url('post_kategori'); ?>",
                data:serial,
                success:function(data){
                        jQuery("#largeModal").modal('hide');
                        table.ajax.reload();
                }
            });

        }

    </script>
@stop