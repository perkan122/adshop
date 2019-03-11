@extends('backend.main')

@section('content')

    <div class="page-content">
        <div class="row">
            @if (Session::has('success_password'))
                <div class="alert alert-success col-md-6 col-md-offset-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Uspešno:</strong> {{ Session::get('success_password') }}
                </div>
            @endif
            @if (Session::has('success_user'))
                <div class="alert alert-success col-md-6 col-md-offset-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Uspešno:</strong> {{ Session::get('success_user') }}
                </div>
            @endif
            @if (Session::has('error_password'))
                <div class="alert alert-danger col-md-6 col-md-offset-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Greška: </strong> {{ Session::get('error_password') }}
                </div>
            @endif
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject font-green sbold uppercase"> Izmena profila korisnika </span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">Informacije</a>
                            </li>
                            <li>
                                <a href="#tab_1_3" data-toggle="tab">Promena lozinke</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="tab-pane active col-md-4 col-md-offset-4 "  id="tab_1_1">
                            <form role="form" action="{{route('updateprofile')}}" method="post" data-parsley-validate>
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <div class="form-group">
                                    <label class="control-label">Ime</label>
                                    <input type="text"  name="name" class="form-control" value="{{ Auth::user()->name }}" required /> </div>
                                <div class="form-group">
                                    <label class="control-label">Prezime</label>
                                    <input type="text" name="surname" value="{{ Auth::user()->surname }}" class="form-control" required/> </div>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" required /> </div>
                                <div class="form-group">
                                    <label class="control-label">Telefon</label>
                                    <input type="text" name="telephone" value="{{ Auth::user()->telephone }}" class="form-control" required  /> </div>
                                <div class="form-group">
                                    <label class="control-label">Adresa</label>
                                    <input type="text" name="address" value="{{ Auth::user()->address }}" class="form-control" required/> </div>
                                <div class="form-group">
                                    <label class="control-label">Sprat</label>
                                    <input type="text" name="floor" value="{{ Auth::user()->floor }}" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Broj</label>
                                    <input type="text" name="apartment_number" value="{{ Auth::user()->apartment_number }}" class="form-control" required/>
                                </div>
                                <div class="margiv-top-10">
                                    <button  type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i> Sačuvaj</button>
                                    <a href="{{ route('orders.index') }}" class="btn default"> Nazad </a>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane col-md-4 col-md-offset-4" id="tab_1_3">
                            <form action="{{route('updatepassword')}}" method="post" data-parsley-validate >
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}"> </div>
                                <div class="form-group">
                                    <label class="control-label">Trenutna lozinka<i style="margin-left:20px;"class="icon1 glyphicon glyphicon-eye-open"></i></label>
                                    <input name="oldpassword" type="password" class="form-control password1" required /> </div>
                                <div class="form-group">
                                    <label class="control-label">Nova lozinka <i style="margin-left:20px;"class="icon2 glyphicon glyphicon-eye-open"></i></label>
                                    <input name="newpassword" id="txtNewPassword" type="password" class="form-control password2" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Ponovi lozinku</label>
                                    <input name="againpassword" id="txtConfirmPassword" type="password" class="form-control" required  /> </div>
                                <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
                                <div class="margin-top-10">
                                    <button  type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i> Sačuvaj</button>
                                    <a href="{{ route('orders.index') }}" class="btn default"> Nazad </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
