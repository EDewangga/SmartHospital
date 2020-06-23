@extends('layouts.master')

@section('content')
<div class="section-top-border">
    <div class= "container">
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <h3 class="mb-30">Daftar Kamar</h3>
            <form action="kamar" method="post">
                <div class="mt-10">
                    <input type="name" name="name" placeholder="" value="{{Auth::user()->name}}" required
                        class="single-input">
                </div>
                <div class="mt-10">
                    <input type="text" name="telp" placeholder="Telp"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telp'" required
                        class="single-input">
                </div>
                <div class="mt-10">
                    <input type="email" name="email" placeholder="" value="{{Auth::user()->email}}" required
                        class="single-input">
                </div>
                <br><br>

                <button type="submit" name="submit" class="genric-btn info radius" value="create">Confirm</button>
                {{-- <input type="hidden" name="_method" value="POST"> --}}
                {{ csrf_field() }}
                <!-- For Gradient Border Use -->
                <!-- <div class="mt-10">
                            <div class="primary-input">
                                <input id="primary-input" type="text" name="first_name" placeholder="Primary color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'">
                                <label for="primary-input"></label>
                            </div>
                        </div> -->
            </form>
        </div>
    </div>
</div>
</div>



@endsection
