<!-- Main container -->
<main>

    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>Cohorts</strong> List
                <small>Where you can manage your Cohorts</small>

            </h1>
        </div>

        <div class="header-action">
            <nav class="nav">
                <a class="nav-link active" href="#" onclick="addUpdateCohort()">Add New Cohort</a>
            </nav>
        </div>
    </header><!--/.header -->


    <div class="main-content">
        <div class="card">


            <div class="card-body">
                <table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach ($cohorts as $cohort): ?>
                        <tr>
                            <td><?=$cohort['cohort_name']?></td>
                            <td><?=strtoupper($cohort['status'])?></td>
	                        <td class="text-right table-actions">
		                        <a class="table-action hover-primary" href="#" onclick="addUpdateCohort('<?=$cohort['id']?>')"><i class="ti-pencil"></i></a>
	                        </td>
                        </tr>
					<?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div><!--/.main-content -->


</main>
<!-- END Main container -->
