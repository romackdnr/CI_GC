<div class="container" style="margin: 30px">

<h2><?= $title ?></h2>

<div class="alert alert-error hide" id="errors">
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>

<form class="form-inline" action="<?= base_url('admin_members/save/') ?>" name="member_form" method="POST">

<? if(isset($member['id'])): ?>
<input type="hidden" name="id" value="<?= @$member['id'] ?>" />
<? endif ?>

<ul class="nav nav-tabs">
    <li class="active"><a href="#tab_member" data-toggle="tab">Member Information</a></li>
    <li><a href="#tab_address" data-toggle="tab">Address</a></li>
</ul>
    
<div class="tab-content" style="min-height: 380px">

	<div class="tab-pane active" id="tab_member">
		<div class="control-group">
            <label class="control-label" for="inputEmail">Full Name<font color='red'>*</font></label>
            <div class="controls">
                <input type="text" name="first_name" id="first_name" placeholder="First Name" value="<?= @$member['first_name'] ?>" />
                <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="<?= @$member['last_name'] ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Phone Number</label>
            <div class="controls">
                <input type="text" name="phone" id="phone" placeholder="Phone Number" value="<?= @$member['phone'] ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Company</label>
            <div class="controls">
                <input type="text" name="company" id="company" placeholder="Company Name" class="input-xlarge" value="<?= @$member['company'] ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Email Address</label>
            <div class="controls">
                <input type="text" name="email" id="email" placeholder="Email Address" class="input-xlarge" value="<?= @$member['email'] ?>" />
            </div>
        </div> 
        <div class="control-group">
            <label class="control-label">Password</label>
            <div class="controls">
                <input type="password" name="password" id="password" placeholder="Password">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
            </div>
        </div>
    </div>

	<div class="tab-pane" id="tab_address">
        <div class="control-group">
            <label class="control-label">Address</label>
            <div class="controls">
                <input type="text" name="address" id="address" placeholder="Address" class="input-xxlarge" value="<?= @$member['address'] ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">City</label>
            <div class="controls">
                <input type="text" name="city" id="city" placeholder="City" value="<?= @$member['city'] ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">State</label>
            <div class="controls">
                <input type="text" name="state" id="state" placeholder="State" value="<?= @$member['state'] ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Zip Code</label>
            <div class="controls">
                <input type="text" name="zip" id="zip" placeholder="Zip Code" value="<?= @$member['zip'] ?>" />
            </div>
        </div>
	</div>

</div>

<div class="form-actions" style="width: 60%">
    <button type="submit" class="btn btn-primary"><?=$save_button?></button>
    <a href="<?= base_url('admin_members/') ?>" class="btn">Cancel</a>
</div>

</form>

<script type="text/javascript">
$(document).ready(function() {
   var validator = new FormValidator('member_form',
    [{
        name: 'first_name',
        display: 'First Name is Required<br />',
        rules: 'required'
    }, {
        name: 'last_name',
        display: 'Last Name is Required<br />',
        rules: 'required'
    }, {
        name: 'email',
        display: 'Invalid Email Address<br />',
        rules: 'required|valid_email'
    }],
    function(errors, event) {
        if (errors.length > 0) {
            // errmsg = '<button type="button" class="close" data-dismiss="alert">×</button>';
            errmsg = '';
            for(i = 0; i < errors.length; i++)
            {
                tmp = '';
                if(errors[i].id == 'last_name') tmp += "Last Name is Required<br />";
                if(errors[i].id == 'first_name') tmp += "First Name is Required<br />";
                if(errors[i].id == 'email') tmp = "Invalid Email Address<br />";
                errmsg += tmp;
            }
            $("#errors").removeClass("hide");
            $("#errors").html(errmsg).show();
        }
    });
});

</script>