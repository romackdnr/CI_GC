<div id="container">
  <h2>Casino Management</h2>
  <legend>Welcome to your Casino Manager</legend>
  
  <div class="hr-clear"><!-- Clear Section --></div>

    <? $qs = $this->uri->uri_to_assoc(3) ?>
    <? if(@$qs['created_casino'] == 'saved'): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <i class="icon-ok"></i> <strong>Successful.</strong> The casino is saved.
    </div>
    <? elseif(@$qs['created_casino'] == 'err'): ?>
    <div class="alert alert-error">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <i class="icon-remove"></i> <strong>Problem.</strong> Encountered a problem while saving your casino data.
    </div>
    <? endif ?>
    <? if(@$qs['is_deleted'] == 'yes'): ?>
    <div class="alert alert-error">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <i class="icon-remove"></i> <strong>Removed.</strong> The casino is removed completely.
    </div>
    <? endif ?>
  
  <div id="page_tabs">
    
    <p>
      <a href="<?= base_url('admin_casinos/create') ?>" class="btn btn-primary">Create New Casino</a>
    </p>
    
    <div id="pt_ftab">

      <table class="table table-bordered table-striped table-hover">
        <tr>
          <th>&nbsp;</th>
          <th>Logo</th>
          <th>Casino Name</th>
          <th>Actions</th>
        </tr>
      <? if(count($casinos) > 0): ?>
        <? $row_counter = 1 ?>
        <? foreach($casinos as $casino): ?>
        <tr>
          <td><?= $row_counter++ ?></td>
          <td>
            <img src="<?= $casino['logo'] ?>" width="100" height="100" alt="<?= $casino['casino_name'] ?>" />
          </td>
          <td width="50%"><?= $casino['casino_name'] ?></td>
          <td align="center">
            <a href="<?= base_url('admin_casinos/edit/' . $casino['id']) ?>" class="btn btn-mini btn-success"><i class="icon-pencil"></i> Edit</a>
            <a href="<?= base_url('admin_casinos/view/' . $casino['id']) ?>" class="btn btn-mini btn-info"><i class="icon-search"></i> View</a>
            <a href="#" class="btn btn-mini btn-danger" onClick="return confirmDelete(<?=$casino['id']?>);"><i class="icon-remove"></i> Delete</a>
          </td>
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
    if(result == true) window.location = "<?= base_url('admin_casinos/delete') ?>" + '/' + id;
  });
}
</script>
