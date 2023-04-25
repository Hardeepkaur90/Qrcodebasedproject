
        <!-- Navbar -->
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                
                        <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="add-category"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                Category
                            </a>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                           
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NAME</th>
                                                <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                IMAGE</th>
                                                <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                STATUS</th>
                                           
                                            <th
                                            
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                               ACTION
                                            </th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($category as $r)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
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
                                              
                                                <button type="button" wire:click.prevent="delete({{ $r->id }})" class="btn btn-danger btn-link"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container"></div>
                                                </button>


                                                <button type="button" wire:click.prevent="edit({{ $r->id }})" class="btn btn-success btn-link"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
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
