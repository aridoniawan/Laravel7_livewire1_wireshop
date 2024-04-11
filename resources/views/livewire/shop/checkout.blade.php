<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Checkout</div>

                <div class="card-body">
                    @if ($formCheckout)
                        <form wire:submit.prevent="checkout">
                            <div class="form-group">
                                <div class="form-row mb-2">
                                    <div class="col">
                                      <input wire:model="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
                                      @error('first_name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                    </div>
                                    <div class="col">
                                        <input wire:model="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
                                        @error('last_name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>