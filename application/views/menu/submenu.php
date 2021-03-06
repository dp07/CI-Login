   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

       <div class="row mt-5">
           <div class="col-lg-10">
               <?php if (validation_errors()) : ?>
                   <div class="alert alert-danger" role="alert">
                       <?= validation_errors(); ?>
                   </div>
               <?php endif; ?>
               <?= form_error('url', '', '</div>') ?>
               <?= $this->session->flashdata('message'); ?>
               <a class="btn btn-primary mb-3" href="" data-toggle="modal" data-target="#exampleModal">Add New Submenu</a>
               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">Title</th>
                           <th scope="col">Menu</th>
                           <th scope="col">Url</th>
                           <th scope="col">Icon</th>
                           <th scope="col">Active</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php $i = 1; ?>
                       <?php foreach ($submenu as $sm) : ?>
                           <tr>
                               <th scope="row"><?= $i ?></th>
                               <td><?= $sm['title']; ?></td>
                               <td><?= $sm['menu']; ?></td>
                               <td><?= $sm['url']; ?></td>
                               <td><?= $sm['icon']; ?></td>
                               <td><?= $sm['is_active']; ?></td>
                               <td>
                                   <a href="<?= base_url('menu/editsubmenu/') . $sm['id']; ?>" class="badge badge-success">Edit</a>
                                   <a href="<?= base_url('menu/deletesubmenu/') . $sm['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">Delete</a>
                               </td>

                           </tr>
                           <?php $i++ ?>
                       <?php endforeach; ?>

                   </tbody>
               </table>
           </div>
       </div>



   </div>

   </div>
   <!-- End of Main Content -->

   <!-- modal -->
   <!-- Button trigger modal -->


   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Add New Submenu</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <form action="<?= base_url('menu/submenu') ?>" method="post">
                   <div class="modal-body">
                       <div class="form-group">
                           <input type="text" class="form-control" id="submenu" name="submenu" placeholder=" submenu">
                       </div>
                       <div class="form-group">
                           <select name="menu" id="menu" class="form-control" placeholder="Menu">
                               <option value="Option">--Option--</option>
                               <?php foreach ($menu as $m) : ?>
                                   <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                               <?php endforeach; ?>
                           </select>
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-control" id="url" name="url" placeholder="url">
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-control" id="icon" name="icon" placeholder="icon">
                       </div>
                       <div class="form-group">
                           <div class="form-check">
                               <input class="form-check-input" type="checkbox" value="1" id="active" name="is_active" checked>
                               <label class="form-check-label" for="active">
                                   active
                               </label>
                           </div>
                       </div>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <button type="submit" class="btn btn-primary">add</button>
                   </div>
               </form>
           </div>
       </div>
   </div>