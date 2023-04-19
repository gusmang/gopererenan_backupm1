@extends('index')

@section('isi_menu')

<div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">


            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">Data Bank</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="form_multi"  enctype="multipart/form-data" method="post" onsubmit="submit_banks(this);">
                             
                            <div class="modal-body">
                                                
                                
                            <div class="col-lg-12">

                                    <div class="card">

                                        <div class="card-header">
                                            <strong>Maintenance</strong> Data Bank
                                        </div>

                                        <div class="card-body card-block">

                                                {{ csrf_field() }}
                                                <input type="hidden" name="t_id_menu" id="t_id_menu"  value="" />

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><b> Form Data </b></label></div>
                                                </div>

                                                <hr />

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Bank</label></div>
                                                    <div class="col-12 col-md-9"><input type="text" id="t_nama_bank" name="t_nama_bank" required="required" placeholder="" class="form-control"><small class="form-text text-muted">Masukkan Nama Bank</small></div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">No. Rek</label></div>
                                                    <div class="col-12 col-md-9"><input type="number" id="t_no_rek" name="t_no_rek" value="0" required="required" placeholder="" class="form-control"><small class="form-text text-muted">Masukkan  No. Rek</small></div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label" required="required">Atas Nama</label></div>
                                                    <div class="col-12 col-md-9"><textarea rows="4" name="t_atas_nama" id="t_atas_nama" class="form-control" required="required"></textarea></div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Logo</label></div>
                                                    <div class="col-12 col-md-9"><input type="file" id="file_upload" name="file_upload"  required="required" /></div>
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

                            </form>

                        </div>
                    </div>
                 </form>
                </div>


                 <div class="modal fade" id="editdataModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">Tambah Data User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                 <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Form</strong> Tambah Banjar
                                                    </div>
                                                    <div class="card-body card-block">

                                                    <form id="form_multi_edit" enctype="multipart/form-data" method="post">

                                                    <input id="iduserinput_edit" name="iduserinput_edit" type="hidden" />
                                                        
                                                            <!--<div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Static</label></div>
                                                                <div class="col-12 col-md-9">
                                                                    <p class="form-control-static">Username</p>
                                                                </div>
                                                            </div>
                                                            -->
                                                            {{ csrf_field() }}


                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"><b> Credential User </b></label></div>
                                                            </div>

                                                            <hr />

                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email User</label></div>
                                                                <div class="col-12 col-md-9"><input type="email" id="emailinput_edit" name="emailinput_edit" placeholder="" class="form-control"><small class="form-text text-muted">Masukkan Email User</small></div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password User</label></div>
                                                                <div class="col-12 col-md-9"><input type="password" id="passwordinput_edit" name="passwordinput_edit" placeholder="" class="form-control"><small class="form-text text-muted">Masukkan Password User</small></div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"><b> Detail User </b></label></div>
                                                            </div>
                                                            <hr />

                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama User</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="textinput_edit" name="textinput_edit" placeholder="" class="form-control"><small class="form-text text-muted">Masukkan Nama User</small></div>
                                                            </div>


                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">No Telp/Wa</label></div>
                                                                <div class="col-12 col-md-9"><input type="number" id="nowainput_edit" name="nowainput_edit" placeholder="" class="form-control"><small class="form-text text-muted">Masukkan No Telp/Wa</small></div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Level</label></div>
                                                                <div class="col-12 col-md-9">
                                                                <select  id="levelinput_edit" name="levelinput_edit" placeholder="" class="form-control">
                                                                <option value=""> - Level - </option>
                                                                <option value="1"> - Admin - </option>
                                                                <option value="2"> - Wartawan - </option>
                                                                <option value="3"> - Pimpinan Redaksi - </option>
                                                                <option value="4"> - Editor - </option>
                                                                </select>
                                                                <small class="form-text text-muted">Masukkan Level User</small></div>
                                                            </div>

                                                            

                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Foto</label></div>
                                                                <div class="col-12 col-md-9"><input type="file" id="uploadinput_edit" name="uploadinput_edit" placeholder="Text" class="form-control"><small class="form-text text-muted">Masukkan Foto User</small></div>
                                                            </div>

                                                        
                                                    </div>
                                                </div>
                                               
                                            </div>

                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="submit_edit_form(); return false;">Confirm</button>
                            </div>
                        </div>
                    </div>
                 </form>
                </div>


 <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Table Bank</h4>
                    <hr />
                    <button onclick="openModal();" type="button"
                            class="btn waves-effect waves-light btn-primary"><i class="fas fa-plus"></i> Tambah Data </button>
                    <p>&nbsp;</p>
                    <div class="table-responsive">

                        <table id="ikantable" class="table table-striped table-bordered display no-wrap datatable"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bank</th>
                                    <th>No Rek</th>
                                    <th>Atas Nama</th>
                                    <th>Logo</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                            <?php
                                            $no = 1;
                                            
                                            foreach($datalist as $values){

                                                ?>

                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td>{{ $values->nama_bank }}</td>
                                                        <td>{{ $values->no_rek }}</td>
                                                        <td>{{ $values->atas_nama }}</td>
                                                        <td>
                                                            <img src="<?php echo url("public/bank/".$values->logo); ?>" style="border-radius:50%; width:80px; object-fit:cover;" />
                                                        </td>
                                                        <td> 
                                                            <span style="cursor:pointer;" onclick="editdataModal({{ $values->id_bank }})"> <i class="fas fa-edit"></i>  </span>
                                                            &nbsp; 
                                                            <span style="cursor:pointer;" onclick="openDelete_data('<?php echo $values->id_bank; ?>');"> <i class="fas fa-trash"></i> </span> 
                                                        </td>
                                                    </tr>

                                                <?php

                                            $no++;
                                            }

                                            ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
                        </div>
                    </div>
                </div>

    <script type="text/javascript">
    var table = "";

    function submit_banks(forms){
        // alert("tes");
        // return;
        if($("#t_id_menu").val() != ""){
            $(forms).attr('action', '<?php echo url(Config::get('myconfig.adminPage').'/update_submit_banks'); ?>/'+$("#t_id_menu").val());
            //forms.action = "";
        }
        else{
            $(forms).attr('action', '<?php echo url(Config::get('myconfig.adminPage').'/post_submit_banks'); ?>');
            //forms.action = "<?php //echo url(Config::get('myconfig.adminPage').'/post_submit_banks'); ?>";
        }
    }

    $('#ikantable').DataTable();


        function openModal(){
            $("#btn_reset").click();
            $("#t_id_menu").val("");

            $("#largeModal").modal('show');
        }

        function openModal_edit(id,nama,url,slide,urutan){
            $("#btn_reset").click();

            $("#t_id_menu").val(id);
            $("#t_nama_menu").val(nama);
            $("#t_url_menu").val(url);
            $("#t_urutan_menu").val(urutan);

            if(slide == 1){
                $("#chk_is_slide").prop("checked",1);
            }
            

            $("#largeModal").modal('show');
        }

        function openDelete_data(value){
            var conn = confirm("Hapus data ?");

            if(conn == true){
                jQuery.ajax({
                    type:"POST",
                    url:"<?php echo url(Config::get('myconfig.adminPage').'/hapusbanjar'); ?>",
                    data:"id="+value,
                    success:function(data){
                        //table.ajax.reload();
                        window.location = "<?php echo url(Config::get('myconfig.adminPage').'/datamenu'); ?>";
                    }
                })
            }
        }

        function editdataModal(value){
            
            jQuery.ajax({
                type:"GET",
                url:"<?php echo url(Config::get('myconfig.adminPage').'/ambil_bank'); ?>"+"/"+value,
                dataType:"json",
                data:"",
                success:function(data){

                    jQuery("#t_id_menu").val(data.id_bank);
                    jQuery("#t_nama_bank").val(data.nama_bank);
                    jQuery("#t_no_rek").val(data.no_rek);
                    jQuery("#t_atas_nama").val(data.atas_nama);
                    //jQuery("#t_nama_bank").val(data.no_wa);

                    jQuery("#largeModal").modal('show');
                }
            });

            
        }

        function submit_edit_form(){
            var serial = jQuery("#form_multi_edit").serialize();

            jQuery.ajax({
                type:"POST",
                url:"<?php echo url('updateuser'); ?>",
                data:serial,
                success:function(data){
                        jQuery("#editdataModal").modal('hide');
                        table.ajax.reload();
                }
            });

        }


        function submit_form(){
            var formData = new FormData(document.getElementById('form_multi'));
            //formData.append("urutan_id" , active_id);
            var url_posts = url_menu_apis+"/"+"post_submit_banks";

            if($("#t_id_menu").val() != ""){
                url_posts = url_menu_apis+"/"+"update_submit_banks";
            }

            //alert(url_posts);
            
            //console.log("formdata" , formData);

            //console.log("submits" , );
            $.ajax({
                data:formData,
                url:url_posts,
                type:"post",
                processData: false,
                contentType: false,
                cache: false,
                success:function(data){
                        jQuery("#largeModal").modal('hide');
                        table.ajax.reload();
                }
            });
        }

    </script>
@stop