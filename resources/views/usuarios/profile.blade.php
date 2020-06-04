@extends('templates.template')
@section('titulo', 'Admin | Tienda Online')

@section('menu')
  @include('templates.menu')
@endsection

@section('head-style-script')
    <!--Aqui los estilos y scripts en el head-->
@endsection
@section('contenido')
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">User Profile</h4>
                </div>
                <div class="panel-body user-profile-panel">
                    <img src="http://via.placeholder.com/100x100" class="user-profile-image img-circle" alt="">
                    <h4 class="text-center m-t-lg">john doe</h4>
                    <p class="text-center">UI/UX Designer</p>
                    <hr>
                    <ul class="list-unstyled text-center">
                        <li>
                            <p><i class="fa fa-map-marker m-r-xs"></i>Melbourne, Australia</p>
                        </li>
                        <li>
                            <p><i class="fa fa-paper-plane-o m-r-xs"></i><a href="#">example@mail.com</a></p>
                        </li>
                    </ul>
                    <hr>
                    <button class="btn btn-info btn-block">Follow</button>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">User Profile</h4>
                </div>
                <div class="panel-body user-profile-panel">
                    <img src="http://via.placeholder.com/100x100" class="user-profile-image img-circle" alt="">
                    <h4 class="text-center m-t-lg">john doe</h4>
                    <p class="text-center">UI/UX Designer</p>
                    <hr>
                    <ul class="list-unstyled text-center">
                        <li>
                            <p><i class="fa fa-map-marker m-r-xs"></i>Melbourne, Australia</p>
                        </li>
                        <li>
                            <p><i class="fa fa-paper-plane-o m-r-xs"></i><a href="#">example@mail.com</a></p>
                        </li>
                    </ul>
                    <hr>
                    <button class="btn btn-info btn-block">Follow</button>
                </div>
            </div>
        </div>
    </div><!-- Row -->

@endsection
@section('boby-script')
    <!--Aqui los scripts en el body-->
@endsection