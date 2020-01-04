   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
       <?= $this->session->flashdata('message'); ?>
       <div class="row">
           <div class="col-lg-6">
               <form action="<?= base_url('user/changepassword'); ?>" method="post">
                   <div class="form-group">
                       <label for="currentpassword">Current Password</label>
                       <input type="password" class="form-control" id="currentpassword" name="currentpassword">
                       <?= form_error('currentpassword', '<small class="text-danger pl-3">', '</small>'); ?>
                   </div>
                   <div class="form-group">
                       <label for="newpassword">New Password</label>
                       <input type="password" class="form-control" id="newpassword" name="newpassword">
                       <?= form_error('newpassword', '<small class="text-danger pl-3">', '</small>'); ?>
                   </div>
                   <div class="form-group">
                       <label for="confirmpassword">Confirm New Password</label>
                       <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
                       <?= form_error('confirmpassword', '<small class="text-danger pl-3">', '</small>'); ?>
                   </div>
                   <div class="form-group">
                       <button class="btn btn-primary" type="submit">Change</button>
                   </div>

               </form>
           </div>
       </div>

   </div>
   <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->