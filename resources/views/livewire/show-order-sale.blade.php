<div>

    <x-card>
        <div class="row">
            <div class="col-md-12">
                <h4 class="display-4">Orden de Venta: {{ $order->folio }} - {{ $order->Client->name }}</h4>
            </div>
        </div>
    </x-card>

    <x-table>
        @livewire('show-products', ['folio' => $order->folio])
    </x-table>

    {{-- <x-card>
        @foreach($order->products as $product)
        <div class="row">
            <div class="col-md-12 mb-4">
                <h4 class="display-4">Producto: {{ $product->name }}</h4>
            </div>
        </div>
        <form>
            <div class="row my-2">
                <div class="form-group col-md-3">
                    <label for="input-quantity">Nombre del producto</label>
                    <input type="text" class="form-control" id="input-quantity" value="{{ $product->name }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="input-quantity">Cantidad del producto</label>
                    <input type="number" class="form-control" id="input-quantity" value="{{ $product->quantity }}" disabled>
                </div>
                <div class="form-group col-md-3 mb-0">
                    <label for="input-unit_price">Precio unitario</label>
                    <input type="number" class="form-control" id="input-unit_price" value="{{ $product->unit_price }}" disabled>
                </div>
                <div class="form-group col-md-3 mb-0">
                    <label for="input-net_price">Precio NETO</label>
                    <input type="number" class="form-control" id="input-net_price" value="{{ $product->net_price }}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="editor">Descripción del Producto</label>
                    <textarea class="form-control" rows="5" name="description" disabled>
                        {{ strip_tags($product->description) }}
                    </textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="observation">Observaciones (Opcional)</label>
                    <textarea class="form-control" rows="4" name="observations" resize="none" id="observation" disabled>
                        {{ strip_tags($product->observations) }}
                    </textarea>
                </div>
            </div>
            

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="date_of_sale" class="form-control-label">Fecha de venta</label>
                    <input class="form-control" name="date_of_sale" type="date" value="{{ $product->SaleOrder->date_of_sale }}" id="date_of_sale" disabled>
                </div>

                <div class="form-group col-md-4">
                    <label for="input-quantity">Recibio</label>
                    <input type="text" class="form-control" id="input-quantity" value="{{ $product->SaleOrder->User->name }}" disabled>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
        @endforeach

    </x-card> --}}
</div>
