<?php if(!empty($updates->error)) : ?>
	<p><?= $updates->error ?></p>
<?php else : ?>
	<table>
		<thead>
			<tr>
				<th>Addon</th>
				<th>Type</th>
				<th>Local Version</th>
				<th>Current Version</th>
				<th>Notes</th>
				<th>Link</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($updates as $addon) : ?>
			<tr class="<?= ($addon->update_available) ? 'update' : '' ?>">
				<td><?= $addon->name ?></td>
				<td><?= implode(', ', $addon->types) ?></td>
				<td><?= $addon->version ?></td>
				<td><?= $addon->current_version ?></td>
				<td><?= $addon->notes ?></td>
				<?php if($addon->update_available) : ?>
					<td><a href="<?= $addon->devotee_link ?>" target="_blank">Get on Devot:ee</a></td>
				<?php else : ?>
					<td>&nbsp;</td>
				<?php endif ?>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>

<p><em>Powered by <a href="http://devot-ee.com/" target="_blank"><strong>Devot:ee</strong></a> in partnership with <a href="http://eecoder.com/" target="_blank"><strong>eecoder</strong></a>.</em></p>

<style>
	#devot-ee table { border-collapse: collapse; margin-bottom: 1em; }
	#devot-ee table th, #devot-ee table td { padding: 5px; }
	#devot-ee table tbody tr { border: 1px solid rgba(255, 255, 255, 0.2); border-width: 1px 0; }
	#devot-ee table tr.update { background: rgba(255, 255, 255, 0.1); }
</style>