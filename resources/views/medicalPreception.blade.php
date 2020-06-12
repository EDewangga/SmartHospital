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
                        <select name="jenis" id="jenis" class="form-control input-lg mb-3 dynamic form-select wide" data-dependent="bentuk">
                            <option value="">Pilih Jenis</option>
                            @foreach($medical_list as $medical)
                                <option value="{{ $medical->jenis}}">{{ $medical->jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br />
                    <div class="form-group group-bentuk" style="display: none">
                        <select name="bentuk" id="bentuk" class="form-control input-lg mb-3 dynamic-nama form-select wide" data-dependent="nama">
                            <option value="">Pilih Bentuk</option>
                        </select>
                    </div>
                    <br />
                </div>
            </div>
        </div>
        <div class="row mt-3" id="row-medicine" style="display: none">
            <div class="col">
                <table id="medicine-list" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th></th>
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

<script>
    $(document).ready(function(){
        var medicineTable = $('#medicine-list').DataTable({
            data: [],
            columns: [
                { data: 'id' },
                { data: 'nama' },
                { data: 'harga' },
                { data: null,
                    render: function ( data, type, row ) {
                        return `<button class="btn btn-sm btn-info choose-medicine" data-nama="${row.nama}" value="${row.id}">Pilih</button>`;
                    }
                }
            ]
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
                        $('#row-medicine').css('display', 'block')
                        data = result.data
                        medicineTable.clear()
                        medicineTable.rows.add(data)
                        medicineTable.draw()
                    }
                })
            }
        });

        $(document).on('click', '.choose-medicine', function() {
            // value iki id, nek kate nambahi lain2 e yo iso
            var value = $(this).val();
            var nama = $(this).data('nama');
            console.log(value, nama)
            // var _token = $('input[name="_token"]').val();
            // $.ajax({
            //     // url e gaween wes
            //     url:"{{ url('/pilih-obat') }}",
            //     method:"POST",
            //     data:{
            //         value:value,
            //          _token:_token,
            //     },
            //     success:function(result){
            //         //
            //     }
            // })
        });

    });
    </script>
@endsection
