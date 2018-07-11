<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="container" style="border: 1px solid black;" >
    <div>
        <p style="font-size: 14px; font-style: italic; margin-left:30px; font-weight: bold;">CMI Dr.{{ $data['userDetails']->firstName}} {{ $data['userDetails']->lastName}} ,{{ $data['userDetails']->address}} <br>
            CIF {{ $data['userDetails']->cif}} , RUCM {{ $data['userDetails']->rucm}}
        </p>
    </div>
    <div class="checkboxType" style="align-content: center;">
        <input type="radio" id="customRadioInline1" name="type" class="custom-control-input" value="1" @if($data['record']->type =="1") checked @endif>
        <label class="custom-control-label" for="customRadioInline1">Angajare</label>
        <input type="radio" id="customRadioInline2" name="type" class="custom-control-input" value="2" @if($data['record']->type =="2") checked @endif>
        <label class="custom-control-label" for="customRadioInline2">Control medical periodic</label>
        <input type="radio" id="customRadioInline3" name="type" class="custom-control-input" value="3" @if($data['record']->type =="3") checked @endif>
        <label class="custom-control-label" for="customRadioInline3">Adaptare</label>
        <input type="radio" id="customRadioInline4" name="type" class="custom-control-input" value="4" @if($data['record']->type =="4") checked @endif>
        <label class="custom-control-label" for="customRadioInline4">Reluarea muncii</label>
        <input type="radio" id="customRadioInline5" name="type" class="custom-control-input" value="5" @if($data['record']->type =="5") checked @endif>
        <label class="custom-control-label" for="customRadioInline5">Supraveghere speciala</label>
        <input type="radio" id="customRadioInline6" name="type" class="custom-control-input" value="6" @if($data['record']->type =="6") checked @endif>
        <label class="custom-control-label" for="customRadioInline6">Altele</label>
    </div>
    <div>
        <p style="font-size: 18px; font-style: italic; text-align: center; font-weight: bold;"> MEDICINA MUNCII – FISA DE APTITUDINE Nr:  {{ $data['record']->file }} </p>
        <p style="font-size: 10px; margin-left:200px; margin-top: -16px; "> (un exemplar se trimite la angajator, unul se inmaneaza angajatului)</p>
    </div>
    <div>
        <label > Societate:</label>
        <p style="border-bottom: dotted; float: right; width: 88%; display: inline; text-align: center;"> {{$data['company']->nameCompany }}</p>
    </div>
    <div >
        <label > Adresa:</label>
        <p style="border-bottom: dotted; float: right; width: 88%; display: inline;  text-align: center;"> {{ $data['company']->address }}</p>
    </div>
    <div >
        <label > Telefon:</label>
        <p style="border-bottom: dotted; float: right; width: 88%; display: inline;  text-align: center;">{{ $data['company']->phoneNumber }}</p>
    </div>
    <div >
        <label > Fax:</label>
        <p style="border-bottom: dotted; float: right; width: 88%; display: inline;  text-align: center;">{{ $data['company']->fax }}</p>
    </div>
    <hr class="styleHr1">
    <div>
        <label >Nume:</label>
        <p style="border-bottom: dotted; float: right; width: 88%; display: inline; text-align: center;">{{ $data['patient']->lastName }}</p>
    </div>
    <div >
        <label >Prenume:</label>
        <p style="border-bottom: dotted; float: right; width: 88%; display: inline;  text-align: center;"> {{ $data['patient']->firstName }}</p>
    </div>
    <div >
        <label >CNP:</label>
        <p style="border-bottom: dotted; float: right; width: 88%; display: inline;  text-align: center;">{{ $data['patient']->CNP }}</p>
    </div>
    <div >
        <label >Ocupatie/functie</label>
        <p style="border-bottom: dotted; float: right; width: 80%; display: inline;  text-align: center;">{{$data['patient']->occupation }}</p>
    </div>
    <div >
        <label >Loc de munca</label>
        <p style="border-bottom: dotted; float: right; width: 80%; display: inline;  text-align: center;">{{$data['patient']->job }}</p>
    </div>
    <div>
        <div >
            <div>
                <label>Aviz medical:</label>
            </div >
            <div>
                <input type="radio" id="customRadio1" name="medicalOpinion" value="1" class="custom-control-input" @if($data['record']->medicalOpinion=="1") checked @endif>
                <label class="custom-control-label" for="customRadio1">APT</label>
            </div>
            <div>
                <input type="radio" id="customRadio2" name="medicalOpinion" value="2" class="custom-control-input" @if($data['record']->medicalOpinion =="2") checked @endif>
                <label class="custom-control-label" for="customRadio2">APT CONDITIONAT</label>
            </div>
            <div>
                <input type="radio" id="customRadio3" name="medicalOpinion"   value="3" class="custom-control-input" @if($data['record']->medicalOpinion =="3") checked @endif>
                <label class="custom-control-label" for="customRadio3">INAPT TEMPORAR</label>
            </div>
            <div>
                <input type="radio" id="customRadio4" name="medicalOpinion" value="4" class="custom-control-input" @if($data['record']->medicalOpinion =="4") checked @endif>
                <label class="custom-control-label" for="customRadio4">APT CONDITIONAT</label>
            </div>
        </div>
            <div style=" margin: -200px 30px 0 450px;">
                <label >Recomandari</label>
                <p> {{ $data['record']->recommendations }}</p>
            </div>
            <div style=" margin: 0px 0 0 400px;">
                <p>Medic medicina muncii(semnatura si parafa)</p>
                <hr>
            </div>
            <br>
            <div>
                <label >Data:{{ $data['carbon']->format('d m Y') }} </label>
            </div>

    </div>
</div>