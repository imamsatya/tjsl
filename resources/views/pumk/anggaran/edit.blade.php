<form class="kt-form kt-form--label-right" method="POST" id="form-edit">
	@csrf
	<input type="hidden" name="id" id="id" readonly="readonly" value="{{$actionform == 'update'? (int)$data->id : null}}" />
	<input type="hidden" name="actionform" id="actionform" readonly="readonly" value="{{$actionform}}" />
	
    <div class="form-group row mb-5">
        <div class="col-lg-12">
            <label>BUMN</label>
            @php
                $disabled = (($admin_bumn) ? 'readonly' : '');
            @endphp
            <select class="form-select form-select-solid form-select2" name="bumn_id" data-kt-select2="true" data-placeholder="Pilih BUMN"  data-dropdown-parent="#winform" required {{$disabled}}>
                <option></option>
                @foreach($perusahaan as $p)  
                    @php
                        $select = (($admin_bumn) && ($p->id == $perusahaan_id) ? 'selected="selected"' : '');
                    @endphp
                    <option value="{{ $p->id }}" {{$select}}>{{ $p->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row mb-5">
        <div class="col-lg-6">
            <label>Periode Laporan</label>
            <select id="periode_id" class="form-select form-select-solid form-select2" name="periode_id" data-kt-select2="true" data-placeholder="Pilih Periode" data-allow-clear="true" required>
                <option></option>
                @foreach($periode as $p)  
                    @php
                        $select = (($admin_bumn) && ($p->id == $data->periode_id) ? 'selected="selected"' : '');
                    @endphp
                    <option value="{{ $p->id }}" {!! $select !!}>{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-6">
            <label>Tahun</label>
            <select class="form-select form-select-solid form-select2" name="tahun" data-kt-select2="true" data-placeholder="Pilih Tahun"  data-dropdown-parent="#winform" required>
                <option></option>
                @php for($i = date("Y"); $i>=2020; $i--){ @endphp
                <option value="{{$i}}">{{$i}}</option>
                @php } @endphp
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <div class="checkbox-tpb">
            </div>
        </div>	
    </div>	
    <div class="text-left pt-10">
        {{-- <a id="proses" class="btn btn-primary btn-proses">Proses</a> --}}
    </div>

    <!--begin::Anggaran PUMK-->
    <div class="anggaran-header">
        <h3 class="card-title align-items-start flex-column mt-10">
            <span class="card-label fw-bolder fs-3 mb-1">Anggaran PUMK <b class="bumns"></b> <b class="periodes"></b> <b class="tahuns"></b></span>
        </h3>

            <div class="separator border-gray-200 mb-3"></div>
                <div class="form-group row">
                    <div class="col-lg-5">
                        <strong> I. Dana Tersedia</strong>
                    </div>	
                    <div class="col-lg-7">
                       <label><small><i>dalam rupiah penuh</i></small></label>
                    </div>

                    <div class="col-lg-4 offset-sm-1">
                        <label style="padding-top: 20px;">Saldo Awal</label> 
                    </div>	
                    <div class="col-lg-7">
                        <input type="text" class="form-control input-saldo-awal incomes" name="saldo_awal" value="{{$data->saldo_awal == null? '-' : $data->saldo_awal}}">
                    </div>
                    
                    <div class="col-lg-4 offset-sm-1">
                        <label style="padding-top: 20px;">Pengembalian Dana PUMK :</label> 
                    </div>	
                    <div class="col-lg-7">
                    </div>

                    <div class="col-lg-4 offset-sm-1">
                        <label style="padding-top: 15px;">&#9658; Dari Mitra Binaan </label> 
                    </div>	
                    <div class="col-lg-7">
                        <div class="col-md-12" style="padding-bottom : 10px;">
                            <input type="text" class="form-control input-income-mitra-binaan incomes" name="income_mitra_binaan" style="bottom: 20px;" value="{{$data->income_mitra_binaan == null? '-' : $data->income_mitra_binaan}}">
                        </div>
                    </div>

                    <div class="col-lg-4 offset-sm-1">
                        <label style="padding-top: 15px;">&#9658; Dari BUMN Pembina Lain </label> 
                    </div>	
                    <div class="col-lg-7">
                        <div class="col-md-12" style="padding-bottom : 10px;">
                            <input type="text" class="form-control input-income-pembina-lain incomes" name="income_bumn_pembina_lain" style="bottom: 20px;" value="{{$data->income_bumn_pembina_lain == null? '-' : $data->income_bumn_pembina_lain}}">
                        </div>
                    </div>

                    <div class="col-lg-4 offset-sm-1">
                        <label style="padding-top: 15px;">Pendapatan Jasa Admin PUMK</label> 
                    </div>	
                    <div class="col-lg-7">
                        <div class="col-md-12" style="padding-bottom : 10px;">
                            <input type="text" class="form-control  input-income-jasa-adm-pumk incomes" name="income_jasa_adm_pumk" style="bottom: 20px;" value="{{$data->income_jasa_adm_pumk == null? '-' : $data->income_jasa_adm_pumk}}">
                        </div>
                    </div>

                    <div class="col-lg-4 offset-sm-1">
                        <label style="padding-top: 15px;">Pendapatan Jasa Bank (Net)</label> 
                    </div>	
                    <div class="col-lg-7">
                        <div class="col-md-12" style="padding-bottom : 10px;">
                            <input type="text" class="form-control input-income-adm-bank incomes" name="income_adm_bank" style="bottom: 20px;" value="{{$data->income_adm_bank == null? '-' : $data->income_adm_bank}}">
                        </div>
                    </div>

                    <div class="col-lg-4 offset-sm-1">
                        <label style="padding-top: 15px;">Total Dana Tersedia </label> 
                    </div>	
                    <div class="col-lg-7">
                        <div class="col-md-12" style="padding-bottom : 10px;">
                            <input type="text" class="form-control sum-incomes" name="income_total" style="bottom: 20px;background-color:rgb(210, 226, 235)" value="{{$data->income_total == null? '-' : $data->income_total}}" readonly>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <strong> II. Dana Disalurkan</strong>
                    </div>	
                    <div class="col-lg-6">
                    </div>

                <div class="col-lg-4 offset-sm-1">
                    <label style="padding-top: 20px;">Penyaluran Mandiri</label> 
                </div>	
                <div class="col-lg-7">
                    <div class="col-md-12" style="padding-bottom : 10px;">
                        <input type="text" class="form-control outcomes" name="outcome_mandiri" style="bottom: 20px;" value="{{$data->outcome_mandiri == null? '-' : $data->outcome_mandiri}}">
                    </div>
                </div>

                <div class="col-lg-4 offset-sm-1">
                    <label style="padding-top: 15px;">Penyaluran Kolaborasi/BUMN </label> 
                </div>	
                <div class="col-lg-7">
                    <div class="col-md-12" style="padding-bottom : 10px;">
                        <input type="text" class="form-control outcomes" name="outcome_kolaborasi_bumn" style="bottom: 20px;" value="{{$data->outcome_kolaborasi_bumn == null? '-' : $data->outcome_kolaborasi_bumn}}">
                    </div>
                </div>

                <div class="col-lg-4 offset-sm-1">
                    <label style="padding-top: 15px;">Penyaluran BUMN Khusus </label> 
                </div>	
                <div class="col-lg-7">
                    <div class="col-md-12" style="padding-bottom : 10px;">
                        <input type="text" class="form-control outcomes" name="outcome_bumn_khusus" style="bottom: 20px;" value="{{$data->outcome_bumn_khusus == null? '-' : $data->outcome_bumn_khusus}}">
                    </div>
                </div>

                <div class="col-lg-4 offset-sm-1">
                    <label style="padding-top: 15px;">Total Dana Disalurkan </label> 
                </div>	
                <div class="col-lg-7">
                    <div class="col-md-12" style="padding-bottom : 10px;">
                        <input type="text" class="form-control sum-outcomes" name="outcome_total" style="bottom: 20px;background-color:rgb(210, 226, 235)" value="{{$data->outcome_total == null? '-' : $data->outcome_total}}" readonly>
                    </div>
                </div>


                <div class="col-lg-5" style="padding-top : 15px;">
                   <strong>III. Saldo Akhir</strong> 
                </div>	
                <div class="col-lg-7">
                    <div class="col-md-12" style="padding-bottom : 10px;">
                        <input type="text" class="form-control saldo_akhirs" name="saldo_akhir" style="bottom: 20px;background-color:rgb(210, 226, 235)" value="{{$data->saldo_akhir == null? '-' : $data->saldo_akhir}}" readonly>
                    </div>
                </div>
            </div>
    </div>
    
    <div class="anggaran-footer" >
        <button id="submit" type="submit" class="btn btn-success" data-kt-roles-modal-action="submit">
            <span class="indicator-label">Simpan</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</form>

<script type="text/javascript">
    var title = "{{$actionform == 'update'? 'Update' : 'Tambah'}}" + " {{ $pagetitle }}";

    $(document).ready(function(){
        $('.modal-title').html(title);
        $('.form-select').select2();

        $('.modal').on('shown.bs.modal', function () {
            setFormValidate();
        });  

        $('.btn-proses').on('click', function(event){
            onbtnproses();
        });

        $('.incomes').keyup(function() {
            calculateSumIn();
        });

        $('.outcomes').keyup(function() {
            calculateSumOut();
        });    

    });
    

    function calculateSumIn() {
        var sum = 0;
       var Out = $('.sum-outcomes').val();
        $('.incomes').each(function() {
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseInt(this.value);
                $(this).css("background-color", "#FEFFB0");
            }
            else if (this.value.length != 0){
                $(this).css("background-color", "red");
            }
        });
    
        $("input.sum-incomes").val(sum);
       $("input.saldo_akhirs").val(sum - Out);
    }

    function calculateSumOut() {
        var sum = 0;
        var In = $('.sum-incomes').val();
        $('.outcomes').each(function() {
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseInt(this.value);
                $(this).css("background-color", "#FEFFB0");
            }
            else if (this.value.length != 0){
                $(this).css("background-color", "red");
            }
        });
    
        $("input.sum-outcomes").val(sum);
        $("input.saldo_akhirs").val(In - sum);
    }


    function onbtnproses(){
        $('.anggaran-header').show();
        $('.anggaran-footer').show();
    }
    

    function setFormValidate(){
        $('#form-edit').validate({
            rules: {      		               		                              		               		               
            },
            messages: {                                  		                   		                   
            },	        
            highlight: function(element) {
                $(element).closest('.form-control').addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).closest('.form-control').removeClass('is-invalid');
            },
            errorElement: 'div',
            errorClass: 'invalid-feedback',
            errorPlacement: function(error, element) {
                if(element.parent('.validated').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form){
                var typesubmit = $("input[type=submit][clicked=true]").val();
                
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "{{route('pumk.anggaran.store')}}",
                    data: {
                        source : typesubmit,
                    },
                    dataType : 'json',
                    beforeSend: function(){
                        $.blockUI({
                            theme: true,
                            baseZ: 2000
                        })    
                    },
                    success: function(data){
                        $.unblockUI();

                        swal.fire({
                                title: data.title,
                                html: data.msg,
                                icon: data.flag,

                                buttonsStyling: true,

                                confirmButtonText: "<i class='flaticon2-checkmark'></i> OK"
                        });	                   

                        if(data.flag == 'success') {
                            $('#winform').modal('hide');
                            // datatable.ajax.reload( null, false );
                            location.reload(); 
                        }
                    },
                    error: function(jqXHR, exception){
                        $.unblockUI();
                        var msgerror = '';
                        if (jqXHR.status === 0) {
                            msgerror = 'jaringan tidak terkoneksi.';
                        } else if (jqXHR.status == 404) {
                            msgerror = 'Halaman tidak ditemukan. [404]';
                        } else if (jqXHR.status == 500) {
                            msgerror = 'Internal Server Error [500].';
                        } else if (exception === 'parsererror') {
                            msgerror = 'Requested JSON parse gagal.';
                        } else if (exception === 'timeout') {
                            msgerror = 'RTO.';
                        } else if (exception === 'abort') {
                            msgerror = 'Gagal request ajax.';
                        } else {
                            msgerror = 'Error.\n' + jqXHR.responseText;
                        }
                        swal.fire({
                                title: "Error System",
                                html: msgerror+', coba ulangi kembali !!!',
                                icon: 'error',

                                buttonsStyling: true,

                                confirmButtonText: "<i class='flaticon2-checkmark'></i> OK"
                        });	                               
                    }
                });
                return false;
        }
        });		
    }
    
    function onlyNumberKey(e) {
        var ASCIICode = (e.which) ? e.which : e.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>