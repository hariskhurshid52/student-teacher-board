<!-- Main container -->
<main>

    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>Classes</strong> List
                <small>Where you can manage your classes</small>

            </h1>
        </div>

        <div class="header-action">
            <nav class="nav">
                <a class="nav-link active" href="#" onclick="addUpdateClass()">Add New Class</a>
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
					<?php foreach ($classes as $class): ?>
                        <tr>
                            <td><?=$class['name']?></td>
                            <td><?=strtoupper($class['status'])?></td>
	                        <td class="text-right table-actions">
		                        <a class="table-action hover-primary" href="#" onclick="addUpdateClass('<?=$class['id']?>')"><i class="ti-pencil"></i></a>
		                        <a class="table-action hover-danger" href="#" onclick="deleteClass('<?=$class['id']?>')"><i class="ti-trash"></i></a>
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
