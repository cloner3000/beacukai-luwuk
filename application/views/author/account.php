<div class="row">
    <div class="col-md-6">
        <section class="panel">
            <div class="panel-body">
                <?php echo $this->session->flashdata('message');?>
                <form method="post" action="<?php echo base_url(); ?>author/save_account">
                    <div class="form-group">
                        <label for="text-input">Fullname</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" id="text-input" class="form-control" value="<?php echo $user[0]['user_nama_depan']; ?>" name="user_nama_depan">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" id="text-input" class="form-control" value="<?php echo $user[0]['user_nama_belakang']; ?>" name="user_nama_belakang">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text-input">Username</label>
                        <input type="text" id="text-input" class="form-control" value="<?php echo $user[0]['user_login']; ?>" name="user_login">
                    </div>
                    <div class="form-group">
                        <label for="text-input">Password</label>
                        <input type="text" id="text-input" class="form-control" value="" name="user_password">
                        </small>* kosongkan jika tidak ingin merubah password.</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Account</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>