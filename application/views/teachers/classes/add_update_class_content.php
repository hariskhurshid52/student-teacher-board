<div class="form-group has-form-text">
    <label for="name">Class Name: </label>
    <input type="text" class="form-control" id="name" value="<?= isset($class) ? $class->name : '' ?>"
           placeholder="Enter class name">
</div>
<?php if (isset($class)): ?>
    <div class="form-group has-form-text">
        <label for="status">Status: </label>
        <select id="status" class="form-control">
			<?php foreach ([
				               'inactive' => 'In Active',
				               'active' => 'Active',
			               ] as $k => $v): ?>
                <option <?= $class->status == $k ? 'selected' : '' ?> value="<?= $k ?>"><?= $v ?></option>
			<?php endforeach; ?>
        </select>
    </div>
	<button class="btn btn-primary" onclick="updateClass('<?=$class->id?>')">Update</button>
<?php else: ?>
	<button class="btn btn-primary" onclick="saveClass()">Save</button>
<?php endif; ?>

