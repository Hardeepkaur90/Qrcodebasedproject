<!-- Navbar -->
<!-- End Navbar -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex me-3 my-3 justify-content-between align-items-center">
                <h5 class="font-weight-bolder mb-0 text-capitalize">Manage Chef</h5>
                <a class="btn btn-primary mb-0" href="add-chef"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Chef</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12" style="min-height:calc(100vh - 260px)">
            <div class="card my-4">
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4 custom-font">
                                        ID
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                        NAME</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                        EMAIL</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                        PROFILE</th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                        ACTION
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($chefs as $r)
                                <tr>
                                    <td>
                                        <div class="d-flex ps-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="mb-0 text-sm">{{$i}}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $r->name}}</h6>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $r->email}}</h6>

                                        </div>
                                    </td>
                                  

                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <img src="{{ asset('storage/'.$r->profile) }}" alt="" height="50" width="50">
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                       
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
                                <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade" id="confirmation-modal-chef" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Conformation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are You Sure You Want To Delete this Chef ?
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
    </div>
</div>