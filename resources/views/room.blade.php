@extends('layouts.master')



@section('content')


<div class="bradcam_area breadcam_bg bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>ROOM</h3>
                    <p><a href="index.html">Home /</a> Room</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="business_expert_area">
    <div class="business_tabs_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                        aria-selected="true">Rumah Sakit A</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                        aria-selected="false">Rumah Sakit B</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                        aria-selected="false">Rumah Sakit C</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="border_bottom">
                <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row align-items-center">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="business_info">
                                                <div class="icon">
                                                    <i class="flaticon-first-aid-kit"></i>
                                                </div>
                                                <h3>Rumah Sakit A</h3>
                                                <p>Rumah Sakit A merupakan bagian dari Columbia Asia Group dan telah mendapatkan akreditasi Paripurna pada tahun 2016.
                                                    Rumah Sakit A memiliki Visi mewujudkan rumah sakit pilihan utama di Indonesia. Dengan Misi mewujudkan pelayanan kesehatan yang efektif,
                                                    memberikan pelayanan kesehatan yang terbaik, menjadi rumah sakit terkemuka dengan SDM dan fasilitas kerja yang efisien.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="business_thumb">
                                                <img src="img/hospital/hospital1.jpg" alt="">
                                            </div>
                                        </div>
                                        <section class="button-area">
                                            <div class="container box_1170 border-top-generic">
                                                {{-- {!! Form::open() !!} --}}
                                                <div class="single-element-widget mt-30">
                                                    <h3 class="mb-30">Pilih Jenis Kamar</h3>
                                                    <div class="default-select mb-30" id="default-select">
                                                        <select class="form-control" id="kelaskamar" name="kelas_kamar">
                                                        <option value="all">semua</option>
                                                        <option value="standard">Standard</option>
                                                        <option value="vip">VIP</option>
                                                        </select>
                                                    </div>
                                                {{-- {!! Form::close() !!} --}}
                                                    </div>
                                                        <div class="button-group-area mt-30">
                                                            @foreach ($rooms as $room)
                                                            @if ($room->lokasi == 1)
                                                                @if ($room->status == 1)
                                                                    <a href="#" class="genric-btn info radius">{{$room->nomor}}</a>
                                                                @elseif ($room->status == 0)
                                                                    <a href="#" class="genric-btn disable radius">{{$room->nomor}}</a>
                                                                @else
                                                                    <a href="#" class="genric-btn warning radius" disabled>{{$room->nomor}}</a>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        </div>
                                                    </div>
                                        </section>

                                </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row align-items-center">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="business_info">
                                                <div class="icon">
                                                    <i class="flaticon-first-aid-kit"></i>
                                                </div>
                                                <h3>Rumah Sakit B</h3>
                                                <p>Rumah Sakit Islam Surabaya merupakan Rumah Sakit yang telah melayani masyarakat sejak tahun 1975.
                                                    Memiliki Visi menjadi Rumah Sakit islam pilihan utama masyarakat. Dengan Misi memberikan pelayanan kesehatan paripurna secara
                                                    islami berdasarkan nilai-nilai tawadlu’, meningkatkan mutu pelayanan kesehatan, meningkatkan ilmu pengetahuan, keterampilan dan
                                                    sikap terpuji karyawan, mengikuti perkembangan IPTEK dibidang pelayanan kesehatan, mennjadikan karyawan sebagai inovator Rumah
                                                    Sakit.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="business_thumb">
                                                <img src="img/hospital/hospital2.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <section class="button-area">
                                        <div class="container box_1170 border-top-generic">
                                            {{-- {!! Form::open() !!} --}}
                                            <div class="single-element-widget mt-30">
                                                <h3 class="mb-30">Pilih Jenis Kamar</h3>
                                                <div class="default-select mb-30" id="default-select">
                                                    <select class="form-control" id="kelaskamar" name="kelas_kamar">
                                                    <option value="all">semua</option>
                                                    <option value="standard">Standard</option>
                                                    <option value="vip">VIP</option>
                                                    </select>
                                                </div>
                                            {{-- {!! Form::close() !!} --}}
                                                </div>
                                                    <div class="button-group-area mt-30">
                                                        @foreach ($rooms as $room)
                                                            @if ($room->lokasi == 2)
                                                                @if ($room->status == 1)
                                                                    <a href="#" class="genric-btn info radius">{{$room->nomor}}</a>
                                                                @elseif ($room->status == 0)
                                                                    <a href="#" class="genric-btn disable radius">{{$room->nomor}}</a>
                                                                @else
                                                                    <a href="#" class="genric-btn warning radius">{{$room->nomor}}</a>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                    </section>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="row align-items-center">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="business_info">
                                                <div class="icon">
                                                    <i class="flaticon-first-aid-kit"></i>
                                                </div>
                                                <h3>Rumah Sakit C</h3>
                                                <p>Rumah Sakit C adalah Rumah Sakit yang berada di kota Kediri yang berdiri sejak tahun 1957. Dimana Rumah Sakit ini dilandasi
                                                    dengan pelayanan kasih terhadap sesama, yang didasari dengan iman, sebagai manifestasi rasa syukur kepada Tuhan. Perbaikan yang
                                                    berkesinambungan dalam mutu pelayanan & fasilitas.merupakan bentuk konsekuensi kami sebagai "Sahabat Terpercaya Menuju Sehat"
                                                    Visi : Menjadi Rumah Sakit Pilihan dan Rujukan Utama dengan dasar Kasih Kristus.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="business_thumb">
                                                <img src="img/hospital/hospital3.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <section class="button-area">
                                        <div class="container box_1170 border-top-generic">
                                            {{-- {!! Form::open() !!} --}}
                                            <div class="single-element-widget mt-30">
                                                <h3 class="mb-30">Pilih Jenis Kamar</h3>
                                                <div class="default-select mb-30" id="default-select">
                                                    <select class="form-control" id="kelaskamar" name="kelas_kamar">
                                                    <option value="all">semua</option>
                                                    <option value="standard">Standard</option>
                                                    <option value="vip">VIP</option>
                                                    </select>
                                                </div>
                                            {{-- {!! Form::close() !!} --}}
                                                </div>
                                                    <div class="button-group-area mt-30">
                                                    @foreach ($rooms as $room)
                                                        @if ($room->lokasi == 3)
                                                            @if ($room->status == 1)
                                                                <a href="#" class="genric-btn info radius">{{$room->nomor}}</a>
                                                            @elseif ($room->status == 0)
                                                                <a href="#" class="genric-btn disable radius">{{$room->nomor}}</a>
                                                            @else
                                                                <a href="#" class="genric-btn warning radius">{{$room->nomor}}</a>
                                                            @endif
                                                        @endif
                                                    @endforeach

                                                    </div>
                                                </div>
                                    </section>
                        </div>
                      </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $('#kelas_kamar').on('change', function(e){
          console.log(e);
          var room_kelas = e.target.value;
          $.get('/json-kelaskamar?room_kelas' + room_kelas,function(data) {
            console.log(data);

            // $('#regencies').empty();
            // $('#regencies').append('<option value="0" disable="true" selected="true">=== Select Regencies ===</option>');

            // $('#districts').empty();
            // $('#districts').append('<option value="0" disable="true" selected="true">=== Select Districts ===</option>');

            // $('#villages').empty();
            // $('#villages').append('<option value="0" disable="true" selected="true">=== Select Villages ===</option>');

            $.each(data, function(index, regenciesObj){
              $('#regencies').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.name +'</option>');
            })
          });
        });
      </script>

@endsection
