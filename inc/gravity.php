<?php
add_filter( 'gform_field_value_ip', 'severalnines_ip_population_function' );
function severalnines_ip_population_function( $value ) {
    return _s9s_get_user_ip();
}
/*-------------------------------------------------------------------------------------------------------------------
| Populating the hidden field "job_title" of gravity form with hook, requires parameter name to be "job_title"  - SB |
--------------------------------------------------------------------------------------------------------------------*/
add_filter( 'gform_field_value_job_title', 'severalnines_job_title_population_function' );
function severalnines_job_title_population_function( $value ) {
    global $post;
    if(!empty($post && $post->post_type == 'careers')){
        return $post->post_title;
    }
}
/*----------------------------------------------------------
| Adding a class to bosy after gravity form submitted  - SB |
-----------------------------------------------------------*/
add_action( 'gform_after_submission', 'severalnines_gf_after_submission', 10, 2 );
function severalnines_gf_after_submission( $entry, $form ) {
    add_filter( 'body_class', function( $classes ) {
        return array_merge( $classes, array( 'gf-submitted' ) );
    } );
}
/*----------------------------------------------------------------------------------------------------------------
| Adding a user into the database when Control Product registration form(gravity)(form id: 4) is submitted  - SB |
-----------------------------------------------------------------------------------------------------------------*/
add_action( 'gform_after_submission_4', 's9s_after_submission_4', 10, 2 );
function s9s_after_submission_4( $entry, $form ) {
    $email = rgar( $entry, '4' );
    $prev_entry = _s9s_get_user_data($email);
    if(!empty($prev_entry) && count($prev_entry) > 1){
        $old_entry = $prev_entry[1];
        $old_entry['1'] = $entry['1'];
        $old_entry['3'] = $entry['3'];
        $old_entry['5'] = $entry['5'];
        $old_entry['6'] = $entry['6'];
        $old_entry['15'] = $entry['15'];
        $old_entry['21'] = $entry['21'];
        $old_entry['14'] = $entry['14'];
        $old_entry['22'] = $entry['22'];
        GFAPI::update_entry( $old_entry, $old_entry['id'] );
        GFAPI::delete_entry( $entry['id'] );
        $id = ID_PREFIX.$old_entry['id'];
    }else{
        $id = ID_PREFIX.$entry['id'];
    }    
    $digits = 5;
    $qr = ID_PREFIX.str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    $redirect_url = $form['confirmation']['url'].'?qr='.s9s_features_encrypt($qr);
    if(isset($_SESSION)){
        $code_en = s9s_features_encrypt($id);
        $_SESSION['__garvity__entry_id'] = $code_en;
        setcookie("__garvity__entry_id", $code_en, time()+60*60*24*30 ,'/') ;
        //$_COOKIE['__garvity__entry_id'] = s9s_features_encrypt($id);
    }
    $file = ABSPATH.'user_pdfs/Scripts-installation-'.time().'.pdf';
    $to = array('sandeep@severalnines.com', $email);
    $subject = 'Test Email.'; 
    $message = '
    <html>
    <body>
        <table rules="all" style="border-color: #666;" cellpadding="10">
          <tr>Hello WordPress</tr>
        </table>          
    </body>
    </html>
    ';
    send_cst_email($file);
    $attachments = array( $file );
    $headers[] = 'MIME-Version: 1.0' . "\r\n";
    $headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers[] = 'From: '.get_option( 'blogname' ).' <'.get_option( 'admin_email' ).'>';
    
    if(wp_mail( $to, $subject, $message, $headers, $attachments )){
        wp_delete_file($file);
    }
    wp_redirect($redirect_url);
    exit;
}
/*Populating fields for state and coutry through session, if session not set then only API will be called: SB*/
add_action( 'gform_pre_submission', 'pre_submission_handler' );
function pre_submission_handler( $form ) {
    $fields = $form['fields'];
    $ip = _s9s_get_user_ip();
    if(isset($_SESSION)) {      
        if(!isset($_SESSION['ip']) || ( isset($_SESSION['ip'])&& $_SESSION['ip'] != $ip) || !isset($_SESSION['location'])){
            $_SESSION['ip'] = $ip;
            get_location_info_using_ipstack($ip);
        }
    }    
    foreach ($fields as $key => $field) {        
        if ($field->inputName == "country") {
            $field_id = 'input_'.$field->id;
            if(isset($_SESSION['location']) && isset($_SESSION['location']['country_code'])){
                $_POST[$field_id] = $_SESSION['location']['country_code'];
            }
        }
        if ($field->inputName == "state") {
            $field_id = 'input_'.$field->id;
            if(isset($_SESSION['location']) && isset($_SESSION['location']['region_code'])){
               $_POST[$field_id] = $_SESSION['location']['region_code'];
            }
        }
    }
}
/*removing gravity form recaptcha id conflict*/
add_action('wp_head', 'gravity_recaptcha_fix');
function gravity_recaptcha_fix(){ ?>
    <script type="text/javascript">
        jQuery(document).ready( function ($){            
            $('.ginput_recaptcha').each(function(i) {
                if($(this).parents('#gform_1')) {
                    var thisID = $(this).attr('id');
                    $(this).attr('id', thisID+'_'+i);
                }
            });
        });
    </script>

<?php
}
/*gravity form enabling scroll to confirmation message*/
add_filter( 'gform_confirmation_anchor', '__return_true' );
add_filter( 'gform_confirmation_anchor_4', '__return_false' );

function send_cst_email($file){
    require_once ABSPATH . 'vendor/autoload.php';
    $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir'];

    $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];

    $mpdf = new \Mpdf\Mpdf([
        'fontDir' => array_merge($fontDirs, [
            ABSPATH . 'vendor/fonts',
        ]),
        'fontdata' => $fontData + [
            'nunito' => [
                'R' => "NunitoSans-Regular.ttf"               
            ],
            'bnunito' => [
                'R' => "NunitoSans-Bold.ttf",                
            ],
            'ebnunito' => [
                'R' => "NunitoSans-ExtraBold.ttf",                
            ],
            'bbnunito' => [
                'R' => "NunitoSans-Black.ttf",                
            ]
        ]
    ]);
    $stylesheet = file_get_contents(get_stylesheet_directory().'/assets/dist/files.css');
    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);    
    $html = '<section class="choose-product-block download-cc">
        <div class="tab-main-box">
            <section class="clustercontrol" id="clustercontrol">
                <section class="script-nstallation">
                    <header class="section-header">
                        <h1>Script Installation Instructions<br> for <span style="color:#b80b7b;" class="has-inline-color has-pink-color">ClusterControl</span></h1>
                    </header>                    
                </section>
                <section class="run-scripts">
                    <div class="container">';
                    $html .= scripts_installtion_shortcode_callback();
                    $html .= '<div class="number">2)</div>
                        <p>Open your web browser to  <span style="color: #b80b7b;" class="has-inline-color has-pink-color">http://[ClusterControl_host]/clustercontrol</span> and create the default Admin user
                        by entering a valid email address and password.
                        </p>
                        <div class="divider"></div>
                        <div class="number">3)</div>
                        <p>Setup passwordless SSH to all target nodes (ClusterControl and all database nodes). Run following
                        commands on ClusterControl:
                        </p>
                        <div class="syntaxhighlighter">
                        <code class="bash plain">$ </code>
                        <code class="bash functions">ssh </code>
                        <code class="bash plain">-keygen -t rsa  </code>
                        <code class="bash comments"> # press enter on all prompts </code>
                        </div>
                        <div class="syntaxhighlighter">
                        <div class="line"><code class="bash plain">$ </code>
                            <code class="bash functions">ssh</code>
                            <code class="bash plain">-copy-</code>
                            <code class="bash functions">id</code> 
                            <code class="bash plain">-i ~/.</code>
                            <code class="bash functions">ssh</code>
                            <code class="bash plain">/id_rsa [ClusterControl IP address]</code>
                        </div>
                        </div>
                        <div class="syntaxhighlighter">
                        <div class="line"><code class="bash plain">$ </code>
                            <code class="bash functions">ssh</code>
                            <code class="bash plain">-copy-</code>
                            <code class="bash functions">id</code> 
                            <code class="bash plain">-i ~/.</code>
                            <code class="bash functions">ssh</code>
                            <code class="bash plain">/id_rsa [Database nodes IP address]</code>
                            <code class="bash comments"># repeat this to all target database nodes</code>
                        </div>
                        </div>
                        <div class="note info">
                        <div class="text">
                            <div class="title"><img style="width:20px;margin-bottom:-4px;" src="/wp-content/themes/severalnines/assets/img/acf/ico-info-c.svg" alt=""> Note:</div>
                            For cloud infrastructure, you may skip this step since all nodes should have been configured with a keypair. Ensure the keypair exists in the ClusterControl node and you are good for the next step.
                        </div>
                        </div>
                        <div class="note attention">
                        <div class="text">
                            <div class="title"><img style="width:20px;margin-bottom:-4px;" src="/wp-content/themes/severalnines/assets/img/acf/ico-warning-p.svg" alt="">  Attention</div>
                            If you use a non-root user, then it must be in sudoers on all nodes. <a href="/docs/requirements.html#operating-system-user" target="_blank">Read here</a> for details.
                        </div>
                        </div>
                    </div>
                </section>
            </section>
            <section class="block-clusterControl">
                <div> <img height="120px" style="margin-top:-120px;float:right;" src="/wp-content/themes/severalnines/assets/img/shape_three.png"></div>
                <div class="background">
                    <div class="container">
                        <div class="content text-center">
                        <div class="text-center icon-picker">
                            <img class="skip-lazy" src="/wp-content/themes/severalnines/assets/img/acf/ico-settings-w.svg" alt="ico-settings-w">
                        </div>
                        <h2 class="has-text-align-center has-inline-color has-white-color">ClusterControl Installation Resources</h2>
                        </div>
                        <ul class="row-container">
                        <li class="col-12 col-sm-auto has-link has-text">
                            <a href="https://docs.severalnines.com/docs/clustercontrol/">System Requirements
                            </a>
                        </li>
                        <li class="col-12 col-sm-auto has-link has-text">
                            <a href="https://docs.severalnines.com/docs/clustercontrol/">
                            Installation Details
                            </a>
                        </li>
                        <li class="col-12 col-sm-auto has-link has-text">
                            <a href="https://docs.severalnines.com/docs/clustercontrol/">
                            ClusterControl User Guide
                            </a>
                        </li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="block-need-help">
                <h2 class="has-text-align-center">Need Additional Help? <br>
                    <a href="/contact_us">Contact Our Support Team</a>
                </h2>
            </section>
        </div>
    </section>';
    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
    $mpdf->Output($file, 'F');
}