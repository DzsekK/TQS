<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The quiz show</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .navbar-dark{background:#059507;}
        .navbar-link{font-family: 'Times New Roman', Times, serif !important; }
    </style>

    <link rel="stylesheet" href="<?php echo base_url(); ?>util/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>util/kezdolap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>util/bejelentkezes.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>util/regisztracio.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>util/jatek.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>util/ranglista.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>util/felhasznalok.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>util/profil.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>util/kerdes.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>util/valasz.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>util/valtoztatas.css">





    <?php if (isset($oldal)) : ?>
        <script>
            $(function() {
                $('#<?php echo $oldal; ?>').addClass('active');
            });
        </script>
    <?php endif; ?>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark ">
		<a class="navbar-brand" href="<?php echo base_url() ?>"color="white">The Quiz Show</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
        <div id="navbarNav" class="collapse navbar-collapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item" id="kezdolap">
					<a class="nav-link" href="<?php echo base_url() ?>">Kezdőlap</a>
				</li>
				<?php if ($this->session->userdata('user') !== NULL): ?>
					<li class="nav-item" id="jatek">
						<a class="nav-link" href="<?php echo base_url(); ?>jatek">Játék</a>
					</li>
                    <li class="nav-item" id="ranglista">
						<a class="nav-link" href="<?php echo base_url(); ?>ranglista">Ranglista</a>
					</li>
                    
				<?php else :?>
				<?php endif; ?>

                <?php if ($this->session->userdata('user') !== NULL && $this->session->userdata('user')['felhasznalo_nev'] == 'Admin'): ?>
					<li class="nav-item" id="felhasznalok">
						<a class="nav-link" href="<?php echo base_url(); ?>felhasznalok">Admin</a>
					</li>
                <?php else :?>
				<?php endif; ?>
                   
                
			</ul>
					<ul class="navbar-nav">
				<?php if ($this->session->userdata('user') !== NULL): ?>
					<li class="nav-item" id="kijelentkezes">
						<a class="nav-link" href="<?php echo base_url(); ?>kijelentkezes">Kijelentkezés</a>
					</li>
                    <li class="nav-item" id="profil">
						<a class="nav-link" href="<?php echo base_url(); ?>profil">Profilom</a>
					</li>
				<?php else: ?>
					<li class="nav-item" id="regisztracio">
						<a class="nav-link" href="<?php echo base_url(); ?>regisztracio">Regisztráció</a>
					</li>
					<li class="nav-item" id="bejelentkezes">
						<a class="nav-link" href="<?php echo base_url(); ?>bejelentkezes">Bejelentkezés</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
    </nav>
    <div class="container">
        <?php if ($this->session->userdata('success') !== NULL) : ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $this->session->userdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->userdata('error') !== NULL) : ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $this->session->userdata('error'); ?>
            </div>
        <?php endif; ?>
        