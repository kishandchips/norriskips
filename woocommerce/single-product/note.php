<?php if($note = get_field('note')): ?>
<div class="note alert">
	<?php echo $note; ?>
</div>
<?php endif; ?>