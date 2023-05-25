<div>
        <!-- Navbar -->
        <!-- End Navbar -->

    <div class="container-fluid">
        <div class="d-flex me-3 my-3 justify-content-between align-items-center">
            <h5 class="font-weight-bolder mb-0 text-capitalize">Manage Role</h5>
            <a class="btn btn-primary mb-0" href="addrole"><i
                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                Role
            </a>
        </div>
    </div>

        <div class="container-fluid">
            <div class="row" style="min-height:calc(100vh - 240px)">
                <div class="col-12">
                    <div class="card my-4">
                
        
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4 custom-font">
                                                ID
                                            </th>
                                           
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                                Name</th>
                                           
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                               Action
                                            </th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                        @foreach($role as $r)
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
                                                    <h6 class="mb-0 text-sm">{{ $r->role_name}}</h6>

                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="" data-original-title=""
                                                    title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                
                                                <button type="button" wire:click.prevent="delete({{ $r->id }})" class="btn btn-danger btn-link"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">delete</i>
                                                        <div class="ripple-container"></div>
                                                </button>
                                            </td>
                                            <?php $i++; ?>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>