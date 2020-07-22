@extends('layout')

<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

    // datepicker
    $( function() {
        $( "#dateInput" ).datepicker();
    });

    // 
      
   
    // block certain keys on input
    (function($) {
        $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
            });
        };
    }(jQuery));

    // only numbers, k and K can be typed in input
    $(document).ready(function() {
        $("#rutInput").inputFilter(function(value) {
            return /^((\d*)|((\d*)(k|K){1}))$/.test(value);  
        });
    });





    // check if Rut is already on DB
    $(function(){
        $('#rutInput').on('change',function(){
            
            
            var rut = $(this).val();
            

            // check if rut is valid
            verif = rut.slice(-1);
            body = rut.substring(0, rut.length - 1);
            long = body.length;
            var errorSpan = document.getElementById('rutError');

            if (long == 0) {
                errorSpan.innerHTML = '';
            } else if (long < 7) {
                errorSpan.innerHTML = 'Rut inválido';
                // block submit
            } else {
                errorSpan.innerHTML = '';
            } 

            if (verif == 'K') {
                verif = 'k';
            }

            // calculate verif number
            var i = 0;
            var aux = 2;
            var sum = 0;
            var last = long - 1;
            while (i < long) {
                if (aux == 8){
                    aux = 2;
                }
                sum = sum + (body[last] * aux);
                aux++;
                last--;
                i++;
            }
            mod = (Math.trunc(sum / 11)) * 11;
            rest = sum - mod;
            final = 11 - rest;
            if (final == 10) {
                final = 'k';
            } else if ( final == 11) { 
                final = 0;
            }

            // compare final with verif
            if (final == verif) {
                errorSpan.innerHTML = '';
            } else {
                errorSpan.innerHTML = 'Rut inválido';
                // block submit
            }
                
                     

            $.ajax({
                type: 'post',
                url: "{{ route('ajaxRut') }}",
                data: {
                    rut: rut,
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                success: function(data){
                    if (data){
                        $('#rutError').html('Este Rut ya se encuentra en uso');
                        // block submit
                    }
                    else{
                        // unlock submit
                    }
                }
            });
        });
    });
    

</script>


@section('content')
    <h1>Crear Usuario</h1> 
    <form action="/store" method="POST" role="form">
        <div class="form-group">
            <label for="nameInput">Nombres</label>
            <input required type="text" class="form-control" id="nameInput"  placeholder="Ingrese sus nombres" name="nameInput">
        </div>
        <div class="form-group">
            <label for="lastNameInput">Apellidos</label>
            <input required type="text" class="form-control" id="lastNameInput"  placeholder="Ingrese sus apellidos" name="lastNameInput">
        </div>
        <div style="display: inline-block; width:45%; margin: 0px 0px 16px">
            <label for="rutInput">Rut</label>
            <input required type="text" class="form-control" id="rutInput"  placeholder="Ingrese su Rut" name="rutInput" pattern="[0-9]">
            <span class="badge badge-light" id="rutError"></span>
        </div>
        
        <div style="display: inline-block; float: right; width:45%; margin: 0px 0px 16px">
            <label for="dateInput">Fecha de nacimiento</label>
            <input required type="text" class="form-control" id="dateInput" placeholder="Seleccione su fecha de nacimiento" name="dateInput" onkeypress="validar(event)">
        </div>
        <div class="form-group">
            <label for="emailInput">Email</label>
            <input required type="email" class="form-control" id="emailInput" placeholder="Ingrese su Email" name="emailInput">
        </div>
        <div class="form-group">
            <label for="passwordInput">Contraseña</label>
            <input required type="password" class="form-control" id="passwordInput" placeholder="Ingrese su Contraseña" name="passwordInput">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection