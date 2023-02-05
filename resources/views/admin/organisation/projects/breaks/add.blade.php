<div class="row fieldCopy d-none mt-2">
    <div class="col-md-5">
        <input type="text" name="amount[]" class="form-control" placeholder="Amount">
    </div>
    <div class="col-md-5">
        <textarea name="description[]"   class="form-control"></textarea>
    </div>
    <div class="col-md-2">
        <a href="#" class="btn btn-outline-danger btn-sm removeClone">
            <x-trash>
            </x-trash>
        </a>
    </div>
</div>
<div class="modal-header">
    <h4 class="modal-title">
        Enable / Disable Project Donation
    </h4>
</div>
<form action="{{route('admin.org.org.project.donation.update',[$project->getKey()])}}" method="post">
    @csrf
    <div class="modal-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="1" @if( ! $project->donations) selected @endif>Enable</option>
                        <option value="0" @if( $project->donations) selected @endif>Disable</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Milestone (AUD)</label>
                    <input type="number" name="milestone" id="milestone" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <input type="text" name="amount[]" class="form-control" placeholder="Amount">
            </div>
            <div class="col-md-5">
                <textarea name="description[]"  class="form-control"></textarea>
            </div>
            <div class="col-md-2">
                <a href="#" class="btn btn-outline-info btn-sm clonePlus">
                    <x-plus>
                    </x-plus>
                </a>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </div>
</form>
