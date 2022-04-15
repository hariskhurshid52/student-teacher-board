<div class="form-group has-form-text">
    <label for="name">Cohort Name: </label>
    <input type="text" class="form-control" id="name" value="<?= isset($cohort) ? $cohort->cohort_name : '' ?>"
           placeholder="Enter cohort name">
</div>
<?php if (isset($cohort)): ?>
    <div class="form-group has-form-text">
        <label for="status">Status: </label>
        <select id="status" class="form-control">
			<?php foreach ([
				               'inactive' => 'In Active',
				               'active' => 'Active',
			               ] as $k => $v): ?>
                <option <?= $cohort->status == $k ? 'selected' : '' ?> value="<?= $k ?>"><?= $v ?></option>
			<?php endforeach; ?>
        </select>
    </div>
	<button class="btn btn-primary" onclick="updateCohort('<?=$cohort->id?>')">Update</button>
<?php else: ?>
	<button class="btn btn-primary" onclick="saveCohort()">Save</button>
<?php endif; ?>

