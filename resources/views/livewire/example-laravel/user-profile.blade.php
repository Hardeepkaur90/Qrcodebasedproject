<div class="container-fluid px-2 px-md-4 container-test">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">

                    <img src="{{ Storage::url(auth()->user()->profile) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ auth()->user()->name }}
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        CEO / Co-Founder
                    </p>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-2 active " data-bs-toggle="tab" href="javascript:;"
                                role="tab" aria-selected="true">
                                <i class="material-icons text-lg position-relative">home</i>
                                <span class="ms-1">App</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-2 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                aria-selected="false">
                                <i class="material-icons text-lg position-relative">email</i>
                                <span class="ms-1">Messages</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-2 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                aria-selected="false">
                                <i class="material-icons text-lg position-relative">settings</i>
                                <span class="ms-1">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>
        <div class="card card-plain h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-3">Profile Information</h6>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                @if (session('status'))
                <div class="row">
                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ Session::get('status') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                @if (Session::has('demo'))
                <div class="row">
                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ Session::get('demo') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
               
                <?php  $update='0'; ?>

               

             
                @if($state == 'view')
                <form wire:submit.prevent='update'>
                    <div class="row">

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Email address</label>
                            <input wire:model.lazy="email" readonly="readonly" type="email" class="form-control border border-2 p-2">
                            @error('email')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Name</label>
                            <input wire:model.lazy="name" type="text" class="form-control border border-2 p-2">
                            @error('name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Phone</label>
                            <input wire:model.lazy="phone" type="number" class="form-control border border-2 p-2">
                            @error('phone')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Location</label>
                            <input wire:model.lazy="location" type="text" class="form-control border border-2 p-2">
                            @error('location')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                       
                        <div class="mb-3 col-md-6">
                   
                            <label class="form-label">Profile</label>

                            <input type="file" wire:model.lazy="profile"  accept="image/*"  onchange="loadfile(event)" class="form-control border border-2 p-2">

                            @error('profile')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                       @if($profile)
                        <div class="mb-3 col-md-6" id="imgOutput">
                           <img id="preview-image-before-upload" alt="profile" style="max-height: 250px;">
                        </div>
                        @endif

                        <div class="mb-3 col-md-12">

                            <label for="floatingTextarea2">About</label>
                            <textarea wire:model.lazy="about" class="form-control border border-2 p-2" placeholder=" Say something about yourself" id="floatingTextarea2" rows="4" cols="50"></textarea>
                            @error('about')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                
              @else
              <form wire:submit.prevent='edit' >
                    <div class="row">

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Email address</label>
                            <input wire:model.lazy="email" readonly="readonly" type="email" class="form-control border border-2 p-2">
                            @error('email')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Name</label>
                            <input wire:model.lazy="name" readonly="readonly" type="text" class="form-control border border-2 p-2">
                            @error('name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Phone</label>
                            <input wire:model.lazy="phone" readonly="readonly" type="number" class="form-control border border-2 p-2">
                            @error('phone')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Location</label>
                            <input wire:model.lazy="location" readonly="readonly" type="text" class="form-control border border-2 p-2">
                            @error('location')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                      
                        <div class="mb-3 col-md-12">

                            <label for="floatingTextarea2">About</label>
                            <textarea wire:model.lazy="about" readonly="readonly" class="form-control border border-2 p-2" placeholder=" Say something about yourself" id="floatingTextarea2" rows="4" cols="50"></textarea>
                            @error('about')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
              
              @endif
            
            </div>
        </div>


    </div>

</div>

<script>
var loadfile = function(event){

    if (event.target.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#preview-image-before-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(event.target.files[0]);
     }
}

</script>
