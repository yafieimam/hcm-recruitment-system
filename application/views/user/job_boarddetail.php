<?php foreach ($Listjob as $Job)  ?>
<div id="jobdetail<?php echo $Job->JobVacancyId ?>" class="card-jobdetail" style="width: 46rem; float:right; overflow:scroll; height:480px; margin-top:-655px; position:fixed; margin-left:760px">
	<img style="width: 750px;" src="assets/assets/images/banner-default.JPG" class="card-img-top" alt="...">
	<p style="margin-left: 400px; color:dimgrey;"><?php echo $Job->PostedDesc ?> and
		<?php echo $Job->ApplyBefore ?></p>
	<p style="margin-left: 300px;"></p>
	<div class="card" style="width: 12rem; margin-left:30px; margin-top:-110px">
		<img src="<?php echo base_url() ?>assets/template_home/theme/images/logoJNE.png" class="card-img-center" alt="...">
	</div>
	<div class="card-body">
		<h2 class="card-title"><strong><?php echo $Job->Position ?> ||
				<?php echo $Job->EmpTypeName ?></strong>
		</h2>
		<p class="card-text"><a style="color: blue;" href="#"><?php echo $Job->CompanyName ?></a></p>
		<p style="color: black;" class="card-text"><?php echo $Job->LocationName ?> .
			<?php echo $Job->RangeStartSalary ?>-<?php echo $Job->RangeEndSalary ?> IDR / month .
			<?php echo $Job->EmpTypeName ?></p>
	</div>
	<br><br><br><br>
	<div class="row">
		<a style="margin-left: 40px;" href="Job_board/Profiler/<?php echo $Job->JobVacancyId ?>" class="btn btn-danger">Apply</a>
		<a style="margin-left: 330px;" href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-heart-o">
				Save</i></a>
		<a style="margin-left: 10px;" href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-share"><i class="fa fa-share-alt">
				Share</i></a>
	</div>
	<ul class="list-group list-group-flush">
		<li class="list-group-item">
			<h2><strong> Job Description</strong></h2>
		</li>
		<li class="list-group-item">
			<h4><?php echo $Job->JobDescription ?></h4>
		</li>
		<li class="list-group-item">
			<h2><strong> Minimum Qualification </strong></h2>
		</li>
		<li class="list-group-item">
			<h4><?php echo $Job->Qualification ?></h4>
		</li>
		<li class="list-group-item">
			<h2><strong> Job Summary </strong></h2>
		</li>
		<li class="list-group-item">
			<ul>
				<li>
					<h6><strong>JOB LEVEL</strong></h6>
				</li>
				<h4><a href="#"><?php echo $Job->JobLevelName ?></a></h4>
			</ul>
		</li>
		<li class="list-group-item">
			<ul>
				<li>
					<h6><strong>JOB CATEGORY</strong></h6>
				</li>
				<h4><a href="#"><?php echo $Job->JobFunctionName ?></a></h4>
			</ul>
		</li>
		<li class="list-group-item">
			<ul>
				<li>
					<h6><strong>EDUCATION REQUIREMENT</strong></h6>
				</li>
				<h4><a href="#"><?php echo $Job->EducationLevelName ?></a></h4>
			</ul>
		</li>
		<li class="list-group-item">
			<ul>
				<li>
					<h6><strong>WEBSITE</strong></h6>
				</li>
				<h4><a href="https://www.jne.co.id/"><?php echo $Job->Website ?></a></h4>
			</ul>
		</li>
	</ul>
</div>