<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" name="loginform">
      <div class="modal-body mx-3">

        <div class="justify-content-center mb-3">
            <img src="{{url('img/avatar/login.png')}}" class="mx-auto d-block" alt=""  width="30%" style="border:1px solid lightgray;border-radius:7%;">
        </div>
        <div class="form-group">
            <label for="eml">Email:</label>
            <input type="text" class="form-control" id="eml" name="email">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="password">
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" type="submit">Login</button>
      </div>
    </form>
    </div>
  </div>
</div>

