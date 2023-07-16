<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Confirm delete</h5>
            </div>

            <div class="model-body">
                <div class="col-sm-11">
                    <form action="post" id="delete-user-form">
                        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="delete_id" name="delete_id">
                            <p>
                                Are you Sure you want to delete this user?
                            </p>

                        <div class="float-right" role="group">
                            <div class="loader"><div class="loading"></div></div>
                            <button type="submit" name="save" class="btn default-btn delete_new_user" id="save" value="save"> Confirm </button>
                            <button name="cancel" class="btn secondary btn-alt" id="back" data-dismiss="modal"> Cancel </button>
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
