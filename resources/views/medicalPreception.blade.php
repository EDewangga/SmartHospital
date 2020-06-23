@extends('layouts.master')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<style>
    .modal-backdrop {
        z-index: 0;
    }
</style>
@endsection

@section('content')
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="blog_left_sidebar">
                    <div class="form-group">
                        <select name="appointment" id="appointment" class="form-control input-lg mb-3 user_select form-select wide">
                            <option value="">Pilih Pasien</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id}}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <hr>
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
        <div class="row mt-3" id="cart-view" style="display: none;">
            <div class="col">
                <h3>Cart</h3>
                <table id="cart-list" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3 justify-content-end">
            <div class="col text-center" style="display: none;" id="checkout_btn">
                <button id="checkout" class="btn btn-lg btn-info">Checkout</button>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalLongTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="medicine_quantity" name="medicine_quantity" placeholder="Jumlah obat">
                    </div>
                </div>
                <input type="hidden" id="medicine_id" value="" name="medicine_id">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" id="add_cart">Simpan</button>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModal">Checkout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                tambahono form sesuai tabel appointment <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="checkoutSubmit">Checkout</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $(document).ready(function(){
        var selectedUserID = '';
        var cartTable = $('#cart-list').DataTable();
        var medicineTable = $('#medicine-list').DataTable({
            data: [],
            columns: [
                { data: 'id' },
                { data: 'nama' },
                { data: 'harga' },
                { data: null, className: 'text-center',
                    render: function ( data, type, row ) {
                        return `<button class="btn btn-sm btn-info choose-medicine" data-nama="${row.nama}" data-id="${row.id}">
                                    Pilih
                                </button>`;
                    }
                }
            ]
        });

        var selectedJenis = ''

        $('.user_select').change(function(){
            if ($(this).val() == "Pilih Pasien") {
                return;
            }
            selectedUserID = $(this).val();
            $('#cart-view').css('display', 'block');
            cartTable.destroy();
            cartTable = $('#cart-list').DataTable({
                ajax: {
                    url: `{{ url('/data/cart/${selectedUserID}') }}`,
                    dataSrc: ''
                },
                columns: [
                    { data: null,
                        render: function ( data, type, row ) {
                            return row.medical.nama;
                        }
                    },
                    { data: null, className: 'text-center',
                        render: function ( data, type, row ) {
                            return `Rp. ${row.medical.harga}`;
                        }
                    },
                    { data: null, className: 'text-center',
                        render: function ( data, type, row ) {
                            return row.quantity;
                        }
                    },
                    { data: null, className: 'text-center',
                        render: function ( data, type, row ) {
                            return `Rp. ${row.medical.harga * row.quantity}`;
                        }
                    },
                    { data: null, className: 'text-center',
                        render: function ( data, type, row ) {
                            return `<button class="btn btn-sm btn-danger" id="delete_cart" data-quantity="${row.quantity}" data-medical="${row.medical_id}">
                                        Hapus
                                    </button>`;
                        }
                    }
                ],
                initComplete: function(settings, json) {
                    checkCount()
                }
            });
        });

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
            var value = $(this).data('id');
            var nama = $(this).data('nama');
            $('#medicine_quantity').val('');
            $('#modalLongTitle').html(nama);
            $('#medicine_id').val(value);
            $('#modalCenter').appendTo("body").modal('show');
        });

        $(document).on('click', '#add_cart', function() {
            var _token = $('input[name="_token"]').val();
            let id = $('#medicine_id').val();
            let quantity = $('#medicine_quantity').val();
            if (!quantity) {
                alert("Lengkapi Jumlah obat");
                return;
            }

            if (!selectedUserID) {
                alert("Pilih pasien terlebih dahulu");
                return
            }
            $.ajax({
                // url e gaween wes
                url:"{{ url('/add-cart') }}",
                method:"POST",
                data:{
                    id : id,
                    quantity : quantity,
                    user_id : selectedUserID,
                     _token : _token,
                },
                success:function(result){
                    cartTable.ajax.reload(checkCount, false);
                    $('#modalCenter').modal('hide');
                }
            })
        });

        $(document).on('click', '#delete_cart', function() {
            let _token = $('input[name="_token"]').val();
            let id = $(this).data('medical');
            let quantity = $(this).data('quantity');

            swal({
                title: "Apakah Anda yakin?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url:"{{ url('/delete-cart') }}",
                        method:"POST",
                        data:{
                            id : id,
                            quantity : quantity,
                            user_id : selectedUserID,
                            _token : _token,
                        },
                        success:function(result){
                            swal("Berhasil dihapus", {
                                icon: "success",
                            });
                            cartTable.ajax.reload(checkCount, false);
                        }
                    })
                }
            });
        });

        $(document).on('click', '#checkout', function() {
            $('#checkoutModal').appendTo("body").modal('show');
        });

        $(document).on('click', '#checkoutSubmit', function() {
            let _token = $('input[name="_token"]').val();
            swal({
                title: "Apakah Anda yakin?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url:"{{ url('/checkout') }}",
                        method:"POST",
                        data:{
                            user_id : selectedUserID,
                            _token : _token,
                        },
                        success:function(result){
                            swal("Berhasil checkout", {
                                icon: "success",
                            });
                            cartTable.ajax.reload(checkCount, false);
                            $('#checkoutModal').modal('hide');
                        }
                    })
                }
            });
        });

        function checkCount() {
            if (cartTable.data().count() ) {
                $('#checkout_btn').css('display', 'block');
            } else {
                $('#checkout_btn').css('display', 'none');
            }
        }

    });
    </script>
@endsection
