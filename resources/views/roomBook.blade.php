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
                        <select name="lokasi" id="lokasi" class="form-control input-lg mb-3 dynamic form-select wide" data-dependent="kelas">
                            <option value="">Pilih Lokasi</option>
                            @foreach($room_list as $room)
                                <option value="{{ $room->lokasi}}">{{ $room->lokasi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br />
                    <div class="form-group group-kelas" style="display: none">
                        <select name="kelas" id="kelas" class="form-control input-lg mb-3 dynamic-nomor form-select wide" data-dependent="nomor">
                            <option value="">Pilih kelas</option>
                        </select>
                    </div>
                    <br />
                </div>
            </div>
        </div>
        <div class="row mt-3" id="row-room" style="display: none">
            <div class="col">
                <table id="room-list" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nomor</th>
                            <th>Status</th>
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
        var roomTable = $('#room-list').DataTable({
            data: [],
            columns: [
                { data: 'id' },
                { data: 'nomor' },
                { data: 'status' },
                { data: null,
                    render: function ( data, type, row ) {
                        return `<button class="btn btn-sm btn-info choose-room" data-nomor="${row.nomor}" value="${row.id}">Pilih</button>`;
                    }
                }
            ]
        });
        var selectedLokasi = ''

        $('.dynamic').change(function(){
            if ($(this).val() == "Pilih Lokasi") {
                return;
            }
            if($(this).val() != ''){
                var select = $(this).attr("id");
                var value = $(this).val();
                selectedLokasi = value
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ url('/book/fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result){
                        $('.group-kelas').css('display', 'block');
                        let option = `<li data-value="" class="option focus">Pilih Kelas</li>`
                        data = result.data
                        data.forEach(row => {
                            option += `<li data-value="${row.kelas}" class="option">${row.kelas}</li>`
                        });
                        $('.dynamic-nomor span').text('Pilih Kelas');
                        $('.dynamic-nomor ul').html(option);
                    }
                })
            }
        });

        $(document).on('change', '.dynamic-nomor', function() {
            var val = $('.dynamic-nomor ul').find(".selected")[0]
            if (val.innerHTML == "Pilih Kelas") {
                return;
            }
            if(val.innerHTML != ''){
                var select = $(this).attr("id");
                var value = val.innerHTML;
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ url('/book/fetch-result') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependent:dependent, lokasi:selectedLokasi},
                    success:function(result){
                        $('#row-room').css('display', 'block')
                        data = result.data
                        roomTable.clear()
                        roomTable.rows.add(data)
                        roomTable.draw()
                    }
                })
            }
        });

        $(document).on('click', '.choose-room', function() {
            // value iki id, nek kate nambahi lain2 e yo iso
            var value = $(this).val();
            var nomor = $(this).data('nomor');
            console.log(value, nomor)
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
