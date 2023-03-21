<div>
    <div class="card-body px-0 pb-2">

        <div class=" me-3 my-3 text-end">
            <a class="btn bg-gradient-dark mb-0" href="table"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                Table
            </a>
        </div>
        @if(session()->has('message'))

        <div class="alert alert-danger">
            {{session('message')}}
        </div>

        @endif
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 custom-font">
                            S.No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                            Table Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 custom-font">
                            Description</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 custom-font">
                            Qrcode</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 custom-font">
                            Actions</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($allTables as $r)
                    <tr>
                        <td>
                            <div class="d-flex px-4 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ (($allTables->currentPage() * 2) - 2) + $loop->iteration  }}</h6>

                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{$r->name}}</p>

                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold mb-0">{{$r->description}}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-xs font-weight-bold barcode"><svg viewBox="0 0 100 100"> {!! file_get_contents($r->qrcode) !!}</svg></span>
                        </td>
                        <td class="align-middle">
                            <div class="text-center">
                                <button type="submit" wire:click.prevent="delete({{$r->id}})" class="btn btn-lg bg-gradient-primary btn-lg w-50 mt-4 mb-0"><i class="material-icons">delete</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>

                            <div class="text-center">
                                <button type="submit" wire:click.prevent="edit({{$r->id}})" class="btn btn-lg bg-gradient-warning btn-lg w-50 mt-4 mb-0"><i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>


                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="modal fade" id="confirmation-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete Conformation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are You Sure You Want To Delete this table ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click.prevent="deleteT({{@$r->id}})" data-bs-dismiss="modal">Yes</button>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger">No</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<div class="table-responsive p-0">
    {{ $allTables->links() }}
</div>