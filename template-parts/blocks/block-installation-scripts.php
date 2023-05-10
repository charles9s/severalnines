<?php
$class_name = 'choose-product-block download-cc';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$template = array(	
    array(
		'core/html',
		array(
            'content'       => '<div class="tab-main-box">
            <section class="clustercontrol" id="clustercontrol">
               <section class="script-nstallation">
                  <header class="section-header">
                     <h1>Script Installation Instructions for <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-pink-color">ClusterControl</mark></h1>
                  </header>
                  <div class="background col-md-12">
                     <div class="curved-corner-topleft"></div>
                     <div class="container">
                        <p>Welcome to ClusterControl! Before you get started, make sure you have the proper environment, such as a supported OS and a ssh keys setup. The full list of requirements can be found <a href="https://severalnines.com/docs/requirements.html" target="_blank">here.</a></p>
                     </div>
                     <div class="curved-corner-bottomright"></div>
                  </div>
               </section>
               <section class="run-scripts">
                  <div class="container">
                     [scripts-installtion-step-1]
                     <div class="number">2)</div>
                     <p>Open your web browser to  <mark style="background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-pink-color">http://[ClusterControl_host]/clustercontrol</mark> and create the default Admin user
                        by entering a valid email address and password.
                     </p>
                     <div class="divider"></div>
                     <div class="number">3)</div>
                     <p>Setup passwordless SSH to all target nodes (ClusterControl and all database nodes). Run following
                        commands on ClusterControl:
                     </p>
                     <div class="syntaxhighlighter">
                        <code class="bash plain">$ </code><code class="bash functions">ssh </code><code class="bash plain">-keygen -t rsa  </code><code class="bash comments"> # press enter on all prompts </code>
                     </div>
                     <div class="syntaxhighlighter">
                        <div class="line"><code class="bash plain">$ </code><code class="bash functions">ssh</code><code class="bash plain">-copy-</code><code class="bash functions">id</code> <code class="bash plain">-i ~/.</code><code class="bash functions">ssh</code><code class="bash plain">/id_rsa [ClusterControl IP address]</code></div>
                     </div>
                     <div class="syntaxhighlighter">
                        <div class="line"><code class="bash plain">$ </code><code class="bash functions">ssh</code><code class="bash plain">-copy-</code><code class="bash functions">id</code> <code class="bash plain">-i ~/.</code><code class="bash functions">ssh</code><code class="bash plain">/id_rsa [Database nodes IP address]</code><code class="bash comments"># repeat this to all target database nodes</code></div>
                     </div>
                     <div class="note info">
                        <div class="text">
                           <div class="title"><img src="/wp-content/themes/severalnines/assets/img/acf/ico-info-c.svg" alt=""> Note:</div>
                           For cloud infrastructure, you may skip this step since all nodes should have been configured with a keypair. Ensure the keypair exists in the ClusterControl node and you are good for the next step.
                        </div>
                     </div>
                     <div class="note attention">
                        <div class="text">
                           <div class="title"><img src="/wp-content/themes/severalnines/assets/img/acf/ico-warning-p.svg" alt="">  Attention</div>
                           If you use a non-root user, then it must be in sudoers on all nodes. <a href="http://severalnines.com/docs/requirements.html#operating-system-user" target="_blank">Read here</a> for details.
                        </div>
                     </div>
                  </div>
               </section>
            </section>
            <section class="ccx" id="ccx">
               <section class="script-nstallation">
                  <header class="section-header">
                     <h1>Docker Image Installation Instructions for  <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-pink-color">ClusterControl</mark></h1>
                  </header>
                  <div class="background col-md-12">
                     <div class="curved-corner-topleft"></div>
                     <div class="container">
                        <p>The <strong>Docker Image</strong> comes with ClusterControl installed and configured with all of its 
                           components, so you can immediately use it to manage and monitor your existing databases. 
                           The <strong>Docker Image</strong> for ClusterControl is a convenient way to quickly get up and running and 
                           it’s 100% reproducible. All you need to do is pull the image from the Docker Hub and then 
                           launch the software.
                        </p>
                     </div>
                     <div class="curved-corner-bottomright"></div>
                  </div>
               </section>
               <section class="run-scripts">
                  <div class="container">
                     <h2>Image Description</h2>
                     <p>To Pull ClusterControl images, simply</p>
                     <div class="syntaxhighlighter">
                        <div class="line">
                           <code class="bash plain">$ docker run -d severalnines/clustercontrol</code>
                        </div>
                     </div>
                     <p>The image is based on CentOS 7 with Apache 2.4, which consists of ClusterControl packages and 
                        prerequisite componentsD 
                     </p>
                     <ul>
                        <li>ClusterControl controller, UI, cloud, notification and web ssh packages installed via Severalnines 
                           repository.
                        </li>
                        <li> MySQL, CMON database, cmon user grant and dcps database for ClusterControl UI.</li>
                        <li>Apache, file and directory permission for ClusterControl UI with SSL installed.</li>
                        <li>SSH key for ClusterControl usage.</li>
                     </ul>
                     <div class="divider"></div>
                     <h2>Run Container</h2>
                     <p>To run a ClusterControl container, the simplest command would be:</p>
                     <div class="syntaxhighlighter">
                        <div class="line">
                           <code class="bash plain">$ docker run -d severalnines/clustercontrol</code>
                        </div>
                     </div>
                     <p>However, for production use, users are advised to run with sticky IP address/hostname and persistent 
                        volumes to survive across restarts, upgrades and rescheduling, as shown below:
                     </p>
                     <div class="syntaxhighlighter">
                        <div class="line"><code class="bash comments"># Create a Docker network</code></div>
                        <div class="line"><code class="bash plain">$ docker network create --subnet=192.168.10.0/24 db-cluster</code></div>
                        <div class="line">&nbsp;</div>
                        <div class="line"><code class="bash comments"># Start the container</code></div>
                        <div class="line"><code class="bash plain">$ docker run -d --name clustercontrol \</code></div>
                        <div class="line"><code class="bash plain">--network db-cluster \</code></div>
                        <div class="line"><code class="bash plain">--ip 192.168.10.10 \</code></div>
                        <div class="line"><code class="bash plain">-h clustercontrol \</code></div>
                        <div class="line"><code class="bash plain">-p 5000:80 \</code></div>
                        <div class="line"><code class="bash plain">-p 5001:443 \</code></div>
                        <div class="line"><code class="bash plain">-</code><code class="bash functions">v</code> <code class="bash plain">/storage/clustercontrol/cmon.d:/etc/cmon.d \</code></div>
                        <div class="line"><code class="bash plain">-</code><code class="bash functions">v</code> <code class="bash plain">/storage/clustercontrol/datadir:/var/lib/mysql \</code></div>
                        <div class="line"><code class="bash plain">-</code><code class="bash functions">v</code> <code class="bash plain">/storage/clustercontrol/sshkey:/root/</code><code class="bash functions">ssh</code> <code class="bash plain">\</code></div>
                        <div class="line"><code class="bash plain">-</code><code class="bash functions">v</code> <code class="bash plain">/storage/clustercontrol/cmonlib:/var/lib/cmon \</code></div>
                        <div class="line"><code class="bash plain">-</code><code class="bash functions">v</code> <code class="bash plain">/storage/clustercontrol/backups:/root/backups \</code></div>
                        <div class="line"><code class="bash plain">severalnines/clustercontrol</code></div>
                     </div>
                     <p><strong>The recommended persistent volumes are</strong></p>
                     <br>
                     <p><span class="has-pink-color">/etc/cmon.d</span> - ClusterControl configuration files.</p>
                     <p><span class="has-pink-color">/var/lib/mysql</span> - MySQL datadir to host cmon and dcps database.</p>
                     <p><span class="has-pink-color">/root/.ssh</span> - SSH private and public keys.</p>
                     <p><span class="has-pink-color">/var/lib/cmon</span> ClusterControl internal files.</p>
                     <p><span class="has-pink-color">/root/backups</span> - Default backup directory only if ClusterControl is the backup destination</p>
                     <br>
                     <p>After a moment, you should able to access the ClusterControl Web UI at {host’s IP address}:{host’s port}, 
                        for example:
                     </p>
                     <br>
                     <p class="has-pink-color">HTTP: http://192.168.10.100:5000/clustercontrol</p>
                     <p class="has-pink-color">HTTPS: https://192.168.10.100:5001/clustercontrol</p>
                     <br>
                     <p>We have built a complement image called centos ssh to simplify database deployment with 
                        ClusterControl. It supports automatic deployment (Galera Cluster) or it can also be used as a base image 
                        for database containers (all cluster types are supported). Details at <a href="https://github.com/severalnines/docker-centos-ssh">here</a>
                     </p>
                     <div class="divider"></div>
                     <h2>Environment Variables</h2>
                     <div class="variables-text">
                        <ul>
                           <li>
                              <code class="cc_code">CMON_PASSWORD={string}</code>
                              <ul class="list-blue">
                                 <li>MySQL password for user `cmon`. Default to `cmon`. Use
                                    <code class="cc_code">docker secret</code> is recommended.
                                 </li>
                                 <li>Example:
                                    <code class="has-pink-color">CMON_PASSWORD=cmonP4s5</code>
                                 </li>
                              </ul>
                           </li>
                           <li>
                              <code class="cc_code">MYSQL_ROOT_PASSWORD={string}</code>
                              <ul class="list-pink">
                                 <li>MySQL root password for the ClusterControl container. <br>
                                    Default to `password`. Use
                                    <code class="cc_code">docker secret</code> is recommended.
                                 </li>
                                 <li>Example:
                                    <code class="has-pink-color">MYSQL_ROOT_PASSWORD=MyPassW0rd</code>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                     <br>
                     <p> <a href="https://github.com/severalnines/docker#image-description">Github Instructions</a></p>
                     <div class="divider"></div>
                     <h2>Service Management</h2>
                     <p>Starting from version 1.4.2, ClusterControl requires a number of processes to be runningD</p>
                     <ul>
                        <li>sshd - SSH daemon. The main communication channel.</li>
                        <li>mysqld - MySQL backend runs on Percona Server 5.6.</li>
                        <li>httpd - Web server running on Apache 2.4.</li>
                        <li>cmon - ClusterControl backend daemon. The brain of ClusterControl. It depends on <code class="cc_code">mysqld</code> and <code class="cc_code">sshd.</code></li>
                        <li>cmon-ssh - ClusterControl web-based SSH daemon, which depends on <code class="cc_code">cmon</code> and <code class="cc_code">httpd.</code></li>
                        <li>cmon-events - ClusterControl notifications daemon, which depends on <code class="cc_code">cmon</code> and <code class="cc_code">httpd.</code></li>
                        <li>cmon-cloud - ClusterControl cloud integration daemon, which depends on <code class="cc_code">cmon</code> and <code class="cc_code">httpd.</code></li>
                        <li>cc-auto-deployment - ClusterControl automatic deployment script, running as a background process, which depends on <code class="cc_code">cmon</code></li>
                     </ul>
                     <br>
                     <p>These processes are being controlled by Supervisord, a process control system. To manage a process, one would use supervisorctl client as shown in the following example:</p>
                     <div class="syntaxhighlighter  bash">
                        <div class="line"><code class="bash plain">[root@physical-host]$ docker </code><code class="bash functions">exec</code> <code class="bash plain">it clustercontrol /bin/bash</code></div>
                        <div class="line"><code class="bash plain">[root@clustercontrol /]</code><code class="bash comments"># supervisorctl</code></div>
                        <div class="line"><code class="bash plain">cc-auto-deployment RUNNING pid 570, uptime 2 days, 19:11:54</code></div>
                        <div class="line number4 index3 alt1"><code class="bash plain">cmon RUNNING pid 573, uptime 2 days, 19:11:54</code></div>
                        <div class="line"><code class="bash plain">cmon-events RUNNING pid 576, uptime 2 days, 19:11:54</code></div>
                        <div class="line"><code class="bash plain">cmon-</code><code class="bash functions">ssh</code> <code class="bash plain">RUNNING pid 575, uptime 2 days, 19:11:54</code></div>
                        <div class="line number7 index6 alt2"><code class="bash plain">httpd RUNNING pid 571, uptime 2 days, 19:11:54</code></div>
                        <div class="line"><code class="bash plain">mysqld RUNNING pid 577, uptime 2 days, 19:11:54</code></div>
                        <div class="line"><code class="bash plain">sshd RUNNING pid 572, uptime 2 days, 19:11:54</code></div>
                        <div class="line"><code class="bash plain">supervisor&gt; restart cmon</code></div>
                        <div class="line"><code class="bash plain">cmon: stopped</code></div>
                        <div class="line"><code class="bash plain">cmon: started</code></div>
                        <div class="line"><code class="bash plain">supervisor&gt; status cmon</code></div>
                        <div class="line"><code class="bash plain">cmon RUNNING pid 2838, uptime 0:11:12</code></div>
                        <div class="line"><code class="bash plain">supervisor&gt;</code></div>
                     </div>
                     <h2>Examples</h2>
                     <ul>
                        <li>Standalone Docker</li>
                        <li>Kubernetes</li>
                     </ul>
                     <div class="divider"></div>
                     <h2>Development</h2>
                     <p>Please report bugs, improvements or suggestions via our support channel: </p>
                     <p> <a href="https://support.severalnines.com">https://support.severalnines.com</a></p>
                     <br>
                     <p>If you have any questions, you are welcome to get in touch via our contact us page or email us at </p>
                     <p>   <a href="mailto:info@severalnines.com">info@severalnines.com</a>.</p>
                  </div>
               </section>
            </section>
         </div>'
		),
	),
);

$allowed_blocks = array( 'core/html'); ?>
<section class="<?php echo $class_name; ?>">
    <?php  
        echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';				
    ?> 
</section>