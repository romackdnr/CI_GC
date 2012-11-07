<div class="container" style="margin: 30px">

<h2><?= $title ?></h2>

<div class="alert alert-error hide" id="errors">
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>

<form class="form-inline" action="<?= base_url('admin_casinos/save/') ?>" name="casino_form" method="POST" enctype="multipart/form-data">

<? if(isset($casino['id'])): ?>
<input type="hidden" name="id" value="<?= @$casino['id'] ?>" />
<? endif ?>

<ul class="nav nav-tabs">
    <li class="active"><a href="#tab_casino" data-toggle="tab">Casino Information</a></li>
    <li><a href="#tab_social" data-toggle="tab">Social Media</a></li>
</ul>
    
<div class="tab-content" style="min-height: 300px">

	<div class="tab-pane active" id="tab_casino">
		<div class="control-group">
            <label class="control-label" for="inputEmail">Casino Name<font color='red'>*</font></label>
            <div class="controls">
                <input type="text" name="casino_name" id="casino_name" placeholder="Casino Name" value="<?= @$casino['casino_name'] ?>" class="input-xxlarge" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Address</label>
            <div class="controls">
                <textarea name="address" id="address" placeholder="Address" class="input-xxlarge" ><?= @$casino['address'] ?></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Website URL</label>
            <div class="controls">
                <input type="text" name="website_url" id="website_url" placeholder="Website URL (e.g. http://www.domain.com)" value="<?= @$casino['website_url'] ?>" class="input-xxlarge" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Upload Logo</label>
            <div class="controls">
                <input type="file" name="logo" id="logo" />
            </div>
        </div>
    </div>

	<div class="tab-pane" id="tab_social">
        <div class="control-group">
            <label class="control-label">Facebook User Account</label>
            <div class="controls">
                <input type="text" name="facebook_account" id="facebook_account" placeholder="my_facebook_username" value="<?= @$casino['facebook_account'] ?>" class="input-xlarge" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Twitter User Account</label>
            <div class="controls">
                <input type="text" name="twitter_account" id="twitter_account" placeholder="my_twitter_username" value="<?= @$casino['twitter_account'] ?>" class="input-xlarge" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Google Plus User Account</label>
            <div class="controls">
                <input type="text" name="googleplus_account" id="googleplus_account" placeholder="my_googleplus_username" value="<?= @$casino['googleplus_account'] ?>" class="input-xlarge" />
            </div>
        </div>
	</div>

</div>

<div class="form-actions" style="width: 60%">
    <button type="submit" class="btn btn-primary"><?=$save_button?></button>
    <a href="<?= base_url('admin_casinos/') ?>" class="btn">Cancel</a>
</div>

</form>

<script type="text/javascript">
$(document).ready(function() {
   var validator = new FormValidator('casino_form',
    [{
        name: 'casino_name',
        display: 'Required',
        rules: 'required'
    }],
    function(errors, event) {
        if (errors.length > 0) {
            // errmsg = '<button type="button" class="close" data-dismiss="alert">×</button>';
            errmsg = '';
            for(i = 0; i < errors.length; i++)
            {
                tmp = '';
                if(errors[i].id == 'casino_name') tmp += "Casino Name is Required<br />";
                errmsg += tmp;
            }
            $("#errors").removeClass("hide");
            $("#errors").html(errmsg).show();
        }
    });
});

</script>