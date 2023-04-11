<div class="custom-switch">
    {{-- <input class="form-check-input"  wire:model.lazy="isActive" type="checkbox" role="switch" @if($isActive) checked @endif> --}}
    {{-- <input type="checkbox" wire:model.lazy="isActive" name="my-checkbox" @if($isActive) checked @endif data-bootstrap-switch> --}}
    <input type="checkbox" class="custom-control-input" id="customSwitch1" wire:model.lazy="isActive" @if($isActive) checked @endif>
    <label class="custom-control-label" for="customSwitch1">Publish prodi pada laman</label>
</div>
