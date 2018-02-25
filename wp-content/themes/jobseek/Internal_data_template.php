<?php
/* Template name: Internal Data Template */
get_header();

//print_r($_SESSION);exit;

$user_ID = get_current_user_id();
$current_user = wp_get_current_user();

if ( !($current_user instanceof WP_User) )
    return;

$roles = $current_user->roles;  //$roles is an array
$page_title = get_post_meta( get_the_ID(), '_jobseek_page_title_show', true );
if( $page_title != 'hide' ) {
    $page_subtitle = get_post_meta( get_the_ID(), '_jobseek_page_title_subtitle', true ); ?>
    <section id="title">
        <div class="container">
            <h1><?php //the_title(); ?></h1>
            <?php if( !empty( $page_subtitle ) ) { ?><h4><?php echo esc_html($page_subtitle); ?></h4><?php } ?>
        </div>
    </section>
<?php } ?>

<?php

if($user_ID != 0) {
if( $roles['0'] == 'editor' || $roles['0'] == 'administrator') {
?>
    <style>
        .txt_width { width:50%; margin-bottom:30px;}
        .login-dialog .modal-dialog {
            width: 400px;
        }
    </style>
<section id="content"<?php if( $page_title != 'show' ) { ?> class="no-title"<?php } ?>>
    <div class="container">
        <form id="internal_data" enctype="multipart/form-data">
            <h2 style="margin:-55px 0 20px 0">Internal Data</h2>
            <fieldset class="fieldset-job_title">
                <input type="text" placeholder="Company Name *" id="c_name" name="c_name" class="input-text txt_width">
                <input type="hidden" id="user_ID" name="user_ID" class="input-text txt_width" value="<?php echo $user_ID; ?>">
            </fieldset>
            <fieldset class="fieldset-job_title">
                <input type="text"   placeholder="Address*" id="address" name="address" class="input-text txt_width">
            </fieldset>
            <fieldset class="fieldset-job_title">
                <input type="text"   placeholder="Phone Number*" name="phone" class="input-text txt_width" >
            </fieldset>
            <fieldset class="fieldset-job_title">
                <input type="text"   placeholder="Email" id="email" name="email" class="input-text txt_width" >
            </fieldset>
            <fieldset class="fieldset-job_title">
                <input type="text"   placeholder="Website" id="website" name="website" class="input-text txt_width" >
            </fieldset>
            <fieldset class="fieldset-job_title">
                <ul class="job_types" style="border-top:none; margin-top:-20px;">
                    <li>
                        <label class="full-time" for="job_type_full_time">
                            <input type="radio" value="1" checked="checked" name="status">Active </label>
                    </li>
                    <li>
                        <label class="internship" for="job_type_internship">
                            <input type="radio" value="0" name="status">  Inactive</label>
                    </li>
                </ul>
                <br />
            </fieldset>
            <fieldset class="fieldset-job_title">
                <textarea class="input-text txt_width" name="comments" id="comments" style="height:80px;" placeholder="Comments"></textarea>
            </fieldset>
            <br />

            <fieldset class="fieldset-job_title">
                <input id="btn_send" type="submit" value="Save"  class="button btn btn-primary" >
                <input id="btn_wait" type="button" value="Save" class="button btn btn-primary" style="display:none;">
            </fieldset>
            <br />
        </form>

        <h2>List of Company</h2>
        <fieldset class="fieldset-job_title">
            <input type="text"   placeholder="Search Keyword" id="s_key" name="s_key" class="input-text" > &nbsp;&nbsp;&nbsp;
            <input id="search_btn" type="button" value="Search" class="button btn btn-primary">
        </fieldset> <br />
        <div class="list_com">
        </div>

        <?php } else {?>

            <section id="content">
                <div class="container">
                    <form id="submit-job-form" method="post">
                        <fieldset>
                            <label>Sorry, you are not authorized to this page.</label>
                        </fieldset>
                    </form>
                </div>
            </section>

        <?php } ?>
        <?php } else { ?>
            <section id="content">
                <div class="container">
                    <form enctype="multipart/form-data" class="job-manager-form" id="submit-job-form" method="post" action="/post-a-job/">
                        <fieldset>
                            <label>Have an account?</label>
                            <div class="field account-sign-in">
                                <a href="//sezplus.com/jobs/wp-login.php?redirect_to=http%3A%2F%2Fsezplus.com%2Fjobs%2Fpost-a-job%2F" class="button">Sign in</a>
                                If you don&rsquo;t have an account you can create one below by entering your email address/username. Your account details will be confirmed via email.
                            </div>
                    </form>
                </div>
            </section>
        <?php } ?>
    </div>
</section>

<?php get_footer(); ?>

<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<link href="<?php echo get_template_directory_uri(); ?>/light_box/bootstrap-dialog.min.css" rel="stylesheet" >
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/js/bootstrap-dialog.min.js"></script>
<script>
jQuery.noConflict();
jQuery(document).ready(function($) {
    jQuery('.list_com').load('<?php echo get_template_directory_uri(); ?>/get_internal_data.php');
    $( "#search_btn" ).click(function() {
        var skey	=	$("#s_key").val();
        if(skey!= ''){
            jQuery('.list_com').load('<?php echo get_template_directory_uri(); ?>/get_internal_data.php?s_key='+skey);
        }else
        {
            BootstrapDialog.show({
                title: 'Information',
                message: ' Please Enter Proper Search Keyword.',
                cssClass: 'login-dialog',
                buttons: [{
                    label: 'Ok',
                    cssClass: 'btn-primary',
                    action: function(dialog){
                        dialog.close();
                    }
                }]
            });
        }
    });

    $("#internal_data").validate({
        rules: 		{
            c_name				: 	{ required: true	},
            address				: 	{ required: true	},
            email				: 	{ required: true	},
            phone				: 	{ required: true	},
            email				: 	{ required: true	}
        },
        messages:	{
            user_name: 	{ required: "Please Enter Valid Name."	}
        },
        submitHandler: function(form) {
            $('#btn_send').hide();
            $('#btn_wait').show();
            $.ajax({
                type		:	"POST",
                url			:	"<?php echo get_template_directory_uri()?>/add_internal_data.php",
                data		:	$("#internal_data").serialize(),
                success		: 	function(res)	{
                    if(res == 1 )
                    {
                        BootstrapDialog.show({
                            title: 'Information',
                            message: ' Company Details Already Added.',
                            cssClass: 'login-dialog',
                            buttons: [{
                                label: 'Ok',
                                cssClass: 'btn-primary',
                                action: function(dialog){
                                    dialog.close();
                                }
                            }]
                        });
                    }
                    else
                    {
                        BootstrapDialog.show({
                            title: 'Information',
                            message: ' Company Details Added.',
                            cssClass: 'login-dialog',
                            buttons: [{
                                label: 'Ok',
                                cssClass: 'btn-primary',
                                action: function(dialog){
                                    dialog.close();
                                    window.location = "//sezplus.com/jobs/internal-data/";
                                }
                            }]
                        });
                    }
                    $('#btn_send').show();
                    $('#btn_wait').hide();
                }
            });
        }
    });
});

function edit_data(i, j, a )
{
    BootstrapDialog.show({
        title		: 	'Edit',
        message		: 	jQuery('<div></div>').load('<?php echo get_template_directory_uri(); ?>/internal_data_edit.php?c_id='+i),
    });
}

function delete_data(i, j , a)
{
    BootstrapDialog.show({

        type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
        message: 'Are you sure you want to delete '+ j + ' Company',
        cssClass: 'login-dialog',
        buttons: [{
            label: 'Ok',
            cssClass: 'btn-primary',
            action: function(dialog){
                jQuery.ajax({
                    type		:	"POST",
                    url			:	"<?php echo get_template_directory_uri()?>/internal_data_action.php",
                    data		:	{ c_id:i , action: a },
                    success		: 	function(res)	{
                        dialog.close();
                        BootstrapDialog.show({
                            title: 'Information',
                            message: j+' Company Deleted Successfully.',
                            cssClass: 'login-dialog',
                            buttons: [{
                                label: 'Ok',
                                cssClass: 'btn-primary',
                                action: function(dialog){
                                    dialog.close();
                                    var tr_row = '#tr-'+i;
                                    jQuery(tr_row).remove();
                                }
                            }]
                        });
                    }
                });
            }
        },  {
            label: 'Cancel',
            cssClass: 'btn-warning',
            action: function(dialogItself){
                dialogItself.close();
            }
        }]
    });
}
</script>
