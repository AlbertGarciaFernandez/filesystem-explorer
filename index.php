<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/styles.css">
</head>






<body>
<div class="container">
<div class="row">
    <div class="col-12 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="d-grid"> <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crudModal" value="addFile">+ Add File</button>
				</div>
				<h5 class="my-3">My Drive</h5>
				<div class="fm-menu">
					<div class="list-group list-group-flush"> <a href="javascript:;" class="list-group-item py-1"><i class="bx bx-folder me-2"></i><span>All Files</span></a>
					<button class="list-group-item py-1" data-bs-toggle="modal" data-bs-target="#crudModal"  value="addDir"><i class="bx bx-plug me-2"></i>Add Dir</button>
						<button class="list-group-item py-1" data-bs-toggle="modal" data-bs-target="#crudModal"  value="editFile"><i class="bx bx-plug me-2"></i>Edit Files</button>
						<button class="list-group-item py-1" data-bs-toggle="modal" data-bs-target="#crudModal" value="deleteFile"><i class="bx bx-trash-alt me-2"></i>Deleted Files</button>
						<a href="javascript:;" class="list-group-item py-1"><i class="bx bx-file me-2"></i>
                    <span>Documents</span></a>
						<a href="javascript:;" class="list-group-item py-1"><i class="bx bx-image me-2"></i><span>Images</span></a>
						<a href="javascript:;" class="list-group-item py-1"><i class="bx bx-video me-2"></i><span>Videos</span></a>
						<a href="javascript:;" class="list-group-item py-1"><i class="bx bx-music me-2"></i><span>Audio</span></a>
						<a href="javascript:;" class="list-group-item py-1"><i class="bx bx-beer me-2"></i><span>Zip Files</span></a>
						<?php
            require_once "functions.php";
            callFolders();

        ?>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
			<?php require_once "functions.php";
        informationDisplay(); ?>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-9">
		<div class="card">
			<div class="card-body">
				<form action="file_operation.php" method="POST">
				<div class="fm-search mb-0">
						<div class="input-group input-group-lg">
						<button type="submit" class="input-group-text bg-transparent"><i class="fa fa-search"></i></button>
							<input type="text" class="form-control" placeholder="Search the files" name="search_file" >
						</div>
					</div>
			</form>
				<!--end row-->
				<h5>Folders</h5>
				<div class="row mt-3">
					<div class="col-12 col-lg-4">
						<div class="card shadow-none border radius-15">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="font-30 text-primary"><i class="bx bxs-folder"></i>
									</div>
									<div class="user-groups ms-auto">
										<img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="35" height="35" class="rounded-circle" alt="">
										<img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
									</div>
									<div class="user-plus">+</div>
								</div>
								<h6 class="mb-0 text-primary">Analytics</h6>
								<small>15 files</small>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-4">
						<div class="card shadow-none border radius-15">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="font-30 text-primary"><i class="bx bxs-folder"></i>
									</div>
									<div class="user-groups ms-auto">
										<img src="https://bootdey.com/img/Content/avatar/avatar7.png" width="35" height="35" class="rounded-circle" alt="">
									</div>
								</div>
								<h6 class="mb-0 text-primary">Assets</h6>
								<small>345 files</small>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-4">
						<div class="card shadow-none border radius-15">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="font-30 text-primary"><i class="bx bxs-folder"></i>
									</div>
									<div class="user-groups ms-auto">
										<img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
										<img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="35" height="35" class="rounded-circle" alt="">
									</div>
								</div>
								<h6 class="mb-0 text-primary">Marketing</h6>
								<small>143 files</small>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
				<div class="d-flex align-items-center">
					<div>
						<h5 class="mb-0">Recent Files</h5>
					</div>
					<div class="ms-auto"><a href="javascript:;" class="btn btn-sm btn-outline-secondary">View all</a>
					</div>
				</div>
				<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="">
    <div class="">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-lg-6 col-xl-6">
						
                            <h4 class="header-title m-b-30">My Files</h4>
                        </div>
                    </div>
					
                    <div class="row">
					<?php
					readDirect();
					?>
                        <div class="col-lg-6 col-xl-4">
                            <div class="file-man-box"><a href="" class="file-close"><i class="fa fa-times-circle"></i></a>
                                <div class="file-img-box"><img src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg" alt="icon"></div><a href="#" class="file-download"><i class="fa fa-download"></i></a>
                                <div class="file-man-title">
                                    <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                    <p class="mb-0"><small>568.8 kb</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-outline-danger w-md waves-effect waves-light"><i class="mdi mdi-refresh"></i> Load More Files</button>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container -->
</div>
			</div>
		</div>
	</div>
</div>
		<!-- Modal -->
		<div class="modal fade" id="crudModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				...
			</div>
			</div>
		</div>
		</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
</html>