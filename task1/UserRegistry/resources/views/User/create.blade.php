<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add new User</h5>
            </div>

            <div class="model-body">
                <div class="col-sm-11">
                    <form action="post" id="add-user-form">
                        <div class="summary entry-summary">
                            <input type="hidden" value="{{ csrf_token() }}" id="token" name="_token"/>
                            <label> Name </label>
                            <p>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                <span class="invalid-feedback" id="error-name" role="alert"></span>
                            </p>

                            <label> Surname </label>
                            <p>
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                                       name="surname" value="{{ old('surname') }}"  autocomplete="surname" autofocus>
                                <span class="invalid-feedback" id="error-surname" role="alert"></span>
                            </p>

                            <label> Email </label>
                            <p>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                                <span class="invalid-feedback" id="error-email" role="alert"></span>
                            </p>

                            <label> Position </label>
                            <p>
                                <input id="position" type="text" class="form-control @error('position') is-invalid @enderror"
                                       name="position" value="{{ old('position') }}"  autocomplete="position" autofocus>
                                <span class="invalid-feedback" id="error-position" role="alert"></span>
                            </p>
                        </div>

                        <div class="float-right" role="group">
                            <div class="loader"><div class="loading"></div></div>
                            <button name="cancel" class="btn secondary btn-alt" id="back" data-dismiss="modal"> Cancel </button>
                            <button type="submit" name="save" class="btn btn-secondary default-btn" id="save" value="save"> Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-select.is-invalid, .form-control.is-invalid, .was-validated .custom-select:invalid, .was-validated .form-control:invalid {
        border-color: #e9ecef !important;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #e37c7b !important;
        outline: 0;
        box-shadow: none !important;
    }

    * {
        margin: 0;
        padding: 0;
    }

    .loader {
        display: none;
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-50%, -50%);
    }

    .loading {
        border: 2px solid #ccc;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border-top-color: #1ecd97;
        border-left-color: #1ecd97;
        animation: spin 1s infinite ease-in;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

</style>
