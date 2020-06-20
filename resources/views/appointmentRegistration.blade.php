@extends('layouts.master')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@section('content')
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="blog_left_sidebar">
                    <div class="form-group">
                        <select name="jenis" id="jenis" class="form-control input-lg mb-3 dynamic" data-dependent="bentuk">
                            <option value="">Pilih Jenis</option>
                            @foreach($medical_list as $medical)
                                <option value="{{ $medical->jenis}}">{{ $medical->jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br />
                    <div class="form-group group-bentuk" style="display: none">
                        <select name="bentuk" id="bentuk" class="form-control input-lg mb-3 dynamic-nama" data-dependent="nama" >
                            <option value="">Pilih Bentuk</option>
                        </select>
                    </div>
                    <br />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#example').DataTable({

        });
        var selectedJenis = ''

        $('.dynamic').change(function(){
            if ($(this).val() == "Pilih Jenis") {
                return;
            }
            if($(this).val() != ''){
                var select = $(this).attr("id");
                var value = $(this).val();
                selectedJenis = value
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ url('/preception/fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result){
                        $('.group-bentuk').css('display', 'block');
                        let option = `<li data-value="" class="option focus">Pilih Bentuk</li>`
                        data = result.data
                        data.forEach(row => {
                            option += `<li data-value="${row.bentuk}" class="option">${row.bentuk}</li>`
                        });
                        $('.dynamic-nama span').text('Pilih Bentuk');
                        $('.dynamic-nama ul').html(option);
                    }
                })
            }
        });

        $(document).on('change', '.dynamic-nama', function() {
            var val = $('.dynamic-nama ul').find(".selected")[0]
            if (val.innerHTML == "Pilih Bentuk") {
                return;
            }
            if(val.innerHTML != ''){
                var select = $(this).attr("id");
                var value = val.innerHTML;
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ url('/preception/fetch-result') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependent:dependent, jenis:selectedJenis},
                    success:function(result){
                        data = result.data
                    }
                })
            }
        });

    });
    </script>
@endsection
