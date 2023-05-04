<div class="container-fluid">
    <div class="row">
    <div class="d-flex me-3 my-3 justify-content-between align-items-center">
        <h5 class="font-weight-bolder mb-0 text-capitalize">Manage Table</h5>
        <a class="btn btn-primary mb-0" href="table"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                Table
            </a>
    </div>
    <div class="col-12" style="min-height:calc(100vh - 260px)">
            <div class="card my-4">
       <div class=" me-3 my-3 text-end">
           
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4 custom-font">
                            S.No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                            Table Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                            Description</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                            Qrcode</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                            Actions</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($allTables as $r)
                    <tr>
                        <td>
                            <div class="d-flex ps-3 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ (($allTables->currentPage() * 2) - 2) + $loop->iteration  }}</h6>

                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center"><h6 class="mb-0 text-sm">{{$r->name}}</h6></div>

                        </td>
                        <td class="align-middle text-sm">
                            <div class="d-flex flex-column justify-content-center"><span class="mb-0">{{$r->description}}</span></div>
                        </td>
                        <td class="align-middle text-sm">
                            <div class="d-flex flex-column justify-content-center"><span class="text-secondary text-xs barcode"><svg viewBox="0 0 100 100"> {!! file_get_contents($r->qrcode) !!}</svg></span></div>
                        </td>
                       



                        <td class="align-middle text-sm">
                                        <a rel="tooltip" class="btn btn-success btn-link" wire:click.prevent="edit({{ $r->id }})" href="" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                            <div class="ripple-container"></div>
                                        </a>

                                        <button type="button" wire:click.prevent="delete({{ $r->id }})" class="btn btn-danger btn-link" data-original-title="" title="">
                                            <i class="material-icons">delete</i>
                                            <div class="ripple-container"></div>
                                        </button>
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

</div>
</div>