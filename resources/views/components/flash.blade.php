@if (session('msg_create'))
  <div class="flash_message w-20 bg-success text-center py-3 my-0 rounded ml-auto text-white font-weight-bold"
    style="width:20%;font-size:1rem;">
    {{ session('msg_create') }}
  </div>
@endif
@if (session('msg_update'))
  <div class="flash_message w-20 bg-success text-center py-3 my-0 rounded ml-auto text-white font-weight-bold"
    style="width:20%;font-size:1rem;">
    {{ session('msg_update') }}
  </div>
@endif
@if (session('msg_destroy'))
  <div class="flash_message w-20 bg-danger text-center py-3 my-0 rounded ml-auto text-white font-weight-bold"
    style="width:20%;font-size:1rem;">
    {{ session('msg_destroy') }}
  </div>
@endif
@if (session('msg_login'))
  <div class="flash_message w-20 bg-success text-center py-3 my-0 rounded ml-auto text-white font-weight-bold"
    style="width:20%;font-size:1rem;">
    {{ session('msg_login') }}
  </div>
@endif
@if (session('msg_logout'))
  <div class="flash_message w-20 bg-info text-center py-3 my-0 rounded ml-auto text-white font-weight-bold"
    style="width:20%;font-size:1rem;position:fixed;right:1rem;top:1rem;">
    {{ session('msg_logout') }}
  </div>
@endif
@if (session('msg_signup'))
  <div class="flash_message w-20 bg-success text-center py-3 my-0 rounded ml-auto text-white font-weight-bold"
    style="width:20%;font-size:1rem;">
    {{ session('msg_signup') }}
  </div>
@endif

