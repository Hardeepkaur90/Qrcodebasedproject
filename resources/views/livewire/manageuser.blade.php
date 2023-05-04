
<div>

    <div class="container-fluid">
        <div class="d-flex me-3 my-3 justify-content-between align-items-center">
            <h5 class="font-weight-bolder mb-0 text-capitalize">Manage User</h5>
            <a class="btn btn-primary mb-0" href="adduser"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add User</a>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row" style="min-height:calc(100vh - 310px)">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-0 pb-2">
                        
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4 custom-font">
                                            S.No</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                            UserName</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                            Email </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                            Phone</th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                            Role</th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                            Profile</th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                            Address</th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                            Status</th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 custom-font">
                                            Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                @foreach($users as $r)
                                    <tr>
                                        <td>
                                            <div class="d-flex ps-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$i}}</h6>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-sm">{{$r->name}}</p>

                                        </td>
                                        <td>
                                            <p class="mb-0 text-sm">{{$r->email}}</p>

                                        </td>
                                        <td>
                                            <p class="mb-0 text-sm">{{$r->phone}}</p>

                                        </td>
                                        <td>
                                            <p class="mb-0 text-sm">{{$r->role}}</p>

                                        </td>
                                        <td>
                                        @if($r->profile)
                                            <img src="{{ asset('storage/'.$r->profile) }}" style="border-radius: 31px !important;" alt="" height="50" width="50">
                                            @else
                                            <img src="{{ asset('storage/profiles/dummy-profile-pic.jpg') }}"style="border-radius: 31px !important;" alt="" height="50" width="50">
                                            @endif
                                            

                                        </td>
                                        <td>
                                        <p class="mb-0 text-sm">{{$r->location}}</p>
                                        </td>
                                        <td>
                                            @if($r->status == 'Active')
                                            <p class="mb-0 text-sm">Active</p>
                                            @else
                                            <p class="mb-0 text-sm">Passive</p>
                                            @endif
                                            

                                        </td>
                                        <!-- <td class="align-middle text-center text-sm">
                                            <span class="mb-0 text-sm">{{$r->about}}</span>
                                        </td> -->
                                        
                                        <td class="align-middle">
                                        <div class="">

                                        <a rel="tooltip" class="btn btn-success btn-link" wire:click.prevent="edit({{ $r->id }})" href="" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                        <div class="ripple-container"></div>
                                    </a>

                                    <button type="button" onclick="confirm('Are you sure you want to remove the user from this group?') || event.stopImmediatePropagation()" wire:click.prevent="delete({{ $r->id }})" class="btn btn-danger btn-link" data-original-title="" title="">
                                        <i class="material-icons">close</i>
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
                </div>
            </div>
        </div>
    </div>
                    
</div>