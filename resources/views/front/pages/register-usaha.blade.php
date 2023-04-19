@extends('front.newhome')

@section('isi_content')

<div id="header">
    <div class="container">
        <div class="header-custom"> <h5> <a href="<?php echo url('account-login'); ?>"> <i class="bi bi-arrow-left" ></i></a>  &nbsp; Sign In to your account </h5> </div>
    </div>
</div>      


<div id="container-body">

<div style="padding:30px 30px 0 30px; font-size:13px;">
                <center>
                    <img src="<?php echo url('/public/logotranspererenan.png'); ?>" style=" width:150px; height:120px;" /><p></p>
                    <h1 style="font-size:21px;">Sign Up your account</h1> 
                </center>    
                
                <p></p>
                <hr />

<form id="form_method" name="form_method" method="post" action="<?php echo url("submit_post_new_usaha"); ?>">


        <div id="detail_usaha">

            {{ csrf_field() }}

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Company Name :</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text_title_new" name="text_title_new" required="required" class="form-control">
                    <!-- <small class="form-text text-muted">Masukkan Nama Usaha</small> -->
                </div>
                </div>
                
            
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category</label></div>
                        <div class="col-12 col-md-9">
                        
                        <select id="cmb_kategori_usaha" name="cmb_kategori_usaha" required="required" class="form-control" style="font-size:12px;">
                                <option value="">- choose -</option>
                                <?php
                                foreach($kategori as $rows){
                                    ?>
                                    <option value="<?php echo $rows->id_kategori_usaha; ?>"><?php echo $rows->nama_kategori_usaha; ?></option>
                                    <?php
                                }
                                ?>
                        </select>

                                <!-- <small class="form-text text-muted">Choose Ca</small></div> -->
                    </div>
                </div>
                
                <!-- <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Minimal Pembayaran :</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text_minimal_pembayaran" name="text_minimal_pembayaran" required="required" class="form-control"><small class="form-text text-muted">Masukkan Inputan Minimal Pembayaran</small></div>
                </div> -->
                
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email  :</label></div>
                    <div class="col-12 col-md-9"> <input type="text" id="text_email_usaha_new" name="text_email_usaha_new" required="required" class="form-control">
                    <!-- <small class="form-text text-muted">Masukkan Nama Usaha</small> -->
                </div>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Office Phone :</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text_telpkantor_new" name="text_telpkantor_new" required="required" class="form-control">
                    <!-- <small class="form-text text-muted">Masukkan Nama Usaha</small> -->
                </div>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">WA Number :</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text_notelp_was" name="text_notelp_was" required="required" class="form-control">
                    <!-- <small class="form-text text-muted">Masukkan Nama Usaha</small> -->
                </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Banjar :</label></div>
                    <div class="col-12 col-md-9">
                        
                        <select class="form-control" id="text_desc_new" name="text_desc_new" required="required">
                            <option value="">- Choose Banjar -</option>
                            <?php
                                foreach($banjar as $rows_banjar){
                                    ?>
                                    <option value="<?php echo $rows_banjar->id_data_banjar; ?>"><?php echo $rows_banjar->nama_banjar; ?></option>
                                    <?php
                                }
                            ?>
                           
                        </select>
                        <!-- <small class="form-text text-muted">Choose Banjar</small> -->
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Address :</label></div>
                    <div class="col-12 col-md-9">
                        <textarea class="col-12 col-md-12" name="t_alamat_usaha" class="form-control"></textarea>
                        <!-- <small class="form-text text-muted">Masukkan alamat Usaha</small> -->
                    </div>
                </div>
                
                <div class="row form-group">
                    
                <div class="col col-md-12" style="margin-top:30px;">
                    
                    <div class="row">
                    
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Fb Url :</label>
                        </div>
                            
                        <div class="col-12 col-md-9">
                            <input type="text" name="cmb_social_facebook" id="cmb_social_facebook" class="form-control" />
                        </div>
                    
                    </div>
                
                </div>
                
                <div class="col col-md-12" style="margin-top:30px;">
                    
                    <div class="row">
                
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Twitter Url :</label>
                        </div>
                            
                        <div class="col-12 col-md-9">
                            <input type="text" name="cmb_social_twitter" id="cmb_social_twitter" class="form-control" />
                        </div>
                    
                    </div>
                
                </div>
                
                <div class="col col-md-12" style="margin-top:30px;">
                    
                    <div class="row">
                
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Website Url :</label>
                        </div>
                            
                        <div class="col-12 col-md-9">
                            <input type="text" name="cmb_social_website" id="cmb_social_website" class="form-control" />
                        </div>
                    
                    </div>
                
                </div>
                    
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Google Map:</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text_google_maps" name="text_google_maps" required="required" class="form-control"><small class="form-text text-muted">Masukkan Embed Link Google Maps</small></div>
                </div>

                <!-- <div class="row form-group"  style="margin-top:30px;">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Gambar logo :</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="f_upload_gambar_mobile" name="f_upload_gambar_mobile" required="required" class="form-control"><small class="form-text text-muted" accept=".jpg,.jpeg,.png" />Masukkan Nama Kategori</small></div>
                </div> -->

                <p> &nbsp; </p>

                <center>
                    <h3 style="font-size:16px;">Penanggung Jawab</h3> 
                </center>    
                
                <p></p>
                <hr />

                <div id="pngg_jawab">

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama  :</label></div>
                        
                        <div class="col-12 col-md-9">
                        <input type="text" id="text_namapngg_new" name="text_namapngg_new" required="required" class="form-control"><small class="form-text text-muted">Masukkan Nama Penanggung Jawab</small></div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Status  :</label></div>
                        
                        <div class="col-12 col-md-9">
                        <input type="text" id="text_statuspngg_new" name="text_statuspngg_new" required="required" class="form-control"><small class="form-text text-muted">Masukkan Status Penanggung Jawab</small></div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Alamat  :</label></div>
                        
                        <div class="col-12 col-md-9">
                        <input type="text" id="text_alamat_pngg_new" name="text_alamat_pngg_new" required="required" class="form-control"><small class="form-text text-muted">Masukkan Alamat Penanggung Jawab</small></div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email  :</label></div>
                        
                        <div class="col-12 col-md-9">
                        <input type="text" id="text_email_usaha_new" name="text_email_pngg_new" required="required" class="form-control"><small class="form-text text-muted">Masukkan Email </small></div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">No.Telp  :</label></div>
                        
                        <div class="col-12 col-md-9">
                        <input type="text" id="text_notelp_pngg_new" name="text_notelp_pngg_new" required="required" class="form-control"><small class="form-text text-muted">Masukkan No.Telp Penanggung Jawab</small></div>
                    </div>
                            
                </div>

                <p></p>
                    <div class="col-md-12">
                        <button class="btn btn-primary form-control" type="submit"> Sign Up Now</button>
                    </div>

                <p> &nbsp; </p>
                <p> &nbsp; </p>
        </div>

        </form>

    </div>
</div>