   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

       <div class="row mt-5">
           <div class="col-lg-6">
               <form action="" method="post">
                   <div class="form-group">
                       <label for="editmenu">Edit Menu</label>
                       <?= form_error('editmenu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                       <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                       <input type="text" class="form-control" id="editmenu" name="editmenu" value="<?= $menu['menu']; ?>">
                   </div>
                   <button type="submit" class="btn btn-primary float-right">Edit</button>
               </form>
           </div>
       </div>

   </div>

   </div>
   <!-- End of Main Content -->