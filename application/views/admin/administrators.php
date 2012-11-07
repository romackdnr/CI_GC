<div id="container">
  <h2>Administrators Management</h2>
  <legend>Welcome to your Administrators Manager</legend>
  
  <div class="hr-clear"><!-- Clear Section --></div>

    <? $qs = $this->uri->uri_to_assoc(3) ?>
    <? if(@$qs['created_administrator'] == 'saved'): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <i class="icon-ok"></i> <strong>Successful.</strong> The administrator is saved.
    </div>
    <? elseif(@$qs['created_member'] == 'err'): ?>
    <div class="alert alert-error">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <i class="icon-remove"></i> <strong>Problem.</strong> Encountered a problem while saving your administrator data.
    </div>
    <? endif ?>
    <? if(@$qs['is_deleted'] == 'yes'): ?>
    <div class="alert alert-error">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <i class="icon-remove"></i> <strong>Removed.</strong> The administrator is removed completely.
    </div>
    <? endif ?>
  
  <div id="page_tabs">
    
    <p>
      <a href="<?= base_url('admin_administrators/create') ?>" class="btn btn-primary">Create New Administrator</a>
    </p>
    
    <div id="pt_ftab">

      <table class="table table-bordered table-striped table-hover">
        <tr>
          <th>&nbsp;</th>
          <th>Administrator Name</th>
          <th>Actions</th>
          <th>Date Registered</th>
        </tr>
      <? if(count($administrators) > 0): ?>
        <? $row_counter = 1 ?>
        <? foreach($administrators as $administrator): ?>
        <tr>
          <td><?= $row_counter++ ?></td>
          <td width="60%"><strong><?= $administrator['first_name'] ?> <?= $administrator['last_name'] ?></strong> (<small><?= $administrator['email'] ?></small>)</td>
          <td align="center">
            <a href="<?= base_url('admin_members/edit/' . $administrator['id']) ?>" class="btn btn-mini btn-success"><i class="icon-pencil"></i> Edit</a>
            <a href="<?= base_url('admin_members/view/' . $administrator['id']) ?>" class="btn btn-mini btn-info"><i class="icon-search"></i> View</a>
            <a href="#" class="btn btn-mini btn-danger" onClick="return confirmDelete(<?=$administrator['id']?>);"><i class="icon-remove"></i> Delete</a>
          </td>
          <td><?= $administrator['date_registered'] ?></td>
        </tr>
        <? endforeach ?>
      <? else: ?>
      <tr><th colspan='4'>No Record</th></tr>
      <? endif ?>
      </table>

    </div>
  </div>
  <!-- /End Page Tabs -->
  
</div>

<script src="<?= base_url('assets/js/bootbox.min.js') ?>"></script>
<script type="text/javascript">
function confirmDelete(id)
{
  bootbox.confirm('Are you sure you want to delete this?', 'No', 'Yes', function(result){
    if(result == true) window.location = "<?= base_url('admin_administrators/delete') ?>" + '/' + id;
  });
}
</script>
