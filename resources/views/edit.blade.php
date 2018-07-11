@extends('layouts.app')
@section('content')
<div class="">
    <div class="">
        @if (session('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger" style="margin-top:50px;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
            @endif
        {{ csrf_field() }}
    </div>
</div>
<div class="container" style="border: 1px solid black;" >
    <form  method="post" action="{{route('request.update',$record->id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <p style="font-size: 14px; font-style: italic; font-weight: bold; ">CMI Dr.{{$userDetails->firstName}} {{$userDetails->lastName}} , {{$userDetails->address}} <br>
            CIF {{$userDetails->cif}} , RUCM {{$userDetails->rucm}}
        </p>
        <div class="checkboxType">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="type" class="custom-control-input" value="1" @if($record->type=="1") checked @endif>
                <label class="custom-control-label" for="customRadioInline1">Angajare</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="type" class="custom-control-input" value="2" @if($record->type=="2") checked @endif>
                <label class="custom-control-label" for="customRadioInline2">Control medical periodic</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline3" name="type" class="custom-control-input" value="3" @if($record->type=="3") checked @endif>
                <label class="custom-control-label" for="customRadioInline3">Adaptare</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline4" name="type" class="custom-control-input" value="4" @if($record->type=="4") checked @endif>
                <label class="custom-control-label" for="customRadioInline4">Reluarea muncii</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline5" name="type" class="custom-control-input" value="5" @if($record->type=="5") checked @endif>
                <label class="custom-control-label" for="customRadioInline5">Supraveghere specială</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline6" name="type" class="custom-control-input" value="6" @if($record->type=="6") checked @endif>
                <label class="custom-control-label" for="customRadioInline6">Altele</label>
            </div>
        </div>
        <div class="form-group form-inline fisa_nr">
            <label for="file">MEDICINA MUNCII – FIŞĂ DE APTITUDINE Nr.</label>
            <input type="text" name="file" class="form-control mx-sm-3"  value ="{{$record->file}}">
        </div>
        <div class="form-row">
            <div class="col-md-6 sub ">
                <p> (un exemplar se trimite la angajator, unul se înmânează angajatului)</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="nameCompany">Societate</label>
                    <input type="text" class="form-control" id="nameCompany" name="nameCompany" autocomplete="on" value ="{{$company->nameCompany}}">
                    <input type="hidden" name="idCompany" id="idCompany" value="">
                    <input type="hidden" name="idPacient" name="idPacient" value="">
                </div>
                <div class="form-group ">
                    <label for="address">Adresa</label>
                    <input type="text" class="form-control" id="address" name="address"  value ="{{$company->address}}">
                </div>
                <div class="form-row ">
                    <div class="form-group col-md-6">
                        <label for="phoneNumber">Telefon</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"  value ="{{$company->phoneNumber}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fax">Fax</label>
                        <input type="text" class="form-control" id="fax" name="fax"  value ="{{$company->fax}}">
                    </div>
                </div>
            </div>

            <div class="col-md-6" style="margin-top: 20px; ">
                <div class="form-inline">
                    <label for="notice">Aviz medical:</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio1" name="medicalOpinion" value="1" class="custom-control-input" @if($record->medicalOpinion=="1") checked @endif>
                    <label class="custom-control-label" for="customRadio1">APT</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio2" name="medicalOpinion" value="2" class="custom-control-input" @if($record->medicalOpinion=="2") checked @endif>
                    <label class="custom-control-label" for="customRadio2">APT CONDITIONAT</label>
                </div>
                 <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio3" name="medicalOpinion"   value="3" class="custom-control-input" @if($record->medicalOpinion=="3") checked @endif>
                    <label class="custom-control-label" for="customRadio3">INAPT TEMPORAR</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio4" name="medicalOpinion" value="4" class="custom-control-input" @if($record->medicalOpinion=="4") checked @endif>
                    <label class="custom-control-label" for="customRadio4">APT CONDITIONAT</label>
                </div>
            </div>
        </div>
        <hr class="styleHr1">

        <div class="row">
            <div class="col-md-6">
               <div class="form-row ">
                    <div class="form-group col-md-6">
                        <label for="lastName">Nume</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value ="{{$patient->lastName}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="firstName">Prenume</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value ="{{$patient->firstName}}">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="CNP">CNP</label>
                    <input type="text" class="form-control" id="CNP" name="CNP" value ="{{$patient->CNP}}">
                </div>
                <div class="form-row ">
                    <div class="form-group col-md-6">
                        <label for="occupation">Ocupaţie/funcţie</label>
                        <input type="text" class="form-control" id="occupation" name="occupation" value="{{$patient->occupation}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="job">Loc de munca</label>
                        <input type="text" class="form-control" id="job" name="job" value="{{$patient->job}}">
                    </div>
                </div>
                <div class="form-group">
                    <p >Data:{{ $carbon->format('d m Y') }} </p>
                </div>
            </div>

            <div class="col-md-6">
                 <div class="form-group">
                    <label class="fisa_nr" for="recommendations">Recomandari</label>
                    <textarea class="form-control" name="recommendations" rows="9" cols="50">{{ $record->recommendations }}</textarea>
                    <p class="styleM">Medic medicina muncii(semnatura si parafa)</p>
                    <hr class="styleHr2">
                </div>
            </div>
        </div>
        <div class="form-group col-md-12 submit">
                    <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
@endsection