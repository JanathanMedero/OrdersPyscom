@if(session()->has('success'))
    <div class="container">
        <div class="row">
            <div class="col-md-12 alert alert-success my-4" role="alert">
                <span class="alert-icon"><i class="fas fa-times"></i></span>
                <span class="alert-text"><strong>{{ session()->get('success') }}</strong></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif