<?php
/*
* This file is part of enviroCar.
* 
* enviroCar is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* enviroCar is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with enviroCar.  If not, see <http://www.gnu.org/licenses/>.
*/

require_once('./assets/includes/authentification.php');
$logged_in = false; 
if(!is_logged_in()){
        $logged_in = false; 
        include('header-start.php');
}else{
        $logged_in = true;
        include('header.php');
}
?> 

	<div class="container leftband">
		<div class="row-fluid">
			<div class="span" style="padding-right: 1ex">
				<h2 id="privacy_website_head"><?echo $privacy_website_head; ?></h2>
				<p style="text-align: justify;">
					<?echo $privacy_website_text_01; ?>
					<ul>
						<?echo $privacy_website_text_use_datalist; ?>
					</ul>
					<?echo $privacy_website_text_02; ?>
					<ul>
						<?echo $privacy_website_text_register_datalist; ?>
					</ul>
					<?echo $privacy_website_text_03; ?>
				</p>
			</div>
		</div>
	</div>

	<div class="container leftband">
		<div class="row-fluid">
			<div class="span" style="padding-right: 1ex">
				<h2 id="privacy_cookies_head"><?echo $privacy_cookies_head; ?></h2>
				<p style="text-align: justify;">
					<?echo $privacy_cookies_text_01; ?>
					<ul>
						<?echo $privacy_cookies_text_use_datalist; ?>
					</ul>
					<?echo $privacy_cookies_text_02; ?>
				</p>
			</div>
		</div>
	</div>
	
	<div class="container leftband">
		<div class="row-fluid">
			<div class="span" style="padding-right: 1ex">
				<h2 id="privacy_uploadeddata_head"><?echo $privacy_uploadeddata_head; ?></h2>
				<p style="text-align: justify;">
					<?echo $privacy_uploadeddata_text; ?>
					<ul>
						<?echo $privacy_uploadeddata_datalist; ?>
					</ul>
				</p>
			</div>
		</div>
	</div>

<?
include('footer.php');
?>
