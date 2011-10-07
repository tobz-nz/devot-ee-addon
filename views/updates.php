<table>
	<thead>
		<tr>
			<th>Addon</th>
			<th>Local Version</th>
			<th>Current Version</th>
			<th>Link</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($addons as $addon) : ?>
		<tr>
			<td><?= $addon['name'] ?></td>
			<td><?= $addon['version'] ?></td>
			<td>0.0.0</td>
			<td><a href="#">More info</a></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>