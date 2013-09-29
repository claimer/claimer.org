<?php slot('title', __('Register your climate damage(s) here!')) ?>

<p>Claimer.org wishes registration to be done by centres which have adapted our content to their local conditions. However, while parts of the world are not yet adequately covered by local registration centres, you can register damages on the server of Claimer.org. In order to register your personal climate damage(s), please fill in the following form.</p>

<div class="separator2"></div>

<p>When registering, please be aware of the following:</p>
<p>Registration of climate damages is an <b>opportunity</b> for you, <b>not an obligation</b>. It will improve your chances of getting compensation at a later point in time.</p>
<p>You are <b>not obliged</b> to fill in all the fields. Just fill in as many as you can. The more you fill in, the greater your chances of compensation. The more photos and documents you add, the more credible your future claim for compensation will be and the more it will be worth in the future.</p>
<p>It is easier to filling in the fields <b>today than in a month or a year</b>. The longer you leave it before filling in the fields and providing documents, the more difficult it will be. Better do it now!</p>
<p>We recommend that you working in two rounds. Answer as many questions as you can in the first round, noting what's missing as you go along. In the second round, answer the remaining questions and upload documents and photos. Scan your documents and photos before logging-in for the second round. Please note your log-in and password now if you have not yet done so.</p>

<div class="separator"></div>

<?php include_partial('damages/steps', array('step' => $step)) ?>

<h2><?php echo __('Personal Information') ?></h2>

<?php include_partial('users/form', array('form' => $form, 'route' => url_for('damage_new'))) ?>
