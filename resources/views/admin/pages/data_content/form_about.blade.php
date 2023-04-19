@extends('index')

@section('isi_menu')

<div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
<div class="card-group">
    <div class="card border-right">
        <div class="card-body">
            <div class="row">
                
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Form</strong> About Us
                    </div>

                    <div class="card-body card-block">

                        <form id="form_multi" enctype="multipart/form-data" method="post" action="<?php echo url(Config::get('myconfig.adminPage').'/updateabout_us'); ?>">
                            {{ csrf_field() }}

                            <input type="hidden" name="t_index" id="t_index" value="<?php echo $abouts->id_about_us; ?>" />

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Isi Berita</label></div>

                                    <div class="col-12 col-md-9">
                                        <textarea name="DSC" class="materialize-textarea"><?php echo $abouts->deskripsi; ?></textarea>
                                        <small class="form-text text-muted">Masukkan Isi Berita</small></div>
                                    </div>

                                <div class="row form-group">

                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Foto</label></div>
                                    
                                    <div class="col-3 col-md-2" id="div_foto_berita">
                                        <img id="img_foto_berita" class="img-fluid" />
                                    </div>

                                    <div class="col-9 col-md-4">
                                        <input type="file" id="uploadinput" name="uploadinput" placeholder="Text" class="form-control" />
                                        <small class="form-text text-muted">Upload Foto Berita</small>
                                    </div>
                                
                                </div>
                            
                                <div style="float:right;">
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                    <button type="reset" class="btn btn-secondary" id="btn_cancel" style="display:none;">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                        </form>

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

        jQuery(document).ready(function() {

            table = jQuery('#ikantable').DataTable( {
                "ajax": {
                    "url": "<?php echo url('ambil_listuser'); ?>",
                    "dataSrc": ""
                },
                columns: [
                    { "data": 'no' },
                    { "data": 'name' },
                    { "data": 'email' },
                    { "data": 'no_wa' },
                    { "data": 'level' },
                    { "data": 'aksi' }
                ]
            } );

            //jQuery('.modal-dialog').draggable();


        } );

        $('textarea[name="DSC"]').ckeditor();

        function openModal(){
            $("#btn_reset").click();
            $("#largeModal").modal('show');
        }

        function deletedata(value){
            var conn = confirm("Hapus data ?");

            if(conn == true){
                jQuery.ajax({
                    type:"GET",
                    url:"<?php echo url('hapususer/'); ?>",
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
                url:"<?php echo url('ambil_user'); ?>"+"/"+value,
                dataType:"json",
                data:"",
                success:function(data){

                    jQuery("#iduserinput_edit").val(data.id);
                    jQuery("#textinput_edit").val(data.name);
                    jQuery("#emailinput_edit").val(data.email);
                    jQuery("#levelinput_edit").val(data.id_level);
                    jQuery("#nowainput_edit").val(data.no_wa);

                    jQuery("#editdataModal").modal('show');
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
            var serial = jQuery("#form_multi").serialize();

            jQuery.ajax({
                type:"POST",
                url:"<?php echo url('post_user'); ?>",
                data:serial,
                success:function(data){
                        jQuery("#largeModal").modal('hide');
                        table.ajax.reload();
                }
            });

        }

    </script>
@stop