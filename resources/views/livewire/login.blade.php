<div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mt-5">
          <div class="card-header">{{ __('Login') }}</div>
          <div class="card-body">
            <form wire:submit.prevent="login">
              <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input wire:model="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                  placeholder="Enter email">
                @error('email')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                <label for="password" class="mt-3">{{ __('Password') }}</label>
                <input wire:model='password' type="password" class="form-control mt-3" id="password"
                  placeholder="Password">
                @error('password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary" wire:click='login'>{{ __('Login') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
