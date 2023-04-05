
<div class="card-body px-0 pb-2">
<div class=" me-3 my-3 text-end">
        <a class="btn bg-gradient-dark mb-0" href="adduser"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add User
        </a>

 
    </div>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                S.No</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                UserName</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                               Email </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Phone</th>
                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Role</th>
                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Address</th>
                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                    @foreach($users as $r)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$i}}</h6>
                                                      
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$r->name}}</p>

                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$r->email}}</p>

                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$r->phone}}</p>

                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$r->role}}</p>

                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$r->location}}</p>

                                            </td>

                                            <td>
                                                @if($r->status == 1)
                                                <p class="text-xs font-weight-bold mb-0">Active</p>
                                                @else
                                                <p class="text-xs font-weight-bold mb-0">Passive</p>
                                                @endif
                                                

                                            </td>
                                            <!-- <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold mb-0">{{$r->about}}</span>
                                            </td> -->
                                           
                                            <td class="align-middle">
                                            <div class="text-center">
              
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