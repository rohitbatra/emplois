<?php

/* Template name: Manual Payment Template */
/**
 *  process the form submit here
 */

if(isset($_POST['co_user_id']))
{
    require_once("/var/www/html/sezplus/jobs/wp-config.php");
    $hostname = DB_HOST;
    $username = DB_USER;
    $password = DB_PASSWORD;

    // Create connection
    $conn = mysqli_connect($hostname, $username, $password, DB_NAME) or die("Unable to connect to mysqli");
    // Add a manual entry to plans_status table
    $SQL = "INSERT INTO plans_status (user_id, plan_id,`status`,order_id,tracking_id,amount,purchasetime,payment_mode,add_info)
                VALUES ('{$_POST['co_user_id']}','1','1','1999{$_POST['co_user_id']}','00000000','{$_POST['amount']}','".time()."','".mysqli_real_escape_string($conn,$_POST['payment_mode'])."','".mysqli_real_escape_string($conn,$_POST['add_info'])."') ;";
    $res = mysqli_query($conn,$SQL);
    if(is_numeric(mysqli_insert_id($conn)))
    {
        echo '1';
    }else{
        echo 0;
    }
    die();
}

get_header();
include_once("database.php");

$user_ID = get_current_user_id();
$current_user = wp_get_current_user();

if (!($current_user instanceof WP_User))
    return;

$roles = $current_user->roles;

$page_title = get_post_meta(get_the_ID(), '_jobseek_page_title_show', true);

if ($page_title != 'hide')
{
    $page_subtitle = get_post_meta(get_the_ID(), '_jobseek_page_title_subtitle', true); ?>

    <section id="title">
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>
<?php }
if ($user_ID != 0) {
if (strtolower($roles['0']) == 'editor' || strtolower($roles['0']) == 'administrator') {
?>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" />

    <style>
        .txt_width {
            width: 50%;
            margin-bottom: 30px;
        }
        .login-dialog .modal-dialog {

            width: 400px;
        }
    </style>
<section id="content"<?php if ($page_title != 'show') { ?> class="no-title"<?php } ?>>
    <div class="container">
            <form id="manual_payment_data" enctype="multipart/form-data" style="display:none;">
                <input type="hidden" id="co_user_id" name="co_user_id" value="">
                <fieldset class="fieldset-job_title">
                    <input type="text" placeholder="Mode Of Payment" id="payment_mode" name="payment_mode" class="input-text txt_width">
                </fieldset>

                <fieldset class="fieldset-job_title">
                    <input type="text" placeholder="Additional Info" id="add_info" name="add_info" class="input-text txt_width">
                </fieldset>

                <fieldset class="fieldset-job_title">
                    <input type="text" placeholder="Amount" id="amount" name="amount" class="input-text txt_width">
                </fieldset>

                <fieldset class="fieldset-job_title">
                    <input id="btn_send" type="submit" value="Save" class="button btn btn-primary">
                </fieldset>
            </form>

        <?php
            $posts  =  "SELECT
                          wp_u.ID as id,
                          wp_u.display_name,
                          p_s.status,
                          wp_u.user_email
                        FROM
                          wp_users AS wp_u
                          LEFT OUTER JOIN
                          plans_status p_s
                          ON (wp_u.ID = p_s.user_id)
                          LEFT OUTER JOIN wp_usermeta wp_um
                            ON (wp_u.ID = wp_um.user_id)
                        WHERE wp_um.meta_key LIKE 'cjfm_user_role'
                          AND wp_um.meta_value LIKE 'employer'
                          ORDER BY p_s.purchasetime,wp_u.ID ASC;";
            $result = mysqli_query($conn, $posts);
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    if($row['status'] !== '1') {

                        $dataArr[$row['id']] = $row;
                        $dataArr[$row['id']]['meta'] = get_user_meta($row['id']);

                    }
                }
            }
        ?>
        <div id="dt_table">
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Display Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach($dataArr as $id => $data) {
                        print("
                            <tr>
                                <td>{$data['meta']['company_name']['0']}</td>
                                <td>{$data['display_name']}</td>
                                <td>{$data['user_email']}</td>
                                <td>{$data['meta']['phone-no']['0']}</td>
                                <td><button class='btn btn-payment btn-success' data-user-id='{$data['id']}'>Mark as Paid</button></td>
                            </tr>");
                    }
                }?>
                </tbody>
            </table>
        </div>
        <?php } else { ?>

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
    </div>
</section>
<?php get_footer(); ?>

<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<link href="<?php echo get_template_directory_uri(); ?>/light_box/bootstrap-dialog.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/js/bootstrap-dialog.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    jQuery.noConflict();
    jQuery(document).ready(function ($) {
        $('#example').DataTable();
        $('.btn-payment').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
           $('#dt_table').slideUp('slow');
           $('#manual_payment_data').slideDown('slow');
           $('#co_user_id').val($(e.currentTarget).attr('data-user-id'));
        });

        $('#btn_send').on('click', function(e)
        {
            $('#btn-send').addClass('disabled');
            e.preventDefault();
            e.stopPropagation();
            $.ajax({
                type		:	"POST",
                url			:	"//sezplus.com/jobs/wp-content/themes/jobseek/manual_payment.php",
                data		:	$("#manual_payment_data").serializeArray(),
                success		: 	function(res){
                    if($.trim(res) == '1')
                    {
                        alert('The Payment was successfully added!');
                        location.reload();

                    }else {
                        alert('There was an error!');
                    }
                }
            });
        });

    });
</script>

