<div>
    <x-card>
        <div class="row">
            <div class="col-md-12">
                <h4 class="display-4">Ingrese los datos del cliente</h4>
            </div>
        </div>
        <div class="row">
            <hr class="my-2">
        </div>
        <form>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name-input-text" class="form-control-label">Ingrese el nombre del cliente</label>
                    <input class="form-control" type="text" id="name-input-text" placeholder="Ingrese el nombre del cliente">
                </div>
                <div class="form-group col-md-6">
                    <label for="rfc-input-text" class="form-control-label">Ingrese el RFC (Opcional)</label>
                    <input class="form-control" type="text" id="rfc-input-text" placeholder="Ingrese el RFC del cliente">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="phone-input-text" class="form-control-label">Telefono de contacto</label>
                    <input class="form-control" type="tel" id="phone-input-text" placeholder="Ingrese un número telefónico para contactar al cliente">
                </div>
                <div class="form-group col-md-6">
                    <label for="street-input-text" class="form-control-label">Ingrese la calle</label>
                    <input class="form-control" type="text" id="street-input-text" placeholder="Ingrese la calle del cliente">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="suburb-input-text" class="form-control-label">Ingresa la colonia</label>
                    <input class="form-control" type="text" id="suburb-input-text" placeholder="Ingrese la colonia del cliente">
                </div>
                <div class="form-group col-md-6">
                    <label for="number-input-text" class="form-control-label">Ingresa el número de domocilio</label>
                    <input class="form-control" type="number" id="number-input-text" placeholder="Ingresa el número de domocilio del cliente">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="cp-input-text" class="form-control-label">Ingrese el código postal</label>
                    <input class="form-control" type="number" id="cp-input-text" placeholder="Ingrese la calle del cliente">
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
                    <button class="btn btn-icon btn-success" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-user"></i></span>
                        <span class="btn-inner--text">Registrar Cliente</span>
                    </button>
                </div>
            </div>
        </form>
    </x-card>
</div>
