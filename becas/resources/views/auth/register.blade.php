@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Register</h2>Los campos con <strong class="rojo">*</strong> son obligatorios</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <!--=====================================
                        =            Section comment            =
                        ======================================-->
                        <div class="form-group row">
                            <label for="document_type_codigo" class="col-md-4 col-form-label text-md-right">Tipo de documento<strong class="rojo">*</strong></label>
                            <div class="col-md-6">
                                <select name="document_type_codigo"  class="form-control{{ $errors->has('document_type_codigo') ? ' is-invalid' : '' }}" value="{{ old('document_type_codigo') }}" required autofocus>
                                        <option value="CC">     Cédula de Ciudadanía </option>
                                        <option value="TI">     Tarjeta de Identidad </option>
                                        <option value="RC">     Registro Civil </option>
                                        <option value="CE">     Cédula de Extranjería </option>
                                        <option value="CI">     Cédula de Identidad </option>
                                        <option value="CAI">    Carné de Identidad </option>
                                        <option value="DNI">    Documento Nacional de Identidad </option>
                                        <option value="DUI">    Documento Único de Identidad </option>
                                        <option value="ID">     identificación oficial o simplemente identificación </option>
                                </select>
                                @if ($errors->has('document_type_codigo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('document_type_codigo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--====  End of Section comment  ====-->
 


                        <!--=====================================
                        =            Section comment            =
                        ======================================-->
                        <div class="form-group row">
                            <label for="codigo" class="col-md-4 col-form-label text-md-right">Número de documento<strong class="rojo">*</strong></label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" value="{{ old('codigo') }}" required>

                                @if ($errors->has('codigo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('codigo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                       
                        
                        <!--====  End of Section comment  ====-->
                        


                        <!--=====================================
                        =            Section comment            =
                        ======================================-->
                        <div class="form-group row">
                            <label for="expedition_date" class="col-md-4 col-form-label text-md-right">Fecha de expedición</label>

                            <div class="col-md-6">
                                <input id="expedition_date" type="date" class="form-control{{ $errors->has('expedition_date') ? ' is-invalid' : '' }}" name="expedition_date" value="{{ old('expedition_date') }}" required>

                                @if ($errors->has('expedition_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('expedition_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                       
                        
                        <!--====  End of Section comment  ====-->



                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombres<strong class="rojo">*</strong></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_surname" class="col-md-4 col-form-label text-md-right">Primer Apellido<strong class="rojo">*</strong></label>

                            <div class="col-md-6">
                                <input id="first_surname" type="text" class="form-control{{ $errors->has('first_surname') ? ' is-invalid' : '' }}" name="first_surname" value="{{ old('first_surname') }}" required>

                                @if ($errors->has('first_surname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="    last_surname" class="col-md-4 col-form-label text-md-right">Segundo Apellido</label>

                            <div class="col-md-6">
                                <input id=" last_surname" type="text" class="form-control{{ $errors->has('   last_surname') ? ' is-invalid' : '' }}"    name=" last_surname" value="{{ old('    last_surname') }}" required>

                                @if ($errors->has(' last_surname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first(' last_surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        




                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Imagen....</label>
                        </div>



                        <!--=====================================
                        =            Section comment            =
                        ======================================-->
                        <div class="form-group row">
                            <label for="expedition_date" class="col-md-4 col-form-label text-md-right">Fecha de Nacimiento</label>

                            <div class="col-md-6">
                                <input id="expedition_date" type="date" class="form-control{{ $errors->has('expedition_date') ? ' is-invalid' : '' }}" name="expedition_date" value="{{ old('expedition_date') }}" required>

                                @if ($errors->has('expedition_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('expedition_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                       
                        
                        <!--====  End of Section comment  ====-->
    







                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electronico<strong class="rojo">*</strong></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña<strong class="rojo">*</strong></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmación de la contraseña<strong class="rojo">*</strong></label>


                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>






                        <!--=====================================
                        =            Section comment            =
                        ======================================-->
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Genero<strong class="rojo">*</strong></label>
                            <div class="col-md-6">
                                <select name="gender"  class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" value="{{ old('gender') }}" required autofocus>
                                        <option value="MASCULINO"> Masculino </option>
                                        <option value="FEMENINO">   Femenino </option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--====  End of Section comment  ====-->    

                        <!--=====================================
                        =            Section comment            =
                        ======================================-->
                        <div class="form-group row">
                            <label for="stratum" class="col-md-4 col-form-label text-md-right">Estrato<strong class="rojo">*</strong></label>
                            <div class="col-md-6">
                                <select name="stratum"  class="form-control{{ $errors->has('stratum') ? ' is-invalid' : '' }}" value="{{ old('stratum') }}" required autofocus>
                                        <option value="0"> Cero </option>
                                        <option value="1"> Uno </option>
                                        <option value="2"> Dos </option>
                                        <option value="3"> tres </option>
                                        <option value="4"> Cuatro </option>
                                        <option value="5"> Cinco </option>
                                        <option value="6"> Seis </option>
                                        <option value="7"> Siete </option>
                                        <option value="8"> Ocho </option>
                                </select>
                                @if ($errors->has('stratum'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('stratum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--====  End of Section comment  ====--> 

                        <!--=====================================
                        =            Section comment            =
                        ======================================-->
                        <div class="form-group row">
                            <label for="    family_nucleus" class="col-md-4 col-form-label text-md-right">Nucleo Familiar<strong class="rojo">*</strong></label>
                            <div class="col-md-6">
                                <select name="family_nucleus"  class="form-control{{ $errors->has(' family_nucleus') ? ' is-invalid' : '' }}" value="{{ old('family_nucleus') }}" required autofocus>
                                        <option value="MASCULINO"> TITULAR </option>
                                        <option value="FEMENINO">  BENEFICIARIO </option>
                                </select>
                                @if ($errors->has(' family_nucleus'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('family_nucleus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--====  End of Section comment  ====--> 
                            
                        <!--=====================================
                        =            Section comment            =
                        ======================================-->
                        <div class="form-group row">
                            <label for="    civil_status" class="col-md-4 col-form-label text-md-right">Nucleo Familiar<strong class="rojo">*</strong></label>
                            <div class="col-md-6">
                                <select name="civil_status"  class="form-control{{ $errors->has(' civil_status') ? ' is-invalid' : '' }}" value="{{ old('civil_status') }}" required autofocus>
                                        <option value="SOLTER@"> Solter@ </option>
                                        <option value="CASAD@">  Casad@ </option>
                                        <option value="VIUD@">  Viudo@ </option>
                                </select>
                                @if ($errors->has(' civil_status'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('civil_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--====  End of Section comment  ====--> 






                        


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
