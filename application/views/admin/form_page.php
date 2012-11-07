<div class="container" style="margin: 30px">

<h2><?= $title ?></h2>

<div class="alert alert-error hide" id="errors">
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>

<form class="form-inline" action="<?= base_url('admin_pages/save/') ?>" name="page_form" method="POST">

<? if(isset($page['id'])): ?>
<input type="hidden" name="id" value="<?= @$page['id'] ?>" />
<? endif ?>

<ul class="nav nav-tabs">
    <li class="active"><a href="#tab_pageinfo" data-toggle="tab">Page Information</a></li>
    <li><a href="#tab_metatags" data-toggle="tab">Meta Tags</a></li>
    <li><a href="#tab_googledata" data-toggle="tab">Google Data</a></li>
</ul>
    
<div class="tab-content" style="min-height: 380px">

	<div class="tab-pane active" id="tab_pageinfo">
		<div class="control-group">
			<label class="control-label">Page Name</label>
			<div class="controls">
				<input type="text" name="page_name" id="page_name" placeholder="Page Name" value="<?= @$page['page_name'] ?>" class="input-xxlarge">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Navigation Label (optional)</label>
			<div class="controls">
				<input type="text" name="page_navigation" id="page_navigation" value="<?= @$page['page_navigation'] ?>" placeholder="Navigation Label" class="input-xxlarge">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Description</label>
			<div class="controls">
				<textarea name="description" id="description" style="width: 60%; height: 100px;" class="tinymce" class="input-xxlarge"><?= htmlentities( @$page['description'] ) ?></textarea>
			</div>
		</div>
	</div>

	<div class="tab-pane" id="tab_metatags">
		<div class="control-group">
			<label class="control-label">Page Title</label>
			<div class="controls">
				<input type="text" name="page_title" id="page_title" value="<?= @$page['page_title'] ?>" placeholder="Page Title">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Meta Keywords</label>
			<div class="controls">
				<textarea name="meta_keywords" value="<?= @$page['meta_keywords'] ?>" style="width: 60%; height: 100px;" rows="3"><?= htmlentities( @$page['meta_keywords'] ) ?></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Meta Description</label>
			<div class="controls">
				<textarea name="meta_description" value="<?= @$page['meta_description'] ?>" style="width: 60%; height: 100px;" rows="3"><?= htmlentities( @$page['meta_description'] ) ?></textarea>
			</div>
		</div>
	</div>

	<div class="tab-pane" id="tab_googledata">
		<div class="control-group">
			<label class="control-label">Google Meta Tags</label>
			<div class="controls">
				<textarea name="google_meta_tags" style="width: 60%; height: 100px;" rows="3"><?= htmlentities( @$page['google_meta_tags'] ) ?></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Google Analytics Tracker</label>
			<div class="controls">
				<textarea name="google_meta_analytics" style="width: 60%; height: 100px;" rows="3"><?= htmlentities( @$page['google_meta_analytics'] ) ?></textarea>
			</div>
		</div>
	</div>

</div>

<div class="form-actions" style="width: 60%">
    <button type="submit" class="btn btn-primary"><?=$save_button?></button>
    <a href="<?= base_url('admin_pages/') ?>" class="btn">Cancel</a>
</div>

</form>

<script type="text/javascript">
tinyMCE.init({
        theme : "simple",
        mode : "exact",
        elements: "description"
});

$(document).ready(function() {
   var validator = new FormValidator('page_form',
    [{
        name: 'page_name',
        display: 'Page Name is Required<br />',
        rules: 'required'
    }],
    function(errors, event) {
        if (errors.length > 0) {
            // errmsg = '<button type="button" class="close" data-dismiss="alert">×</button>';
            errmsg = '';
            for(i = 0; i < errors.length; i++)
            {
                tmp = '';
                if(errors[i].id == 'page_name') tmp += 'Page Name is Required<br />';
                errmsg += tmp;
            }
            $("#errors").removeClass("hide");
            $("#errors").html(errmsg).show();
        }
    });
});

</script>