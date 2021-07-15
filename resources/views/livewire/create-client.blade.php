<div>
    @if ($errors->any())
        <x-error></x-error>
    @endif
    <x-card>
        <div class="row">
            <div class="col-md-12">
                <h4 class="display-4">Ingrese los datos del cliente</h4>
            </div>
        </div>
        <div class="row">
            <hr class="my-2">
        </div>
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name-input-text" class="form-control-label">Ingrese el nombre del cliente</label>
                    <input class="form-control" name="name" type="text" id="name-input-text" placeholder="Ingrese el nombre del cliente" value="{{ old('name') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="rfc-input-text" class="form-control-label">Ingrese el RFC (Opcional)</label>
                    <input class="form-control" name="rfc" type="text" id="rfc-input-text" placeholder="Ingrese el RFC del cliente" value="{{ old('rfc') }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="phone-input-text" class="form-control-label">Telefono de contacto</label>
                    <input class="form-control" name="phone" type="tel" id="phone-input-text" placeholder="Ingrese un número telefónico para contactar al cliente" value="{{ old('phone') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="street-input-text" class="form-control-label">Ingrese la calle</label>
                    <input class="form-control" name="street" type="text" id="street-input-text" placeholder="Ingrese la calle del cliente" value="{{ old('street') }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="suburb-input-text" class="form-control-label">Ingresa la colonia</label>
                    <input class="form-control" name="suburb" type="text" id="suburb-input-text" placeholder="Ingrese la colonia del cliente" value="{{ old('suburb') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="number-input-text" class="form-control-label">Ingresa el número de domocilio</label>
                    <input class="form-control" name="number" type="number" id="number-input-text" placeholder="Ingresa el número de domocilio del cliente" value="{{ old('number') }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="cp-input-text" class="form-control-label">Ingrese el código postal</label>
                    <input class="form-control" name="postal_code" type="number" id="cp-input-text" placeholder="Ingrese la calle del cliente" value="{{ old('postal_code') }}">
                </div>
                {{-- <div class="form-group col-md-4">
                    <label for="users">Recibio</label>
                    <select class="form-control" id="users">
                        <option>{{ Auth::user()->name }}</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="example-datetime-local-input" class="form-control-label">Datetime</label>
                    <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00" id="example-datetime-local-input">
                </div> --}}
            </div>
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-icon btn-success" type="submit">
                        <span class="btn-inner--icon"><i class="fas fa-user"></i></span>
                        <span class="btn-inner--text">Registrar Cliente</span>
                    </button>
                </div>
            </div>
        </form>
    </x-card>
</div>