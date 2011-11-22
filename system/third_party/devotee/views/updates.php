<?php if(!empty($updates->error)) : ?>
	<p><?php echo $updates->error ?></p>
<?php else : ?>
	<table>
		<thead>
			<tr>
				<th>Add-On Name</th>
				<th>Type</th>
				<th>Installed</th>
				<th>Latest</th>
				<th>Status</th>
				<th>Link</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($updates as $addon) : ?>
				<?php if($addon->update_available) : ?>
					<tr class="update">
				<?php else : ?>
					<tr>
				<?php endif ?>
					
					<td class="addon-name"><?php echo $addon->name ?></td>
					<td class="addon-type"><?php echo implode(', ', $addon->types) ?></td>
					<td class="addon-installed"><?php echo $addon->version ?></td>
					<td class="addon-current">
						<?php if($addon->current_version != '') : ?>
							<?php echo $addon->current_version ?>
						<?php else : ?>
							&ndash;
						<?php endif ?>
					</td>
					
					<?php if($addon->devotee_link != '') : ?>
						<?php if($addon->update_available) : ?>
							<td class="addon-status">
								Update Available
							</td>
							<td class="addon-link">
								<a href="<?php echo $addon->devotee_link ?>">Get Update</a>
							</td>
						<?php else : ?>
							<td class="addon-status" colspan="2">
								Up-to-date
							</td>
						<?php endif ?>
					<?php else : ?>
						<td class="addon-status" colspan="2">
							<a href="http://devot-ee.com/search/results/search&keywords=<?php echo rawurlencode($addon->name) ?>&channel=addons&addon_version_support=ee2/" target="_blank">Not Found - Search devot:ee</a>
						</td>
					<?php endif ?>
					
				</tr>
				
				<?php if($addon->notes) : ?>
					<tr class="notes">
						<td colspan="6">
							<?php echo $addon->notes ?>
						</td>
					</tr>
				<?php endif ?>
			<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>

<p><em>Last checked: <?php echo date('D, M j, Y, g:i A', $last_check) ?></em></p>

<p><em>Powered by <a href="http://devot-ee.com/" target="_blank"><strong>devot:ee</strong></a> in partnership with <a href="http://eecoder.com/" target="_blank"><strong>eecoder</strong></a>.</em></p>

<style>
	#devot-ee table { border-collapse: collapse; margin-bottom: 1em; }
	#devot-ee table th { text-align: left; }
	#devot-ee table th, #devot-ee table td { padding: 5px; }
	#devot-ee table tbody tr { border: 1px solid rgba(255, 255, 255, 0.2); border-width: 1px 0; }
	#devot-ee table tr.update { background: rgba(255, 255, 255, 0.1); color: #fff; font-weight: bold; }
	#devot-ee a { color: #fff !important; }
</style>