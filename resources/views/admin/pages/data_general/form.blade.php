@extends('index')

@section('isi_menu')

<div class="container-fluid">

<div class="row" id="view_berita_div">
    <div class="col-12">
        <div class="card" style="margin:0; padding:0;">
            <div class="card-body">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
            </div>
            @endif



            <form method="post" action="<?php echo url(Config::get('myconfig.adminPage').'/post_general/'); ?>">

            {{ csrf_field() }}
             
                <h4 class="card-title">Data General</h4>
                <hr />

                <div class="col-md-12 general-info">
                    <div class="row">
                        <div class="col-md-6">
                            Nama  : <br />
                            <input type="text" name="t_general_info" id="t_general_info" class="form-control" value="{{ $general[0]->nama }}" />
                        </div>
                        <div class="col-md-6">
                            Email : <br />
                            <input type="email" name="t_email_info" id="t_email_info" class="form-control" value="{{ $general[0]->email }}"  />
                        </div>
                        <div class="col-md-12">
                            Alamat : <br />
                            <textarea name="t_alamat_new" id="t_alamat_new" class="form-control">{{ $general[0]->alamat_banjar }}</textarea>
                        </div>
                        <div class="col-md-6">
                            Nama Penanggung Jawab : <br />
                            <input type="text" name="t_penanggung_jawab" id="t_penanggung_jawab" class="form-control" value="{{ $general[0]->nama_penanggung_jawab }}"  />
                        </div>
                        <div class="col-md-6">
                            No. WA : <br />
                            <input type="number" name="t_no_wa" id="t_no_wa"  value="{{ $general[0]->no_wa }}" class="form-control" />
                        </div>
<!-- 
                        <div class="col-md-6">
                            Atas Nama Rekening : <br />
                            <input type="text" name="t_rekening_1" id="t_rekening_1"  value="" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            No Rekening 1 : <br />
                            <input type="text" name="t_rekening_1" id="t_rekening_1"  value="" class="form-control" />
                        </div>


                        <div class="col-md-6">
                            Atas Nama Rekening 2 : <br />
                            <input type="text" name="t_rekening_1" id="t_rekening_1"  value="" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            No Rekening 2 : <br />
                            <input type="text" name="t_rekening_1" id="t_rekening_1"  value="" class="form-control" />
                        </div> -->

                        <div class="col-md-12">
                            <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-success form-control"> Submit Data </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
   

</div>

@stop