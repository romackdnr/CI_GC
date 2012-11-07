<div id="container">
  <h2>Page Management</h2>
  <legend>Welcome to your Page Manager</legend>
  
  <div class="hr-clear"><!-- Clear Section --></div>

    <? $qs = $this->uri->uri_to_assoc(3) ?>
    <? if(@$qs['created_page'] == 'saved'): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <i class="icon-ok"></i> <strong>Successful.</strong> The page is saved.
    </div>
    <? elseif(@$qs['created_page'] == 'err'): ?>
    <div class="alert alert-error">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <i class="icon-remove"></i> <strong>Problem.</strong> Encountered a problem while saving your page.
    </div>
    <? endif ?>
    <? if(@$qs['is_deleted'] == 'yes'): ?>
    <div class="alert alert-error">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <i class="icon-remove"></i> <strong>Removed.</strong> The page is removed completely.
    </div>
    <? endif ?>
  
  <div id="page_tabs">
    
    <p>
      <a href="<?= base_url('admin_pages/create') ?>" class="btn btn-primary">Create Page / Meta Tags</a>
    </p>
    
    <div id="pt_ftab">

      <table class="table table-bordered table-striped table-hover">
        <tr>
          <th>&nbsp;</th>
          <th>Page Name</th>
          <th>Actions</th>
          <th>Date Modified</th>
        </tr>
      <? if(count($pages) > 0): ?>
        <? $row_counter = 1 ?>
        <? foreach($pages as $page): ?>
        <tr>
          <td><?= $row_counter++ ?></td>
          <td width="60%"><?= $page['page_name'] ?></td>
          <td align="center">
            <a href="<?= base_url('admin_pages/edit/' . $page['id']) ?>" class="btn btn-mini btn-success"><i class="icon-pencil"></i> Edit</a>
            <a href="<?= base_url('admin_pages/preview/' . $page['id']) ?>" class="btn btn-mini btn-info"><i class="icon-search"></i> Preview</a>
            <a href="#" class="btn btn-mini btn-danger" onClick="return confirmDelete(<?=$page['id']?>);"><i class="icon-remove"></i> Delete</a>
          </td>
          <td><?= $page['date_modified'] ?></td>
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
    if(result == true) window.location = "<?= base_url('admin_pages/delete') ?>" + '/' + id;
  });
}
</script>
