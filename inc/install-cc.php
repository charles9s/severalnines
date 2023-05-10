<?php 
if(!function_exists('pr')){
    function pr($arr){
        echo '<pre>'; print_r($arr); echo '</pre>';
    }
}
/* Getting the data from gravity form entry associated with an email */
function _s9s_get_user_data($email){
	$form_id			= 4;
	$data = [];
	if(class_exists('GFAPI')){
		$search_criteria	= array(
			'field_filters' => array(
				'mode' 		=> 'any',				
				array(
					'key'   => '4',
					'value' => $email
				)
			)
		);
		$sorting 			= array( 
			'key' 			=> 'date_created',
			'direction' 	=> 'DESC'
		);
		// Getting the entries
		$results = GFAPI::get_entries( $form_id, $search_criteria, $sorting );
		if(!empty($results)){
			return $results;
		}		
	}
	return [];
}
/**
 * Returns unique encrypted ClusterControl install script key.
 */
function _s9s_features_generate_cc_key ($account) {
	return s9s_features_encrypt ($account->ID);
}
/**
 * Encrypts data with salt.
 */

function s9s_features_encrypt($string) {
 
	// Store the cipher method
	$ciphering = "AES-128-CTR";

	// Use OpenSSl Encryption method
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;

	// Non-NULL Initialization Vector for encryption
	$encryption_iv = '1234567891011121';

	// Store the encryption key
	$encryption_key = "snsforsns";

	// Use openssl_encrypt() function to encrypt the data
	$encryption = openssl_encrypt($string, $ciphering,
	$encryption_key, $options, $encryption_iv);
	
	return $encryption;
}

/**
 * Decrypts data.
 */
function s9s_features_decrypt($string) {

	// Store the cipher method
	$ciphering = "AES-128-CTR";

	// Use OpenSSl Encryption method
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;

	// Non-NULL Initialization Vector for decryption
	$decryption_iv = '1234567891011121';

	// Store the decryption key
	$decryption_key = "snsforsns";

	$encryption = $string;
	// Use openssl_decrypt() function to decrypt the data
	
	$decryption=openssl_decrypt ($encryption, $ciphering, 
	$decryption_key, $options, $decryption_iv);

	return $decryption;
}

/**
 * Returns user data for ClusterControl trial license.
 */
function _s9s_features_get_cc_trial_license ($uid) {
	$result = Array (
		'uid'				=> false,
		'trialuser_email'	=> '',
		'name'				=> false,
		'email'				=> false,
		'company'			=> false,
		'expiration_date'	=> '',
		'lickey'			=> ''
		);

	if (!empty ($uid)) {
		$result['uid'] = $uid;

		if (empty ($result['uid'])) {
			return false;
		}
        $account = _s9s_get_user_data($result['uid']);

		if (empty ($account['uid'])) {
			return false;
		}
		$result['name'] = $account['name'];
		$result['email'] = $account['email'];
		$result['company'] = $account['company'];
	}
	return $result;
}

/**
 * Loads ClusterControl installation script & prefills user data.
 */
function _s9s_generate_install_cc_script ($email) {
	$file_url = get_stylesheet_directory_uri().'/files/features/install-cc';
	$stream_opts = [
		"ssl" => [
			"verify_peer"=>false,
			"verify_peer_name"=>false,
		]
	];
	$text = file_get_contents($file_url, false, stream_context_create($stream_opts));
	$text = preg_replace ('/##__EMAIL__##/', $email, $text);
	return $text;
}

/**
 * Returns default ClusterControl installation script with no user data.
 */
function _s9s_get_default_install_cc_script () {
	//global $user;

	//$ip = _s9s_features_get_ip ();

	/* $query = db_insert('s9s_stat_installcc_download')
	->fields(Array (
		'uid'			=> $user->uid,
		'mail'			=> $user->mail,
		'type'			=> 'D',
		'ip'			=> $ip ? $ip : '',
		'timestamp'		=> time ()
		))
	->execute(); */

	/* $text = file_get_contents ($_SERVER['DOCUMENT_ROOT'].'/downloads/cmon/install-cc'); */
	$file_url = get_stylesheet_directory_uri().'/files/install-cc';
	$stream_opts = [
		"ssl" => [
			"verify_peer"=>false,
			"verify_peer_name"=>false,
		]
	];
	$text = file_get_contents($file_url, false, stream_context_create($stream_opts));
	header ('Content-Type: text/x-shellscript');
	header ('Content-Transfer-Encoding: Binary');
	header ('Content-disposition: attachment; filename="install-cc"');
	header ('Expires: 0');
	header ('Cache-Control: must-revalidate');
	header ('Pragma: public');
	header ('Content-Length: '.mb_strlen ($text, 'utf-8'));

	echo $text;

	die ();
}

/**
 * Checks if user is authorized & returns proper ClusterControl installation script.
 */
function s9s_features_install_cc_page () {
	$data = [];
	$email = '';
	if (!empty ($_SERVER['QUERY_STRING'])) {
		$entry_id = s9s_features_decrypt (urldecode($_SERVER['QUERY_STRING']));
		$entry_id = (int)str_replace(ID_SUFFIX, '', $entry_id);
		if (empty ($entry_id)) {
			_s9s_get_default_install_cc_script ();
		}
		$account = get_user_by_entry_id($entry_id);
		if( !empty($account)) {
			// Clearing request data
			$email = $account['email'] ? trim (strip_tags ($account['email'])) : '';
			$first_name = $account['first_name'] ? trim (strip_tags ($account['first_name'])) : '';
			$last_name = $account['last_name'] ? trim (strip_tags ($account['last_name'])) : '';
			$country = $account['country'] ? trim (strip_tags ($account['country'])) : '';
			$phone = $account['phone'] ? trim (strip_tags ($account['phone'])) : '';
			$company = $account['company'] ? trim (strip_tags ($account['company'])) : '';
			$role = $account['role'] ? trim (strip_tags ($account['role'])) : '';
			$ip = $account['ip'] ? trim (strip_tags ($account['ip'])) : '';

			// Validating email
			if (!empty ($email) && function_exists ('filter_var') && !filter_var ($email, FILTER_VALIDATE_EMAIL) ) {
				$multiple_recipients = array(
				    'sandeep@severalnines.com',
				    'avinash@severalnines.com'
				);
				$headers = array('Content-Type: text/html; charset=UTF-8','From: Severalnines <support@severalnines.com>');
				$subj = 'Install CC entry failed!';
				$body = $email." was marked as invalid.";
				wp_mail( $multiple_recipients, $subj, $body, $headers );
				$email = '';
			}else{	
				$uid_hash = md5 ($email);
					
				$db = new mysqli('127.0.0.1', 'severalnines', 'py@yDKvmNkR^', 'severalnines_service');
				$sql = 'REPLACE INTO reg_data SET uid_hash="'.$uid_hash.'", email="'.$email.'", first_name="'.$first_name.'", last_name="'.$last_name.'", country="'.$country.'", phone="'.$phone.'", company="'.$company.'", role="'.$role.'", ip="'.$ip.'", timestamp=UNIX_TIMESTAMP()';
				$db->query ($sql); 
				$db->close();
				/* send pardot */
				_s9s_features_pardot_form_handler_send_request ('l/138181/2017-03-10/246dnn', Array (
					'email'	=> $email
				));
			}
		}else{
			_s9s_get_default_install_cc_script ();
		}
	}else {
		_s9s_get_default_install_cc_script ();
	}

	/* $parameters = array();
	$parameters = _s9s_features_get_cc_trial_license ($uid); */
	

	/* if (empty ($parameters)) {
        _s9s_get_default_install_cc_script ();
	} */
    
	/* $query = db_insert('s9s_stat_installcc_download')
	->fields(Array (
        'uid'			=> $parameters['uid'],
		'mail'			=> $parameters['email'],
		'type'			=> 'C',
		'timestamp'		=> time ()
		))
        ->execute(); */
	
	/* Download install-cc file */
	$text = _s9s_generate_install_cc_script ($email);
	header ('Content-Type: text/x-shellscript');
	header ('Content-Transfer-Encoding: Binary');
	header ('Content-disposition: attachment; filename="install-cc"');
	header ('Expires: 0');
	header ('Cache-Control: must-revalidate');
	header ('Pragma: public');
	header ('Content-Length: '.mb_strlen ($text, 'utf-8'));

	echo $text;

	die ();
}
/* Shortcode for step 1 instructions */
add_shortcode( 'scripts-installtion-step-1', 'scripts_installtion_shortcode_callback');
function scripts_installtion_shortcode_callback () {
	$s9s_cc_key = '';
	if ( isset( $_SESSION['__garvity__entry_id'] ) && $_SESSION['__garvity__entry_id'] != '' ) {
		$code = str_replace(ID_PREFIX, '', s9s_features_decrypt ($_SESSION['__garvity__entry_id']));
		if(class_exists('GFAPI')){
			if(GFAPI::entry_exists($code)){
				$code = $code.ID_SUFFIX;
				$s9s_cc_key = s9s_features_encrypt($code);	
			}
		}
	}
	$a = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$s1 = substr(str_shuffle($a), 0, 8);
	$s2 = substr(str_shuffle($a), 0, 8);
	ob_start(); ?>
	<div class="number">
			1)
		</div>
		<h2 class="has-pink-color">Run the following Scripts</h2>
		
		<div class="syntaxhighlighter">
			<div class="line">
				<code class="bash plain">$ wget -O </code><code class="bash functions">install</code><code class="bash plain">-cc <?=site_url()?>/scripts/install-cc?<?=urlencode($s9s_cc_key)?>,</code>
			</div>
		</div>
		<div class="syntaxhighlighter">
			<div class="line">
				<code class="bash plain">$ </code><code class="bash functions">chmod </code><code class="bash plain">+x </code><code class="bash functions">install</code><code class="bash plain">-cc</code>
			</div>
		</div>
		<div class="note info">
			<div class="text">
				<div class="title"><img style="width:20px;margin-bottom:-4px;" src="/wp-content/themes/severalnines/assets/img/acf/ico-info-c.svg" alt=""> Note:</div>
				<p>
				Please change S9S_CMON_PASSWORD or S9S_ROOT_PASSWORD values or remove the environment variables to interactively set to your own passwords.</p>
				<p>By default the installation script will install a new redesigned version of ClusterControl's web application in addition to the current legacy application which we intend to phase out.</p>
<p>
The new web application will by default be available at https://&lt;webserver&gt;:9443</p>

<p>For more detailed installation options see <a href="https://docs.severalnines.com">online documentation</a></p>
				
			</div>
		</div>
		
		<div class="syntaxhighlighter">
			<div class="line">
				<code class="bash plain">$ S9S_CMON_PASSWORD=<?=$s1?> S9S_ROOT_PASSWORD=<?=$s2?> ./install-cc</code>&nbsp;&nbsp;</br><code class="bash comments"> # as root or sudo user </code>
			</div>
		</div>
		<p>If you have multiple network interface cards, assign one IP address for HOST variable as per example
			below:
		</p>
		<div class="syntaxhighlighter">
			<div class="line">
				<code class="bash plain">$ S9S_CMON_PASSWORD=<?=$s1?> S9S_ROOT_PASSWORD=<?=$s2?> HOST=192.168.1.10 ./install-cc</code><code class="bash comments"> # as root or sudo user </code>
			</div>
		</div>
		<div class="note info">
			<div class="text">
				<div class="title"><img style="width:20px;margin-bottom:-4px;" src="/wp-content/themes/severalnines/assets/img/acf/ico-info-c.svg" alt=""> Note:</div><p>
				ClusterControl relies on a MySQL server as a data repository for the clusters it manages and an
				Apache server for the User Interface. The installation script will always install an Apache server
				on the host. An existing MySQL server can be used or a new MySQL server install is configured for
				minimum system requirements. If you have a larger server please make the necessary changes to
				the my.cnf file and restart the MySQL server after the installation.</p>
				<p>If you want to explicit set the Apache webserver's 'severname' then set S9S_WEB_SERVER_HOST=&lt;hostname&gt;.</p>

<p>S9S_WEB_SERVER_HOST=cc.mylocaldomain.local ./install-cc</p>
			</div>
		</div>
		<div class="divider"></div>
	<?php
	$content = ob_get_clean();
	return $content;
}

/*Get user entry by entry id*/

function get_user_by_entry_id($entry_id) {
	if(class_exists('GFAPI')){
		$entry = GFAPI::get_entry( $entry_id );
		if(!empty($entry)){
			return [
				'email' 		=> $entry[4],
				'first_name'	=> $entry[1],
				'last_name'		=> $entry[3],
				'name'			=> $entry[1]. ' ' . $entry[1][3],
				'role'			=> 'authenticated_user',
				'phone'			=> $entry[5],
				'company'		=> $entry[6],
				'country'		=> $entry[14],
				'ip'			=> _s9s_get_user_ip()
			];
		}		
	}
	return [];
}