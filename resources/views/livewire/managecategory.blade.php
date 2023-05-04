
        <!-- Navbar -->
        <!-- End Navbar -->

        <div class="container-fluid">
            <div class="d-flex me-3 my-3 justify-content-between align-items-center">
                <h5 class="font-weight-bolder mb-0 text-capitalize">Manage Role</h5>
                <a class="btn btn-primary mb-0" href="add-category"><i
                        class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                    Category
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
                                                Image</th>
                                                <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                                Status</th>
                                           
                                            <th
                                            
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                               Action
                                            </th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($category as $r)
                                        <tr>
                                            <td>
                                                <div class="d-flex ps-3 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">1</p>
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
                                               
                                                <img src="{{ Storage::url($r->image) }}" alt="test" height="50" width="50">
                                                

                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                @if($r->status == 1)
                                            <h6 class="mb-0 text-sm">Ready</h6>
                                            @else
                                            <h6 class="mb-0 text-sm">Not Ready</h6>
                                            @endif

                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <button type="button" wire:click.prevent="edit({{ $r->id }})" class="btn btn-success btn-link"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                </button>
                                                <button type="button" wire:click.prevent="delete({{ $r->id }})" class="btn btn-danger btn-link"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">delete</i>
                                                        <div class="ripple-container"></div>
                                                </button>
                                            </td>
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
