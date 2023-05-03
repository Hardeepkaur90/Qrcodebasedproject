
<div class="card-body px-0 pb-2">

                            <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                S.No</th>
                                                 <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                               Item Image </th>
                                                <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Order Number</th>
                                                <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Table Number</th>
                                               <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Payment-Id </th>
                                               <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Item Name </th>
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
                                       
                
                                <?php $i = 1; ?>
                                
                                
                               
                                @foreach($orders as $key => $r)
                                
                                }
                                 <tr>
                                    <td>
                                        <div class="d-flex ps-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="mb-0 text-sm">{{ $i  }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                             <img src="{{ asset('/storage/'.$r->image) }}" alt="test" height="50" width="50">
                                           <!--<img src="{{ Storage::url($r->image) }}" alt="test" height="50" width="50">-->

                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $r->order_id}}</h6>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $r->table_number}}</h6>

                                        </div>
                                    </td>
                                   <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $r->payment_id}}</h6>

                                        </div>
                                    </td>

                                           <td>
                                               
                                               
                                        <div class="d-flex flex-column justify-content-center">
                                            
                                          
                                              <h6 class="mb-0 text-sm"> {{ ($r->item_name)}}</h6>
                                            
                                          
                                          

                                        </div>
                                    </td>

                                   
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                         
                                                <select  wire:change.prevent="change({{ $r->id}},{{$r->item_id }},$event.target.value,{{$r->order_id}})">
                                                   <option class="form-control border border-2 p-2" value="0" {{ $r->status == 0 ? 'selected="selected"' : '' }}>In-pending</option>
                                                   <option class="form-control border border-2 p-2" value ="1" {{ $r->status == 1 ? 'selected="selected"' : '' }}>In-progress</option>
                                                   <option class="form-control border border-2 p-2" value="2" {{ $r->status == 2 ? 'selected="selected"' : '' }}>In-completed</option>
                                                </select>
                                         
                                         
                                         
                                             <!--<select wire:model="status" wire:change.prevent="change({{ $r->id}},{{$r->item_id }})">-->
                                             <!--      <option class="form-control border border-2 p-2" value="0" {{ $r->status == 0 ? 'selected="selected"' : '' }}>In-pending</option>-->
                                             <!--      <option class="form-control border border-2 p-2" value ="1" {{ $r->status == 1 ? 'selected="selected"' : '' }}>In-progress</option>-->
                                             <!--      <option class="form-control border border-2 p-2" value="2" {{ $r->status == 2 ? 'selected="selected"' : '' }}>In-completed</option>-->
                                             <!--   </select>-->
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <!--<a rel="tooltip" class="btn btn-success btn-link" wire:click.prevent="editOrder({{ $r->id }})" href="" data-original-title="" title="">-->
                                        <!--    <i class="material-icons">edit</i>-->
                                        <!--    <div class="ripple-container"></div>-->
                                        <!--</a>-->

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